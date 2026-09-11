<?php

class Venda
{
    private PDO $db;
    private string $table = 'vendas';

    public function __construct(PDO $db)
    {
        $this->db = $db;

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
     * Registra uma nova venda.
     *
     * O created_at NÃO é enviado.
     * O banco registra automaticamente a data e horário.
     */
    public function criar(
        string $data,
        int $quantidade,
        int $produtoId,
        int $vendedorId
    ): bool {

        if ($quantidade < 1) {
            throw new InvalidArgumentException(
                'A quantidade deve ser maior que zero.'
            );
        }

        if ($produtoId < 1) {
            throw new InvalidArgumentException(
                'Produto inválido.'
            );
        }

        if ($vendedorId < 1) {
            throw new InvalidArgumentException(
                'Vendedor inválido.'
            );
        }

        $sql = "
            INSERT INTO {$this->table}
            (
                data,
                quantidade,
                produto_id,
                vendedor_id
            )
            VALUES
            (
                :data,
                :quantidade,
                :produto_id,
                :vendedor_id
            )
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':data' => $data,
            ':quantidade' => $quantidade,
            ':produto_id' => $produtoId,
            ':vendedor_id' => $vendedorId
        ]);
    }

    /**
     * Retorna todas as vendas.
     *
     * Também busca o nome do produto
     * e o nome do vendedor.
     */
    public function listarTodos(): array
    {
        $sql = "
            SELECT
                v.id,
                v.data,
                v.quantidade,
                v.created_at,

                v.produto_id,
                p.nome AS produto_nome,

                v.vendedor_id,
                u.nome AS vendedor_nome

            FROM {$this->table} v

            LEFT JOIN produto p
                ON p.id = v.produto_id

            LEFT JOIN usuario u
                ON u.id = v.vendedor_id

            ORDER BY
                v.data DESC,
                v.created_at DESC,
                v.id DESC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Retorna todas as vendas de determinado mês.
     */
    public function listarPorMes(string $mes): array
    {
        if (!preg_match('/^\d{4}-\d{2}$/', $mes)) {
            throw new InvalidArgumentException(
                'Mês inválido. Use o formato YYYY-MM.'
            );
        }

        $sql = "
            SELECT
                v.id,
                v.data,
                v.quantidade,
                v.created_at,

                v.produto_id,
                p.nome AS produto_nome,

                v.vendedor_id,
                u.nome AS vendedor_nome

            FROM {$this->table} v

            LEFT JOIN produto p
                ON p.id = v.produto_id

            LEFT JOIN usuario u
                ON u.id = v.vendedor_id

            WHERE DATE_FORMAT(v.data, '%Y-%m') = :mes

            ORDER BY
                v.data DESC,
                v.created_at DESC,
                v.id DESC
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':mes' => $mes
        ]);

        return $stmt->fetchAll();
    }

    /**
     * Total de vendas de determinado mês.
     */
    public function totalPorMes(string $mes): int
    {
        if (!preg_match('/^\d{4}-\d{2}$/', $mes)) {
            throw new InvalidArgumentException(
                'Mês inválido. Use o formato YYYY-MM.'
            );
        }

        $sql = "
            SELECT COALESCE(SUM(quantidade), 0)
            FROM {$this->table}
            WHERE DATE_FORMAT(data, '%Y-%m') = :mes
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':mes' => $mes
        ]);

        return (int) $stmt->fetchColumn();
    }

    /**
     * Total geral de vendas.
     */
    public function total(): int
    {
        $sql = "
            SELECT COALESCE(SUM(quantidade), 0)
            FROM {$this->table}
        ";

        return (int) $this->db
            ->query($sql)
            ->fetchColumn();
    }

    /**
     * Busca uma venda pelo ID.
     */
    public function buscarPorId(int $id): ?array
    {
        $sql = "
            SELECT
                v.id,
                v.data,
                v.quantidade,
                v.created_at,

                v.produto_id,
                p.nome AS produto_nome,

                v.vendedor_id,
                u.nome AS vendedor_nome

            FROM {$this->table} v

            LEFT JOIN produto p
                ON p.id = v.produto_id

            LEFT JOIN usuario u
                ON u.id = v.vendedor_id

            WHERE v.id = :id

            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

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

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->rowCount() > 0;
    }

    /**
     * Atualiza uma venda.
     */
    public function atualizar(
        int $id,
        string $data,
        int $quantidade,
        int $produtoId,
        int $vendedorId
    ): bool {

        if ($quantidade < 1) {
            throw new InvalidArgumentException(
                'A quantidade deve ser maior que zero.'
            );
        }

        $sql = "
            UPDATE {$this->table}
            SET
                data = :data,
                quantidade = :quantidade,
                produto_id = :produto_id,
                vendedor_id = :vendedor_id
            WHERE id = :id
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id' => $id,
            ':data' => $data,
            ':quantidade' => $quantidade,
            ':produto_id' => $produtoId,
            ':vendedor_id' => $vendedorId
        ]);

        return $stmt->rowCount() > 0;
    }

    /**
     * Lista os produtos cadastrados.
     */
    public function listarProdutos(): array
    {
        $sql = "
            SELECT
                id,
                nome
            FROM produto
            WHERE ativo = 1
            ORDER BY nome ASC
        ";

        return $this->db
            ->query($sql)
            ->fetchAll();
    }

    /**
     * Lista os vendedores/usuários cadastrados.
     */
    public function listarVendedores(): array
    {
        $sql = "
            SELECT
                id,
                nome
            FROM usuario
            ORDER BY nome ASC
        ";

        return $this->db
            ->query($sql)
            ->fetchAll();
    }
}
