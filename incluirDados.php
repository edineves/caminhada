<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

		<title> Inclusão de dados da caminhada </title>
		
		<link rel="stylesheet" href="assets/reset.css">
    	<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    	<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link rel="stylesheet" href="assets/estilos/estilos.css">
    	<link rel="stylesheet" href="excluirDados.php">
    	<link rel="stylesheet" href="listagem.php">
    	<link rel="stylesheet" href="incluirDados.php">    
	</head>
	<body class="corpo">
		<h1> Sistema de Dados </h1>
		<h3> incluir os dados da caminhada </h3>

		<?php			
			// Variável			
			// 1. Receber os dados do formulário em variáveis

			$dia		= $_GET["dia"] ;
			$nome 		= $_GET["nome"] ;
			$quilos	 	= $_GET["quilos"] ;
			$tipo	 	= $_GET["tipo"] ;
			$horaSaida	= $_GET["horaSaida"] ;
            $tempo		= $_GET["tempo"] ;
			$distancia	= $_GET["distancia"] ;		
			$obs		= $_GET["obs"] ;    
			
			// 2. Validar alguns dados básicos		
			
			
			if ($dia=="") 
			{
				die("O<b>dia</b> deve ser informado. Sistema interrompido.");
			}
			
			if ($nome=="")
			{
				die("O <b>nome</b> deve ser informado. Sistema interrompido.");
			}
			
			if ($quilos=="")
			{
				die("informe a <b>quilos</b> válida. Sistema interrompido.");
			}

			if ($tipo=="")
			{
				die("Informe <b>tipo</b> válida. Sistema interrompido.");
			}

            if ($horaSaida=="")
			{
				die("Informe  <b>horaSaida</b> válida. Sistema interrompido.");
			}

            if ($tempo="")
			{
				die("Escolha um <b>tempo</b> válida. Sistema interrompido.");
			}

            if ($distancia=="")
			{
				die(" Informe <b>distancia</b> válida. Sistema interrompido.");
			}

            if ($obs=="")
			{
				die("Informe <b>obs</b> válido. Sistema interrompido.");
			}
			
			// 3 - Exibindo os dados vindos do formulário
			echo "data da caminhada <b>$dia</b><br>";
			echo "nome do atleta <b>$nome</b><br>";
			echo "quantos quilos no inicio do exercicio: <b>$quilos</b><br>";
			echo "tipo de exercicio: <b>$tipo</b><br>";
			echo "hora do inincio da caminhada: <b>$horaSaida</b><hr>";
            echo "tempo de percurso: <b>$tempo</b><br>";
			echo "distancia percorrida: <b>$distancia</b><br>";		
			echo "Observações quanto ao percurso: <b>$obs</b><br>";
		
			
			// 4 - Abrindo o banco de dados
			// .1- Conexão com o servidor			
			
			$con = mysqli_connect("localhost","root","");
			
			// .2 - Abertura do banco de dados

			
			mysqli_select_db($con,"caminhada") or 
				die(
					"Erro na abertura do banco de dados!: <br>" .
					mysqli_error($con)
				);
			
			// 5 - Tentativa de inserção de registro
			// .1 - Criação da variável com o comando de inserção SQL
			
			$sql="INSERT INTO caminhadas (	
						dia, 
                        nome, 
                        quilos, 
                        tipo, 
                        horaSaida, 
                        tempo,
                        distancia,                        
                        obs					
                        ) VALUES(
						'$dia', 
						'$nome',  
						'$quilos',  
						'$tipo',
                        '$horaSaida', 
						'$tempo',  
						'$distancia', 					                
						'$obs' )";
			
			// Visualizar o comando e testar p/ ver se não está com erros
			
			
			mysqli_query($con, $sql) or 
				die(
					"Houve um problema para cadastrar os dados:<br>" . 
						mysqli_error($con)
				);
			
			echo "caminhadas <b>$dia</b> incluído com sucesso!";	
			
		?>
		<hr>		   
    	<br> Clique <a href="index.html">aqui</a> para cadastrar uma nova camminhada<br>
    	<br> Clique <a href="listagem.php">aqui</a> para listar os dados cadastrados<br>	
	</body>
</html> 