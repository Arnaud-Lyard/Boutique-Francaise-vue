<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Classe\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/nous-contacter", name="contact")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->addFlash('notice', 'Merci de nous avoir contacté. Notre équipe va vous répondre dans les meilleurs délais.');

            $prenom = $form->get('prenom')->getData();
            $nom = $form->get('nom')->getData();
            $email = $form->get('email')->getData();
            $text = $form->get('content')->getData();

            $mail = new Mail();
            $content = "Vous avez reçu un message de la part de ".$prenom." ".$nom." <br/> Son adresse email : ".$email." : <br/><br/>".$text."";
            $mail->send('contact@prochainweb.com', 'La Boutique Française', 'Vous avez reçu un nouveau message de La Boutique Française', $content );
        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
