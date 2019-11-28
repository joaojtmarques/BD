<html>
	<body style="font-family:Arial; font-size:20px;">
	<form>
		<input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
	</form>
<head>
	<meta charset="UTF-8">
</head>

<?php

	
	$nome=$_REQUEST['nome'];

	$caught = false;
	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_WARNING);


		$sql= "DELETE FROM local_publico WHERE nome=:nome;";
		

		$db->beginTransaction();

		$result=$db->prepare($sql);

		$result-> execute(array($nome));
		$numRows = $result->rowcount();

		
		
		$db->commit();

		$db=null;
	}
	catch(PDOException $e){
      	$caught = true;
    	echo("<p> Local publico não removido :(</p>");
		echo("<p>ERROR: {$e->getMessage()}</p>");
  }
  if($numRows === 0) echo("O local que esta a tentar remover nao existe");
  elseif (!$caught) echo("<p> Local publico removido com sucesso :)</p>");

?>

</html>