<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220322142123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE atelier (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, nb_place_maxi INT NOT NULL, idtheme VARCHAR(255) NOT NULL, idvacation VARCHAR(255) NOT NULL, idinscription VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE categorie_chambre (id INT AUTO_INCREMENT NOT NULL, libellecategorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, adresse1 VARCHAR(60) NOT NULL, adresse2 VARCHAR(60) DEFAULT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(60) NOT NULL, tel VARCHAR(14) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, numlicence INT NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, idinscription VARCHAR(255) NOT NULL, idlicencie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, pnom VARCHAR(255) NOT NULL, adresse1 VARCHAR(255) NOT NULL, adresse2 VARCHAR(255) DEFAULT NULL, cp VARCHAR(6) NOT NULL, ville VARCHAR(255) NOT NULL, tel VARCHAR(14) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, dateinscription DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE inscription_atelier (inscription_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_C86AEECF5DAC5993 (inscription_id), INDEX IDX_C86AEECF82E2CF35 (atelier_id), PRIMARY KEY(inscription_id, atelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE inscription_restauration (inscription_id INT NOT NULL, restauration_id INT NOT NULL, INDEX IDX_FAFBDB85DAC5993 (inscription_id), INDEX IDX_FAFBDB87C6CB929 (restauration_id), PRIMARY KEY(inscription_id, restauration_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE licencie (id INT AUTO_INCREMENT NOT NULL, numlicence BIGINT NOT NULL, nom VARCHAR(70) NOT NULL, prenom VARCHAR(70) NOT NULL, adresse1 VARCHAR(255) NOT NULL, adresse2 VARCHAR(255) DEFAULT NULL, cp VARCHAR(6) NOT NULL, ville VARCHAR(70) NOT NULL, tel VARCHAR(14) NOT NULL, mail VARCHAR(100) NOT NULL, dateadhesion DATETIME NOT NULL, idqualite VARCHAR(255) NOT NULL, idclub VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE nuite (id INT AUTO_INCREMENT NOT NULL, datenuitee DATETIME NOT NULL, idhotel VARCHAR(255) NOT NULL, idcategorie VARCHAR(255) NOT NULL, idinscription VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE proposer (id INT AUTO_INCREMENT NOT NULL, tarifnuite NUMERIC(10, 2) NOT NULL, idhotel VARCHAR(255) NOT NULL, idcategorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE qualite (id INT AUTO_INCREMENT NOT NULL, libellequalite VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE restauration (id INT AUTO_INCREMENT NOT NULL, daterestauration DATETIME NOT NULL, typerepas VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE theme_atelier (theme_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_B8D81D0059027487 (theme_id), INDEX IDX_B8D81D0082E2CF35 (atelier_id), PRIMARY KEY(theme_id, atelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE vacation (id INT AUTO_INCREMENT NOT NULL, dateheuredebut DATETIME NOT NULL, dateheurefin DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE inscription_atelier ADD CONSTRAINT FK_C86AEECF5DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE inscription_atelier ADD CONSTRAINT FK_C86AEECF82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE inscription_restauration ADD CONSTRAINT FK_FAFBDB85DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE inscription_restauration ADD CONSTRAINT FK_FAFBDB87C6CB929 FOREIGN KEY (restauration_id) REFERENCES restauration (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE theme_atelier ADD CONSTRAINT FK_B8D81D0059027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE theme_atelier ADD CONSTRAINT FK_B8D81D0082E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_atelier DROP FOREIGN KEY FK_C86AEECF82E2CF35');
        $this->addSql('ALTER TABLE theme_atelier DROP FOREIGN KEY FK_B8D81D0082E2CF35');
        $this->addSql('ALTER TABLE inscription_atelier DROP FOREIGN KEY FK_C86AEECF5DAC5993');
        $this->addSql('ALTER TABLE inscription_restauration DROP FOREIGN KEY FK_FAFBDB85DAC5993');
        $this->addSql('ALTER TABLE inscription_restauration DROP FOREIGN KEY FK_FAFBDB87C6CB929');
        $this->addSql('ALTER TABLE theme_atelier DROP FOREIGN KEY FK_B8D81D0059027487');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE categorie_chambre');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE inscription_atelier');
        $this->addSql('DROP TABLE inscription_restauration');
        $this->addSql('DROP TABLE licencie');
        $this->addSql('DROP TABLE nuite');
        $this->addSql('DROP TABLE proposer');
        $this->addSql('DROP TABLE qualite');
        $this->addSql('DROP TABLE restauration');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE theme_atelier');
        $this->addSql('DROP TABLE vacation');
    }
}
