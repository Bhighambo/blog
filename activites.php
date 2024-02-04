<?php include "menu.php"; ?>
<div class="breadcrumbs" data-aos="fade-in" style="padding-top: 20px;">
      <div class="container">
        <h2>Mes activités</h2>
      </div>
    </div>
<section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
        	<?php 

        	$recup = $bdd->prepare("SELECT * FROM infos order by dateinfos desc");
        	$recup->execute();
        	while ($donnees = $recup->fetch()) {
        		?>
        		<div class="col-lg-4 col-md-6 rounded d-flex align-items-stretch">
            <div class="member rounded">
              <img src="photos/<?php echo $donnees->photo; ?>" class="img-fluid" alt="">
              <div class="member-content">
                <h4><?php echo $donnees->dateinfos; ?></h4>
                <p>
                  <?php echo $donnees->description; ?>
                </p>
              </div>
            </div>
          </div>

        		<?php
        	}



        	 ?>

        </div>

      </div>
    </section>
    <?php include "footer.php"; ?>