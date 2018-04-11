<?php

namespace App\Security;

use App\Exception\ApiException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Yokai\SecurityTokenBundle\Manager\TokenManagerInterface;
use Yokai\SecurityTokenBundle\Exception as TokenExceptions;

class TokenAuthenticator extends AbstractGuardAuthenticator
{

    /** @var TokenManagerInterface */
    private $tokenManager;

    public function __construct(TokenManagerInterface $tokenManager)
    {
        $this->tokenManager = $tokenManager;
    }

    /**
     * Called on every request to decide if this authenticator should be
     * used for the request. Returning false will cause this authenticator
     * to be skipped.
     */
    public function supports(Request $request)
    {
        if ($request->headers->has('X-AUTH-TOKEN')) {
            return $request->headers->has('X-AUTH-TOKEN');
        } else if ($request->cookies->has('X-AUTH-TOKEN')) {
            return $request->cookies->has('X-AUTH-TOKEN');
        }

        return false;
    }

    /**
     * Called on every request. Return whatever credentials you want to
     * be passed to getUser() as $credentials.
     */
    public function getCredentials(Request $request)
    {
        $token = null;
        if ($request->cookies->has('X-AUTH-TOKEN')) {
            $token = $request->cookies->all()['X-AUTH-TOKEN'];
            $request->cookies->remove('X-AUTH-TOKEN');

        } else if ($request->headers->has('X-AUTH-TOKEN')) {
            $token = $request->headers->get('X-AUTH-TOKEN');
        }

        if (!empty($request->cookies->all()['admin'])) {
            session_start();
            if (empty($_SESSION['_sf2_attributes']['_security_admin'])) {
                $request->cookies->remove('admin');
                throw new ApiException('Authentication Required');
            }
        }

        return array(
            'token' => $token
        );
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $apiKey = $credentials['token'];
        if (null === $apiKey) {
            return;
        }

        try {
            $this->recoverPasswordAction($apiKey);
        } catch (\Exception $e) {
            throw new ApiException($e->getMessage());
        }

        // if a User object, checkCredentials() is called
        return $userProvider->loadUserByUsername($apiKey);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // check credentials - e.g. make sure the password is valid
        // no credential check is needed in this case

        // return true to cause authentication success
        return true;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // on success, let the request continue
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $data = array(
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())
        );
        if (!empty($exception->getMessage())) {
            $data['message'] = $exception->getMessage();
        }

        return new JsonResponse($data, Response::HTTP_FORBIDDEN);
    }

    /**
     * Called when authentication is needed, but it's not sent
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $data = array(
            // you might translate this message
            'message' => 'Authentication Required'
        );

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    public function supportsRememberMe()
    {
        return false;
    }

    private function recoverPasswordAction($token)
    {
        try {
            $token = $this->tokenManager->get('reset_password', $token);
        } catch(TokenExceptions\TokenNotFoundException $e) {
            throw new \Exception('Não há token com o valor solicitado');
        } catch(TokenExceptions\TokenExpiredException $e) {
            throw new \Exception('Um token foi encontrado, mas expirou');
        } catch(TokenExceptions\TokenConsumedException $e) {
            throw new \Exception('Um token foi encontrado, mas já consumido');
        }

        if (!$token) {
            throw new \Exception('Token não existe');
        }

        return $token->getValue();
    }

}