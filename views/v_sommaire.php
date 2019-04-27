<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="menu">
    <nav class="nav flex-column" style="font-size: 1.2em;">
        <a class="nav-link active"> Connecté en tant que :<br>
            <?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom'] ?>
            <br>
        </a>
        <a class="nav-link active" href="index.php?uc=gererFrais&action=saisirFrais">Saisie fiche de frais</a>
        <a class="nav-link" href="index.php?uc=etatFrais&action=selectionnerMois">Mes fiches de frais</a>
		<br>
		<a class="btn btn-danger" href="index.php?uc=connexion&amp;action=deconnexion" title="Se déconnecter" 
		 style="margin-left: 10px;width: max-content;">Déconnexion</a>
    </nav>
</div>