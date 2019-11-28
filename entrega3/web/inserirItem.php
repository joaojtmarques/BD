<html>
	<body style="font-family:Arial; font-size:20px;">
	<h1>Local inserido com sucesso!</h1>
	<form>
  <input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
</form>
<head>
	<meta charset="UTF-8">
</head>

<?php

    $descricao = $_REQUEST['descricao'];
    $localizacao = $_REQUEST['localizacao'];
    $latitude = $_REQUEST['latitude'];
    $longitude = $_REQUEST['longitude'];
	;


	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$sql= "INSERT INTO item (descricao, localizacao, latitude, longitude) VALUES (:descricao, :localizacao, :latitude, :longitude);";
		$db->beginTransaction();

		$result=$db->prepare($sql);

		$result-> execute(array($descricao, $localizacao, $latitude, $longitude));

	 	$db->commit();
		$db=null;
	}
	catch(PDOException $e){
		$caught = true;
		echo("<p> Item nao inserido :( </p>");
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}

	if (!$caught) echo("<p> Item inserido com sucesso :) </p>");

?>

</html>