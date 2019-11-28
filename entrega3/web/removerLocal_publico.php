<html>
	<body style="font-family:Arial; font-size:20px;">
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
		
		
		$db->commit();

		$db=null;
	}
	catch(PDOException $e){
      $caught = true;
      echo("<p> Local publico não removido :(</p>");
			echo("<p>ERROR: {$e->getMessage()}</p>");
  }
  if (!$caught) echo("<p> Local publico removido com sucesso :)</p>");

?>

</html>