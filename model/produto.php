<?php

class produto
{
  private $id;
  private $nome;
  private $fornecedor;


  public function __construct($id =null,$nome =null,$fornecedor=null)
  {
    $this->id=$id;
    $this->nome=$nome;
    $this->fornecedor=$fornecedor;
  }

  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id=$id;
  }
  public function getNome(){
    return $this ->nome;

  }
  public function setNome($nome){
    $this->nome=$nome;
  }

  public function getFonecedor(){
    return $this->fornecedor;
  }

  public function setFonecedor($fornecedor){
    $this->fornecedor=$fornecedor;
  }


  public function add($con,$nome,$fornecedor){
    if(empty($nome)|| empty($fornecedor)){
      return false;
    }

    $query = "INSERT INTO produto (nome,fornecedor) VALUES('{$nome}','{$fornecedor}')";


    if($con->query($query)){
      return true;
  }else{
      return false;
  }

  }
  public function listaProduto($con){

    $query = "SELECT * FROM produto";
    $obj =$con->query($query);


    return $obj;

  }
  public function infoProduto($con,$id){

  $query ="SELECT * FROM produto WHERE idproduto={$id};";
    $obj=$con->query($query);

    return $obj;



  }
  public function delete($con,$id){
      $query ="DELETE FROM produto where idproduto = {$id}";

      if($con->query($query)){
        return true;
      }else{
        return false;
      }
  }

  public function up($con, $id, $nome, $fornecedor){
      try {
          $query = "UPDATE produto SET nome='{$nome}', fornecedor='{$fornecedor}' WHERE idproduto = {$id}";
          if($con->query($query)){
              return true;
          }
          return false;
      }catch (mysqli_sql_exception $e){
          echo $e->getMessage();
          return false;
      }



  }

}





?>