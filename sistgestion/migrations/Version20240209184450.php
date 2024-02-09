<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209184450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_perfil ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_perfil ADD CONSTRAINT FK_F3376D7ADB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F3376D7ADB38439E ON user_perfil (usuario_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_perfil DROP FOREIGN KEY FK_F3376D7ADB38439E');
        $this->addSql('DROP INDEX IDX_F3376D7ADB38439E ON user_perfil');
        $this->addSql('ALTER TABLE user_perfil DROP usuario_id');
    }
}
