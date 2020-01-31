<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

    require_once './model/produto.php';
    require_once './database/MySQLiConnection.php';



    $con = new MySQLiConnection();

    $produto = new produto();

    if(!empty($_REQUEST["nome"]) || !empty($_REQUEST["fornecedor"])){
        $produto->setNome($_REQUEST["nome"]);
        $produto->setFonecedor($_REQUEST["fornecedor"]);
        $produto->setId($_REQUEST['id']);
    }


    
    switch ($_REQUEST['action']){
        case 1:
            if($produto->add($con, $produto->getNome(), $produto->getFonecedor())){
                $sucesso =true;

            }else{
                $sucesso =false;
            }
            break;
        case 2:
           if($produto->up($con,$produto->getId(),$produto->getNome(),$produto->getFonecedor())){
                $sucesso =true;
            }else{
                $sucesso =false;
            }

            break;
        case 3:
            if(!empty($_REQUEST['id'])){
                if($produto->delete($con,$_REQUEST['id'])){
                    $sucesso =true;
                }else{
                    $sucesso =false;
                }
            }
            break;
    }

    if($sucesso==true){
        $data = array(
            "sucesso" => true
        );
    }else{
        $data = array(
            "sucesso" => false
        );
    }

    $con->close();
//    echo json_encode($data);
?>

<<a href="lista.php">Voltar</a>
