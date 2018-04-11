<?php

namespace App\Controller\Admin;

use App\Entity\Admin\News;
use App\Form\Admin\NewsType;
use App\Repository\Admin\NewsRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/news")
 */
class NewsController extends Controller
{
    private $pathUpload = 'news/capa';

    /**
     * @Route("/", name="admin_news_index", methods="GET")
     */
    public function index(NewsRepository $newsRepository): Response
    {
        return $this->render('admin/news/index.html.twig', [
            'menus' => ['admin_news_index' => 'Notícias / Listar'],
            'news' => $newsRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="admin_news_new", methods="GET|POST")
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $capa = $news->getCapa();
            $fileName = $fileUploader->upload($capa, $this->pathUpload);
            $news->setCapa($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            try {
                $em->flush();
                $this->addFlash(
                    'success',
                    'Notícia cadastrada com sucesso!'
                );
            } catch (\Exception $e) {
                $this->addFlash(
                    'error',
                    'Erro ao cadastrar a notícia!'
                );
            }

            return $this->redirectToRoute('admin_news_index');
        }
        
        return $this->render('admin/news/new.html.twig', [
            'news' => $news,
            'menus' => ['admin_news_new' => 'Notícias / Novo'],
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_news_show", methods="GET")
     */
    public function show(News $news): Response
    {
        return $this->render('admin/news/show.html.twig', ['news' => $news]);
    }

    /**
     * @Route("/{id}/edit", name="admin_news_edit", methods="GET|POST")
     */
    public function edit(Request $request, News $news, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $capa = $news->getCapa();
                $fileName = $fileUploader->upload($capa, $this->pathUpload);
                $news->setCapa($fileName);

                $this->getDoctrine()->getManager()->flush();
                $this->addFlash(
                    'success',
                    'Notícia atualizada com sucesso!'
                );
            } catch (\Exception $e) {
                $this->addFlash(
                    'error',
                    'Erro ao atualizar notícia!'
                );
            }

            return $this->redirectToRoute('admin_news_edit', ['id' => $news->getId()]);
        }

        $breadcrumb = [
            'admin_news_index' => 'Notícias',
            'admin_news_edit' => [
                'label' => sprintf('Editar / %s', $news->getTitle()),
                'id' => $news->getId()
            ]
        ];

        return $this->render('admin/news/edit.html.twig', [
            'news' => $news,
            'menus' => $breadcrumb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_news_delete", methods="DELETE")
     */
    public function delete(Request $request, News $news): Response
    {
        if ($this->isCsrfTokenValid('delete'.$news->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($news);
            $em->flush();
        }

        return $this->redirectToRoute('admin_news_index');
    }
}
