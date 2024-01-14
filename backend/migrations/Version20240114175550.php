<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240114175550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mail_contact DROP FOREIGN KEY FK_96DF675710335F61');
        $this->addSql('ALTER TABLE mail_contact ADD CONSTRAINT FK_96DF675710335F61 FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mail_contact DROP FOREIGN KEY FK_96DF675710335F61');
        $this->addSql('ALTER TABLE mail_contact ADD CONSTRAINT FK_96DF675710335F61 FOREIGN KEY (expediteur_id) REFERENCES contact (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
