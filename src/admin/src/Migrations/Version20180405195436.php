<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180405195436 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE yokai_security_token_usage (id INT AUTO_INCREMENT NOT NULL, token_id INT DEFAULT NULL, created_at DATETIME NOT NULL, information JSON NOT NULL COMMENT \'(DC2Type:json_array)\', INDEX IDX_987DD8C641DEE7B9 (token_id), INDEX IDX_987DD8C68B8E8428 (created_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE yokai_security_token (id INT AUTO_INCREMENT NOT NULL, user_class VARCHAR(255) NOT NULL, user_id VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, purpose VARCHAR(255) NOT NULL, payload JSON NOT NULL COMMENT \'(DC2Type:json_array)\', created_at DATETIME NOT NULL, created_information JSON NOT NULL COMMENT \'(DC2Type:json_array)\', expires_at DATETIME NOT NULL, keep_until DATETIME NOT NULL, allowed_usages INT NOT NULL, INDEX IDX_A2FC9960F89E2C7A76ED395 (user_class, user_id), INDEX IDX_A2FC99608B8E8428 (created_at), INDEX IDX_A2FC9960F9D83E2 (expires_at), INDEX IDX_A2FC99601CCA4552 (keep_until), UNIQUE INDEX UNIQ_A2FC99601D775834B887B3EB (value, purpose), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE yokai_security_token_usage ADD CONSTRAINT FK_987DD8C641DEE7B9 FOREIGN KEY (token_id) REFERENCES yokai_security_token (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE yokai_security_token_usage DROP FOREIGN KEY FK_987DD8C641DEE7B9');
        $this->addSql('DROP TABLE yokai_security_token_usage');
        $this->addSql('DROP TABLE yokai_security_token');
    }
}
