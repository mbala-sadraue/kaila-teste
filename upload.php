<?php 
$title = "upload de arquivo";
require_once "layout/layout.php";
echo $head;
?>
<div id="section-upload">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-3">
        <form action="App/Database/insertarquivo.php" method="post" id="formulario" enctype="multipart/form-data">
          <div class="my-2">
            <label for="" class="form-label">Inseri o arquivo .txt</label>
            <input type="file" name="arq_txt_balanco" class="form-control required">
          </div>
          <!-----
          <div class="my-2">
            <label for="" class="form-label">Inseri o arquivo .txt</label>
            <select name="tipos_transiccao" class="form-control required">


              <option value="1"> Débito</option>
              <option value="2"> Boleto</option>
              <option value="2"> Financiamento</option>
              <option value="1"> Crédito</option>
              <option value="1"> Recebimento Empréstimo</option>
              <option value="1"> Vendas</option>
              <option value="1"> Recebimento TED</option>
              <option value="1"> Recebimento DOC</option>
              <option value="2"> Aluguel</option>
            </select>
          
          </div>
        -->
          <input type="hidden" name="file" value="fileBalanco">
          <button type="submit" class="btn btn-danger" name="acao" value="cadastroBalanco">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
echo $footer;

?>
  