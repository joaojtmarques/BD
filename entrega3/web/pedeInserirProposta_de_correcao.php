<html>
    <body>
 		<h3>Inserir Proposta:</h3>
		<form action="inserirProposta_de_correcao.php" method="post">
        <p>email:</p>
        <p><input type="visible" name="email" value="<?=$_REQUEST['email']?>"/></p>
        <p>data_hora:</p>
        <p><input type="visible" name="data_hora" value="<?=$_REQUEST['data_hora']?>"/></p>
        <p>texto:</p>
        <p><input type="visible" name="texto" value="<?=$_REQUEST['texto']?>"/></p>
        <p>anomalia:</p>
        <p><input type="visible" name="anomalia" value="<?=$_REQUEST['anomalia']?>"/></p>
        <p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>