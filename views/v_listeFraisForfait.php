<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="contenu">
    <div class="card">
        <h5 class="card-header">Renseigner ma fiche de frais du mois <?php echo $mois . "-" . $annee ?></h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Eléments forfaitisés</h5>
							<table class="table">
								<tr class="bg-primary">
									<th class="date">Frais</th>
									<th class="libelle">Quantité</th>
								</tr>
								<?php
								foreach ($lesFraisForfait as $unFraisForfait) {
									$libelle = $unFraisForfait['idfrais'];
									$quantite = $unFraisForfait['quantite'];

									?>
									<tr>
										<td> <?php echo $libelle ?></td>
										<td><?php echo $quantite ?></td>
									</tr>
									<?php
								}
								?>
							</table>
							<p>1: Restaurant | 2: Frais kilométrique | 3:Forfait Etape | 4: Hôtel</p>
                            <form method="POST" action="index.php?uc=gererFrais&action=validerMajFraisForfait">
                              <div class="input-group mb-3">
								   <fieldset style="text-align: left;">
								   <?php
									foreach ($lesFraisForfait as $unFraisForfait) {
									$idfrais = $unFraisForfait['idfrais'];
									$quantite = $unFraisForfait['quantite'];

									?>
										<div class="input-group input-group-sm mb-3"
											<label for=""> <?php echo $idfrais ?>:  </label>
											<input class="form-control" type="text" value="" 
											name="lesFrais[<?php echo $idfrais ?>]" style="float: right;">
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
