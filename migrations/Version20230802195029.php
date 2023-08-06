<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802195029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car ADD simple_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car ADD tree_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DC8FAF195 FOREIGN KEY (simple_id) REFERENCES simple_directory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D78B64A2 FOREIGN KEY (tree_id) REFERENCES tree_directory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DC8FAF195 ON car (simple_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69D78B64A2 ON car (tree_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE car DROP CONSTRAINT FK_773DE69DC8FAF195');
        $this->addSql('ALTER TABLE car DROP CONSTRAINT FK_773DE69D78B64A2');
        $this->addSql('DROP INDEX UNIQ_773DE69DC8FAF195');
        $this->addSql('DROP INDEX UNIQ_773DE69D78B64A2');
        $this->addSql('ALTER TABLE car DROP simple_id');
        $this->addSql('ALTER TABLE car DROP tree_id');
    }
}
