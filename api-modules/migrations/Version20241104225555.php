<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241104225555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, code VARCHAR(100) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE address (id SERIAL NOT NULL, street VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(255) DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE chapter (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE course (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE degree_title (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, level VARCHAR(255) DEFAULT NULL, speciality VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE formation (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE skill (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, code VARCHAR(100) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE title (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_degree (id SERIAL NOT NULL, user_degree_id INT DEFAULT NULL, degree_title_id INT DEFAULT NULL, obtained_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C2F1765EB3BCDAB2 ON user_degree (user_degree_id)');
        $this->addSql('CREATE INDEX IDX_C2F1765E78052273 ON user_degree (degree_title_id)');
        $this->addSql('CREATE TABLE user_detail (id SERIAL NOT NULL, cv VARCHAR(255) DEFAULT NULL, bio TEXT DEFAULT NULL, github_link VARCHAR(255) DEFAULT NULL, personal_website VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE user_degree ADD CONSTRAINT FK_C2F1765EB3BCDAB2 FOREIGN KEY (user_degree_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_degree ADD CONSTRAINT FK_C2F1765E78052273 FOREIGN KEY (degree_title_id) REFERENCES degree_title (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE module ADD duration INT DEFAULT NULL');
        $this->addSql('ALTER TABLE module ADD link_repository INT DEFAULT NULL');
        $this->addSql('ALTER TABLE module ADD module_order SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_degree DROP CONSTRAINT FK_C2F1765EB3BCDAB2');
        $this->addSql('ALTER TABLE user_degree DROP CONSTRAINT FK_C2F1765E78052273');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE chapter');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE degree_title');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE title');
        $this->addSql('DROP TABLE user_degree');
        $this->addSql('DROP TABLE user_detail');
        $this->addSql('ALTER TABLE module DROP duration');
        $this->addSql('ALTER TABLE module DROP link_repository');
        $this->addSql('ALTER TABLE module DROP module_order');
    }
}
