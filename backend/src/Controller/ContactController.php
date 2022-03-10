<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Contact;
use App\Classe\Mail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/api/nous-contacter", name="contact")
     */
    public function index(SerializerInterface $serializer, Request $request): Response
    {

        $data = $request->getContent();
        $contact = $serializer->deserialize($data, Contact::class, 'json');

        $nom = $contact->getLastname();
        $prenom = $contact->getFirstname();
        $email = $contact->getEmail();
        $message = $contact->getMessage();

        $mail = new Mail();
        $content = "Vous avez reçu un message de la part de ".$prenom." ".$nom." <br/> Son adresse email : ".$email." : <br/><br/>".$message."";
        $mail->send('contact@prochainweb.com', 'La Boutique Française', 'Vous avez reçu un nouveau message de La Boutique Française', $content );
        
        
        $this->entityManager->persist($contact);
        $this->entityManager->flush();
        
        return new Response('', Response::HTTP_CREATED);

    }
}
