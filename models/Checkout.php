<?php

class Checkout
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /*
    |--------------------------------------------------------------------------
    | BUSCAR CLIENTE LOGADO
    |--------------------------------------------------------------------------
    */

    public function buscarCliente(int $id): ?array
    {
        $sql = "
            SELECT
                id,
                nome,
                cpf,
                telefone,
                email,
                cep,
                senha,
                data_nascimento
            FROM cliente
            WHERE id = :id
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        return $cliente ?: null;
    }


    /*
    |--------------------------------------------------------------------------
    | CALCULAR FRETE
    |--------------------------------------------------------------------------
    |
    | Abaixo está uma integração preparada para o Melhor Envio.
    |
    | Você deverá colocar seu token em config/frete.php
    |
    */

    public function calcularFrete(array $dados): array
    {
        /*
         * IMPORTANTE:
         * O Melhor Envio necessita de token e dos dados
         * da origem da loja.
         */

        $arquivoConfig = __DIR__ . '/../config/frete.php';

        if (!file_exists($arquivoConfig)) {

            return [
                'sucesso' => false,
                'mensagem' => 'Configuração do frete não encontrada.'
            ];
        }

        require $arquivoConfig;

        if (
            empty($MELHOR_ENVIO_TOKEN) ||
            empty($CEP_ORIGEM)
        ) {

            return [
                'sucesso' => false,
                'mensagem' => 'API de frete ainda não configurada.'
            ];
        }

        $cepDestino = preg_replace(
            '/[^0-9]/',
            '',
            $dados['cep'] ?? ''
        );

        if (strlen($cepDestino) !== 8) {

            return [
                'sucesso' => false,
                'mensagem' => 'CEP inválido.'
            ];
        }


        /*
         * Produtos enviados para cálculo.
         *
         * Caso você ainda não tenha peso e dimensões
         * cadastrados no produto, utilizamos valores
         * padrão.
         */

        $produtos = $dados['produtos'] ?? [];

        $pesoTotal = 0;

        foreach ($produtos as $produto) {

            $quantidade = max(
                1,
                (int)($produto['quantidade'] ?? 1)
            );

            /*
             * Peso padrão de 300g por unidade.
             *
             * Depois você pode substituir pelo peso
             * cadastrado no banco.
             */

            $pesoTotal += 0.3 * $quantidade;
        }


        /*
         * API do Melhor Envio
         */

        $url = 'https://www.melhorenvio.com.br/api/v2/me/shipment/calculate';


        $dadosEnvio = [

            'from' => [
                'postal_code' => preg_replace(
                    '/[^0-9]/',
                    '',
                    $CEP_ORIGEM
                )
            ],

            'to' => [
                'postal_code' => $cepDestino
            ],

            'products' => [
                [
                    'id' => 'CHERRY',
                    'width' => 15,
                    'height' => 10,
                    'length' => 20,
                    'weight' => max($pesoTotal, 0.3),
                    'insurance_value' => (float)($dados['valor'] ?? 0),
                    'quantity' => 1
                ]
            ]
        ];


        $ch = curl_init($url);

        curl_setopt_array($ch, [

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_POST => true,

            CURLOPT_POSTFIELDS =>
                json_encode($dadosEnvio),

            CURLOPT_HTTPHEADER => [

                'Accept: application/json',

                'Content-Type: application/json',

                'Authorization: Bearer ' .
                    $MELHOR_ENVIO_TOKEN,

                'User-Agent: Cherry Make/1.0'

            ]

        ]);


        $resposta = curl_exec($ch);

        $erro = curl_error($ch);

        $httpCode = curl_getinfo(
            $ch,
            CURLINFO_HTTP_CODE
        );

        curl_close($ch);


        if ($erro) {

            return [
                'sucesso' => false,
                'mensagem' =>
                    'Não foi possível consultar o frete.'
            ];
        }


        $resultado = json_decode(
            $resposta,
            true
        );


        if (
            $httpCode < 200 ||
            $httpCode >= 300 ||
            !is_array($resultado)
        ) {

            return [
                'sucesso' => false,
                'mensagem' =>
                    'A API de frete não conseguiu calcular o envio.'
            ];
        }


        /*
         * Pegamos as opções disponíveis.
         */

        $opcoes = [];

        foreach ($resultado as $frete) {

            if (
                !isset($frete['price']) ||
                !isset($frete['name'])
            ) {
                continue;
            }

            $opcoes[] = [

                'nome' =>
                    $frete['name'],

                'valor' =>
                    (float)$frete['price'],

                'prazo' =>
                    $frete['delivery_range'] ??
                    null

            ];
        }


        if (empty($opcoes)) {

            return [
                'sucesso' => false,
                'mensagem' =>
                    'Nenhuma opção de frete encontrada.'
            ];
        }


        return [

            'sucesso' => true,

            'opcoes' => $opcoes

        ];
    }
}