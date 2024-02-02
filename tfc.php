<?php include "menu.php"; ?>
<div class="breadcrumbs" data-aos="fade-in" style="padding-top: 20px;">
      <div class="container">
        <h2>Les TFC disponibles</h2>
        <form>
          <div class="input-group mb-3">
            <input type="password" class="form-control" required id="pwd" aria-label="Text input with checkbox" placeholder="Rechercher" name="r">  
            <button class="input-group-text btn btn-primary"><i class="bi bi-search"></i></button>
        </div>
        </form>
      </div>
    </div>
<section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php 

          $recup = $bdd->prepare("SELECT * FROM activite where titre='TFC'");
          $recup->execute();
          while ($donnees = $recup->fetch()) {
            ?>
            <div class="col-lg-4 shadow col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-content">
                <p><<
                  <?php echo $donnees->designation; ?>>>
                </p>
                <embed src="https://drive.google.com/viewerng/viewer?embedded=true&url=http://ouvrage.uaclab.net/livres/<?php echo $donnees->fichier; ?>" width="100%" height="150px">
                <a href="livres/<?php echo $donnees->fichier; ?>" download="<?php echo $donnees->fichier; ?>" style="text-decoration:none;" class="btn btn-success">Télécharger</a>
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