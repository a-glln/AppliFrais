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
                            "</tr>";
                    }
                    ?>
            </table>
		</div>
        <br>
        <div style="text-align: left; ">
            <h2>Ajouter d'un utilisateur</h2>
            <br>
            <form method="POST" action ="index.php?uc=listeUser&action=ajoutUser">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip01">Nom</label>
                            <input type="text" name="nom" class="form-control" id="validationTooltip01" placeholder="Nom" required>
                            <div class="valid-tooltip">
                                Valide
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip02">Prenom</label>
                            <input type="text" name="prenom" class="form-control" id="validationTooltip02" placeholder="Prénom" required>
                            <div class="valid-tooltip">
                                Valide
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipUsername">Login</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                </div>
                                <input type="text" name="email" class="form-control" id="validationTooltipUsername" placeholder="Login" aria-describedby="validationTooltipUsernamePrepend" required>
                                <div class="invalid-tooltip">
                                    Veuillez choisir une adresse mail valide.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip03">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="validationTooltip03" placeholder="Mot de passe" required>
                            <div class="invalid-tooltip">
                                Veuillez choisir un mot de passe
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip04">Véhicule</label>
                            <select name="vehicule" id="validationTooltip04" class="form-control" placeholder="Véhicule" required>
                                <option selected>Aucun</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <div class="invalid-tooltip">
                                Veuillez choisir un vehicule
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip05">Groupe</label>
                            <select name="role" id="validationTooltip05" class="form-control" placeholder="Role" required>
                                <option selected>Aucun</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <div class="invalid-tooltip">
                                Veuillez choisir un role
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit"><span>Ajouter</span></button>
                </form>
            </form>
        </div>
    </form>
	</div>