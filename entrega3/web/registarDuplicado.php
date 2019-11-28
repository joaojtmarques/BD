<html>
	<body style="font-family:Arial; font-size:20px;">
	<form>
  <input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
</form>
<head>
	<meta charset="UTF-8">
</head>

<?php

    $email = $_REQUEST['email'];
		$data_hora = $_REQUEST['data_hora'];
		$texto = $_REQUEST['texto'];
		$anomalia = $_REQUEST['anomalia'];

		$caught = false;


	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$sql= "INSERT INTO proposta_de_correcao(email, data_hora, texto) VALUES (:email, :data_hora, :texto);";
		$sql2= "INSERT INTO correcao(email, anomalia_id) VALUES (:email, :anomalia);";
		$db->beginTransaction();

		$result=$db->prepare($sql);
		$result2=$db->prepare($sql2);

		$result-> execute(array($email, $data_hora, $texto));
		$result2-> execute(array($email, $anomalia));

	 	$db->commit();
		$db=null;
	}
	catch(PDOException $e){
		$caught = true;
		echo("<p> Proposta nao inserida :( </p>");
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}

	if (!$caught) echo("<p> Proposta inserida com sucesso :) </p>");

?>

</html>