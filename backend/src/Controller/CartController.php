<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Product;
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

    // Get data from JSON
    $productid = $data['id'];
    $productname = $data['name'];
    $price = $data['price'];
    $quantity = 1;
    $productsave = false;

    // Check if product is already in cart
    
    // New instance Cart
    $cart = new Cart();
    
    // Set data in cart
    // $cart->setProduct($productname);
    // $cart->setQuantity($quantity);
    // $cart->setPrice($price);
    // $cart->setTotal($price * $quantity);


    
    // Save entity in database
    // $this->entityManager->persist($cart);
    // $this->entityManager->flush();


    // $productsave = true;

    // $id = $this->entityManager->getRepository(Cart::class)->findById($cart);
    $idstored = $this->entityManager->getRepository(Product::class)->findOneBy(['name' => $productname])->getId();

    if ( $idstored == $productid && $productsave == false) {

        // Set data in cart
        $cart->setProduct($productname);
        $cart->setQuantity($quantity);
        $cart->setPrice($price);
        $cart->setTotal($price * $quantity);
    
    
        
        // Save entity in database
        $this->entityManager->persist($cart);
        $this->entityManager->flush();

        $productsave = true;

    } else {
        $quantity ++;
        
        // Set data in cart
        $cart->setProduct($productname);
        $cart->setQuantity($quantity);
        $cart->setPrice($price);
        $cart->setTotal($price * $quantity);
    
    
        
        // Save entity in database
        $this->entityManager->persist($cart);
        $this->entityManager->flush();

    }

    


    

    // foreach ( $productdetails as $productdetail ){}

    $productdetails = $this->entityManager->getRepository(Cart::class)->findAll();

    $data = $serializer->serialize(
        $productdetails,
        'json',
        ['groups' => 'cart']
    );

    // Remove entity from database if checkout
    // $this->entityManager->remove($cart);
    // $this->entityManager->flush();

    // Return a valid response
    $response = new Response($data);
    $response->headers->set('Content-Type', 'application/json');
    return $response;

    }
}
