<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testHome(): void
    {

        $kernelBrowser = static::createClient();

        $kernelBrowser->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleSame('Tristan Bonnal - Accueil');
        $this->assertSelectorTextContains('h1.title', 'Bienvenue');
    }

    public function testProfile(): void
    {

        $kernelBrowser = static::createClient();

        $kernelBrowser->request('GET', '/profile');

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleSame('Tristan Bonnal - Profil');
        $this->assertSelectorTextContains('h1.title', 'Parcours');
    }

    public function testContact(): void
    {

        $kernelBrowser = static::createClient();

        $kernelBrowser->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleSame('Tristan Bonnal - Contact');
        $this->assertSelectorTextContains('h1.title', 'Me contacter');
    }
}