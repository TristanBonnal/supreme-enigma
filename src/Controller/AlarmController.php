<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlarmController extends AbstractController
{
    #[Route('/alarm', name: 'app_alarm')]
    public function index(): Response
    {
        return $this->render('alarm/index.html.twig', [
            'title' => 'Alarm',
        ]);
    }

    #[Route('/alarm-trigger', name: 'app_alarm_trigger')]
    public function alarm(): Response
    {
        // Exécute la command sur le serveur qui lit le fichier audio avec mpv
        exec('mpv --audio-device=pulse /home/tristan-bonnal/siren.mp3', $output, $return_var);
        return new JsonResponse([
            'status' => 'ok',
            'message' => 'Alarm is ringing',
            'debug' => implode("\n", $output),
        ]);
    }
}
