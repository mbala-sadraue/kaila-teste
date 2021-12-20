<?php
$title = "Lista de registro";
require_once "layout/layout.php";
echo $head;
?>
<div id="section-upload">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 ">
        <?php
        require_once "App/Models/arquivo.php";

        $arquivo = new Arquivo();

        $dadosArquivo = $arquivo->listarArquivoFinanceiro();

        if ($dadosArquivo) {
          $dadoArquivo = new arrayIterator($dadosArquivo);
          echo '<h2> Contas financeiras</h2>
              <table class="table table-dark table-striped">

                <thead>
                  <tr>
                      <td>Dono Da loja</td>
                      <td>Nome da Loja</td>
                      <td>Numéro de BI</td>
                      <td>Valor</td>
                      <td>Ações</td>
                  </tr>
                </thead>
                <tbody>';
          $totalSaldo = 0;
          $subTotal = 0;
          while ($dadoArquivo->valid()) {

            echo '
                  <tr>
                      <td>' . $dadoArquivo->current()->NomeDonoLoja . '</td>
                      <td>' . $dadoArquivo->current()->NomeLoja . '</td>
                      <td>' . $dadoArquivo->current()->BI . '</td>
                      <td>' . number_format($dadoArquivo->current()->ValorMovimento, "2", ",", ".") . '</td>
                      <td>
                      <a href="app/Database/insertarquivo.php?acao=delete&id=' . $dadoArquivo->current()->idF . '">del</a>
                      <a href="edit.php?acao=edit&id=' . $dadoArquivo->current()->idF . '">edit</a>

                      </td>
                  <tr>
                  
                  ';
            $totalSaldo = $totalSaldo + $dadoArquivo->current()->ValorMovimento;
            $dadoArquivo->next();
          }

          echo '
                  <tr class=" " style="color:red;">
                    <td colspan="3">Total </td>
                    <td colspan="1">' . number_format($totalSaldo, "2", ",", ".") . '</td>
                    <td colspan=""></td>
                  </tr>
                          </tbody>
              </table>';
        } else {
          echo '<h3>Adicione primeiro arquivo de conta <a href="/Kaila/upload.php" class="nav-link link-activo"> arquivo</a></h3>';
        }

        echo '</div>
  </div>
</div>';

echo $footer;

?>
