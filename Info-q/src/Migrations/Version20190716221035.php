<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716221035 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE usr (id INT AUTO_INCREMENT NOT NULL, ci_usr INT NOT NULL, name_usr VARCHAR(255) NOT NULL, email_usr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE complain ADD ci_usr_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE complain ADD CONSTRAINT FK_2DD0CD6B2475F959 FOREIGN KEY (ci_usr_id) REFERENCES usr (id)');
        $this->addSql('CREATE INDEX IDX_2DD0CD6B2475F959 ON complain (ci_usr_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE complain DROP FOREIGN KEY FK_2DD0CD6B2475F959');
        $this->addSql('DROP TABLE usr');
        $this->addSql('DROP INDEX IDX_2DD0CD6B2475F959 ON complain');
        $this->addSql('ALTER TABLE complain DROP ci_usr_id');
    }
}
