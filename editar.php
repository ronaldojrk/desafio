<?php
    include "./padrao/head.php";
    include "./database/MySQLiConnection.php";
    include "./model/produto.php";

    if (!empty($_REQUEST['action'])){
      ?>
          <input type="hidden" value="<?php echo $_REQUEST['id']?>" id="requestaction">
          <script>
              $(document).ready(function() {
                  console.log($('#requestaction').val());
                  var id =$('#requestaction').val();
                  
              });
          </script>
      <?php
          
      }
    $con =new MySQLiConnection();
    $produto = new produto();

    $obj=$produto->infoProduto($con,$_REQUEST['id']);
    print_r($obj);
    //echo $obj[0]['nome'];

    //$produto->infoProduto($con,$_REQUEST['id']);
    ?>

    <body>
  <?php

  foreach($obj as $produto){
?>
  <div class="constraint">
    <div class="row">
    <form class="col s6">
      <div class="row">
        <div class="input-field col s6">
          <input id="nome" type="text" class="validate"value="<?php echo$produto['nome'] ?>" required>
          <label for="nome">nome</label>
        </div>
        <div class="input-field col s6">
          <input id="fornecedor" type="text" class="validate"  value="<?php echo$produto['fornecedor'] ?>"required>
          <label for="fornecedor">Fornercedor</label>
        </div>
      </div>
      <button id="register-submit" class="btn waves-effect waves-light" type="button">alterar</button>
    </form>
  </div>

    </div>

<?php
  }
?>
 
    </body>