<html>
    <body>
 		<h3>Numero da Proposta a remover:</h3>
		<form action="removerProposta_de_correcao.php" method="post">
        <p>numero:</p>
        <p><input type="visible" name="nro" value="<?=$_REQUEST['nro']?>"/></p>
		<p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>