<?php

namespace App\Controller;

use App\Entity\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class CartController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("api/cart", name="cart")
     */
    public function index(SerializerInterface $serializer, Request $request): Response
    {
    // Get data from Vue in JSON
    $data = json_decode($request->getContent(), true);

    // Check if Vue return data
    if(!$data) {

        $productdetails = $this->entityManager->getRepository(Cart::class)->findAll();

        $data = $serializer->serialize(
            $productdetails,
            'json',
            ['groups' => 'cart']
        );
    
    
        // Return a valid response
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    
    }else {
        // Get data from JSON
        $productname = $data['name'];
        $price = $data['price'];
        $quantity = 1;

        
        // New instance Cart
        $cart = new Cart();
        
        // Set data in cart
        $cart->setProduct($productname);
        $cart->setQuantity($quantity);
        $cart->setPrice($price);
        $cart->setTotal($price * $quantity);


        
        // Save entity in database
        $this->entityManager->persist($cart);
        $this->entityManager->flush();


        $productdetails = $this->entityManager->getRepository(Cart::class)->findAll();

        $data = $serializer->serialize(
            $productdetails,
            'json',
            ['groups' => 'cart']
        );

        // Return a valid response
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;

        }
    }
    /**
     * @Route("api/cart/delete/all", name="cart-delete")
     */
    public function delete(SerializerInterface $serializer, Request $request): Response
    {


        // Get full Cart from database
        $productdetails = $this->entityManager->getRepository(Cart::class)->findAll();

        //Remove entity from database if checkout
        foreach ( $productdetails as $productdetail ) {
            $this->entityManager->remove($productdetail);
        }
        $this->entityManager->flush();

        // Get empty full Cart from database
        $productdetails = $this->entityManager->getRepository(Cart::class)->findAll();

        $data = $serializer->serialize(
            $productdetails,
            'json',
            ['groups' => 'cart']
        );



        // Return a valid response
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
