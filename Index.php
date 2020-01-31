
    <?php
    include "./padrao/head.php"

    ?>
    <body>
    <div class="constraint">
    <div class="row">
    <form class="col s6">
      <div class="row">
        <div class="input-field col s6">
          <input id="nome" type="text" class="validate" required>
          <label for="nome">nome</label>
        </div>
        <div class="input-field col s6">
          <input id="fornecedor" type="text" class="validate" required>
          <label for="fornecedor">Fornercedor</label>
        </div>
      </div>
      <button id="register-submit" class="btn waves-effect waves-light" type="button">enviar</button>
    </form>
  </div>

    </div>
    
      <!--JavaScript at end of body for optimized loading-->
    
    </body>

    <script>
        $(document).ready(function() {
            $('#register-submit').click(function () {
              //alert($('#nome').val());
              
                var nome = $("#nome").val();
                var fornecedor = $("#fornecedor").val();
                $.ajax({
                    url: "persistance.php",
                    data:{
                        nome: nome,
                        fornecedor:fornecedor,
                        action: 1
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
