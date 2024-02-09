<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208160103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_perfil (id INT AUTO_INCREMENT NOT NULL, perfil_id INT NOT NULL, INDEX IDX_F3376D7A57291544 (perfil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_perfil ADD CONSTRAINT FK_F3376D7A57291544 FOREIGN KEY (perfil_id) REFERENCES perfil (id)');
        $this->addSql('ALTER TABLE user ADD usuario_perfiles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64982D1B1B0 FOREIGN KEY (usuario_perfiles_id) REFERENCES user_perfil (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64982D1B1B0 ON user (usuario_perfiles_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64982D1B1B0');
        $this->addSql('ALTER TABLE user_perfil DROP FOREIGN KEY FK_F3376D7A57291544');
        $this->addSql('DROP TABLE user_perfil');
        $this->addSql('DROP INDEX IDX_8D93D64982D1B1B0 ON user');
        $this->addSql('ALTER TABLE user DROP usuario_perfiles_id');
    }
}
