<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="contenu">
    <div class="card">
        <h5 class="card-header">Selectionner un Utilisateur</h5>
        <div class="card-body">
            <br>
            <form action="index.php?uc=validFrais&action=validationFrais" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="lstUser">User :</label>
                    </div>
                    <select class="custom-select"  name="lstUser">
                        <?php
                        foreach ($users as $unUser) {
                            echo
                                "<option value='" . $unUser['id'] . "'>" . $unUser['nom'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="lstMois">Mois :</label>
                    </div>
                    <select class="custom-select"  name="lstMois">
                        <?php
                        foreach ($lesMois as $unMois) {
                            echo "<option value='" . $unMois['mois'] . "'>" . $unMois['mois'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <input class="btn btn-primary" id="ok" type="submit" value="Valider">
                <input class="btn btn-danger" id="annuler" type="reset" value="Effacer">
            </form>
        </div>
    </div>