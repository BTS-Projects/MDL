<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427084623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription_restauration (inscription_id INT NOT NULL, restauration_id INT NOT NULL, INDEX IDX_FAFBDB85DAC5993 (inscription_id), INDEX IDX_FAFBDB87C6CB929 (restauration_id), PRIMARY KEY(inscription_id, restauration_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, num_licence BIGINT NOT NULL, mdp VARCHAR(255) NOT NULL, confirme TINYINT(1) NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inscription_restauration ADD CONSTRAINT FK_FAFBDB85DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_restauration ADD CONSTRAINT FK_FAFBDB87C6CB929 FOREIGN KEY (restauration_id) REFERENCES restauration (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE cat_chamb');
        $this->addSql('ALTER TABLE restauration DROP idinscription');
        $this->addSql('ALTER TABLE theme CHANGE libelle libelle VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE vacation ADD atelier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vacation ADD CONSTRAINT FK_E3DADF7582E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
        $this->addSql('CREATE INDEX IDX_E3DADF7582E2CF35 ON vacation (atelier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cat_chamb (id INT DEFAULT NULL, libellecategorie TEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE inscription_restauration');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE restauration ADD idinscription VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE theme CHANGE libelle libelle VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE vacation DROP FOREIGN KEY FK_E3DADF7582E2CF35');
        $this->addSql('DROP INDEX IDX_E3DADF7582E2CF35 ON vacation');
        $this->addSql('ALTER TABLE vacation DROP atelier_id');
    }
}
