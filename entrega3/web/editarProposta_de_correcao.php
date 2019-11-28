<html>
	<body style="font-family:Arial; font-size:20px;">
	<form>
  <input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
</form>
<head>
	<meta charset="UTF-8">
</head>



<?php

	$nro = $_REQUEST['nro'];
    $texto = $_REQUEST['texto'];

	try
	{


		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$sql= "UPDATE proposta_de_correcao SET texto=:texto WHERE nro=:nro; ";
		$db->beginTransaction();
		$result = $db->prepare($sql);

    $result->execute(array($texto,$nro));

    $db->commit();

		$db=null;


	}
	catch(PDOException $e){
		$caught = true;
		echo("<p> Proposta nao editada :( </p>");
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}

	if (!$caught) echo("<p> Proposta editada com sucesso :) </p>");
?>
</body>
</html>