<?php

require_once __DIR__ . '/../config/db.php';

class Fornecedor
{
    private PDO $db;
    private string $table = 'fornecedor';

    public function __construct()
    {
        $this->db = Database::getConnection();

        $this->db->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );

        $this->db->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC
        );
    }

    /**
     * Lista todos os fornecedores
     */
    public function listarTodos(): array
    {
        $sql = "
            SELECT
                id_fornecedor,
                nome,
                cnpj,
                telefone,
                email,
                endereco,
                item_fornecido
            FROM {$this->table}
            ORDER BY id_fornecedor ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Cadastra um fornecedor
     */
    public function criar(
        string $nome,
        string $cnpj,
        string $telefone,
        string $email,
        string $endereco,
        string $item_fornecido
    ): bool {

        $sql = "
            INSERT INTO {$this->table}
            (
                nome,
                cnpj,
                telefone,
                email,
                endereco,
                item_fornecido
            )
            VALUES
            (
                :nome,
                :cnpj,
                :telefone,
                :email,
                :endereco,
                :item_fornecido
            )
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome' => $nome,
            ':cnpj' => $cnpj,
            ':telefone' => $telefone,
            ':email' => $email,
            ':endereco' => $endereco,
            ':item_fornecido' => $item_fornecido
        ]);
    }

    /**
     * Exclui um fornecedor
     */
    public function excluir(int $id): bool
    {
        $sql = "
            DELETE FROM {$this->table}
            WHERE id_fornecedor = :id
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}