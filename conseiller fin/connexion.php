<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<title>Connexion</title>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <script language="javascript" src="js/global.js"></script>
		  <link rel="stylesheet" href="css/investisseur.css" type="text/css" />
		  <link rel="stylesheet" href="css/accueil.css" type="text/css" />
	</head>
	<body>
	<?php include 'menu.php';?>
		<br><br><br><br><span id="Haut"></span>
		<p class="tabInscription">
			<a href="#" onClick="rendreVisible('formConnexion');rendreVisible('administrateur');rendreInvisible('inscription');">Administrateur</a>
		</p>
		<p class="tabInscription">
			<a href="#" onClick="rendreVisible('formConnexion');rendreInvisible('administrateur');rendreVisible('inscription');">Client</a>
		</p>		
		<br>
		<p class="tabInscription"><span id="error" class="erreur"></span></p>
		<hr>
		<br>
		<div id="formConnexion">
			<form action="serveur/confirmerClients.php" method="post" onSubmit="return validerConnexion();">  
			  
			  <div class="container-fluid" class="tabInscription">
					<div class="row">
						<div class="col-xs-12 col-md-11 col-lg-10">
							<div class="row">
								<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
									<label for="courriel">Courriel:</label>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
									<input type="text" id="courriel" name="couriel" value="">
								</div>
								<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
									<span id="courrielError" class="erreur"></span>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-12 col-md-11 col-lg-10">
							<div class="row">
								<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
									<label for="mPasse">Mot de passe:&nbsp;&nbsp;</label>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<input type="password" id="mPasse" name="mPasse" value="">
								</div>
								<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
									<span id="mdpError" class="erreur"></span>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row" id="administrateur">
						<div class="col-xs-12 col-md-11 col-lg-10">
							<div class="row">
								<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
									<label for="cleAdmin">Clé administrateur:&nbsp;&nbsp;</label>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<input type="password" id="cleAdmin" name="cleAdmin" value="">
								</div>
								<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
									<span class="erreur">Entrez votre clé</span>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-12 col-md-11 col-lg-10">
							<div class="row">
								<div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
									<input type="submit" name="submit" value="Envoyer">
								</div>
								<div class="col-xs-9 col-sm-3 col-md-3 col-lg-3">
									<input type="reset" id="recommencer" value="Recommencer" onClick="resseterError();">
								</div>
								<div class="col-xs-0 col-sm-7 col-md-7 col-lg-7">
									
								</div>
							</div>
						</div>
					</div>
					<br><br>
					<div class="row" id="inscription">
						<div class="col-xs-12 col-md-11 col-lg-10">
							<div class="row">
								<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
									<label><span class="erreur">Pas encore inscrit?</span></label>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
									<a href="inscription.php">Inscription</a>
								</div>
								<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
									
								</div>
							</div>
						</div>
					</div>
									
			</form>
		</div>
	
	</body>
</html>