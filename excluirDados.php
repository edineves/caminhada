<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	  

    <title> caminhadas  </title>    

</head>
<body class="corpo">
		<h1> Gerencial </h1>
		<h3> Exclusão da caminhada </h3>
		<hr>
		<?php
			/* 
				Receber um id da página de listagem, e realizar a 
				exclusão conforme id informado.				
		
				======
				1 - Verificar se foi enviado o objeto "id" via método GET
					- Se não foi enviado, avisar usuário e encerrar o programa
				2 - Abrir conexão com MYSQL
				3 - Abrir o banco de dados
				4 - Montar comando de exclusão ( variável )
				5 - Enviar comando p/ MYSQL
				6 - Informar resultado obtido
			*/
			
			
			// 1 - Verificar se foi enviado o objeto "id" via método GET

			if(!isset($_GET["id"]))
			{
				// - Se não foi enviado, avisar usuário e encerrar o programa
				die("A página foi chamada de forma incorreta. Sistema encerrado.");
			}
			
			//  enviado para uma variável, assim facilia 
            
			$id = $_GET["id"];
			
			// 2 - Abrir conexão com servidor MYSQL
			$con = mysqli_connect("localhost", "root", "");
			
			// 3 - Abrir o banco de dados
			mysqli_select_db($con, "caminhada") or 
				die(
					"Erro na abertura do banco de dados:<br>" . mysqli_error($con)
				);
			
			// 4 - Montar comando de exclusão

			$sql = "DELETE FROM caminhadas WHERE id=$id";
			
			// - Exibir o comando na tela
			// die($sql);
			
			// 5 - Enviar comando p/ MYSQL
			mysqli_query($con, $sql) or 
				die(
					"Erro exclusão da caminhada:<br>" . mysqli_error($con)
				);
			// aqui é porque conseguiu excluir
			echo "Dados da caminhada <b>$id</b> excluído com sucesso!";
		?>
		<hr>
		<br> Clique <a href="index.html">aqui</a> para cadastrar uma nova camminhada<br>
    	<br> Clique <a href="listagem.php">aqui</a> para listar os dados cadastrados<br>
	</body>
</html>



