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

    $id = $_REQUEST['id'];
    $zona = $_REQUEST['zona'];
    $imagem = $_REQUEST['imagem'];
    $lingua = $_REQUEST['lingua'];
    $ts = $_REQUEST['ts'];
    $descricao = $_REQUEST['descricao'];
    $tem_anomalia_redacao = $_REQUEST['tem_anomalia_redacao'];


	;


	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$sql= "INSERT INTO item (id, zona, imagem, lingua, ts, descrição, tem_anomalia_redação) VALUES (:id, :zona, :imagem, :lingua, :ts, :descrição, :tem_anomalia_redação);";
		$db->beginTransaction();

		$result=$db->prepare($sql);

		$result-> execute(array($id, $zona, $imagem, $lingua, $ts, $descrição, $tem_anomalia_redação));

	 	$db->commit();
		$db=null;
	}
	catch(PDOException $e){
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}

?>

</html>