<html>
    <body>
 		<h3>Inserir Nome dos Locais:</h3>
		<form action="listarAnomalias.php" method="post">
        <p>Local 1:</p>
        <p><input type="visible" name="local1" value="<?=$_REQUEST['local1']?>"/></p>
        <p>Local 2:</p>
        <p><input type="visible" name="local2" value="<?=$_REQUEST['local2']?>"/></p>
        <p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>