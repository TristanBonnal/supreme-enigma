<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261027120000 extends AbstractMigration
{
    private const CONVERTED_IMAGES = ['portfolio', 'symfo-ecommerce', 'mypiggybank', 'foodtruck', 'blog'];

    public function getDescription(): string
    {
        return 'Switch project images from png to webp';
    }

    public function up(Schema $schema): void
    {
        foreach (self::CONVERTED_IMAGES as $imageName) {
            $this->addSql('UPDATE project SET image = ? WHERE image = ?', [$imageName . '.webp', $imageName . '.png']);
        }
    }

    public function down(Schema $schema): void
    {
        foreach (self::CONVERTED_IMAGES as $imageName) {
            $this->addSql('UPDATE project SET image = ? WHERE image = ?', [$imageName . '.png', $imageName . '.webp']);
        }
    }
}
