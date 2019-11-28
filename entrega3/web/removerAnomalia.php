<html>
    <body style="font-family:Arial; font-size:20px;">
    <form>
        <input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
    </form>
<head>
	<meta charset="UTF-8">
</head>

<?php
	
    $id=$_REQUEST['id'];

	$caught = false;
	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$sql= "DELETE FROM anomalia WHERE id=:id;";
		

		$db->beginTransaction();

		$result=$db->prepare($sql);

		$result-> execute(array($id));
		$numRows = $result->rowcount();
		
		$db->commit();

		$db=null;
	}
	catch(PDOException $e){
        $caught = true;
        echo("<p> Anomalia não removida :(</p>");
		echo("<p>ERROR: {$e->getMessage()}</p>");
    }
    if($numRows === 0) echo("A Anomalia que esta a tentar remover nao existe");
  	elseif (!$caught) echo("<p> Anomalia removida com sucesso :)</p>");



?>

</html>