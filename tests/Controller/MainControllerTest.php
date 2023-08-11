<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testHome(): void
    {

        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleSame('Tristan Bonnal - Accueil');
        $this->assertSelectorTextContains('h1.title', 'Bienvenue');
    }

    public function testProfile(): void
    {

        $client = static::createClient();

        $crawler = $client->request('GET', '/profile');

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleSame('Tristan Bonnal - Profil');
        $this->assertSelectorTextContains('h1.title', 'Parcours');
    }

    public function testContact(): void
    {

        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleSame('Tristan Bonnal - Contact');
        $this->assertSelectorTextContains('h1.title', 'Me contacter');
    }
}