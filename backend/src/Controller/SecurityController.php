<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
Use App\Repository\UserRepository;





class SecurityController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/api/connexion", name="app_login", methods={"POST","HEAD"})
     */
    public function login(SerializerInterface $serializer, Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $encoder)
    {

        $data = $request->getContent();
        $user = $serializer->deserialize($data, User::class, 'json');


        $search_user_with_email = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());


        if (!$search_user_with_email || !$encoder->isPasswordValid($search_user_with_email, $user->getPassword())) {

            return new Response('Error : Email or password incorrect', Response::HTTP_UNAUTHORIZED);

        } else {

            //Récupéer le token à envoyer à VueJS
            return new Response('Success : You are connected', Response::HTTP_OK);

        }
    }
}
