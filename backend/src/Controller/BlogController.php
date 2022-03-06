<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
Use App\Repository\CategoryArticleRepository;
use App\Entity\CategoryArticle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class BlogController extends AbstractController
{
    private $repoArticle;
    private $repoCategory;

    public function __construct(ArticleRepository $repoArticle, CategoryArticleRepository $repoCategory  )
    {
        $this->repoArticle = $repoArticle;
        $this->repoCategory = $repoCategory;
    }

    /**
     * @Route("/actualites", name="blog")
     */
public function index(SerializerInterface $serializer): Response
    {
        $articles = $this->repoArticle->findAll();
        // $categories = $this->repoCategory->findAll();
        // dd($categories);
        //     $this->render("blog/index.html.twig", [
        //     'articles' => $articles,
        //     'categories' => $categories,
        // ]);
       

        // $serializer->serialize(
        //     $articles,
        //     'json',
        //     ['groups' => 'article']
        // );

        // $data =  $this->get('serializer')->serialize($author, 'json');

        $data = $serializer->serialize(
            $articles,
            'json',
            ['groups' => 'article']
        );

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }

    /**
     * @Route("/actualite/{id}", name="show")
     */
    public function show(Article $article): Response
    {
        if (!$article) {
            return $this->redirectToRoute('blog');
        }
        // dd($article);
        return $this->render("blog/show.html.twig", [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/details_categorie/{id}", name="categoryDetails")
     */
    public function showArticle(?CategoryArticle $category): Response
    {
        $categories = $this->repoCategory->findAll();

        if ($category) {            
            $articles = $category->getArticles()->getValues();
        } else {
            return $this->redirectToRoute('blog');
        };      
            // dd($articles);    
            return $this->render("blog/index.html.twig", [
                'articles' => $articles,
                'categories' => $categories,
            ]);
    }
}
