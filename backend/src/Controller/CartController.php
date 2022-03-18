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
    // $productdetails = $serializer->deserialize($data, OrderDetails::class, 'json');
    // dd($data);

    // Get data from JSON
    // $productid = $data['id'];
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

    // $this->entityManager->persist($cart);
    $this->entityManager->persist($cart);
    $this->entityManager->flush();

    

    $data = $serializer->serialize(
        $cart,
        'json',
        ['groups' => 'cart']
    );

    $response = new Response($data);
    $response->headers->set('Content-Type', 'application/json');



    return $response;


    // $productdetails = $this->entityManager->getRepository(OrderDetails::class)->findOneBy(array(), array('id' => 'DESC'));
    // $productdetails->setQuantity($quantity);

    
    
    // $product_object = $this->entityManager->getRepository(Product::class)->findOneById($id);
    
    // $productid = $productdetails->getId();
    // $productname = $productdetails->getProduct();
    // $price = $productdetails->getPrice();


    }
}
