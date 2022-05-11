<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511080930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE nuite ADD inscription_id INT');
//        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7155DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
//        $this->addSql('CREATE INDEX IDX_8D4CB7155DAC5993 ON nuite (inscription_id)');
//        $this->addSql('ALTER TABLE user CHANGE inscription_id inscription_id INT NOT NULL, CHANGE licencie_id licencie_id INT NOT NULL, CHANGE num_licence num_licence VARCHAR(180) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7155DAC5993');
        $this->addSql('DROP INDEX IDX_8D4CB7155DAC5993 ON nuite');
        $this->addSql('ALTER TABLE nuite ADD idinscription VARCHAR(255) NOT NULL, DROP inscription_id');
        $this->addSql('ALTER TABLE user CHANGE inscription_id inscription_id INT DEFAULT NULL, CHANGE licencie_id licencie_id INT DEFAULT NULL, CHANGE num_licence num_licence VARCHAR(180) DEFAULT NULL');
    }
}
