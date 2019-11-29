<html>
	<body style="font-family:Arial; font-size:20px;">
	<form>
  <input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
</form>
<head>
	<meta charset="UTF-8">
</head>

<?php

    $zona = $_REQUEST['zona'];
    $imagem = $_REQUEST['imagem'];
	$lingua = $_REQUEST['lingua'];
	$ts = $_REQUEST['ts'];
    $descricao = $_REQUEST['descricao'];
	$tem_anomalia_redacao = $_REQUEST['tem_anomalia_redacao'];
	$zona2 = $_REQUEST['zona2'];
	$lingua2 = $_REQUEST['lingua2'];


	$caught = false;


	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$sql= "INSERT INTO anomalia (zona, imagem, lingua, ts, descricao, tem_anomalia_redacao) VALUES (:zona, :imagem, :lingua, :ts, :descricao, :tem_anomalia_redacao);";
		echo($sql);
		$db->beginTransaction();

		$result=$db->prepare($sql);

		$result-> execute(array($zona, $imagem, $lingua, $ts, $descricao, $tem_anomalia_redacao));

		if( strtolower($tem_anomalia_redacao) == "false") {
			$sql2= "INSERT INTO anomalia_traducao (zona2, lingua2) VALUES (:zona2, :lingua2);";
			$result2=$db->prepare($sql2);
			$result2-> execute(array($zona2, $lingua2));
		}

		$db->commit();
		$db=null;
		 
	}
	catch(PDOException $e){
		$caught = true;
		echo("<p> Anomalia nao inserida :( </p>");
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}
	
	if (!$caught) {
		echo("<p> Anomalia inserida com sucesso :) </p>");
	}

?>

</html>