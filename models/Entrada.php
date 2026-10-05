<?php

require_once __DIR__ . '/../config/db.php';

class Entrada
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }


    // =========================
    // LISTAR ENTRADAS
    // =========================

    public function listarTodos(): array
    {
        $stmt = $this->conn->query("
            SELECT
                e.id,
                e.fornecedor,
                e.mercadoria,
                e.data,
                f.nome AS fornecedor_nome
            FROM entrada_mercadoria e
            INNER JOIN fornecedor f
                ON f.id_fornecedor = e.fornecedor
            ORDER BY e.id DESC
        ");

        return $stmt->fetchAll();
    }


    // =========================
    // BUSCAR POR ID
    // =========================

    public function buscarPorId(int $id): ?array
    {
        $stmt = $this->conn->prepare("
            SELECT
                e.id,
                e.fornecedor,
                e.mercadoria,
                e.data,
                f.nome AS fornecedor_nome
            FROM entrada_mercadoria e
            INNER JOIN fornecedor f
                ON f.id_fornecedor = e.fornecedor
            WHERE e.id = :id
        ");

        $stmt->execute([
            ':id' => $id
        ]);

        $resultado = $stmt->fetch();

        return $resultado ?: null;
    }


    // =========================
    // LISTAR FORNECEDORES
    // =========================

    public function listarFornecedores(): array
    {
        $stmt = $this->conn->query("
            SELECT
                id_fornecedor,
                nome
            FROM fornecedor
            ORDER BY nome ASC
        ");

        return $stmt->fetchAll();
    }


    // =========================
    // INSERIR
    // =========================

    public function inserir(
        int $fornecedor,
        string $mercadoria,
        string $data
    ): int
    {
        $stmt = $this->conn->prepare("
            INSERT INTO entrada_mercadoria
            (
                fornecedor,
                mercadoria,
                data
            )
            VALUES
            (
                :fornecedor,
                :mercadoria,
                :data
            )
        ");

        $stmt->execute([
            ':fornecedor' => $fornecedor,
            ':mercadoria' => $mercadoria,
            ':data' => $data
        ]);

        return (int)$this->conn->lastInsertId();
    }


    // =========================
    // ATUALIZAR
    // =========================

    public function atualizar(
        int $id,
        int $fornecedor,
        string $mercadoria,
        string $data
    ): void
    {
        $stmt = $this->conn->prepare("
            UPDATE entrada_mercadoria
            SET
                fornecedor = :fornecedor,
                mercadoria = :mercadoria,
                data = :data
            WHERE id = :id
        ");

        $stmt->execute([
            ':id' => $id,
            ':fornecedor' => $fornecedor,
            ':mercadoria' => $mercadoria,
            ':data' => $data
        ]);
    }


    // =========================
    // REMOVER
    // =========================

    public function remover(int $id): void
    {
        $stmt = $this->conn->prepare("
            DELETE FROM entrada_mercadoria
            WHERE id = :id
        ");

        $stmt->execute([
            ':id' => $id
        ]);
    }
}