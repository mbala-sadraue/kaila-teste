<?php 
  /**
   * 
   */

  require_once "connection.php";
  class Arquivo extends Connected
  {
  	// CADASTRA OS REGISTROS FINANCEIRO
  	public function cadastraTexto ($dados = array())
  	{
  		try {
  			
  			$cadastra = $this->con->prepare("INSERT INTO financeira VALUES(DEFAULT,?,?,?,?,?,?)");

  			foreach ($dados as $k => $v) {
  				$cadastra->bindValue($k,$v);	
  			}
  			$cadastra->execute();

  			if($cadastra->rowCount()==1)
  			{
  				header("location:../../");
  			}else{
				header("location:../../");
  			}
  		} catch (PDOException $e){
  			echo "Erro ".$e->getMessage();
  			
  		}
  	}

//LISTAR INFORMAÇÕES DE CONTAS FINCEIRO
	public function listarArquivoFinanceiro()
	{
		$listar = $this->con->prepare("SELECT * FROM `financeira` WHERE 1");
		$listar->execute();
		if($listar->rowCount()>0){
			$dados = $listar->fetchall(PDO::FETCH_OBJ);
			return $dados;
		}else{
			return 0;
		}
		try {
		} catch (PDOException $e) {
			echo "Erro" . $e->getMessage();
		}
	}

// DELETA O REGISTRO NA ENTIDADE FINANCEIRO
	public function deleteleRegistroFinanceiro($id)
	{
		$del = $this->con->prepare("DELETE FROM `financeira` WHERE idF = ?");
		$del->bindValue(1,$id);
		$del->execute();
		if ($del->rowCount()==1) {
			header("location:../../");
		} else {
		header("location:../../");
		}
		try {
		} catch (PDOException $e) {
			echo "Erro" . $e->getMessage();
		}
	}

// BUSCA OS DADOS FUNANCEIRO PELO ID 
	public function buscaDadoFinanceiro($id)
	{
		$listar = $this->con->prepare("SELECT * FROM `financeira` WHERE `idF` = ?");
		$listar->bindValue(1,$id);
		$listar->execute();
		if($listar->rowCount()==1){
			$dados = $listar->fetchAll(PDO::FETCH_OBJ);
			return $dados;
		}else{
			return 0;
		}
		try {
		} catch (PDOException $e) {
			echo "Erro" . $e->getMessage();
		}
	}


	// ACTUALIZAR OS REGISTROS FINANCEIRO
	public function utualizarDadosFinanceiro($dados = array())
	{
		try {

			$cadastra = $this->con->prepare("UPDATE `financeira` SET ValorMovimento=?,BI=?,NomeDonoLoja=?,NomeLoja=?,`Updated_at` = ? WHERE idF = ?");

			foreach ($dados as $k => $v) {
				$cadastra->bindValue($k, $v);
			}
			$cadastra->execute();

			if ($cadastra->rowCount() == 1) {
				header("location:../../");
			} else {
				header("location:../../");
			}
		} catch (PDOException $e) {
			echo "Erro " . $e->getMessage();
		}
	}
	}


