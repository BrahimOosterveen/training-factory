<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191210101205 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE persoon ADD geboortedatum DATE NOT NULL, ADD gender VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD aanneemdatum DATE NOT NULL, ADD salaris NUMERIC(10, 2) NOT NULL, ADD straat VARCHAR(255) NOT NULL, ADD postcode VARCHAR(255) NOT NULL, ADD plaats VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE persoon DROP geboortedatum, DROP gender, DROP email, DROP aanneemdatum, DROP salaris, DROP straat, DROP postcode, DROP plaats');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT \'NULL\'');
    }
}
