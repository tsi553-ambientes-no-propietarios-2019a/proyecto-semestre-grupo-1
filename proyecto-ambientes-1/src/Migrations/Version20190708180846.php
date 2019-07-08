<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190708180846 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE unidad (id INT AUTO_INCREMENT NOT NULL, numero_u VARCHAR(255) NOT NULL, tipo VARCHAR(255) NOT NULL, ruta VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE estacion ADD usr_id INT NOT NULL');
        $this->addSql('ALTER TABLE estacion ADD CONSTRAINT FK_32B2395FC69D3FB FOREIGN KEY (usr_id) REFERENCES usr (id)');
        $this->addSql('CREATE INDEX IDX_32B2395FC69D3FB ON estacion (usr_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE unidad');
        $this->addSql('ALTER TABLE estacion DROP FOREIGN KEY FK_32B2395FC69D3FB');
        $this->addSql('DROP INDEX IDX_32B2395FC69D3FB ON estacion');
        $this->addSql('ALTER TABLE estacion DROP usr_id');
    }
}
