<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716220428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE complain ADD id_admin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE complain ADD CONSTRAINT FK_2DD0CD6B34F06E85 FOREIGN KEY (id_admin_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_2DD0CD6B34F06E85 ON complain (id_admin_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE complain DROP FOREIGN KEY FK_2DD0CD6B34F06E85');
        $this->addSql('DROP INDEX IDX_2DD0CD6B34F06E85 ON complain');
        $this->addSql('ALTER TABLE complain DROP id_admin_id');
    }
}
