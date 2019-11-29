<html>
	<body style="font-family:Arial; font-size:20px;">
	<form>
  <input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
</form>
<head>
	<meta charset="UTF-8">
</head>

<?php

    $item1 = $_REQUEST['item1'];
		$item2 = $_REQUEST['item2'];

		$caught = false;


	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;
		
		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$sql= "INSERT INTO duplicado(item1, item2) VALUES (:item1, :item2);";

		$db->beginTransaction();

		$result=$db->prepare($sql);

		$result-> execute(array($item1, $item2));

	 	$db->commit();
		$db=null;
	}
	catch(PDOException $e){
		$caught = true;
		echo("<p> Duplicado nao registado :( </p>");
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}

	if (!$caught) echo("<p> Duplicado registado com sucesso :) </p>");

?>

</html>