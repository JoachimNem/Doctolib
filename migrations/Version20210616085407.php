<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616085407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv ADD praticien_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F862391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id)');
        $this->addSql('CREATE INDEX IDX_10C31F862391866B ON rdv (praticien_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F862391866B');
        $this->addSql('DROP INDEX IDX_10C31F862391866B ON rdv');
        $this->addSql('ALTER TABLE rdv DROP praticien_id');
    }
}
