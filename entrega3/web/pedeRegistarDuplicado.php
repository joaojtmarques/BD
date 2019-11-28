<html>
    <body>
 		<h3>Editar Proposta de correcao</h3>
		<form action="editarProposta_de_correcao.php" method="post">
        <p>Numero da Proposta de correcao:
        <input type="visible" name="nro" value="<?=$_REQUEST['nro']?>"/>
		<p>Novo texto da Proposta de correcao:
		<input type="visible" name="texto" value="<?=$_REQUEST['texto']?>"/></p>

		<p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>