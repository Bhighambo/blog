<?php include "menu.php"; ?>
<body>
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Contact</h2>
      </div>
    </div>
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>DR Congo, Ville de Butembo, Commune Kimemi, Quartier Vutetse, Cellule Ngule</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>jacksonkennedy336@gmail.com</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+243 975 545 108</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0">
            <?php if (!empty($_GET['message'])): ?>
              <div class="alert alert-info"><?php echo $_GET['message']; ?></div>
            <?php endif ?>
            <form action="email.php" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Votre adresse mail" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="massage" rows="5" placeholder="Message" required></textarea>
              </div><br><br>
              <div class="text-center"><button type="submit" class="btn btn-success" name="send">Envoyer le message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section>
 <?php include "footer.php"; ?>