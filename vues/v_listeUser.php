<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="contenu">
    <div class="card" style="padding: 25px; ">
    <h2>Liste Utilisateurs</h2>
    <form action="index.php?uc=listeUser&action=afficherListe" method="post">
        <div class="corpsForm">
            <table class="table" style="margin: 20px;">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Login</th>
                    <th>Mot de passe</th>
                    <th>Groupe</th>
                    <th>Actions</th>
                </tr>
                    <?php
                    foreach ($allUsers as $unUser)
                    {
                        echo "<tr>" .
                                "<td>" . $unUser['id'] . "</td>" .
                                "<td>" . $unUser['nom'] . "</td>" .
                                "<td>" . $unUser['prenom'] . "</td>" .
                                "<td>" . $unUser['login'] . "</td>" .
                                "<td>" . $unUser['mdp'] . "</td>" .
                                "<td>" . $unUser['groupe'] . "</td>" .
                                "<td><a href='index.php?uc=listeUser&action=supprUser&idUser=" . $unUser['id'] . "'>supprimer</a></td>" .
                            "</tr>";
                    }
                    ?>
            </table>
		</div>
    </form>
        <form action="index.php?uc=listeUser&action=supprUser" method="post">
            <div class="col-md-2" style="float: left;">
                <label for="validationTooltip05">Selectionner un utilisateur</label>
                <select name="groupe" id="validationTooltip05" class="form-control" placeholder="Role" required>
                    <?php
                    foreach ($allUsers as $unUser)
                    {
                        echo
                            "<option>" . $unUser['nom'] . "</option>" ;
                    }
                    ?>
                </select>
            </div>
        </form>
        <br>
        <div style="text-align: left; ">
            <h2>Ajouter d'un utilisateur</h2>
            <br>
            <form method="POST" action ="index.php?uc=listeUser&action=ajoutUser">
                <input id="uc" name="uc" value="listeUser" type="hidden">
                <input id="uc" name="action" value="ajoutUser" type="hidden">
                <div class="form-row">
                        <div class="col-md-2">
                            <label for="validationTooltip01">Nom</label>
                            <input type="text" name="nom" class="form-control" id="validationTooltip01" placeholder="Nom" required>
                            <div class="valid-tooltip">
                                Valide
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationTooltip02">Prenom</label>
                            <input type="text" name="prenom" class="form-control" id="validationTooltip02" placeholder="Prénom" required>
                            <div class="valid-tooltip">
                                Valide
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationTooltipUsername">Login</label>
                                <input type="text" name="login" class="form-control" id="validationTooltipUsername" placeholder="Login"  required>
                                <div class="invalid-tooltip">
                                    Veuillez choisir une adresse mail valide.
                                </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationTooltip03">Mot de passe</label>
                            <input type="password" name="mdp" class="form-control" id="validationTooltip03" placeholder="Mot de passe" required>
                            <div class="invalid-tooltip">
                                Veuillez choisir un mot de passe
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationTooltip05">Groupe</label>
                            <select name="groupe" id="validationTooltip05" class="form-control" placeholder="Role" required>
                                <option selected></option>
                                <option>Visiteur</option>
                                <option>Comptable</option>
                                <option>administrateur</option>
                            </select>
                            <div class="invalid-tooltip">
                                Veuillez choisir un role
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="validationTooltip09">Adresse</label>
                                <input type="text" name="adresse" class="form-control"  placeholder="Adresse"  required>
                        </div>
                        <div class="col-md-2">
                            <label for="validationTooltip06">CP</label>
                            <input type="text" name="cp" class="form-control" id="validationTooltip06" placeholder="CP" required>
                            <div class="valid-tooltip">
                                Valide
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationTooltip07">Ville</label>
                            <input type="text" name="ville" class="form-control" id="validationTooltip07" placeholder="Ville" required>
                            <div class="valid-tooltip">
                                Valide
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationTooltip08">Date embauche</label>
                            <input type="date" name="dateEmbauche" class="form-control" id="validationTooltip08" placeholder="dateEmbauche"  required>
                            <div class="invalid-tooltip">
                            renseigner au format date
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-left: 75px; text-align: right;margin-top: 25px;">
                            <input class="btn btn-primary" type="submit" name="valider" value="Ajouter">
                        </div>
                    </div>
                </form>
        </div>
	</div>