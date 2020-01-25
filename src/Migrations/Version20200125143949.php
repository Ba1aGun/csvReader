<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200125143949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tbl_product_data CHANGE str_product_name str_product_name VARCHAR(255) NOT NULL, CHANGE str_product_desc str_product_desc VARCHAR(255) NOT NULL, CHANGE str_product_code str_product_code VARCHAR(255) NOT NULL, CHANGE stm_timestamp stm_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, CHANGE int_stock_level int_stock_level INT NOT NULL, CHANGE dec_price dec_price NUMERIC(10, 2) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tbl_product_data CHANGE str_product_name str_product_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE str_product_desc str_product_desc VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE str_product_code str_product_code VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE stm_timestamp stm_timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE int_stock_level int_stock_level INT DEFAULT NULL, CHANGE dec_price dec_price NUMERIC(10, 2) DEFAULT NULL');
    }
}
