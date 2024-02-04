<?php include "menuAdmin.php"; ?>
    <?php
            if (!empty($_POST["nom"])) {
                $nom=htmlspecialchars($_POST['nom']);
                $postnom=htmlspecialchars($_POST['postnom']);
                $motdepasse=htmlspecialchars($_POST['motdepasse']);

                $requet=$bdd->prepare("UPDATE admin set nom=?, postnom=?, motdepasse=? where id=?");
                $requet->execute([$nom, $postnom,  $motdepasse, $_SESSION['admin']]);
                $message="La modification effectuée avec succès";
            }

        ?>
  <main id="main">
    <div class="breadcrumbs" style="padding-top: 30px;">
      <div class="container">
        <h2>Profil</h2>
      </div>
    </div>
    <section id="contact" class="contact">
        <div class="container row">
          <div class="col-lg-5">
            <?php if (!empty($_GET['modifier'])): ?>

              <?php 

              $recupAdmin = $bdd->prepare("SELECT * FROM admin where id=?");
              $recupAdmin->execute([$_SESSION['admin']]);
              $valeur = $recupAdmin->fetch();
               ?>
              <form action="profil.php" method="post" role="form" class="" enctype="multipart/form-data">
              <?php if (!empty($message)): ?>
                <p class="alert alert-success"><?php echo $message; ?></p>
              <?php endif ?>
              <div class="form-group mt-3">

                <input type="text" class="form-control" name="nom" placeholder="Titre" value="<?php echo $valeur->nom; ?>">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="postnom" placeholder="Titre" value="<?php echo $valeur->postnom; ?>">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="motdepasse" placeholder="Titre" value="<?php echo $valeur->motdepasse; ?>">
              </div>
              <div class="text-center"><button type="submit" style="width: 40%; height: 40px; border-radius: 20px; margin-top: 20px; background-color: green; border: none; color: white;">AJouter</button></div>
            </form>
              
            <?php endif ?>
          </div>
          <div class="col-lg-7 mt-5 mt-lg-0">
          	<div class="infos table-responsive scoll-table">
          		<table class="table table-sm shadow">
          			<thead>
          				<tr>
          					<th>N°</th>
          					<th>Nom</th>
          					<th>Post nom</th>
                    <th>Mot de passe</th>
          					<th class="text-center">Action</th>
          				</tr>
          			</thead>
          			<tbody>
          				<?php 
          				$recupPublication = $bdd->prepare("SELECT * from admin where id=?");
          				$recupPublication->execute([$_SESSION['admin']]);
          				$num = 0;
          				while ($donnees_infos = $recupPublication->fetch()) {
          					$num = $num + 1;
          					?>
          					<tr>
	          					<td><?php echo $num; ?></td>
	          					<td><?php echo $donnees_infos->nom; ?></td>
	          					<td><?php echo $donnees_infos->postnom; ?></td>
                      <td><?php echo $donnees_infos->motdepasse; ?></td>
	          					<td><a href="profil.php?modifier=<?php echo $donnees_infos->id; ?>" class="btn btn-primary">Supprimer</a></td>
          				    </tr>



          					<?php
          				}

          				 ?>
          			</tbody>
          		</table>
          	</div>
          </div>
      </div>
    </section>

  </main>

<?php include "footer.php"; ?>