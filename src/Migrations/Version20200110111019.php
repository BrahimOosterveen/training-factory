<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200110111019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lessen CHANGE locatie locatie VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE loginnaam loginnaam VARCHAR(255) DEFAULT NULL, CHANGE tussenvoegsel tussenvoegsel VARCHAR(255) DEFAULT NULL, CHANGE aanneemdatum aanneemdatum DATE DEFAULT NULL, CHANGE salaris salaris NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lessen CHANGE locatie locatie VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE loginnaam loginnaam VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tussenvoegsel tussenvoegsel VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE aanneemdatum aanneemdatum DATE DEFAULT \'NULL\', CHANGE salaris salaris NUMERIC(10, 2) DEFAULT \'NULL\'');
    }
}