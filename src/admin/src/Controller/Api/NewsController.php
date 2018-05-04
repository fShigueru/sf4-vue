<?php

namespace App\Controller\Api;

use App\Entity\Admin\News;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FileUploader;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\Annotations\FileParam;

use Swagger\Annotations as SWG;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class NewsController
 * @package App\Controller\Api
 *
 */
class NewsController extends FOSRestController
{

    /**
     * @Rest\Get("/api/news", name="api_news")
     * @IsGranted("ROLE_USER_API")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retorna as noticias",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=News::class))
     *     )
     * )
     * @SWG\Response(
     *     response=401,
     *     description="Token expirado",
     * )
     * @SWG\Tag(name="news")
     */
    public function index(AuthorizationCheckerInterface $authChecker)
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository(News::class)->findLatest(6);
        return $this->json(['data' => $news, 'status' => 200, 'path_image' => '/uploads/news/capa/']);
    }

    /**
     * @Rest\Get("/api/news/{id}", name="api_news_show")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retorna uma noticias",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=News::class))
     *     )
     * )
     * @SWG\Response(
     *     response=401,
     *     description="Token expirado",
     * )
     * @SWG\Tag(name="news")
     */
    public function getNews(News $news)
    {
        return $this->json(['data' => $news, 'status' => 200]);
    }

    /**
     * @Rest\Post("/api/news", name="api_news_new")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retorna as noticias",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=News::class))
     *     )
     * )
     * @SWG\Response(
     *     response=401,
     *     description="Token expirado",
     * )
     * @RequestParam(
     *   name="title"
     * )
     * @RequestParam(
     *   name="description"
     * )
     * @FileParam(
     *   name="capa"
     * )
     * @SWG\Parameter(
     *   name="title",
     *   in="formData",
     *   type="string",
     *   format="multipart/form-data",
     *   description="Titulo da notícia"
     * )
     * @SWG\Parameter(
     *   name="description",
     *   in="formData",
     *   type="string",
     *   format="multipart/form-data",
     *   description="Descrição da notícia"
     * )
     * @SWG\Parameter(
     *   name="capa",
     *   in="formData",
     *   type="file",
     *   description="Capa",
     *   format="multipart/form-data",
     *   @SWG\Schema(type="file")
     * )
     * @SWG\Tag(name="news")
     */
    public function new(Request $request, FileUploader $fileUploader)
    {
        echo 'a';exit;
        dump($request);exit;
        dump($request->request->get('title'));exit;
    }
}