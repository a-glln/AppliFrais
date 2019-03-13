<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div class="card">
    <h5 class="card-header">Fiche de frais du mois <?php echo $numMois . "-" . $numAnnee ?> :</h5>
    <div class="card-body">
        <h5 class="card-title"> Etat : <?php echo $libEtat ?> depuis le <?php echo $dateModif ?> <br> Montant validé
            : <?php echo $montantValide ?></h5>
        <table class="table">
            <caption>Eléments forfaitisés</caption>
            <tr class="bg-primary">
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $libelle = $unFraisForfait['libelle'];
                    ?>
                    <th> <?php echo $libelle ?></th>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $quantite = $unFraisForfait['quantite'];
                    ?>
                    <td class="qteForfait"><?php echo $quantite ?> </td>
                    <?php
                }
                ?>
            </tr>
        </table>
        <table class="table">
            <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
            </caption>
            <tr class="bg-primary">
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>
            </tr>
            <?php
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                $date = $unFraisHorsForfait['date'];
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