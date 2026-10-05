<?php

session_start();

require_once __DIR__ . '/config/db.php';
Database::getConnection();


// Roteamento simples via GET
$controller = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'form';


// Carregar controller
switch ($controller) {

    case 'auth':
        require_once __DIR__ . '/controllers/AuthController.php';
        $c = new AuthController();
        break;


    // CRUD PRODUTOS
    case 'produto':
        require_once __DIR__ . '/controllers/ProdutoController.php';
        $c = new ProdutoController();
        break;


    // ENTRADAS
    case 'entrada':
        require_once __DIR__ . '/controllers/EntradaController.php';
        $c = new EntradaController();
        break;


    // VENDAS
    case 'venda':
        require_once __DIR__ . '/controllers/VendaController.php';
        $c = new VendaController();
        break;


    // RELATÓRIOS
    case 'relatorio':
        require_once __DIR__ . '/controllers/RelatorioController.php';
        $c = new RelatorioController();
        break;


    // USUÁRIO / VENDEDOR
    case 'usuario':
        require_once __DIR__ . '/controllers/UsuarioController.php';
        $c = new UsuarioController();
        break;


    // SITE OFICIAL
    case 'site':
        require_once __DIR__ . '/controllers/SiteController.php';
        $c = new SiteController();
        break;


    // CATEGORIAS
    case 'categoria':
        require_once __DIR__ . '/controllers/CategoriaController.php';
        $c = new CategoriaController();
        break;


        //FORNECEDOR
        case 'fornecedor':

            require_once 'controllers/FornecedorController.php';
        
            $c = new FornecedorController();
        
            switch ($action) {
        
                case 'index':
                    $c->index();
                    break;
        
                case 'store':
                    $c->store();
                    break;
        
                case 'delete':
                    $c->delete();
                    break;
        
                default:
                    $c->index();
                    break;
            }
        
            break;

 // CLIENTE
case 'cliente':
    require_once __DIR__ . '/controllers/ClienteController.php';
    $c = new ClienteController();
    break;

//CHECKOUT
case 'checkout':

    require_once __DIR__ . '/models/Checkout.php';
    require_once __DIR__ . '/controllers/CheckoutController.php';

    $checkoutController =
        new CheckoutController();

    $action =
        $_GET['action'] ?? 'index';


    if (method_exists(
        $checkoutController,
        $action
    )) {

        $checkoutController->$action();

    } else {

        $checkoutController->index();

    }

    break;



    // Caminho padrão caso o controller não exista
    default:
        die("Controller inválido.");
}


// Verificar se a ação existe
if (!method_exists($c, $action)) {
    die("Ação inválida.");
}


// Executar ação UMA ÚNICA VEZ
$c->$action();

?>
