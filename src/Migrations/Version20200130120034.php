<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200130120034 extends AbstractMigration
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
        $this->addSql('ALTER TABLE lessen ADD instructeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lessen ADD CONSTRAINT FK_29B9C7925FCA809 FOREIGN KEY (instructeur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_29B9C7925FCA809 ON lessen (instructeur_id)');
        $this->addSql('ALTER TABLE registreren CHANGE user_id user_id INT DEFAULT NULL, CHANGE lessen_id lessen_id INT DEFAULT NULL, CHANGE betaling betaling TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lessen DROP FOREIGN KEY FK_29B9C7925FCA809');
        $this->addSql('DROP INDEX IDX_29B9C7925FCA809 ON lessen');
        $this->addSql('ALTER TABLE lessen DROP instructeur_id');
        $this->addSql('ALTER TABLE registreren CHANGE user_id user_id INT DEFAULT NULL, CHANGE lessen_id lessen_id INT DEFAULT NULL, CHANGE betaling betaling NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE loginnaam loginnaam VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tussenvoegsel tussenvoegsel VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE aanneemdatum aanneemdatum DATE DEFAULT \'NULL\', CHANGE salaris salaris NUMERIC(10, 2) DEFAULT \'NULL\'');
    }
}
