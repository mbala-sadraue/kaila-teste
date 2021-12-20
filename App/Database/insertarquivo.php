<?php 
  require_once "../Models/arquivo.php";
  if((isset($_POST["acao"]) && $_POST["acao"]== "cadastroBalanco") && (isset($_POST["file"]) && $_POST["file"] == "fileBalanco")){
    if(isset($_FILES["arq_txt_balanco"]) && $_FILES["arq_txt_balanco"]["name"] != null){
     
      $dadosText = $_FILES["arq_txt_balanco"];
      $arq_tpm =$dadosText["tmp_name"];
      $extensao   = pathinfo($dadosText["name"],PATHINFO_EXTENSION);
      $arq_tpm;
      $explodeText       = explode(".", $dadosText["name"]);
      $nomeText          = $explodeText[0];
      define('UPLOAD_DIRECTORY_FILE',__DIR__.'../../../upload/txt/');
      
      $_["path"] = UPLOAD_DIRECTORY_FILE;
      if(!is_dir($_["path"])){
          mkdir($_["path"],0777,true);
      }
      if(move_uploaded_file($arq_tpm,$_["path"].$nomeText)){
         $arquivo = new Arquivo();
          if($abrindoArqText = fopen($_["path"].$nomeText,"r")){
           
          $datas = date("Y-m-d h:i:s");
          $c = 1;
        while (!feof($abrindoArqText)) {
          $linha = fgets($abrindoArqText);
         if($c ==1){
            $itens = array(trim(substr($linha, 3, 34)), trim(substr($linha, 37, 4)), trim(substr($linha, 41, 10)), trim(substr($linha, 51, 14)), trim(substr($linha, 62, 19)));

         }else{
          $itens = array(trim(substr($linha,0,34)), trim(substr($linha, 34, 4)),trim(substr($linha, 38, 10)),trim(substr($linha, 48, 14)), trim(substr($linha, 62, 19)));
         }
        
          $bi = $itens[0];
          $valor = ($itens[2]/100);
          $dono = $itens[3];
          $empresa = $itens[4];   
          $dados =  array(1=>$valor,$bi,$dono,$empresa,$datas,$datas);
          $c++;
          
          $arquivo->cadastraTexto($dados);
        
        }
          }
      }

    }else{
      header("location:../../");
    }
  } elseif ((isset($_GET["acao"]) && $_GET["acao"] == "delete") && (isset($_GET["id"]) && $_GET["id"]>0)){

    $arquivo = new Arquivo();
    $id = $_GET["id"];
    $arquivo->deleteleRegistroFinanceiro($id);
  }elseif ((isset($_POST["acao"]) && $_POST["acao"] == "EditarRegistroBalanco") && (isset($_POST["idFinanca"]) && $_POST["idFinanca"]>0)){

    $arquivo = new Arquivo();
    $id = $_POST["idFinanca"];
    $donoLoja = $_POST["dono_loja"];
    $loja = $_POST["nome_loja"];
    $bi = $_POST["bi"];
    $valor = ($_POST["valor"]/100);
  $data = date("Y-m-d h:i:s");
//`ValorMovimento`=?,`BI`=?,`NomeDonoLoja`=?,`NomeLoja`=?,`,`Updated_at` = ? WHERE idF = ?
  $dados = array(1=>$valor,2=>$bi,$donoLoja,$loja,$data,$id);
  $arquivo->utualizarDadosFinanceiro($dados);

   
}else{
    header("location:../../");
  }
















?>