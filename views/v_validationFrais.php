<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="contenu">
    <a href="index.php?uc=validFrais&action=selectParamValidation" style="font-size : 1.5em;">Choisir autre
        utilisateur</a>
    <hr>
    <div class="card">
        <form action="index.php?uc=validFrais&action=updateFrais" method="post">
            <div id="param">
                <p>Fiche de frais du mois : <input class="form-control" id="mois" name="mois"
                                                   value="<?php echo $mois ?>">
                    Utilisateur :<input class="form-control" id="utilisateur" name="utilisateur"
                                        value="<?php echo $idVisiteur ?>">
                    Montant validé : <input class="form-control" id="montantValide" name="montantValide" required
                                            style="border: solid red;">
                </p>
            </div>
            <div id="validfrais">
                <h4>Eléments forfaitisés </h4>
                <p>
                    Etat : <?php echo $libEtat ?> depuis le <?php echo $dateModif ?>
                    <br>
                    Montant validé : <?php echo $montantValide ?>
					<br>
					Total : 
                </p>
                <table class="table">
                    <tr class="bg-primary">
						<th></th>
                        <th>Restaurant</th>
						<th>Frais kilométrique</th>
						<th>Forfait Etape</th>
						<th>Nuitée Hôtel</th>
                    </tr>
                    <tr>
						<td class="bg-primary"><b>Quantité</b></td>
                        <?php
                        foreach ($lesFraisForfait as $unFraisForfait) {
                            $quantite = $unFraisForfait['quantite'];
                            ?>
                            <td class="qteForfait"><?php echo $quantite ?></td>
                            <?php
                        }
                        ?>
                    </tr>
					<td class="bg-primary"><b>Montant</b></td>
					<?php
                        foreach ($lesMontants as $unMontant) {
                            $montant = $unMontant['montant'];
                            ?>
                            <td class="qteForfait"><?php echo $montant ?></td>
                            <?php
                        }
                        ?>
                </table>
                <input class="btn btn-primary" type="submit" value="Valider" name="valider">
        </form>
        <br>
        <br>
        <h4>Eléments Hors Forfait </h4>
        <form action="index.php?uc=validFrais&action=actualiser" method="post">
            <table class="table">
                <div style="text-align: left;">
                    <p>
                        <?php echo $nbJustificatifs ?>justificatifs reçus
                    </p>
                </div>
                <tr class="bg-primary">
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>
                    <th class='montant'>Montant</th>
					<th class='etat'>Etat</th>
                    <th class='refuser'>Action</th>

                </tr>
                <?php
                foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                    $date = $unFraisHorsForfait['date_frais'];
                    $libelle = $unFraisHorsForfait['libelle'];
                    $montant = $unFraisHorsForfait['montant'];
					$etat = $unFraisHorsForfait['etat_id'];
					$id = $unFraisHorsForfait['id'];
                    ?>
                    <tr>
                        <td><?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ?></td>
						<td><?php echo $etat ?></td>
                        <td><a href="index.php?uc=validFrais&action=supprimerFraisHF&idFrais=<?php echo $id ?>"
							onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">
							REFUSER</a> |
							<a href="index.php?uc=validFrais&action=validerFraisHF&idFrais=<?php echo $id ?>"
							onclick="return confirm('Voulez-vous vraiment valider ce frais?');">
							VALIDER</a>
						</td>
                    </tr>
                    <?php
                }
                ?>
				
            </table>
			<p>1: Validé | 2:Refusé | 3:En cours</p>
        </form>
    </div>
</div>

 













