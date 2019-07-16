<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716221542 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, id_sta INT NOT NULL, name_sta VARCHAR(255) NOT NULL, address_sta VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE unit ADD id_sta_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C53C8BA16A FOREIGN KEY (id_sta_id) REFERENCES station (id)');
        $this->addSql('CREATE INDEX IDX_DCBB0C53C8BA16A ON unit (id_sta_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C53C8BA16A');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP INDEX IDX_DCBB0C53C8BA16A ON unit');
        $this->addSql('ALTER TABLE unit DROP id_sta_id');
    }
}
