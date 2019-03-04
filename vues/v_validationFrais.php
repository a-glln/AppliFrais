<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="contenu">
    <a href="index.php?uc=validFrais&action=selectParamValidation"  style="font-size : 1.5em;">Choisir autre utilisateur</a>
	<hr>
	<div class="card">
		<form action="index.php?uc=validFrais&action=updateFrais" method="post">
		<div id="param">
			<p>Fiche de frais du mois : <input class="form-control" id="mois" name="mois" value="<?php echo $mois ?>">
			Utilisateur :<input  class="form-control" id="utilisateur" name="utilisateur" value="<?php echo $idVisiteur ?>">
			Montant validé : <input  class="form-control" id="montantValide" name="montantValide" required style="border: solid red;">
			</p>
		</div>
		<div id="validfrais" > 
			<h4>Eléments forfaitisés </h4>
			<p>
				Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> 
				<br> 
				Montant validé : <?php echo $montantValide?>
			</p>
			<table class="table">				
				<tr class="bg-primary">
					<?php
					foreach ( $lesFraisForfait as $unFraisForfait )
					{
						$libelle = $unFraisForfait['libelle'];
					?>
						<th><?php echo $libelle?></th>
					<?php
					}
					?>
				</tr>
				<tr>
					<?php
					foreach (  $lesFraisForfait as $unFraisForfait  )
					{
						$quantite = $unFraisForfait['quantite'];
					?>
						<td class="qteForfait"><?php echo $quantite?></td>
					<?php
					}
					?>
				</tr>
			</table>
			<input class="btn btn-primary" type="submit" value="Valider" name="valider">
			</form>
			<br>
			<br>
			<h4>Eléments Hors Forfait </h4>
			<form action="index.php?uc=validFrais&action=actualiser" method="post">
			<table class="table">
				<div style="text-align: left;">
					<p>
					<?php echo $nbJustificatifs ?>justificatifs reçus
					</p>
				</div>
				<tr class="bg-primary">
					<th class="date">Date</th>
					<th class="libelle">Libellé</th>
					<th class='montant'>Montant</th>
					<th class='refuser'>Refuser</th>

				</tr>
				<?php
				foreach ( $lesFraisHorsForfait as $unFraisHorsForfait )
				{
					$date = $unFraisHorsForfait['date'];
					$libelle = $unFraisHorsForfait['libelle'];
					$montant = $unFraisHorsForfait['montant'];
				?>
					<tr>
						<td><?php echo $date ?></td>
						<td><?php echo $libelle ?></td>
						<td><?php echo $montant ?></td>
						<td><a href="index.php?uc=validFrais&action=gererFraisHF">REFUSER</td>
					</tr>
				<?php
				}
				?>
			</table>
			<br>
		</form>
	</div> 
</div>

 













