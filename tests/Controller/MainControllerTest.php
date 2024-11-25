<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

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
}