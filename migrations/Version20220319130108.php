<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220319130108 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE impress (id INT AUTO_INCREMENT NOT NULL, language VARCHAR(2) NOT NULL, content LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8CCE416CD4DB71B5 ON impress (language)');
        $this->addSql('INSERT INTO impress (language, content) VALUES ("de", "Deutsch"), ("en", "English")');
    }
}
