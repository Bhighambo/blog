<?php include "menuAdmin.php"; ?>
    <?php
            if (!empty($_POST["designation"])) {
              echo "string";
                $dossier="photos/";
                $categorie=htmlspecialchars($_POST['designation']);
                $date=htmlspecialchars($_POST['dateinfo']);
                $dates = date('Y-m-d', strtotime($date));

                $photo=$_FILES["photo"]["name"];
                move_uploaded_file($_FILES["photo"]["tmp_name"], $dossier.$photo);

                $requet=$bdd->prepare("INSERT INTO infos (dateinfos, description, photo) values (?,?,?)");
                $requet->execute([$dates, $categorie, $photo]);
                $message="Enregistrement effectué avec succès";
            }
            if (!empty($_GET["supprimer"])) {
                $iddocteur=htmlspecialchars($_GET["supprimer"]);
                $requet=$bdd->prepare("DELETE from infos where idinfo=?");
                $requet->execute([$iddocteur]);
                $message="Suppression effectuée avec succès";
            }

        ?>
  <main id="main">
    <div class="breadcrumbs" style="padding-top: 30px;">
      <div class="container">
        <h2>Ajouter l'activité</h2>
      </div>
    </div>
    <section id="contact" class="contact">
        <div class="container row">
          <div class="col-lg-5">
          		<form action="activite.php" method="post" role="form" class="" enctype="multipart/form-data">
            	<?php if (!empty($message)): ?>
            		<p class="alert alert-success"><?php echo $message; ?></p>
            	<?php endif ?>
               <?php if (!empty($_GET["confirmer"])): ?>
                <div class="alert alert-success">Voulez-vous vraiment supprimer ? <a href="activite.php?supprimer=<?php echo $_GET["confirmer"]; ?>" class="btn btn-primary"><b>OUI</b></a> <a href="activite.php" class="btn btn-primary">NON</a></div>
              <?php endif ?>

              <div class="form-group mt-3">
                <textarea class="form-control" name="designation" placeholder="Designation"></textarea>
              </div>
              <div class="form-group mt-3">

                <input type="date" class="form-control" name="dateinfo" placeholder="Titre">
              </div>
              <div class="form-group mt-3">
                <input type="file" class="form-control" name="photo" id="subject">
              </div>
              <div class="text-center"><button type="submit" style="width: 40%; height: 40px; border-radius: 20px; margin-top: 20px; background-color: green; border: none; color: white;">AJouter</button></div>
            </form>
          </div>
          <div class="col-lg-7 mt-5 mt-lg-0">
          	<div class="infos">
          		<table class="table">
          			<thead>
          				<tr>
          					<th>N°</th>
          					<th>Désignation</th>
          					<th>Date</th>
                    <th>Image</th>
          					<th class="text-center" colspan="2">Action</th>
          				</tr>
          			</thead>
          			<tbody>
          				<?php 
          				$recupPublication = $bdd->prepare("SELECT * from infos");
          				$recupPublication->execute();
          				$num = 0;
          				while ($donnees_infos = $recupPublication->fetch()) {
          					$num = $num + 1;
          					?>
          					<tr>
	          					<td><?php echo $num; ?></td>
	          					<td><?php echo $donnees_infos->description; ?></td>
	          					<td><?php echo $donnees_infos->dateinfos; ?></td>
                      <td><img src="photos/<?php echo $donnees_infos->photo; ?>" style="width: 100px; height: 100px;"></td>
	          					<td><a href="activite.php?confirmer=<?php echo $donnees_infos->idinfo; ?>" class="btn btn-danger">Supprimer</a></td>
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