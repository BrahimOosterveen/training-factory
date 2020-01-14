<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200114113832 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE registreren DROP FOREIGN KEY FK_2A8D9C6B9D86650F');
        $this->addSql('ALTER TABLE registreren DROP FOREIGN KEY FK_2A8D9C6BA4625618');
        $this->addSql('ALTER TABLE registreren CHANGE user_id user_id INT DEFAULT NULL, CHANGE lessen_id lessen_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX idx_2a8d9c6b9d86650f ON registreren');
        $this->addSql('CREATE INDEX IDX_2A8D9C6BA76ED395 ON registreren (user_id)');
        $this->addSql('DROP INDEX fk_2a8d9c6ba4625618 ON registreren');
        $this->addSql('CREATE INDEX IDX_2A8D9C6B87481937 ON registreren (lessen_id)');
        $this->addSql('ALTER TABLE registreren ADD CONSTRAINT FK_2A8D9C6B9D86650F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registreren ADD CONSTRAINT FK_2A8D9C6BA4625618 FOREIGN KEY (lessen_id) REFERENCES lessen (id)');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE loginnaam loginnaam VARCHAR(255) DEFAULT NULL, CHANGE tussenvoegsel tussenvoegsel VARCHAR(255) DEFAULT NULL, CHANGE aanneemdatum aanneemdatum DATE DEFAULT NULL, CHANGE salaris salaris NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE registreren DROP FOREIGN KEY FK_2A8D9C6BA76ED395');
        $this->addSql('ALTER TABLE registreren DROP FOREIGN KEY FK_2A8D9C6B87481937');
        $this->addSql('ALTER TABLE registreren CHANGE user_id user_id INT DEFAULT NULL, CHANGE lessen_id lessen_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX idx_2a8d9c6ba76ed395 ON registreren');
        $this->addSql('CREATE INDEX IDX_2A8D9C6B9D86650F ON registreren (user_id)');
        $this->addSql('DROP INDEX idx_2a8d9c6b87481937 ON registreren');
        $this->addSql('CREATE INDEX FK_2A8D9C6BA4625618 ON registreren (lessen_id)');
        $this->addSql('ALTER TABLE registreren ADD CONSTRAINT FK_2A8D9C6BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registreren ADD CONSTRAINT FK_2A8D9C6B87481937 FOREIGN KEY (lessen_id) REFERENCES lessen (id)');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE loginnaam loginnaam VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tussenvoegsel tussenvoegsel VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE aanneemdatum aanneemdatum DATE DEFAULT \'NULL\', CHANGE salaris salaris NUMERIC(10, 2) DEFAULT \'NULL\'');
    }
}
