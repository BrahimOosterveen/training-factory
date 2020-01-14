<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200113110444 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lessen (id INT AUTO_INCREMENT NOT NULL, training_id INT NOT NULL, tijd TIME NOT NULL, datum DATE NOT NULL, locatie VARCHAR(255) NOT NULL, max_personen INT NOT NULL, lokaal INT NOT NULL, INDEX IDX_29B9C79BEFD98D1 (training_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registreren (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, lessen_id_id INT DEFAULT NULL, betaling NUMERIC(10, 2) NOT NULL, INDEX IDX_2A8D9C6B9D86650F (user_id_id), INDEX IDX_2A8D9C6BA4625618 (lessen_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, beschrijving VARCHAR(255) NOT NULL, tijd VARCHAR(255) NOT NULL, kosten NUMERIC(10, 2) DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, loginnaam VARCHAR(255) DEFAULT NULL, naam VARCHAR(255) NOT NULL, tussenvoegsel VARCHAR(255) DEFAULT NULL, achternaam VARCHAR(255) NOT NULL, geboortedatum DATE NOT NULL, gender VARCHAR(255) NOT NULL, aanneemdatum DATE DEFAULT NULL, salaris NUMERIC(10, 2) DEFAULT NULL, straat VARCHAR(255) NOT NULL, postcode VARCHAR(255) NOT NULL, plaats VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lessen ADD CONSTRAINT FK_29B9C79BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
        $this->addSql('ALTER TABLE registreren ADD CONSTRAINT FK_2A8D9C6B9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registreren ADD CONSTRAINT FK_2A8D9C6BA4625618 FOREIGN KEY (lessen_id_id) REFERENCES lessen (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE registreren DROP FOREIGN KEY FK_2A8D9C6BA4625618');
        $this->addSql('ALTER TABLE lessen DROP FOREIGN KEY FK_29B9C79BEFD98D1');
        $this->addSql('ALTER TABLE registreren DROP FOREIGN KEY FK_2A8D9C6B9D86650F');
        $this->addSql('DROP TABLE lessen');
        $this->addSql('DROP TABLE registreren');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE user');
    }
}
