<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240114100241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mail_contact (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT NOT NULL, date_envoi DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_96DF675710335F61 (expediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_contact_contact (mail_contact_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_94F6F3BB3362CFB6 (mail_contact_id), INDEX IDX_94F6F3BBE7A1254A (contact_id), PRIMARY KEY(mail_contact_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_edu (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT NOT NULL, date_envoie DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_8CB8D4A310335F61 (expediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_edu_educateur (mail_edu_id INT NOT NULL, educateur_id INT NOT NULL, INDEX IDX_7A814C4C9D911D20 (mail_edu_id), INDEX IDX_7A814C4C6BFC1A0E (educateur_id), PRIMARY KEY(mail_edu_id, educateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mail_contact ADD CONSTRAINT FK_96DF675710335F61 FOREIGN KEY (expediteur_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE mail_contact_contact ADD CONSTRAINT FK_94F6F3BB3362CFB6 FOREIGN KEY (mail_contact_id) REFERENCES mail_contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_contact_contact ADD CONSTRAINT FK_94F6F3BBE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_edu ADD CONSTRAINT FK_8CB8D4A310335F61 FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('ALTER TABLE mail_edu_educateur ADD CONSTRAINT FK_7A814C4C9D911D20 FOREIGN KEY (mail_edu_id) REFERENCES mail_edu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_edu_educateur ADD CONSTRAINT FK_7A814C4C6BFC1A0E FOREIGN KEY (educateur_id) REFERENCES educateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE licencie RENAME INDEX fk_3b755612bcf5e72d TO IDX_3B755612BCF5E72D');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mail_contact DROP FOREIGN KEY FK_96DF675710335F61');
        $this->addSql('ALTER TABLE mail_contact_contact DROP FOREIGN KEY FK_94F6F3BB3362CFB6');
        $this->addSql('ALTER TABLE mail_contact_contact DROP FOREIGN KEY FK_94F6F3BBE7A1254A');
        $this->addSql('ALTER TABLE mail_edu DROP FOREIGN KEY FK_8CB8D4A310335F61');
        $this->addSql('ALTER TABLE mail_edu_educateur DROP FOREIGN KEY FK_7A814C4C9D911D20');
        $this->addSql('ALTER TABLE mail_edu_educateur DROP FOREIGN KEY FK_7A814C4C6BFC1A0E');
        $this->addSql('DROP TABLE mail_contact');
        $this->addSql('DROP TABLE mail_contact_contact');
        $this->addSql('DROP TABLE mail_edu');
        $this->addSql('DROP TABLE mail_edu_educateur');
        $this->addSql('ALTER TABLE licencie RENAME INDEX idx_3b755612bcf5e72d TO FK_3B755612BCF5E72D');
    }
}
