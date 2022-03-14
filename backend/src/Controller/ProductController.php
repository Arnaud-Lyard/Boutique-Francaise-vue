<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Product;
use App\Entity\User;
use App\Entity\Comment;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;


class ProductController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/api/produits", name="products")
     */
    public function index(SerializerInterface $serializer, Request $request): Response
    {

        $products = $this->entityManager->getRepository(Product::class)->findAll();


        foreach( $products as $product){
        
            $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
            $img = $product->getIllustration();
            $link = $baseurl."/uploads/products/".$img;

            $product->setIllustration($link);

        }


        $data = $serializer->serialize(
            $products,
            'json',
            ['groups' => 'produit']
        );

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');



        return $response;

    }

    /**
     * @Route("/api/produit/{slug}", name="product")
     */
    public function show(SerializerInterface $serializer, Request $request, $slug): Response
    {
        $product = $this->entityManager->getRepository(Product::class)->findOneBy(['slug' => $slug]);
        $products = $this->entityManager->getRepository(Product::class)->findByIsBest(1);
        // Récupérer les users
        $users = $this->entityManager->getRepository(User::class)->findAll();

        // Récupérer l'ID produit
        $productId = $product->getId();
        // Récupérer les entités Comment grâce à l'ID produit
        $comments = $this->entityManager->getRepository(Comment::class)->findByProduct($productId);

        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        $img = $product->getIllustration();
        $link = $baseurl."/uploads/products/".$img;

        $product->setIllustration($link);


        $data = $serializer->serialize(
            $product,
            'json',
            ['groups' => 'produit']
        );

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
