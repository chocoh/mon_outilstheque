<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190513141157 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE emprunt ADD outil_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D73ED89C80 FOREIGN KEY (outil_id) REFERENCES outils (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_364071D73ED89C80 ON emprunt (outil_id)');
        $this->addSql('CREATE INDEX IDX_364071D7A76ED395 ON emprunt (user_id)');
        $this->addSql('ALTER TABLE media ADD outil_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C3ED89C80 FOREIGN KEY (outil_id) REFERENCES outils (id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C3ED89C80 ON media (outil_id)');
        $this->addSql('ALTER TABLE messages ADD expediteur_id INT DEFAULT NULL, ADD destinataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E9610335F61 FOREIGN KEY (expediteur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96A4F84F6E FOREIGN KEY (destinataire_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_DB021E9610335F61 ON messages (expediteur_id)');
        $this->addSql('CREATE INDEX IDX_DB021E96A4F84F6E ON messages (destinataire_id)');
        $this->addSql('ALTER TABLE outils ADD categorie_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE outils ADD CONSTRAINT FK_DA4DB0DABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE outils ADD CONSTRAINT FK_DA4DB0DAA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_DA4DB0DABCF5E72D ON outils (categorie_id)');
        $this->addSql('CREATE INDEX IDX_DA4DB0DAA76ED395 ON outils (user_id)');
        $this->addSql('ALTER TABLE users ADD ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9A73F0036 FOREIGN KEY (ville_id) REFERENCES villes (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9A73F0036 ON users (ville_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D73ED89C80');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7A76ED395');
        $this->addSql('DROP INDEX IDX_364071D73ED89C80 ON emprunt');
        $this->addSql('DROP INDEX IDX_364071D7A76ED395 ON emprunt');
        $this->addSql('ALTER TABLE emprunt DROP outil_id, DROP user_id');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C3ED89C80');
        $this->addSql('DROP INDEX IDX_6A2CA10C3ED89C80 ON media');
        $this->addSql('ALTER TABLE media DROP outil_id');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E9610335F61');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96A4F84F6E');
        $this->addSql('DROP INDEX IDX_DB021E9610335F61 ON messages');
        $this->addSql('DROP INDEX IDX_DB021E96A4F84F6E ON messages');
        $this->addSql('ALTER TABLE messages DROP expediteur_id, DROP destinataire_id');
        $this->addSql('ALTER TABLE outils DROP FOREIGN KEY FK_DA4DB0DABCF5E72D');
        $this->addSql('ALTER TABLE outils DROP FOREIGN KEY FK_DA4DB0DAA76ED395');
        $this->addSql('DROP INDEX IDX_DA4DB0DABCF5E72D ON outils');
        $this->addSql('DROP INDEX IDX_DA4DB0DAA76ED395 ON outils');
        $this->addSql('ALTER TABLE outils DROP categorie_id, DROP user_id');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9A73F0036');
        $this->addSql('DROP INDEX IDX_1483A5E9A73F0036 ON users');
        $this->addSql('ALTER TABLE users DROP ville_id');
    }
}
