<html>
    <body style="font-family:Arial; font-size:20px;">
    <form>
		<input type="button" value="Voltar" href="index.html" onclick="history.go(-2)">
	</form>
<head>
	<meta charset="UTF-8">
</head>
<?php

    $latitude=$_REQUEST['latitude'];
    $longitude=$_REQUEST['longitude'];
    $dX=$_REQUEST['dX'];
    $dY=$_REQUEST['dY'];

	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
        $dbname=$user;
        
        $db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $minLatitude = $latitude-$dX;
        $maxLatitude = $latitude+$dX;
        $minLongitude = $longitude-$dY;
        $maxLongitude = $longitude+$dY;

        $sql = "SELECT anomalia.id from anomalia inner join incidencia on anomalia.id = incidencia.anomalia_id inner join item on incidencia.item_id = item.id where latitude< :maxLatitude and latitude > :minLatitude and longitude < :maxLongitude and longitude >:minLongitude and extract(year from ts) =  2019 and extract(month from ts) > 8 and extract(month from ts) < 12;";

        $result=$db->prepare($sql);
        $result-> execute(array($maxLatitude, $minLatitude, $maxLongitude, $minLongitude));

        echo("<table>\n");
		echo("<tr><td >IDs das Anomalias</td></tr>\n");
		foreach($result as $row)
		{
            echo("<tr><td>");
			echo($row['id']);
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