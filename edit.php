<?php

if(isset($_GET["acao"]) && isset($_GET["id"]) && $_GET["id"] > 0){
require_once "App/Models/arquivo.php";
 $id = $_GET["id"];
 
$arquivo = new Arquivo();
$dados = $arquivo-> buscaDadoFinanceiro($id);

if($dados){
$title = "editar";
require_once "layout/layout.php";
echo $head;
?>
<div id="section-upload">
  <div class="container">
    <div class="row">
      <form class="col-lg-6 offset-3" action="App/Database/insertarquivo.php" method="post">
        <?php
          $dadoArquivo = new arrayIterator($dados);
          
          while ($dadoArquivo->valid()) {

    echo '
        <div class="my-2">
            <label for="" class="form-label">Dono da Loja</label>
            <input type="text" name="dono_loja" class="form-control required" placeholder="Nome do dono da loja"
            value="'. $dadoArquivo->current()->NomeDonoLoja. '">
          </div>
          <div class="my-2">
            <label for="" class="form-label">Nome da Loja</label>
            <input type="text" name="nome_loja" class="form-control required" placeholder="Nome  da loja"
             value="' . $dadoArquivo->current()->NomeLoja . '"
            >
          </div>
          <div class="my-2">
            <label for="" class="form-label">BI</label>
            <input type="text" name="bi" class="form-control required" placeholder="Nome do dono da loja"
             value="' . $dadoArquivo->current()->BI . '">
          </div>
          <div class="my-2">
            <label for="" class="form-label">Valores</label>
            <input type="text" name="valor" class="form-control required" placeholder="Nome do dono da loja"
             value="' . $dadoArquivo->current()->ValorMovimento.'"
            >
          </div>
          
            <input type="hidden" name="idFinanca" value="'.$dadoArquivo->current()->idF.'"/>
       ';
            $dadoArquivo->next();
          }

          
echo '
      <button type="submit" class="btn btn-danger" name="acao" value="EditarRegistroBalanco">Actualizar</button>
     </form>
     </div>
  </div>
</div>';

echo $footer;
   } 
   }
?>
