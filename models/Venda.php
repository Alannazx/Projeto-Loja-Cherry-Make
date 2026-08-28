<?php

/**
 * Model de Vendas - Cherry Make
 *
 * Estrutura esperada da tabela `vendas`:
 *
 * CREATE TABLE vendas (
 *     id INT AUTO_INCREMENT PRIMARY KEY,
 *     data DATE NOT NULL,
 *     quantidade INT NOT NULL DEFAULT 1,
 *     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 * );
 */
class Venda
{
    private PDO $db;
    private string $table = 'vendas';

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Registra uma nova venda.
     */
    public function criar(string $data, int $quantidade = 1): bool
    {
        if ($quantidade < 1) {
            throw new InvalidArgumentException('A quantidade deve ser maior que zero.');
        }

        $sql = "
            INSERT INTO {$this->table} (data, quantidade)
            VALUES (:data, :quantidade)
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':data' => $data,
            ':quantidade' => $quantidade
        ]);
    }

    /**
     * Retorna todas as vendas de um determinado mês.
     *
     * $mes deve estar no formato YYYY-MM.
     */
    public function listarPorMes(string $mes): array
    {
        if (!preg_match('/^\d{4}-\d{2}$/', $mes)) {
            throw new InvalidArgumentException('Mês inválido. Use o formato YYYY-MM.');
        }

        $sql = "
            SELECT
                id,
                data,
                quantidade,
                created_at
            FROM {$this->table}
            WHERE DATE_FORMAT(data, '%Y-%m') = :mes
            ORDER BY data DESC, id DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':mes' => $mes]);

        return $stmt->fetchAll();
    }

    /**
     * Retorna a quantidade total de vendas de um mês.
     */
    public function totalPorMes(string $mes): int
    {
        if (!preg_match('/^\d{4}-\d{2}$/', $mes)) {
            throw new InvalidArgumentException('Mês inválido. Use o formato YYYY-MM.');
        }

        $sql = "
            SELECT COALESCE(SUM(quantidade), 0)
            FROM {$this->table}
            WHERE DATE_FORMAT(data, '%Y-%m') = :mes
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':mes' => $mes]);

        return (int) $stmt->fetchColumn();
    }

    /**
     * Retorna o total geral de vendas.
     */
    public function total(): int
    {
        $sql = "
            SELECT COALESCE(SUM(quantidade), 0)
            FROM {$this->table}
        ";

        return (int) $this->db->query($sql)->fetchColumn();
    }

    /**
     * Busca uma venda pelo ID.
     */
    public function buscarPorId(int $id): ?array
    {
        $sql = "
            SELECT id, data, quantidade, created_at
            FROM {$this->table}
            WHERE id = :id
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);

        $venda = $stmt->fetch();

        return $venda ?: null;
    }

    /**
     * Exclui uma venda.
     */
    public function excluir(int $id): bool
    {
        $sql = "
            DELETE FROM {$this->table}
            WHERE id = :id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->rowCount() > 0;
    }

    /**
     * Atualiza uma venda existente.
     */
    public function atualizar(int $id, string $data, int $quantidade): bool
    {
        if ($quantidade < 1) {
            throw new InvalidArgumentException('A quantidade deve ser maior que zero.');
        }

        $sql = "
            UPDATE {$this->table}
            SET data = :data,
                quantidade = :quantidade
            WHERE id = :id
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id' => $id,
            ':data' => $data,
            ':quantidade' => $quantidade
        ]);

        return $stmt->rowCount() > 0;
    }
}
