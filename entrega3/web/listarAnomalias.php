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
        $db->beginTransaction();

        
        $latitude1 = "SELECT latitude FROM local_publico where nome = :local1;";
        $longitude1= "SELECT longitude FROM local_publico where nome = :local1;";
        $latitude2= "SELECT latitude FROM local_publico where nome = :local2;";
        $longitude2= "SELECT longitude FROM local_publico where nome = :local2;";
        

        $result=$db->prepare($latitude1);
        $result-> execute(array($local1));

        echo($result);
        $result1=$db->prepare($longitude1);
        $result1-> execute(array($local1));
        $result2=$db->prepare($latitude2);
        $result2-> execute(array($local2));
        $result3=$db->prepare($longitude2);
        $result3-> execute(array($local2));

        $minLatitude = min($latitude1, $latitude2);
        $maxLatitude = max($latitude1, $latitude2);
        $minLongitude = min($longitude1, $longitude2);
        $maxLongitude = max($longitude1, $longitude2);
        

        $sql = "SELECT anomalia.id from (select * from local_publico where (latitude > :minLatitude and latitude < :maxLatitude and longitude > :minLongitude and longitude < :maxLongitude)) as T natural join item INNER JOIN incidencia on incidencia.item_id = item.id INNER JOIN anomalia on anomalia.id = incidencia.anomalia_id group by anomalia.id;";
        


        
        $result4=$db->prepare($sql);
        $result4-> execute(array($maxLatitude, $maxLatitude, $minLatitude, $minLongitude));
        echo($result1);
        echo($maxLongitude);
        echo($minLongitude);
        echo($maxLatitude);
        //$result4-> execute(array($local1));
    


        $result-> execute();
        echo("<table>\n");
		echo("<tr><td >ANOMALIAS</td></tr>\n");
		foreach($result as $row)
		{
            echo("<tr><td>");
			echo($row['anomalia.id']);
            echo("</td></tr>\n");
        }
        echo("</table>\n");
        $db->commit();
		$db=null;
	}
	catch(PDOException $e){
		echo("<p>ERROR: {$e->getMessage()}</p>");
	}

?>

</html>