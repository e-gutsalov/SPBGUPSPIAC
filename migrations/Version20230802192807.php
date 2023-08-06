<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802192807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE car_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE simple_directory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tree_directory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE car (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, horses INT DEFAULT NULL, l_vt DOUBLE PRECISION DEFAULT NULL, date_production DATE DEFAULT NULL, date_time_production TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, image BYTEA DEFAULT NULL, documentation BYTEA DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE simple_directory (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tree_directory (id INT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_81CC2085727ACA70 ON tree_directory (parent_id)');
        $this->addSql('ALTER TABLE tree_directory ADD CONSTRAINT FK_81CC2085727ACA70 FOREIGN KEY (parent_id) REFERENCES tree_directory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE car_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE simple_directory_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tree_directory_id_seq CASCADE');
        $this->addSql('ALTER TABLE tree_directory DROP CONSTRAINT FK_81CC2085727ACA70');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE simple_directory');
        $this->addSql('DROP TABLE tree_directory');
    }
}
