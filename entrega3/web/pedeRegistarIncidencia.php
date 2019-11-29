<html>
    <body>
 		<h3>Inserir Incidencia:</h3>
		<form action="registarIncidencia.php" method="post">
        <p>Id anomalia:</p>
        <p><input type="visible" name="anomalia" value="<?=$_REQUEST['anomalia']?>"/></p>
        <p>Id Item:</p>
        <p><input type="visible" name="item" value="<?=$_REQUEST['item']?>"/></p>
        <p>email:</p>
        <p><input type="visible" name="email" value="<?=$_REQUEST['email']?>"/></p>
        <p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>