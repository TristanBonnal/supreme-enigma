<?php

namespace App\Controller;

use App\Form\ContactType;
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

    // The contact form is disabled: it is only displayed, submissions are rejected (GET only)
    #[Route('/contact', name: 'app_contact', methods: [Request::METHOD_GET])]
    public function contact(): Response
    {
        $form = $this->createForm(ContactType::class, null, ['disabled' => true]);

        return $this->render('main/contact.html.twig', [
            'title' => 'Contact',
            'contact_form' => $form->createView()
        ]);
    }
}
