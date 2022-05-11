<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511002521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6F2C56620');
//        $this->addSql('DROP INDEX UNIQ_5E90F6D6F2C56620 ON inscription');
//        $this->addSql('ALTER TABLE inscription DROP compte_id');
//        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B755612F2C56620');
//        $this->addSql('DROP INDEX UNIQ_3B755612F2C56620 ON licencie');
//        $this->addSql('ALTER TABLE licencie DROP compte_id');
//        $this->addSql('ALTER TABLE user ADD licencie_id INT, ADD inscription_id INT, CHANGE num_licence num_licence VARCHAR(180) NOT NULL');
//        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id)');
//        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649B56DCD74 ON user (licencie_id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6495DAC5993 ON user (inscription_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription ADD compte_id INT NOT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6F2C56620 FOREIGN KEY (compte_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E90F6D6F2C56620 ON inscription (compte_id)');
        $this->addSql('ALTER TABLE licencie ADD compte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B755612F2C56620 FOREIGN KEY (compte_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3B755612F2C56620 ON licencie (compte_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B56DCD74');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495DAC5993');
        $this->addSql('DROP INDEX UNIQ_8D93D649B56DCD74 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D6495DAC5993 ON user');
        $this->addSql('ALTER TABLE user DROP licencie_id, DROP inscription_id, CHANGE num_licence num_licence VARCHAR(180) DEFAULT NULL');
    }
}
