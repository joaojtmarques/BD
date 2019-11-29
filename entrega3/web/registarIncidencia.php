<html>
	<body style="font-family:Arial; font-size:20px;">
	<form>
  <input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
</form>
<head>
	<meta charset="UTF-8">
</head>

<?php

    $anomalia = $_REQUEST['anomalia'];
    $item = $_REQUEST['item'];
    $email = $_REQUEST['email'];

		$caught = false;


	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$sql= "INSERT INTO incidencia(anomalia_id, item_id, email) VALUES (:anomalia, :item, :email);";

		$db->beginTransaction();

		$result=$db->prepare($sql);

		$result-> execute(array($anomalia, $item, $email));

	 	$db->commit();
		$db=null;
	}
	catch(PDOException $e){
		$caught = true;
		echo("<p> Incedencia nao registada :( </p>");
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}

	if (!$caught) echo("<p> Incidencia registada com sucesso :) </p>");

?>

</html>