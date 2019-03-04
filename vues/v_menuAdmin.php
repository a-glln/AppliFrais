<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="menu">
    <nav class="nav flex-column" style="font-size: 1.2em;">
        <a class="nav-link active"> Connecté en tant que :<br>
            <?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom'] ?>
			<br>
			<?php echo $_SESSION['groupe'] ?>
        </a>
        <a class="nav-link active" href="index.php?uc=listeUser&action=afficherListe">Liste des utilisateurs</a>
    </nav>
</div>
