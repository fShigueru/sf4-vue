<?php

namespace App\Controller\Admin;

use App\Entity\Admin\User;
use App\Repository\Admin\NewsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Yokai\SecurityTokenBundle\Entity\Token;
use Yokai\SecurityTokenBundle\Exception\TokenConsumedException;
use Yokai\SecurityTokenBundle\Exception\TokenExpiredException;
use Yokai\SecurityTokenBundle\Manager\TokenManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    /** @var TokenManagerInterface */
    private $tokenManager;

    public function __construct(TokenManagerInterface $tokenManager)
    {
        $this->tokenManager = $tokenManager;
    }

    /**
     * @Route("/admin", name="admin")     
     */
    public function index(NewsRepository $newsRepository)
    {
        $news = $newsRepository->findLatest(4);
        return $this->render('admin/dashboard.html.twig', ['news' => $news]);
    }

    /**
     * @Route("/admin/api/doc", name="api_doc")
     */
    public function apiDoc(Request $request,  AuthorizationCheckerInterface $authChecker)
    {
        if (false === $authChecker->isGranted('ROLE_USER_API')) {
            throw new AccessDeniedException('Usuário não tem permissão para acessar essa página');
        }

        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (!$user->getApiKey()) {
            throw $this->createNotFoundException(); // or whatever you want
        }

        try{
            $token = $this->tokenManager->get('reset_password', $user->getApiKey());
        }catch (TokenExpiredException $e) {
            if (in_array('ROLE_ADMIN', $user->getRoles())) {
                $token = $this->createApi($user);
            } else {
                return new JsonResponse(['message' => 'Um token foi encontrado, mas expirou'], Response::HTTP_UNAUTHORIZED);
            }
        } catch(TokenConsumedException $e) {
            if (in_array('ROLE_ADMIN', $user->getRoles())) {
                $token = $this->createApi($user);
            } else {
                return new JsonResponse(['message' => 'Um token foi encontrado, mas expirou'], Response::HTTP_UNAUTHORIZED);
            }
        }

        $this->tokenManager->consume($token);

        $response =  new RedirectResponse('/api/doc', 301);
        $cookie = new Cookie('X-AUTH-TOKEN', $token->getValue(), strtotime('now + 10 minutes'));
        $response->headers->setCookie($cookie);
        $cookie = new Cookie('admin', true, strtotime('now + 10 minutes'));
        $response->headers->setCookie($cookie);
        return $response;
    }

    /**
     * @param $user
     * @return Token
     */
    private function createApi($user): Token
    {
        $token = $this->tokenManager->create('reset_password', $user);
        $user->setApiKey($token->getValue());
        $persist = $this->getDoctrine()->getManagerForClass(User::class);
        $persist->persist($user);
        $persist->flush();

        return $token;
    }

}

