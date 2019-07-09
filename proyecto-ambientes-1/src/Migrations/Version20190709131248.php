<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190709131248 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE queja ADD est_id INT NOT NULL');
        $this->addSql('ALTER TABLE queja ADD CONSTRAINT FK_B5CAB5E42AD48EBC FOREIGN KEY (est_id) REFERENCES estacion (id)');
        $this->addSql('CREATE INDEX IDX_B5CAB5E42AD48EBC ON queja (est_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE queja DROP FOREIGN KEY FK_B5CAB5E42AD48EBC');
        $this->addSql('DROP INDEX IDX_B5CAB5E42AD48EBC ON queja');
        $this->addSql('ALTER TABLE queja DROP est_id');
    }
}
