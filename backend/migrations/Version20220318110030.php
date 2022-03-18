<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220318110030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_category_article DROP FOREIGN KEY FK_D2B6356B548AD6E2');
        $this->addSql('ALTER TABLE article_category_article DROP FOREIGN KEY FK_D2B6356B7294869C');
        $this->addSql('ALTER TABLE article_category_article ADD CONSTRAINT FK_D2B6356B548AD6E2 FOREIGN KEY (category_article_id) REFERENCES category_article (id)');
        $this->addSql('ALTER TABLE article_category_article ADD CONSTRAINT FK_D2B6356B7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE comment CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_details CHANGE my_order_id my_order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reset_password CHANGE user_id user_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address CHANGE user_id user_id INT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE company company VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE postal postal VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city city VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE country country VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE article CHANGE user_id user_id INT NOT NULL, CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE article_category_article DROP FOREIGN KEY FK_D2B6356B7294869C');
        $this->addSql('ALTER TABLE article_category_article DROP FOREIGN KEY FK_D2B6356B548AD6E2');
        $this->addSql('ALTER TABLE article_category_article ADD CONSTRAINT FK_D2B6356B7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_category_article ADD CONSTRAINT FK_D2B6356B548AD6E2 FOREIGN KEY (category_article_id) REFERENCES category_article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carrier CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cart CHANGE product product VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE category_article CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE comment CHANGE user_id user_id INT NOT NULL, CHANGE comment comment LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE header CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE btn_title btn_title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE btn_url btn_url VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE illustration illustration VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `order` CHANGE user_id user_id INT NOT NULL, CHANGE carrier_name carrier_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE delivery delivery LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reference reference VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE stripe_session_id stripe_session_id VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE order_details CHANGE my_order_id my_order_id INT NOT NULL, CHANGE product product VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product CHANGE category_id category_id INT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE illustration illustration VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE subtitle subtitle VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reset_password CHANGE user_id user_id INT NOT NULL, CHANGE token token VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
