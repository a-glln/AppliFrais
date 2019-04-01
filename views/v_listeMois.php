<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="contenu">
    <div class="card">
        <h5 class="card-header">Mes fiches de frais</h5>
        <div class="card-body">
            <h5 class="card-title">Mois à sélectionner :</h5>
            <form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="lstMois">Mois :</label>
                    </div>
                    <!-- <label for="lstMois" accesskey="n">Mois : </label> -->
                    <select class="custom-select" id="lstMois" name="lstMois">
                        <?php
                        foreach ($lesMois as $unMois) {
                            $mois = $unMois['mois'];
                            $numAnnee = $unMois['numAnnee'];
                            $numMois = $unMois['numMois'];
                            if ($mois == $moisASelectionner) {
                                ?>
                                <option selected
                                        value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                                <?php
                            } else { ?>
                                <option value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                                <?php
                            }

                        }
                        ?>
                    </select>
                </div>
                <input class="btn btn-primary" id="ok" type="submit" value="Valider">
            </form>
        </div>
    </div>

