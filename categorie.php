<?php include "menuAdmin.php"; ?>
    <?php
            if (!empty($_POST["designation"])) {
                $dossier="livres/";
                $categorie=htmlspecialchars($_POST['designation']);
                $publication=htmlspecialchars($_POST['titre']);

                $photo=$_POST["titre"].'_'.$_FILES["photo"]["name"];
                move_uploaded_file($_FILES["photo"]["tmp_name"], $dossier.$photo);

                $requet=$bdd->prepare("INSERT INTO activite (titre, fichier, designation) values (?,?,?)");
                $requet->execute([$categorie, $photo,  $publication]);
                $message="Enregistrement effectué avec succès";
            }
            if (!empty($_GET["supprimer"])) {
                $iddocteur=htmlspecialchars($_GET["supprimer"]);
                $requet=$bdd->prepare("DELETE from activite where idactivite=?");
                $requet->execute([$iddocteur]);
                $message="Suppression effectuée avec succès";
            }

        ?>
  <main id="main">
    <div class="breadcrumbs" style="padding-top: 30px;">
      <div class="container">
        <h2>Enregistrement des catégories</h2>
      </div>
    </div>
    <section id="contact" class="contact">
        <div class="container row">
          <div class="col-lg-5">
          		<form action="categorie.php" method="post" role="form" class="" enctype="multipart/form-data">
            	<?php if (!empty($message)): ?>
            		<p class="alert alert-success"><?php echo $message; ?></p>
            	<?php endif ?>
               <?php if (!empty($_GET["confirmer"])): ?>
                <div class="alert alert-success">Voulez-vous vraiment supprimer ? <a href="categorie.php?supprimer=<?php echo $_GET["confirmer"]; ?>" class="btn btn-primary"><b>OUI</b></a> <a href="categorie.php" class="btn btn-primary">NON</a></div>
              <?php endif ?>

              <div class="form-group mt-3">
                <select class="form-control" name="designation">
                	<option>TFC</option>
                	<option>Memoires</option>
                	<option>Livres</option>
                </select>
              </div>
              <div class="form-group mt-3">

                <input type="text" class="form-control" name="titre" placeholder="Titre">
              </div>
              <div class="form-group mt-3">
                <input type="file" class="form-control" name="photo" id="subject" placeholder="Nom de la catégorie">
              </div>
              <div class="text-center"><button type="submit" style="width: 40%; height: 40px; border-radius: 20px; margin-top: 20px; background-color: green; border: none; color: white;">AJouter</button></div>
            </form>
          </div>
          <div class="col-lg-7 mt-5 mt-lg-0">
          	<div class="infos table-responsive scoll-table">
          		<table class="table table-sm shadow">
          			<thead>
          				<tr>
          					<th>N°</th>
          					<th>Titre</th>
          					<th>Designation</th>
          					<th class="text-center" colspan="2">Action</th>
          				</tr>
          			</thead>
          			<tbody>
          				<?php 
          				$recupPublication = $bdd->prepare("SELECT * from activite");
          				$recupPublication->execute();
          				$num = 0;
          				while ($donnees_infos = $recupPublication->fetch()) {
          					$num = $num + 1;
          					?>
          					<tr>
	          					<td><?php echo $num; ?></td>
	          					<td><?php echo $donnees_infos->titre; ?></td>
	          					<td><?php echo $donnees_infos->designation; ?></td>
	          					<td><a href="categorie.php?confirmer=<?php echo $donnees_infos->idactivite; ?>" class="btn btn-danger">Supprimer</a></td>
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