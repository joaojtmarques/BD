<html>
    <body>
 		<h3>Inserir anomalia:</h3>
		<form action="inserirAnomalia.php" method="post">
        <p>id:</p>
        <p><input type="visible" name="id" value="<?=$_REQUEST['id']?>"/></p>
        <p>zona:</p>
        <p><input type="visible" name="zona" value="<?=$_REQUEST['zona']?>"/></p>
        <p>imagem:</p>
        <p><input type="visible" name="imagem" value="<?=$_REQUEST['imagem']?>"/></p>
        <p>lingua:</p>
        <p><input type="visible" name="lingua" value="<?=$_REQUEST['lingua']?>"/></p>
        <p>ts:</p>
        <p><input type="visible" name="ts" value="<?=$_REQUEST['ts']?>"/></p>
        <p>descrição:</p>
        <p><input type="visible" name="descrição" value="<?=$_REQUEST['descrição']?>"/></p>
        <p>tem_anomalia_redação (True, False):</p>
        <p><input type="visible" name="tem_anomalia_redação" value="<?=$_REQUEST['tem_anomalia_redação']?>"/></p>
        <p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>