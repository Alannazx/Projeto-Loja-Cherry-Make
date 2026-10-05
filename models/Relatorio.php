<?php

require_once __DIR__ . '/../config/db.php';

class Relatorio
{
    private PDO $db;
    private string $table = 'relatorios';

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
     * Busca somente usuários com perfil ADMIN.
     */
    public function listarAdmins(): array
    {
        $sql = "
            SELECT id, nome
            FROM usuario
            WHERE perfil = 'admin'
            ORDER BY nome ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Cria um novo relatório.
     */
    public function criar(
        int $usuarioId,
        string $data,
        string $relatorio
    ): bool {

        if ($usuarioId <= 0) {
            throw new InvalidArgumentException(
                'Usuário inválido.'
            );
        }

        if (empty($data)) {
            throw new InvalidArgumentException(
                'A data do relatório é obrigatória.'
            );
        }

        if (trim($relatorio) === '') {
            throw new InvalidArgumentException(
                'O relatório não pode ficar vazio.'
            );
        }

        $sql = "
            INSERT INTO {$this->table}
            (
                usuario_id,
                data,
                relatorio
            )
            VALUES
            (
                :usuario_id,
                :data,
                :relatorio
            )
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':usuario_id' => $usuarioId,
            ':data'      => $data,
            ':relatorio' => trim($relatorio)
        ]);
    }

    /**
     * Lista todos os relatórios.
     */
    public function listarTodos(): array
    {
        $sql = "
            SELECT
                r.id,
                r.usuario_id,
                r.data,
                r.relatorio,
                r.created_at,
                u.nome AS usuario_nome
            FROM {$this->table} r
            INNER JOIN usuario u
                ON u.id = r.usuario_id
            ORDER BY
                r.data DESC,
                r.created_at DESC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Exclui um relatório.
     */
    public function excluir(int $id): bool
    {
        if ($id <= 0) {
            return false;
        }

        $sql = "
            DELETE FROM {$this->table}
            WHERE id = :id
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}