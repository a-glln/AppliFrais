<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 ">

        </div>
        <div class="col-sm-4 bg-white">
			<div class="erreur">
			<center>
					<?php
					foreach ($_REQUEST['erreurs'] as $erreur) {
						echo "$erreur";
					}
					?>
			</center>
			</div>  
        </div>
        <div class="col-sm-4">

        </div>
    </div>
</div>