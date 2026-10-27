<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainControllerTest extends WebTestCase
{
    public function testHome(): void
    {

        $kernelBrowser = static::createClient();

        $kernelBrowser->request(Request::METHOD_GET, '/');

        self::assertResponseIsSuccessful();
        self::assertPageTitleSame('Tristan Bonnal - Accueil');
        self::assertSelectorTextContains('h1.title', 'Bienvenue');
    }

    public function testProfile(): void
    {

        $kernelBrowser = static::createClient();

        $kernelBrowser->request(Request::METHOD_GET, '/profile');

        self::assertResponseIsSuccessful();
        self::assertPageTitleSame('Tristan Bonnal - Profil');
        self::assertSelectorTextContains('h1.title', 'Parcours');
    }

    public function testContact(): void
    {

        $kernelBrowser = static::createClient();

        $kernelBrowser->request(Request::METHOD_GET, '/contact');

        self::assertResponseIsSuccessful();
        self::assertPageTitleSame('Tristan Bonnal - Contact');
        self::assertSelectorTextContains('h1.title', 'Me contacter');
    }

    public function testContactFormIsDisabled(): void
    {

        $kernelBrowser = static::createClient();

        $crawler = $kernelBrowser->request(Request::METHOD_GET, '/contact');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('.contact-form', 'Le formulaire de contact est désactivé');
        self::assertSelectorExists('form[name="contact"] textarea[disabled]');
        self::assertSelectorExists('form[name="contact"] button[disabled]');
        self::assertCount(0, $crawler->filter(
            'form[name="contact"] input:not([type="hidden"]):not([disabled]), '
            . 'form[name="contact"] textarea:not([disabled]), '
            . 'form[name="contact"] button:not([disabled])'
        ));
    }

    public function testContactFormSubmissionIsRejected(): void
    {

        $kernelBrowser = static::createClient();

        $kernelBrowser->request(Request::METHOD_POST, '/contact', [
            'contact' => [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'email' => 'john@doe.fr',
                'content' => 'Hello',
            ],
        ]);

        self::assertResponseStatusCodeSame(Response::HTTP_METHOD_NOT_ALLOWED);
    }

    public function testFaviconIsLinkedAndServed(): void
    {

        $kernelBrowser = static::createClient();

        $crawler = $kernelBrowser->request(Request::METHOD_GET, '/');

        foreach ($crawler->filter('link[rel="icon"], link[rel="apple-touch-icon"]') as $link) {
            $href = $link->getAttribute('href');
            self::assertStringStartsWith('/favicon.', $href);
            self::assertFileExists(dirname(__DIR__, 2).'/public'.$href);
        }
        self::assertSelectorExists('link[rel="icon"][href="/favicon.ico"]');
        self::assertSelectorExists('link[rel="icon"][href="/favicon.png"]');
    }
}
