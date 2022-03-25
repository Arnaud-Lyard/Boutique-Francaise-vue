<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
Use App\Repository\CategoryArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class BlogController extends AbstractController
{
    private $repoArticle;

    public function __construct(ArticleRepository $repoArticle, CategoryArticleRepository $repoCategory  )
    {
        $this->repoArticle = $repoArticle;
        $this->repoCategory = $repoCategory;
    }

    /**
     * @Route("/api/actualites", name="blog", methods={"GET","HEAD"})
     */
    public function index(SerializerInterface $serializer, Request $request): Response
    {
        $articles = $this->repoArticle->findAll();

        foreach( $articles as $article){
            
            $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
            $img = $article->getImage();
            $link = $baseurl."/uploads/articles/".$img;

            $article->setImage($link);

        }


        $data = $serializer->serialize(
            $articles,
            'json',
            ['groups' => 'article']
        );

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }
}
