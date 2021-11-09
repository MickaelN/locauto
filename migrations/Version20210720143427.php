<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720143427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, seat_id INT DEFAULT NULL, motorization_id INT DEFAULT NULL, plate VARCHAR(6) NOT NULL, number INT NOT NULL, INDEX IDX_95C71D146BF700BD (status_id), INDEX IDX_95C71D14C1DAFE35 (seat_id), INDEX IDX_95C71D14F16117E (motorization_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motorization (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rental (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, cars_id INT DEFAULT NULL, number VARCHAR(6) NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, INDEX IDX_1619C27D67B3B43D (users_id), INDEX IDX_1619C27D8702F506 (cars_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seat (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D146BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D14C1DAFE35 FOREIGN KEY (seat_id) REFERENCES seat (id)');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D14F16117E FOREIGN KEY (motorization_id) REFERENCES motorization (id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27D8702F506 FOREIGN KEY (cars_id) REFERENCES cars (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27D8702F506');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D14F16117E');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D14C1DAFE35');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D146BF700BD');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27D67B3B43D');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE motorization');
        $this->addSql('DROP TABLE rental');
        $this->addSql('DROP TABLE seat');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE users');
    }
}
