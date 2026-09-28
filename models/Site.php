<?php

require_once __DIR__ . '/../config/db.php';

class Site
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Lista as categorias ativas cadastradas na tabela categoria.
     */
    public function listarCategorias(): array
    {
        $sql = "SELECT id, nome, ativo
                FROM categoria
                WHERE ativo = 1
                ORDER BY nome ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
