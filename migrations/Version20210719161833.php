<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210719161833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course_category (id INT AUTO_INCREMENT NOT NULL, user_owner_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, src VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_AFF874979EB185F9 (user_owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_list (id INT AUTO_INCREMENT NOT NULL, category_reference_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, src VARCHAR(255) DEFAULT NULL, INDEX IDX_8C6A251ECC92FD3B (category_reference_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE list_content (id INT AUTO_INCREMENT NOT NULL, list_reference_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, src VARCHAR(255) DEFAULT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_228AEDA46CA03BB2 (list_reference_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_category ADD CONSTRAINT FK_AFF874979EB185F9 FOREIGN KEY (user_owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE course_list ADD CONSTRAINT FK_8C6A251ECC92FD3B FOREIGN KEY (category_reference_id) REFERENCES course_category (id)');
        $this->addSql('ALTER TABLE list_content ADD CONSTRAINT FK_228AEDA46CA03BB2 FOREIGN KEY (list_reference_id) REFERENCES course_list (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_list DROP FOREIGN KEY FK_8C6A251ECC92FD3B');
        $this->addSql('ALTER TABLE list_content DROP FOREIGN KEY FK_228AEDA46CA03BB2');
        $this->addSql('ALTER TABLE course_category DROP FOREIGN KEY FK_AFF874979EB185F9');
        $this->addSql('DROP TABLE course_category');
        $this->addSql('DROP TABLE course_list');
        $this->addSql('DROP TABLE list_content');
        $this->addSql('DROP TABLE user');
    }
}
