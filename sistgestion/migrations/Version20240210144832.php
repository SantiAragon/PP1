<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240210144832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE perfil_definido (id INT AUTO_INCREMENT NOT NULL, codigo INT NOT NULL, linea VARCHAR(50) NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64982D1B1B0');
        $this->addSql('DROP INDEX IDX_8D93D64982D1B1B0 ON user');
        $this->addSql('ALTER TABLE user DROP usuario_perfiles_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE perfil_definido');
        $this->addSql('ALTER TABLE user ADD usuario_perfiles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64982D1B1B0 FOREIGN KEY (usuario_perfiles_id) REFERENCES user_perfil (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D64982D1B1B0 ON user (usuario_perfiles_id)');
    }
}
