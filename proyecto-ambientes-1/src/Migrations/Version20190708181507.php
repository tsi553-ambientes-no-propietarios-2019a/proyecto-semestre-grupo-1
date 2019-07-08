<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190708181507 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE unidad ADD usr_id INT NOT NULL');
        $this->addSql('ALTER TABLE unidad ADD CONSTRAINT FK_F3E6D02FC69D3FB FOREIGN KEY (usr_id) REFERENCES usr (id)');
        $this->addSql('CREATE INDEX IDX_F3E6D02FC69D3FB ON unidad (usr_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE unidad DROP FOREIGN KEY FK_F3E6D02FC69D3FB');
        $this->addSql('DROP INDEX IDX_F3E6D02FC69D3FB ON unidad');
        $this->addSql('ALTER TABLE unidad DROP usr_id');
    }
}
