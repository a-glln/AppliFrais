<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="contenu">
<div id="accueil" class="card text-center" style="width: 800px;margin-left: 16%;padding: 50px;">
    <h1>Bienvenue <strong><?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom'] ?></strong>,<br>Vous etes maintenant
        connecter
        sur votre gestionnaire de frais
    </h1>
	<h2>Nous sommes le : <?php echo date("j m Y"); ?></h2>
</div>
</div>