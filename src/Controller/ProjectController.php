<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Get projects in db and render them
class ProjectController extends AbstractController
{
    #[Route('/projects', name: 'app_projects')]
    public function index(ProjectRepository $projectRepository): Response
    {
//        $projects = $projectRepo->findAll();
        $projects = $projectRepository->findAllCached();

        return $this->render('project/index.html.twig', [
            'title' => 'Réalisations',
            'projects' => $projects
        ]);
    }
}
