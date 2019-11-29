<html>
    <body>
 		<h3>Inserir Incidencias Duplicadas:</h3>
		<form action="registarDuplicado.php" method="post">
        <p>Id Item:</p>
        <p><input type="visible" name="item1" value="<?=$_REQUEST['item1']?>"/></p>
        <p>Id Item duplicado:</p>
        <p><input type="visible" name="item2" value="<?=$_REQUEST['item2']?>"/></p>
        <p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>