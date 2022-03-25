<?php

namespace App\Controller;

use App\Entity\User;
use App\Classe\Mail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;


class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/api/inscription", name="register", methods={"POST","HEAD"})
     */
    public function index(SerializerInterface $serializer, Request $request, UserPasswordEncoderInterface $encoder)
    {   

        $data = $request->getContent();
        $user = $serializer->deserialize($data, User::class, 'json');
        
        $search_email = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());
        
            if(!$search_email) {
                $password = $encoder->encodePassword($user, $user->getPassword());
    
                $user->setPassword($password);

                $this->entityManager->persist($user);
                $this->entityManager->flush();

                return new Response('Success : Email have been created', Response::HTTP_CREATED);
    
            } else {
                return new Response('Error : Email is already used', Response::HTTP_BAD_REQUEST);
            }
    }
}
