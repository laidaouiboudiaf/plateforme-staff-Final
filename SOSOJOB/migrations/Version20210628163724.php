<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628163724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fournisseur_typedemission (ID_FOURNISSEUR INT NOT NULL, ID_TYPEDEMISSION INT NOT NULL, INDEX IDX_16D8E7F7DD95A600 (ID_FOURNISSEUR), INDEX IDX_16D8E7F79627B364 (ID_TYPEDEMISSION), PRIMARY KEY(ID_FOURNISSEUR, ID_TYPEDEMISSION)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fournisseur_typedemission ADD CONSTRAINT FK_16D8E7F7DD95A600 FOREIGN KEY (ID_FOURNISSEUR) REFERENCES fournisseur (ID_FOURNISSEUR)');
        $this->addSql('ALTER TABLE fournisseur_typedemission ADD CONSTRAINT FK_16D8E7F79627B364 FOREIGN KEY (ID_TYPEDEMISSION) REFERENCES type_demission (ID_TYPEDEMISSION)');
        $this->addSql('DROP TABLE fournisseur_typedemissionr');
        $this->addSql('ALTER TABLE fournisseur CHANGE PHOTO PHOTO VARCHAR(65535) DEFAULT NULL, CHANGE permis permis VARCHAR(65335) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fournisseur_typedemissionr (ID_FOURNISSEUR INT NOT NULL, ID_TYPEDEMISSION INT NOT NULL, INDEX IDX_4FC640C59627B364 (ID_TYPEDEMISSION), INDEX IDX_4FC640C5DD95A600 (ID_FOURNISSEUR), PRIMARY KEY(ID_FOURNISSEUR, ID_TYPEDEMISSION)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE fournisseur_typedemissionr ADD CONSTRAINT FK_4FC640C59627B364 FOREIGN KEY (ID_TYPEDEMISSION) REFERENCES type_demission (ID_TYPEDEMISSION)');
        $this->addSql('ALTER TABLE fournisseur_typedemissionr ADD CONSTRAINT FK_4FC640C5DD95A600 FOREIGN KEY (ID_FOURNISSEUR) REFERENCES fournisseur (ID_FOURNISSEUR)');
        $this->addSql('DROP TABLE fournisseur_typedemission');
        $this->addSql('ALTER TABLE fournisseur CHANGE PHOTO PHOTO MEDIUMTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE permis permis MEDIUMTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE fournisseur_permis DROP FOREIGN KEY FK_DAF2C475DD95A600');
        $this->addSql('ALTER TABLE fournisseur_permis DROP FOREIGN KEY FK_DAF2C475BA7006CD');
    }
}
