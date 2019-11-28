<html>
    <body>
 		<h3>Inserir item:</h3>
		<form action="inserirItem.php" method="post">
        <p>descricao:</p>
        <p><input type="visible" name="descricao" value="<?=$_REQUEST['descricao']?>"/></p>
        <p>localizacao:</p>
        <p><input type="visible" name="localizacao" value="<?=$_REQUEST['localizacao']?>"/></p>
        <p>latitude:</p>
        <p><input type="visible" name="latitude" value="<?=$_REQUEST['latitude']?>"/></p>
        <p>longitude:</p>
        <p><input type="visible" name="longitude" value="<?=$_REQUEST['longitude']?>"/></p>
        <p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>