<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191024130128 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE person_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE measurement_meta_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE measurement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE location_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE measurement_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE person (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE measurement_meta (id INT NOT NULL, location_id INT NOT NULL, created_by_id INT NOT NULL, time_of_measurement TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, last_rainfall TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, operating_time INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A464F06464D218E ON measurement_meta (location_id)');
        $this->addSql('CREATE INDEX IDX_A464F064B03A8386 ON measurement_meta (created_by_id)');
        $this->addSql('CREATE TABLE measurement (id INT NOT NULL, measurement_type_id INT NOT NULL, count INT DEFAULT NULL, weight INT DEFAULT NULL, comment TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2CE0D8118B4CC8FE ON measurement (measurement_type_id)');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE measurement_type (id INT NOT NULL, image_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FF48B3783DA5256D ON measurement_type (image_id)');
        $this->addSql('CREATE TABLE image (id INT NOT NULL, measurement_meta_id INT DEFAULT NULL, uri VARCHAR(255) NOT NULL, type INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C53D045F77FCE294 ON image (measurement_meta_id)');
        $this->addSql('ALTER TABLE measurement_meta ADD CONSTRAINT FK_A464F06464D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE measurement_meta ADD CONSTRAINT FK_A464F064B03A8386 FOREIGN KEY (created_by_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE measurement ADD CONSTRAINT FK_2CE0D8118B4CC8FE FOREIGN KEY (measurement_type_id) REFERENCES measurement_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE measurement_type ADD CONSTRAINT FK_FF48B3783DA5256D FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F77FCE294 FOREIGN KEY (measurement_meta_id) REFERENCES measurement_meta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE measurement_meta DROP CONSTRAINT FK_A464F064B03A8386');
        $this->addSql('ALTER TABLE image DROP CONSTRAINT FK_C53D045F77FCE294');
        $this->addSql('ALTER TABLE measurement_meta DROP CONSTRAINT FK_A464F06464D218E');
        $this->addSql('ALTER TABLE measurement DROP CONSTRAINT FK_2CE0D8118B4CC8FE');
        $this->addSql('ALTER TABLE measurement_type DROP CONSTRAINT FK_FF48B3783DA5256D');
        $this->addSql('DROP SEQUENCE person_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE measurement_meta_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE measurement_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE location_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE measurement_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE image_id_seq CASCADE');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE measurement_meta');
        $this->addSql('DROP TABLE measurement');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE measurement_type');
        $this->addSql('DROP TABLE image');
    }
}
