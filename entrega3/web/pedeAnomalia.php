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
        <p>descricao:</p>
        <p><input type="visible" name="descricao" value="<?=$_REQUEST['descricao']?>"/></p>
        <p>tem_anomalia_redacao (True, False):</p>
        <p><input type="visible" name="tem_anomalia_redacao" value="<?=$_REQUEST['tem_anomalia_redacao']?>"/></p>
        <p>Se colocou false na opcao anterior, preencha os proximos espacos:</p>
        <p>Zona2:</p>
        <p><input type="visible" name="zona2" value="<?=$_REQUEST['zona2']?>"/></p>
        <p>Lingua2:</p>
        <p><input type="visible" name="lingua2" value="<?=$_REQUEST['lingua2']?>"/></p>
        <p><input type="submit" value="Validar"/></p>
		</form>
 	</body>
</html>