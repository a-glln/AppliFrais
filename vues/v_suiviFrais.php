<!-- Created by PhpStorm. -->
<!-- User: adamg -->
<div id="contenu">
	<div class="card">
			<h5 class="card-header">Selectionner un Utilisateur</h5>
			<div class="card-body">
			<br>
				<form action="index.php?uc=suiviFrais&action=voirFrais" method="post">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="lstUser">User :</label>
						</div>
						<select class="custom-select" id="lstUser" name="lstUser">
							<?php
							foreach ($users as $unUser)
							{
								echo
									"<option value='" . $unUser['id'] ."'>" . $unUser['nom'] ."</option>";
							}
							?>
						</select>
					</div>
						<input class="btn btn-primary" id="ok" type="submit" value="Valider">
						<br>
						<br>
						<a href="index.php?uc=suiviFrais&action=selectParam" style="font-size : 1.5em;">Choisir autre utilisateur</a>
				</form>
			</div>
	</div>