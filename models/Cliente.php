<?php

require_once __DIR__ . '/../config/db.php';

class Cliente
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }


    // =====================================================
    // CADASTRAR CLIENTE
    // =====================================================

    public function cadastrar(
        string $nome,
        string $cpf,
        string $telefone,
        string $email,
        string $cep,
        string $senha,
        string $dataNascimento
    ): bool {

        $sql = "
            INSERT INTO cliente
            (
                nome,
                cpf,
                telefone,
                email,
                cep,
                senha,
                data_nascimento
            )
            VALUES
            (
                :nome,
                :cpf,
                :telefone,
                :email,
                :cep,
                :senha,
                :data_nascimento
            )
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':telefone' => $telefone,
            ':email' => $email,
            ':cep' => $cep,
            ':senha' => $senha,
            ':data_nascimento' => $dataNascimento
        ]);
    }


    // =====================================================
    // VERIFICAR EMAIL
    // =====================================================

    public function buscarPorEmail(string $email): ?array
    {
        $sql = "
            SELECT *
            FROM cliente
            WHERE email = :email
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        return $cliente ?: null;
    }


    // =====================================================
    // VERIFICAR CPF
    // =====================================================

    public function buscarPorCpf(string $cpf): ?array
    {
        $sql = "
            SELECT *
            FROM cliente
            WHERE cpf = :cpf
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':cpf' => $cpf
        ]);

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        return $cliente ?: null;
    }


    // =====================================================
    // LOGIN POR EMAIL OU CPF
    // =====================================================

    public function buscarPorLogin(string $login): ?array
    {
        $sql = "
            SELECT *
            FROM cliente
            WHERE email = :login
               OR cpf = :login
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':login' => $login
        ]);

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        return $cliente ?: null;
    }
}