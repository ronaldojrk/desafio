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
    <form class="col s6" action="persistance.php" type="post">
      <div class="row">
        <div class="input-field col s6">
            <input type="hidden" id="action" name="action" value="2">
            <input type="hidden" id="id" name="id" value="<?= $produto['idproduto']?>">
          <input id="nome" name="nome" type="text" class="validate"value="<?php echo $produto['nome'] ?>" required>
          <label for="nome">nome</label>
        </div>
        <div class="input-field col s6">
          <input id="fornecedor" name="fornecedor" type="text" class="validate"  value="<?php echo$produto['fornecedor'] ?>"required>
          <label for="fornecedor">Fornercedor</label>
        </div>
      </div>
      <button id="register-submit" class="btn waves-effect waves-light" type="submit">alterar</button>
    </form>
  </div>

    </div>

<?php
  }
?>
 
    </body>