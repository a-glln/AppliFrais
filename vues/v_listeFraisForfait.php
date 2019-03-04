<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="contenu">
    <div class="card">
        <h5 class="card-header">Renseigner ma fiche de frais du mois <?php echo $numMois . "-" . $numAnnee ?></h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Eléments forfaitisés</h5>
                            <form method="POST" action="index.php?uc=gererFrais&action=validerMajFraisForfait">
                                <div class="input-group mb-3">
                                    <fieldset style="text-align: left;">
                                        <?php
                                        foreach ($lesFraisForfait as $unFrais) {
                                            $idFrais = $unFrais['idfrais'];
                                            $libelle = $unFrais['libelle'];
                                            $quantite = $unFrais['quantite'];
                                            ?>
                                            <div class="InputGroup" style="padding-bottom: 50px;">
                                                <label for="idFrais"><?php echo $libelle ?></label>
                                                <input class="form-control" type="text" id="idFrais"
                                                       name="lesFrais[<?php echo $idFrais ?>]"
                                                       style="float: right;"><!-- value="--><?php //echo $quantite
                                                ?><!--"-->
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </fieldset>
                                </div>
                                <input class="btn btn-primary" id="ok" type="submit" value="Valider"/>
                                <input class="btn btn-danger" id="annuler" type="reset" value="Effacer"/>
                            </form>

                        </div>
                    </div>
                </div>