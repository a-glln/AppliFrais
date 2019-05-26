<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div class="col-sm-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Eléments hors forfait</h5>

            <table class="table">
                <tr class="bg-primary">
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>
                    <th class="montant">Montant</th>
                    <th class="action">&nbsp;</th>
                </tr>
                <?php
                foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                    $libelle = $unFraisHorsForfait['libelle'];
                    $date = $unFraisHorsForfait['date_frais'];
                    $montant = $unFraisHorsForfait['montant'];
                    $id = $unFraisHorsForfait['id'];
                    ?>
                    <tr>
                        <td> <?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ?></td>
                        <td><a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>"
                               onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce
                                frais
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <br>
            <h5>Nouvel élément hors forfait</h5>
            <br>
            <form action="index.php?uc=gererFrais&action=validerCreationFrais" method="post">
                <div class="input-group mb-3">

                    <fieldset style="text-align: left;">
                        <div class="InputGroup">
                            <label for="idFrais"></label>
                            <label for="txtDateHF">Date (aaaa-mm-jj) :</label>
                            <input type="date" id="txtDateHF" name="dateFrais" class="form-control"/>


                            <label for="txtLibelleHF">Libellé :</label>
                            <input type="text" id="txtLibelleHF" name="libelle" class="form-control"/>


                            <label for="txtMontantHF">Montant : </label>
                            <input type="text" id="txtMontantHF" name="montant" class="form-control"/>
                        </div>
                    </fieldset>
                </div>
                <input id="ajouter" type="submit" class="btn btn-primary" value="Ajouter" size="20"/>
                <input id="effacer" type="reset" class="btn btn-danger" value="Effacer" size="20"/>
            </form>

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>


<!--
      <form action="index.php?uc=gererFrais&action=validerCreationFrais" method="post">
      <div class="corpsForm">
         
          <fieldset>
            <legend>Nouvel élément hors forfait
            </legend>
            <p>
              <label for="txtDateHF">Date (jj/mm/aaaa): </label>
              <input type="text" id="txtDateHF" name="dateFrais" size="10" maxlength="10" value=""  />
            </p>
            <p>
              <label for="txtLibelleHF">Libellé</label>
              <input type="text" id="txtLibelleHF" name="libelle" size="70" maxlength="256" value="" />
            </p>
            <p>
              <label for="txtMontantHF">Montant : </label>
              <input type="text" id="txtMontantHF" name="montant" size="10" maxlength="10" value="" />
            </p>
          </fieldset>
      </div>
      <div class="piedForm">
      <p>
          <input id="ok" type="submit" value="Valider" size="20" />
          <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>

      </form>
	  -->