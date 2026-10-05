<?php

class CheckoutController
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /*
    |--------------------------------------------------------------------------
    | PÁGINA DE PAGAMENTO
    |--------------------------------------------------------------------------
    */

    public function index(): void
    {
        $cliente = null;

        /*
         * Se houver cliente logado, podemos aproveitar
         * os dados dele futuramente.
         *
         * Mas NÃO bloqueamos o acesso à página.
         */

        if (!empty($_SESSION['cliente_id'])) {

            $model = new Checkout($this->db);

            $cliente = $model->buscarCliente(
                (int)$_SESSION['cliente_id']
            );
        }

        require __DIR__ . '/../views/pagamento.php';
    }


    /*
    |--------------------------------------------------------------------------
    | CALCULAR FRETE
    |--------------------------------------------------------------------------
    */

    public function frete(): void
    {
        header(
            'Content-Type: application/json; charset=utf-8'
        );

        $cep =
            $_POST['cep'] ?? '';

        $valor =
            (float)(
                $_POST['valor'] ?? 0
            );

        $produtos = [];

        if (!empty($_POST['produtos'])) {

            $produtosRecebidos =
                json_decode(
                    $_POST['produtos'],
                    true
                );

            if (is_array($produtosRecebidos)) {

                $produtos =
                    $produtosRecebidos;

            }
        }

        $model =
            new Checkout($this->db);

        $resultado =
            $model->calcularFrete([

                'cep' => $cep,

                'valor' => $valor,

                'produtos' => $produtos

            ]);

        echo json_encode(
            $resultado,
            JSON_UNESCAPED_UNICODE
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | FINALIZAR
    |--------------------------------------------------------------------------
    */

    public function finalizar(): void
    {
        $_SESSION['compra_finalizada'] = true;

        header(
            'Location: /lojacosmeticos_alalet/index.php?controller=checkout&action=index&sucesso=1'
        );

        exit;
    }
}