<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220317095552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier DROP FOREIGN KEY FK_E1BB1823592E70B8');
        $this->addSql('DROP INDEX IDX_E1BB1823592E70B8 ON atelier');
        $this->addSql('ALTER TABLE atelier ADD idtheme VARCHAR(255) NOT NULL, ADD idvacation VARCHAR(255) NOT NULL, ADD idinscription VARCHAR(255) NOT NULL, DROP vacations_id');
        $this->addSql('ALTER TABLE categorie_chambre CHANGE libelle_categorie libellecategorie VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE club CHANGE NOM nom VARCHAR(50) NOT NULL, CHANGE ADRESSE1 adresse1 VARCHAR(60) NOT NULL, CHANGE CP cp VARCHAR(5) NOT NULL, CHANGE VILLE ville VARCHAR(60) NOT NULL, CHANGE TEL tel VARCHAR(14) NOT NULL');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF652605DAC5993');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260B56DCD74');
        $this->addSql('DROP INDEX UNIQ_CFF65260B56DCD74 ON compte');
        $this->addSql('DROP INDEX UNIQ_CFF652605DAC5993 ON compte');
        $this->addSql('ALTER TABLE compte ADD idinscription VARCHAR(255) NOT NULL, ADD idlicencie VARCHAR(255) NOT NULL, DROP inscription_id, DROP licencie_id');
        $this->addSql('ALTER TABLE inscription CHANGE date_inscription dateinscription DATETIME NOT NULL');
        $this->addSql('ALTER TABLE licencie CHANGE CP cp VARCHAR(6) NOT NULL, CHANGE TEL tel VARCHAR(14) NOT NULL, CHANGE IDQUALITE idqualite VARCHAR(255) NOT NULL, CHANGE IDCLUB idclub VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7153243BB18');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB715BCF5E72D');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7155DAC5993');
        $this->addSql('DROP INDEX IDX_8D4CB715BCF5E72D ON nuite');
        $this->addSql('DROP INDEX IDX_8D4CB7153243BB18 ON nuite');
        $this->addSql('DROP INDEX IDX_8D4CB7155DAC5993 ON nuite');
        $this->addSql('ALTER TABLE nuite ADD idhotel VARCHAR(255) NOT NULL, ADD idcategorie VARCHAR(255) NOT NULL, ADD idinscription VARCHAR(255) NOT NULL, DROP hotel_id, DROP categorie_id, DROP inscription_id, CHANGE date_nuitee datenuitee DATETIME NOT NULL');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C153243BB18');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15BCF5E72D');
        $this->addSql('DROP INDEX IDX_21866C15BCF5E72D ON proposer');
        $this->addSql('DROP INDEX IDX_21866C153243BB18 ON proposer');
        $this->addSql('ALTER TABLE proposer ADD idhotel VARCHAR(255) NOT NULL, ADD idcategorie VARCHAR(255) NOT NULL, DROP hotel_id, DROP categorie_id, CHANGE tarif_nuite tarifnuite NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE restauration DROP FOREIGN KEY FK_898B1EF15DAC5993');
        $this->addSql('DROP INDEX IDX_898B1EF15DAC5993 ON restauration');
        $this->addSql('ALTER TABLE restauration ADD idinscription VARCHAR(255) NOT NULL, DROP inscription_id, CHANGE date_restauration daterestauration DATETIME NOT NULL, CHANGE type_repas typerepas VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vacation ADD dateheuredebut DATETIME NOT NULL, ADD dateheurefin DATETIME NOT NULL, DROP dateheure_debut, DROP dateheure_fin');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier ADD vacations_id INT NOT NULL, DROP idtheme, DROP idvacation, DROP idinscription, CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE atelier ADD CONSTRAINT FK_E1BB1823592E70B8 FOREIGN KEY (vacations_id) REFERENCES vacation (id)');
        $this->addSql('CREATE INDEX IDX_E1BB1823592E70B8 ON atelier (vacations_id)');
        $this->addSql('ALTER TABLE categorie_chambre ADD libelle_categorie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP libellecategorie');
        $this->addSql('ALTER TABLE club CHANGE nom NOM VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse1 ADRESSE1 VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse2 adresse2 VARCHAR(60) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cp CP CHAR(6) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville VILLE VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel TEL CHAR(14) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE compte ADD inscription_id INT DEFAULT NULL, ADD licencie_id INT DEFAULT NULL, DROP idinscription, DROP idlicencie, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE role role VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF652605DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260B56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFF65260B56DCD74 ON compte (licencie_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFF652605DAC5993 ON compte (inscription_id)');
        $this->addSql('ALTER TABLE hotel CHANGE pnom pnom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse1 adresse1 VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse2 adresse2 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cp cp VARCHAR(6) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(14) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE inscription CHANGE dateinscription date_inscription DATETIME NOT NULL');
        $this->addSql('ALTER TABLE licencie CHANGE nom NOM VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom PRENOM VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse1 ADRESSE1 VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse2 adresse2 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cp CP CHAR(6) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville VILLE VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel TEL CHAR(14) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE idqualite IDQUALITE NUMERIC(38, 0) NOT NULL, CHANGE idclub IDCLUB NUMERIC(38, 0) NOT NULL');
        $this->addSql('ALTER TABLE nuite ADD hotel_id INT NOT NULL, ADD categorie_id INT DEFAULT NULL, ADD inscription_id INT NOT NULL, DROP idhotel, DROP idcategorie, DROP idinscription, CHANGE datenuitee date_nuitee DATETIME NOT NULL');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7153243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB715BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_chambre (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7155DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('CREATE INDEX IDX_8D4CB715BCF5E72D ON nuite (categorie_id)');
        $this->addSql('CREATE INDEX IDX_8D4CB7153243BB18 ON nuite (hotel_id)');
        $this->addSql('CREATE INDEX IDX_8D4CB7155DAC5993 ON nuite (inscription_id)');
        $this->addSql('ALTER TABLE proposer ADD hotel_id INT NOT NULL, ADD categorie_id INT NOT NULL, DROP idhotel, DROP idcategorie, CHANGE tarifnuite tarif_nuite NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C153243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_chambre (id)');
        $this->addSql('CREATE INDEX IDX_21866C15BCF5E72D ON proposer (categorie_id)');
        $this->addSql('CREATE INDEX IDX_21866C153243BB18 ON proposer (hotel_id)');
        $this->addSql('ALTER TABLE qualite CHANGE libellequalite LIBELLEQUALITE VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE restauration ADD inscription_id INT NOT NULL, ADD type_repas VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP typerepas, DROP idinscription, CHANGE daterestauration date_restauration DATETIME NOT NULL');
        $this->addSql('ALTER TABLE restauration ADD CONSTRAINT FK_898B1EF15DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('CREATE INDEX IDX_898B1EF15DAC5993 ON restauration (inscription_id)');
        $this->addSql('ALTER TABLE theme CHANGE libelle libelle VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vacation ADD dateheure_debut DATETIME NOT NULL, ADD dateheure_fin DATETIME NOT NULL, DROP dateheuredebut, DROP dateheurefin');
    }
}
