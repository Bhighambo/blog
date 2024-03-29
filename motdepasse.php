<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Login</title>
  <!-- loader-->
  <link href="login/assets/css/pace.min.css" rel="stylesheet"/>
  <script src="login/assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="login/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="login/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="login/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="login/assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="height-100v d-flex align-items-center justify-content-center">
	<div class="card card-authentication1 mb-0 bg-dark">
		<div class="card-body">
		 <div class="card-content p-2">
		  <div class="card-title text-uppercase pb-2 text-center" style="color: orange">Recuperer le mot de passe</div>
		    <p class="pb-2">Saisisser le nom d'utilisateur et votre adresse mail pour recevoir le mot de passe</p>
        <?php if(!empty($_GET["message"])==1): ?>
          <div class="alert alert-success" style="padding: 10px; font-size: 16px; font-family: century gothic">Le mot de passe est envoyé dans votre adresse mail</div>
        <?php endif ?>
        <?php if(!empty($_GET["messages"])==1): ?>
          <div class="alert alert-danger" style="padding: 10px; font-size: 16px; font-family: century gothic">Désolée! vous n'êtes pas parmis les utilisateurs</div>
        <?php endif ?>
		    <form action="mail.php" method="post">
          <div class="form-group">
            <label for="nom" class="sr-only">Nom</label>
               <div class="position-relative has-icon-right">
                  <input type="text" id="nom" class="form-control input-shadow" placeholder="Entrer le nom d'utilisateur" name="name">
                  <div class="form-control-position">
                      <i class="icon-user"></i>
                  </div>
               </div>
          </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputEmailAddress" class="form-control input-shadow" placeholder="Adresse mail" name="email">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			 
			  <button type="submit" class="btn btn-success btn-block mt-3">Envoyer</button>
			 </form>
		   </div>
		  </div>
		   <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Retour sur<a href="login.php"> Se connecter</a></p>
		  </div>
	     </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
	</div>
  <script src="login/assets/js/jquery.min.js"></script>
  <script src="login/assets/js/popper.min.js"></script>
  <script src="login/assets/js/bootstrap.min.js"></script>
  <script src="login/assets/js/sidebar-menu.js"></script>
  <script src="login/assets/js/app-script.js"></script>
  
	
</body>
</html>
