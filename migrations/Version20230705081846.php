<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230705081846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal_media (animal_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_4BDF78F88E962C16 (animal_id), INDEX IDX_4BDF78F8EA9FDD75 (media_id), PRIMARY KEY(animal_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_animal (article_id INT NOT NULL, animal_id INT NOT NULL, INDEX IDX_6CB49F7294869C (article_id), INDEX IDX_6CB49F8E962C16 (animal_id), PRIMARY KEY(article_id, animal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_race (article_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_6A2D3CAE7294869C (article_id), INDEX IDX_6A2D3CAE6E59D40D (race_id), PRIMARY KEY(article_id, race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal_media ADD CONSTRAINT FK_4BDF78F88E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_media ADD CONSTRAINT FK_4BDF78F8EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_animal ADD CONSTRAINT FK_6CB49F7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_animal ADD CONSTRAINT FK_6CB49F8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_race ADD CONSTRAINT FK_6A2D3CAE7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_race ADD CONSTRAINT FK_6A2D3CAE6E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal ADD description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal_media DROP FOREIGN KEY FK_4BDF78F88E962C16');
        $this->addSql('ALTER TABLE animal_media DROP FOREIGN KEY FK_4BDF78F8EA9FDD75');
        $this->addSql('ALTER TABLE article_animal DROP FOREIGN KEY FK_6CB49F7294869C');
        $this->addSql('ALTER TABLE article_animal DROP FOREIGN KEY FK_6CB49F8E962C16');
        $this->addSql('ALTER TABLE article_race DROP FOREIGN KEY FK_6A2D3CAE7294869C');
        $this->addSql('ALTER TABLE article_race DROP FOREIGN KEY FK_6A2D3CAE6E59D40D');
        $this->addSql('DROP TABLE animal_media');
        $this->addSql('DROP TABLE article_animal');
        $this->addSql('DROP TABLE article_race');
        $this->addSql('ALTER TABLE animal DROP description');
    }
}
