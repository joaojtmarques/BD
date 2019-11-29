<html>
    <body style="font-family:Arial; font-size:20px;">
    <form>
		<input type="button" value="Voltar" href="index.html" onclick="history.go(-1)">
	</form>
<head>
	<meta charset="UTF-8">
</head>
<?php

    $local1=$_REQUEST['local1'];
    $local2=$_REQUEST['local2'];

	try
	{
		$host="db.ist.utl.pt";
		$user="ist189473";
		$password= "bd2019";
        $dbname=$user;
        
        $db= new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT latitude FROM local_publico where nome = :local1;";
        $sql2= "SELECT latitude FROM local_publico where nome = :local2;";
        $sql3= "SELECT longitude FROM local_publico where nome = :local1;";
        $sql4= "SELECT longitude FROM local_publico where nome = :local2;";

		$result=$db->prepare($sql);
        $result-> execute(array($local1));

        foreach($result as $row)
		{
            $latitude1 = $row['latitude'];
        }

        $result2=$db->prepare($sql2);
        $result2-> execute(array($local2));

        foreach($result2 as $row)
		{
            $latitude2 = $row['latitude'];
        }

        $result3=$db->prepare($sql3);
        $result3-> execute(array($local1));

        foreach($result3 as $row)
		{
            $longitude1 = $row['longitude'];
        }

        $result4=$db->prepare($sql4);
        $result4-> execute(array($local2));

        foreach($result4 as $row)
		{
            $longitude2 = $row['longitude'];
        }

        $minLatitude = min($latitude1, $latitude2);
        $maxLatitude = max($latitude1, $latitude2);
        $minLongitude = min($longitude1, $longitude2);
        $maxLongitude = max($longitude1, $longitude2);

        $sql5 = "SELECT anomalia.id from (select * from local_publico where (latitude > :minLatitude and latitude < :maxLatitude and longitude > :minLongitude and longitude < :maxLongitude)) as T natural join item INNER JOIN incidencia on incidencia.item_id = item.id INNER JOIN anomalia on anomalia.id = incidencia.anomalia_id group by anomalia.id;";

        $result5=$db->prepare($sql5);
        $result5-> execute(array($minLatitude, $maxLatitude, $minLongitude, $maxLongitude));

        echo("<table>\n");
		echo("<tr><td >IDs das Anomalias</td></tr>\n");
		foreach($result5 as $row)
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

