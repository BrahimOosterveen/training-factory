<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200110113919 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE loginnaam loginnaam VARCHAR(255) DEFAULT NULL, CHANGE tussenvoegsel tussenvoegsel VARCHAR(255) DEFAULT NULL, CHANGE aanneemdatum aanneemdatum DATE DEFAULT NULL, CHANGE salaris salaris NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE registreren ADD user_id INT DEFAULT NULL, ADD lessen_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE registreren ADD CONSTRAINT FK_2A8D9C6B9D86650F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registreren ADD CONSTRAINT FK_2A8D9C6BA4625618 FOREIGN KEY (lessen_id) REFERENCES lessen (id)');
        $this->addSql('CREATE INDEX IDX_2A8D9C6B9D86650F ON registreren (user_id)');
        $this->addSql('CREATE INDEX IDX_2A8D9C6BA4625618 ON registreren (lessen_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE registreren DROP FOREIGN KEY FK_2A8D9C6B9D86650F');
        $this->addSql('ALTER TABLE registreren DROP FOREIGN KEY FK_2A8D9C6BA4625618');
        $this->addSql('DROP INDEX IDX_2A8D9C6B9D86650F ON registreren');
        $this->addSql('DROP INDEX IDX_2A8D9C6BA4625618 ON registreren');
        $this->addSql('ALTER TABLE registreren DROP user_id, DROP lessen_id');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE loginnaam loginnaam VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tussenvoegsel tussenvoegsel VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE aanneemdatum aanneemdatum DATE DEFAULT \'NULL\', CHANGE salaris salaris NUMERIC(10, 2) DEFAULT \'NULL\'');
    }
}
