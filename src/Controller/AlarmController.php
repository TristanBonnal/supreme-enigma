<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

        return $this->render('alarm/index.html.twig', [
            'title' => 'Alarme',
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

        // Exécute la command sur le serveur qui lit le fichier audio avec mpv
        exec('mpv --audio-device=pulse /home/tristan-bonnal/siren.mp3', $output, $return_var);
        return new JsonResponse([
            'status' => 'ok',
            'message' => 'Alarm is ringing',
            'debug' => implode("\n", $output),
        ]);
    }
}
