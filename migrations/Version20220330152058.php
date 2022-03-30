<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220330152058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vacation ADD atelier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vacation ADD CONSTRAINT FK_E3DADF7582E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
        $this->addSql('CREATE INDEX IDX_E3DADF7582E2CF35 ON vacation (atelier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE categorie_chambre CHANGE libellecategorie libellecategorie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE club CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse1 adresse1 VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse2 adresse2 VARCHAR(60) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cp cp VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(14) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE compte CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE role role VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE idinscription idinscription VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE idlicencie idlicencie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hotel CHANGE pnom pnom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse1 adresse1 VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse2 adresse2 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cp cp VARCHAR(6) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(14) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE licencie CHANGE nom nom VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse1 adresse1 VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse2 adresse2 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cp cp VARCHAR(6) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(14) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE idqualite idqualite VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE idclub idclub VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nuite CHANGE idhotel idhotel VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE idcategorie idcategorie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE idinscription idinscription VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE proposer CHANGE idhotel idhotel VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE idcategorie idcategorie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE qualite CHANGE libellequalite libellequalite VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE restauration CHANGE typerepas typerepas VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE theme CHANGE libelle libelle VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vacation DROP FOREIGN KEY FK_E3DADF7582E2CF35');
        $this->addSql('DROP INDEX IDX_E3DADF7582E2CF35 ON vacation');
        $this->addSql('ALTER TABLE vacation DROP atelier_id');
    }
}
