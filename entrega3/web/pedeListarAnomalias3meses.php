<html>
    <body>
 		<h3>Inserir Latitude e Longitude:</h3>
		<form action="ListarAnomalias3meses.php" method="post">
        <p>Latitude:</p>
        <p><input type="visible" name="latitude" value="<?=$_REQUEST['latitude']?>"/></p>
        <p>Longitude:</p>
        <p><input type="visible" name="longitude" value="<?=$_REQUEST['longitude']?>"/></p>
        <h3>Inserir distancia:</h3>
        <p>Latitude dX:</p>
        <p><input type="visible" name="dX" value="<?=$_REQUEST['dX']?>"/></p>
        <p>Longitude dY:</p>
        <p><input type="visible" name="dY" value="<?=$_REQUEST['dY']?>"/></p>
        <p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>