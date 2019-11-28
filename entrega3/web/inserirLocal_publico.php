<html>
	<body style="font-family:Arial; font-size:20px;">
	<form>
  <input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
</form>
<head>
	<meta charset="UTF-8">
</head>

<?php

    $latitude = $_REQUEST['latitude'];
    $longitude = $_REQUEST['longitude'];
    $nome = $_REQUEST['nome'];


	;

	$caught = false;
	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$sql= "INSERT INTO local_publico (latitude, longitude, nome) VALUES (:latitude, :longitude, :nome);";
		$db->beginTransaction();

		$result=$db->prepare($sql);

		$result-> execute(array($latitude, $longitude, $nome));

	 	$db->commit();
		$db=null;
	}
	
	catch(PDOException $e){
		$caught = true;
		echo("<p> Local nao inserido :( </p>");
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}

	if (!$caught) echo("<p> Local inserido com sucesso :) </p>");


?>

</html>
