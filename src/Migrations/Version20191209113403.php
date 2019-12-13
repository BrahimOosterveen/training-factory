<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191209113403 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lessen (id INT AUTO_INCREMENT NOT NULL, tijd TIME NOT NULL, datum DATE NOT NULL, locatie VARCHAR(255) NOT NULL, max_personen INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registreren (id INT AUTO_INCREMENT NOT NULL, betaling NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, beschrijving VARCHAR(255) NOT NULL, tijd VARCHAR(255) NOT NULL, kosten NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE persoon DROP geboortedatum, DROP gender, DROP email, DROP dienst_datum, DROP salaris, DROP straat, DROP postcode, DROP plaats');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE lessen');
        $this->addSql('DROP TABLE registreren');
        $this->addSql('DROP TABLE training');
        $this->addSql('ALTER TABLE persoon ADD geboortedatum DATE NOT NULL, ADD gender TINYINT(1) NOT NULL, ADD email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD dienst_datum DATE NOT NULL, ADD salaris NUMERIC(10, 2) NOT NULL, ADD straat VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD postcode VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD plaats VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
