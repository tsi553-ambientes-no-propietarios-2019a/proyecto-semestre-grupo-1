<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190709225618 extends AbstractMigration
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
        $this->addSql('CREATE TABLE estado (id INT AUTO_INCREMENT NOT NULL, idestado INT NOT NULL, estado VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE queja (id INT AUTO_INCREMENT NOT NULL, est_id INT NOT NULL, estado_id INT NOT NULL, uni_id INT NOT NULL, tipo VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, fechahora DATETIME NOT NULL, INDEX IDX_B5CAB5E42AD48EBC (est_id), INDEX IDX_B5CAB5E49F5A440B (estado_id), INDEX IDX_B5CAB5E413015056 (uni_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usr (id INT AUTO_INCREMENT NOT NULL, ci INT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estacion (id INT AUTO_INCREMENT NOT NULL, usr_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, imagen LONGBLOB NOT NULL, INDEX IDX_32B2395FC69D3FB (usr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE unidad ADD CONSTRAINT FK_F3E6D02FC69D3FB FOREIGN KEY (usr_id) REFERENCES usr (id)');
        $this->addSql('ALTER TABLE queja ADD CONSTRAINT FK_B5CAB5E42AD48EBC FOREIGN KEY (est_id) REFERENCES estacion (id)');
        $this->addSql('ALTER TABLE queja ADD CONSTRAINT FK_B5CAB5E49F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id)');
        $this->addSql('ALTER TABLE queja ADD CONSTRAINT FK_B5CAB5E413015056 FOREIGN KEY (uni_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE estacion ADD CONSTRAINT FK_32B2395FC69D3FB FOREIGN KEY (usr_id) REFERENCES usr (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE queja DROP FOREIGN KEY FK_B5CAB5E413015056');
        $this->addSql('ALTER TABLE queja DROP FOREIGN KEY FK_B5CAB5E49F5A440B');
        $this->addSql('ALTER TABLE unidad DROP FOREIGN KEY FK_F3E6D02FC69D3FB');
        $this->addSql('ALTER TABLE estacion DROP FOREIGN KEY FK_32B2395FC69D3FB');
        $this->addSql('ALTER TABLE queja DROP FOREIGN KEY FK_B5CAB5E42AD48EBC');
        $this->addSql('DROP TABLE unidad');
        $this->addSql('DROP TABLE estado');
        $this->addSql('DROP TABLE queja');
        $this->addSql('DROP TABLE usr');
        $this->addSql('DROP TABLE estacion');
    }
}
