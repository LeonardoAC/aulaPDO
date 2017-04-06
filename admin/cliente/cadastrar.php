<?php
/*
	cadastrar.php
	By Leonardo Alves Carrilho
	27/01/2017
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Curso PDO</title>
</head>
<body>
	<div style="margin: 5% auto; width: 40%;">
		<form action="form-horizontal" name="cliente" id="cliente" method="post" action="" enctype="multipart/form-data">
			<h3>Cadastro de cliente</h3>
			<div class="form-group">
				<input type="text" name="txtnome" class="form-control" id="inputEmail3" placeholder="Nome completo">
			</div>
			<div class="form-group">
				<input type="text" name="txtemail" class="form-control" id="inputEmail3" placeholder="e-Mail">
			</div>
			<div class="form-group">
				<button type="submit" name="btnenviar" class="btn btn-default">cadastrar</button>
			</div>
		</form>
	</div>
</body>
</html>

<?php
	// extrai os componentes do form
	extract($_POST, EXTR_OVERWRITE);
	// verifica se o botao foi pressionado
	if (isset($btnenviar)){
		// inclui a class Cliente
		 includ_once '../class/Cliente.php';
		// cria um novo objeto
		$cli = new Cliente();
		// enviar os dados do form via set para os atributos private
		$cli->setNome($txtnome);
		$cli->setEmail($txtemail);
		// executa o método, mostrando o return em um H3
		echo "<h3>".$cli->salvar()."</h3>";
	}
?>