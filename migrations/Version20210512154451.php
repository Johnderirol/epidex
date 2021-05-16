<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210512154451 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rating_leader (id INT AUTO_INCREMENT NOT NULL, pole_id INT DEFAULT NULL, leader_id INT DEFAULT NULL, collaborateur_id INT DEFAULT NULL, note INT NOT NULL, INDEX IDX_DA11805F419C3385 (pole_id), INDEX IDX_DA11805F73154ED4 (leader_id), INDEX IDX_DA11805FA848E3B1 (collaborateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rating_leader ADD CONSTRAINT FK_DA11805F419C3385 FOREIGN KEY (pole_id) REFERENCES comp_etoile (id)');
        $this->addSql('ALTER TABLE rating_leader ADD CONSTRAINT FK_DA11805F73154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id)');
        $this->addSql('ALTER TABLE rating_leader ADD CONSTRAINT FK_DA11805FA848E3B1 FOREIGN KEY (collaborateur_id) REFERENCES collaborateur (id)');
        $this->addSql('ALTER TABLE collaborateur CHANGE matricule matricule INT NOT NULL, CHANGE hash hash VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE statut statut VARCHAR(255) NOT NULL, CHANGE slug slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE collaborateur ADD CONSTRAINT FK_770CBCD3BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE collaborateur RENAME INDEX fk_770cbcd3be6cae90 TO IDX_770CBCD3BE6CAE90');
        $this->addSql('ALTER TABLE skill RENAME INDEX fk_5e3de47712469de2 TO IDX_5E3DE47712469DE2');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rating_leader');
        $this->addSql('ALTER TABLE collaborateur DROP FOREIGN KEY FK_770CBCD3BE6CAE90');
        $this->addSql('ALTER TABLE collaborateur CHANGE matricule matricule INT DEFAULT NULL, CHANGE hash hash VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut statut VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE collaborateur RENAME INDEX idx_770cbcd3be6cae90 TO FK_770CBCD3BE6CAE90');
        $this->addSql('ALTER TABLE skill RENAME INDEX idx_5e3de47712469de2 TO FK_5E3DE47712469DE2');
    }
}
