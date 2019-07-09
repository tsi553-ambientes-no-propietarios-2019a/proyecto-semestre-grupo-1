<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190709132242 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE queja ADD estado_id INT NOT NULL');
        $this->addSql('ALTER TABLE queja ADD CONSTRAINT FK_B5CAB5E49F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id)');
        $this->addSql('CREATE INDEX IDX_B5CAB5E49F5A440B ON queja (estado_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE queja DROP FOREIGN KEY FK_B5CAB5E49F5A440B');
        $this->addSql('DROP INDEX IDX_B5CAB5E49F5A440B ON queja');
        $this->addSql('ALTER TABLE queja DROP estado_id');
    }
}
