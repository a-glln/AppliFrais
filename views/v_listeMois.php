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
				    <select class="custom-select" id="lstMois" name="lstMois">
                        <?php
                        foreach ($lesMois as $unMois) {
                            echo "<option value='" . $unMois['id'] . "'>" . $unMois['mois'] .'/'. $unMois['annee'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <input class="btn btn-primary" id="ok" type="submit" value="Valider">
            </form>
        </div>
    </div>

