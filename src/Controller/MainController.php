<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\Mail;
use App\Service\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// This controller handle all static pages, the title variable allow the loading of dynamic css class in the nav links('active')
class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'title' => 'Accueil'
        ]);
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        return $this->render('main/profile.html.twig', [
            'title' => 'Profil'
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $datas = $form->getData();
                $content = "De la part de : {$datas['firstname']} {$datas['lastname']} <br> Message : {$datas['content']} <br> Email: {$datas['email']}";
                $mail = new Mailer();
                $mail->send('bonnal.tristan91@gmail.com', 'Tristan', 'Message depuis supreme-enigma', $content);

                $this->addFlash('success', 'Message envoyé.');
            } catch (\Exception $e) {
                $this->addFlash('error', $e->getMessage());
            }
        }

        return $this->render('main/contact.html.twig', [
            'title' => 'Contact',
            'contact_form' => $form->createView()
        ]);
    }
}
