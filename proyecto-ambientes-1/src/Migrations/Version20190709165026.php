<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190709165026 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE unidad (id INT AUTO_INCREMENT NOT NULL, usr_id INT NOT NULL, numero_u VARCHAR(255) NOT NULL, tipo VARCHAR(255) NOT NULL, ruta VARCHAR(255) NOT NULL, INDEX IDX_F3E6D02FC69D3FB (usr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE unidad ADD CONSTRAINT FK_F3E6D02FC69D3FB FOREIGN KEY (usr_id) REFERENCES usr (id)');
        $this->addSql('ALTER TABLE queja ADD est_id INT NOT NULL, ADD estado_id INT NOT NULL, ADD uni_id INT NOT NULL');
        $this->addSql('ALTER TABLE queja ADD CONSTRAINT FK_B5CAB5E42AD48EBC FOREIGN KEY (est_id) REFERENCES estacion (id)');
        $this->addSql('ALTER TABLE queja ADD CONSTRAINT FK_B5CAB5E49F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id)');
        $this->addSql('ALTER TABLE queja ADD CONSTRAINT FK_B5CAB5E413015056 FOREIGN KEY (uni_id) REFERENCES unidad (id)');
        $this->addSql('CREATE INDEX IDX_B5CAB5E42AD48EBC ON queja (est_id)');
        $this->addSql('CREATE INDEX IDX_B5CAB5E49F5A440B ON queja (estado_id)');
        $this->addSql('CREATE INDEX IDX_B5CAB5E413015056 ON queja (uni_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE queja DROP FOREIGN KEY FK_B5CAB5E413015056');
        $this->addSql('DROP TABLE unidad');
        $this->addSql('ALTER TABLE queja DROP FOREIGN KEY FK_B5CAB5E42AD48EBC');
        $this->addSql('ALTER TABLE queja DROP FOREIGN KEY FK_B5CAB5E49F5A440B');
        $this->addSql('DROP INDEX IDX_B5CAB5E42AD48EBC ON queja');
        $this->addSql('DROP INDEX IDX_B5CAB5E49F5A440B ON queja');
        $this->addSql('DROP INDEX IDX_B5CAB5E413015056 ON queja');
        $this->addSql('ALTER TABLE queja DROP est_id, DROP estado_id, DROP uni_id');
    }
}
