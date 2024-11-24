<?php
namespace App\Service;

use Mailjet\Client;
use Mailjet\Resources;
use Psr\Log\LoggerInterface;

class Mailer
{
    private string $api_key;
    private string $api_key_secret;

    // récupére les infos de l'api mailjet dans le fichier .env
    public function __construct
    (
        private readonly LoggerInterface $logger
    )
    {
        $this->api_key = $_ENV['MAILJET_API_KEY'];
        $this->api_key_secret = $_ENV['MAILJET_API_SECRET'];
    }

    public function send($toEmail, $toName, $subject, $content)
    {
        $client = new Client($this->api_key, $this->api_key_secret,true,['version' => 'v3.1']);
        $body =
            [
                'Messages' =>
                    [
                        [
                            'From' =>
                                [
                                    'Email' => "bonnal.tristan@hotmail.fr",
                                    'Name' => "tristan-bonnal.fr"
                                ],
                            'To' =>
                                [
                                    [
                                        'Email' => $toEmail,
                                        'Name' => $toName
                                    ]
                                ],
                            'TemplateID' => 3732103,
                            'TemplateLanguage' => true,
                            'Subject' => $subject,
                            'Variables' => ['content' => $content]
                        ]
                    ]
            ];
        $response = $client->post(Resources::$Email, ['body' => $body]);

        if (!$response->success()) {
            $this->logger->error('Erreur lors de l\'envoi du mail.', ['response' => $response->getData()]);
            throw new \Exception('Erreur lors de l\'envoi du mail.');
        }
    }
}