<html>
    <body style="font-family:Arial; font-size:20px;">
    <form>
		<input type="button" value="Voltar" href="index.html" onclick="history.go(-1)">
	</form>
<head>
	<meta charset="UTF-8">
</head>
<?php


	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
		$dbname=$user;

		$db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql= "SELECT email FROM utilizador;";

		$result=$db->prepare($sql);

        $result-> execute();
        echo("<table>\n");
		echo("<tr><td >UTILIZADORES</td></tr>\n");
		foreach($result as $row)
		{
            echo("<tr><td>");
			echo($row['email']);
            echo("</td></tr>\n");
        }
        echo("</table>\n");
		$db=null;
	}
	catch(PDOException $e){
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}

?>

</html>