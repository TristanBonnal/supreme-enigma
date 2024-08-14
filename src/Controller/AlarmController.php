<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlarmController extends AbstractController
{
    #[Route('/alarm', name: 'app_alarm')]
    public function index(Request $request): Response
    {
        $password = $request->query->get('password');
        if ($password !== $_ENV['ALARM_PASSWORD']) {
            return new Response('Accès interdit', Response::HTTP_FORBIDDEN);
        }

        $sounds = [];
        $finder = new Finder();
        $finder->files()->in($this->getParameter('kernel.project_dir') . '/assets/sounds');
        foreach ($finder as $file) {
            $sounds[] = [
                'text' => strtoupper($file->getBasename('.' . $file->getExtension())),
                'path' => $file->getFilename(),
            ];
        }

        return $this->render('alarm/index.html.twig', [
            'title' => 'Alarme',
            'sounds' => $sounds,
        ]);
    }

    #[Route('/alarm-trigger', name: 'app_alarm_trigger')]
    public function alarm(Request $request): Response
    {
        $password = $request->query->get('password');

        if ($password !== $_ENV['ALARM_PASSWORD']) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'Accès interdit',
            ], Response::HTTP_FORBIDDEN);
        }

        $file = $request->query->get('file');
        if (empty($file)) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'Fichier non trouvé',
            ], Response::HTTP_BAD_REQUEST);
        }

        $path = $this->getParameter('kernel.project_dir') . '/assets/sounds/' . $file;

        $usePulse = $_ENV['APP_ENV'] === 'prod' ? '--audio-device=pulse ' : '';

        exec('mpv ' . $usePulse . $path, $output);

        return new JsonResponse([
            'status' => 'ok',
            'message' => 'Alarm is ringing',
            'debug' => implode("\n", $output),
        ]);
    }
}
