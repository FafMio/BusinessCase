<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201127225639 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ad (id INT AUTO_INCREMENT NOT NULL, power_id INT DEFAULT NULL, color_id INT DEFAULT NULL, car_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, body VARCHAR(255) NOT NULL, year_of_circulation INT NOT NULL, mileage INT NOT NULL, price DOUBLE PRECISION NOT NULL, reference VARCHAR(20) NOT NULL, published_at DATETIME NOT NULL, has_five_doors TINYINT(1) NOT NULL, has_mechanical_gearbox TINYINT(1) NOT NULL, co2emission INT NOT NULL, INDEX IDX_77E0ED58AB4FC384 (power_id), INDEX IDX_77E0ED587ADA1FB5 (color_id), INDEX IDX_77E0ED58C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE builder (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, generation_id INT DEFAULT NULL, version_id INT DEFAULT NULL, model_id INT NOT NULL, INDEX IDX_773DE69D553A6EC4 (generation_id), INDEX IDX_773DE69D4BBC2705 (version_id), INDEX IDX_773DE69D7975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_finish (car_id INT NOT NULL, finish_id INT NOT NULL, INDEX IDX_38A107EAC3C6F69F (car_id), INDEX IDX_38A107EA2B4667EB (finish_id), PRIMARY KEY(car_id, finish_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE finish (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE generation (id INT AUTO_INCREMENT NOT NULL, generation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, builder_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D79572D9959F66E4 (builder_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, ad_id INT DEFAULT NULL, link VARCHAR(255) NOT NULL, rank SMALLINT NOT NULL, INDEX IDX_16DB4F894F34D596 (ad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE version (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58AB4FC384 FOREIGN KEY (power_id) REFERENCES power (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED587ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D553A6EC4 FOREIGN KEY (generation_id) REFERENCES generation (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D4BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE car_finish ADD CONSTRAINT FK_38A107EAC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_finish ADD CONSTRAINT FK_38A107EA2B4667EB FOREIGN KEY (finish_id) REFERENCES finish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9959F66E4 FOREIGN KEY (builder_id) REFERENCES builder (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F894F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F894F34D596');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9959F66E4');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED58C3C6F69F');
        $this->addSql('ALTER TABLE car_finish DROP FOREIGN KEY FK_38A107EAC3C6F69F');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED587ADA1FB5');
        $this->addSql('ALTER TABLE car_finish DROP FOREIGN KEY FK_38A107EA2B4667EB');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D553A6EC4');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7975B7E7');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED58AB4FC384');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D4BBC2705');
        $this->addSql('DROP TABLE ad');
        $this->addSql('DROP TABLE builder');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_finish');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE finish');
        $this->addSql('DROP TABLE generation');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE power');
        $this->addSql('DROP TABLE version');
    }
}
