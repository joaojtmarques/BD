<html>
    <body>
 		<h3>Inserir local:</h3>
		<form action="inserirLocal_publico.php" method="post">
        <p>latitude:</p>
        <p><input type="visible" name="latitude" value="<?=$_REQUEST['latitude']?>"/></p>
        <p>longitude:</p>
        <p><input type="visible" name="longitude" value="<?=$_REQUEST['longitude']?>"/></p>
        <p>nome:</p>
		<p><input type="visible" name="nome" value="<?=$_REQUEST['nome']?>"/></p>
        <p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>