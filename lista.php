<?php
    include "./padrao/head.php";
    include "./model/produto.php";
    include "./database/MySQLiConnection.php";
    ?>



<?php
$con = new MySQLiConnection();
$produto= new produto();
$objProduto =$produto->listaProduto($con);

    ?>


    <body>
  <div class="row">
      <div class="col s8">
      <table>
        <tr>

        <th>Id</th>
        <th>Nome</th>
        <th>fornecedor</th>

        </tr>
  <?php
    foreach($objProduto as $produto){
    ?>

        <tr>
          <input type="hidden"class ="id_produto"></input>
          
          <td><?php  echo $produto['idproduto']?></td>
          <td><?php  echo $produto['nome']?></td>
          <td><?php  echo $produto['fornecedor']?></td>
          <td><a href="editar.php?action=2&id=<?php  echo $produto['idproduto']?>">editar</a></td>
          <td><a href="persistance.php?action=3&id=<?php  echo $produto['idproduto']?>">deletar</a></td>

        </tr>
  <?php
    }
    ?>
      </table>
      </div>
    </div>
    </body>