<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">			

		<title> caminhadas </title>

	</head>

	<body class="corpo">
		<h1>Sistema de Dados </h1>
		<h3>Listagem de dados</h3>
		
		<?php
			// 1. Abrir conexão com MYSQL

			$servidor="localhost";
			$usuario="root";
			$senha="";
			$banco="caminhada";
			
			$conexao = mysqli_connect($servidor, $usuario, $senha);
			
			//$conexao2 = mysqli_connect("meuservidor", "adm", "123");
			// 2. Abrir/selecionar o banco de dados

			$ok = mysqli_select_db($conexao, $banco);
			
			//  caso a conexão estaja ok

			if(!$ok)
			{
				die("Erro na seleção do banco:" . mysqli_error($conexao) );
			}

			// 3. Inserir o comando de seleção de dados numa variável

			$comandoSQL = "SELECT * FROM caminhadas ORDER BY id";
			
			// 4. Enviar (o comando SQL) a variável p/ o MYSQL
			$registros = mysqli_query($conexao,  $comandoSQL);
			
			// $registros é objeto do tipo record set 
			// (conjunto de registros)
			/*
				Meu $registros:		
				
			*/
			echo "<hr>";
			// 5. Contar o número de linhas / registros do meu record set
			$linhas = mysqli_num_rows($registros);
			
			// Se tabela/cadastro estiver vazio (linhas=0), 
			// interrompo o programa/página

			if($linhas<1)
			{
				// Minha tabela vazia.
				// Vamos interromper e avisar o usuário
				die("Cadastro dos dados está vazio. Sistema Finalizado!");
			}
			echo "<b>$linhas</b> trechos encontrados <br><br>";
			
			// 6. Acessar o objeto record set, e, para cada linha encontrada
			// (cada registro), mostrar seus dados na tela
			
			// Pegar todas as linhas de dentro de $registros 
			// usando mysqli_fetch_array() com uma estrutura de 
			// repetição (loop)			
			
			// Antes da repetição
			// Criar uma tabela HTML
			echo "<table border='1.5'>";
			
			//  e criar a 1a linha de títulos
			echo " <tr bgcolor='lightblue'>";
			echo "	<th> Id </th>";
			echo "	<th> dia </th>";
			echo "	<th> nome </th>";
			echo "	<th> peso </th>";
			echo "	<th> tipo </th>";
			echo "	<th> hora de saida </th>";
			echo "	<th> distancia </th>";
			echo "	<th> resultado </th>";	
			echo "	<th> obs </th>";
			echo "	<th colspan='2'> Ações </th>";
			echo "</tr>";		

			// variável p/ controlar a zebra
			
			$zebra=false;
			
			for($n=1; $n<=$linhas; $n++)
			{
				
			// Puxando uma linha de $registros
			// para dentro da matriz $dados
			$dados = mysqli_fetch_array($registros);
				
			// Colocando os dados da linha lida de registros, em variáveis
			$id		 	= $dados["id"] ;
			$dia	 	= $dados["dia"];
			$nome 	 	= $dados["nome"];
			$quilos 	= $dados["quilos"];
			$tipo 		= $dados["tipo"];
			$horaSaida 	= $dados["horaSaida"];
			$distancia	= $dados["distancia"];
			$resultado	= $dados["resultado"];
			$obs  		= $dados["obs"];				
				
			// Exibindo $dados das variáveis
			// criar uma linha para ser exibido
			if($zebra)
				echo "<tr bgcolor='white'>";
			else
				echo "<tr>";
				echo "	<td align='center'> $id </td>";
				echo "	<td align='center'> $dia </td>";
				echo "	<td align='center'> $nome </td>";
				echo "	<td align='center'> $quilos </td>";
				echo "	<td align='center'> $tipo </td>";
				echo "	<td align='center'> $horaSaida </td>";
				echo "	<td align='center'> $distancia </td>";
				echo "	<td align='center'> $resultado </td>";				
				echo "	<td align='center'> $obs </td>";
					
				echo "	<td align='center'> <a href='excluirDados.php?id=$id&dia=$dia'> <img src=' ' alt='excluir dia $dia' title='excluir $dia'> </a> </td>";
				echo "</tr>";
				
				$zebra = !$zebra; // inverter a zebra
			}

			echo "</table>";			
		?>

		<hr>		
		<br> Clique <a href="index.html">aqui</a> para cadastrar uma nova camminhada<br>
    	<br> Clique <a href="listagem.php">aqui</a> para listar os dados cadastrados<br>
	</body>
</html>