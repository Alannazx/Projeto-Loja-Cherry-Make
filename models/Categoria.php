<?php

require_once __DIR__ . '/../config/db.php';

class Categoria
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    /**
     * Lista todas as categorias em ordem crescente pelo ID.
     */
    public function listarTodas(): array
    {
        $sql = "
            SELECT id, nome, ativo
            FROM categoria
            ORDER BY id ASC
        ";

        return $this->conn->query($sql)->fetchAll();
    }

    /**
     * Lista somente categorias ativas.
     */
    public function listarAtivas(): array
    {
        $sql = "
            SELECT id, nome
            FROM categoria
            WHERE ativo = 1
            ORDER BY id ASC
        ";

        return $this->conn->query($sql)->fetchAll();
    }

    /**
     * Busca uma categoria pelo ID.
     */
    public function buscarPorId(int $id): ?array
    {
        $stmt = $this->conn->prepare("
            SELECT id, nome, ativo
            FROM categoria
            WHERE id = :id
        ");

        $stmt->execute([
            ':id' => $id
        ]);

        $resultado = $stmt->fetch();

        return $resultado ?: null;
    }

    /**
     * Insere uma nova categoria.
     * A categoria começa ativa.
     */
    public function inserir(string $nome): int
    {
        $stmt = $this->conn->prepare("
            INSERT INTO categoria (nome, ativo)
            VALUES (:nome, 1)
        ");

        $stmt->execute([
            ':nome' => $nome
        ]);

        return (int) $this->conn->lastInsertId();
    }

    /**
     * Atualiza o nome da categoria.
     */
    public function atualizar(int $id, string $nome): void
    {
        $stmt = $this->conn->prepare("
            UPDATE categoria
            SET nome = :nome
            WHERE id = :id
        ");

        $stmt->execute([
            ':id' => $id,
            ':nome' => $nome
        ]);
    }

    /**
     * Ativa ou inativa uma categoria.
     */
    public function setAtivo(int $id, bool $ativo): void
    {
        $stmt = $this->conn->prepare("
            UPDATE categoria
            SET ativo = :ativo
            WHERE id = :id
        ");

        $stmt->execute([
            ':id' => $id,
            ':ativo' => $ativo ? 1 : 0
        ]);
    }

    /**
     * Exclui uma categoria.
     */
    public function excluir(int $id): void
    {
        $stmt = $this->conn->prepare("
            DELETE FROM categoria
            WHERE id = :id
        ");

        $stmt->execute([
            ':id' => $id
        ]);
    }
}