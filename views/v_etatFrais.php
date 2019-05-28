<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div class="card">
    <h5 class="card-header">Fiche de frais du mois <?php echo $leMois . "-" . $numAnnee ?> :</h5>
    <div class="card-body">
        <h5 class="card-title"> Etat : <?php echo $libEtat ?> depuis le <?php echo $dateModif ?> <br>
			Montant validé : <?php echo $montantValide ?>
		</h5>
		<!-- TABLEAU DES FRAIS -->
        <table class="table">
            <caption>Eléments forfaitisés</caption>
            <tr class="bg-primary">
                <?php
				// BOUCLE POUR AFFICHE LES DIFFERENT TYPE DE FRAIS FORFAIT DANS L ENTETE DU TABLEAU
                foreach ($lesIdFrais as $unIdFrais) {
                    $libelle = $unIdFrais['libelle'];
                    ?>
                    <th> <?php echo $libelle ?></th>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
				//BOUCLE POUR AFFICHER LA QUANTITE POUR CHAQUE TYPE DE FRAIS
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $quantite = $unFraisForfait['quantite'];
                    ?>
                    <td class="qteForfait"><?php echo $quantite ?> </td>
                    <?php
                }
                ?>
            </tr>
        </table>
		<!-- LES FRAIS HORS FORFAIT -->
        <table class="table">
            <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
            </caption>
            <tr class="bg-primary">
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>
            </tr>
            <?php
			// BOUCLE POUR AFFICHER CHAQUE LIGNE DE FRAIS hf TANT QU IL EN RESTE DANS LA bdd
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                $date = $unFraisHorsForfait['date_frais'];
                $libelle = $unFraisHorsForfait['libelle'];
                $montant = $unFraisHorsForfait['montant'];
                ?>
                <tr>
                    <td><?php echo $date ?></td>
                    <td><?php echo $libelle ?></td>
                    <td><?php echo $montant ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>