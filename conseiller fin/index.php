<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Accueil</title>
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" onLoad="creerElementsListes();">
 <?php include 'menu.php';?>

<br><br><br><span id="Haut"></span>
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 400px; margin: 0 auto">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/financial_products_pic1.jpg" alt="" width="200" height="125">
        <div class="carousel-caption">
          <h3>Les produits financiers</h3>
        </div>      
      </div>

      <div class="item">
        <img src="images/images.jpg" alt="" width="200" height="125">
        <div class="carousel-caption">
          <h3>Nos besoins</h3>          
        </div>      
      </div>
    
      <div class="item">
        <img src="images/investment_loan.jpg" alt="Los Angeles" width="200" height="125">
        <div class="carousel-caption">
          <h3>Votre financement</h3>          
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Arrière</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Suivant</span>
    </a>
</div>

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3>Bienvenu sur notre site!</h3>
  <p><em>Investissez efficacement!</em></p>
  <p>Investir revient à engager de l'argent dans un projet, en renonçant à une consommation immédiate ou à un autre investissement (coût d'opportunité) et en acceptant un certain risque, pour accroître ses revenus futurs.</p>
</div>

<h1 align="center">Désirez-vous investir efficacement?</h1>
		<br>
		
						<div id="premier">			
							<form action="avantages.php" method="post">
								<input type="button" class="btn btn-default" value="Oui" name="oui" id="oui" onClick="rendreVisible('etabProfil'); rendreInvisible('premier')">
								<input type="submit" class="btn btn-default" value="Non" name="non" id="non"/>
							</form>			
						</div>
					
		<br>
		<div id="etabProfil">
			<h4>Établissez votre profil d'investisseur</h4>
			<form id="votreProfil" name="votreProfil" action="votreProfil.php" method="post">
			<table class="table-responsive" align="center" style="width:35%;">
					<tr>
						<td><label for="age">Age</label></td>
						<td><select id="age" name="age"></select></td>
					</tr>
					<tr>
						<td><label for="profession">Profession</label></td>
						<td>
							<select id="profession" name="profession">
								<option value="enseignement">Enseignement</option>
								<option value="construction">Construction</option>
								<option value="IT">IT</option>
								<option value="Finance">Finance</option>
								<option value="Santé">Santé</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="risque">Aversion au risque &nbsp;&nbsp;&nbsp;</label></td>
						<td>
							<select id="risque" name="risque">
								<option value="1">J'aime prendre beaucoup de risques</option>
								<option value="2">J'aime prendre des risques</option>
								<option value="3">Parfois j'aime prendre des risques</option>
								<option value="4">Je n'aime pas prendre des risques</option>
								<option value="5">Je ne prends jamais des risques</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="submit" class="btn btn-default"/></td>
						<td><input type="reset" class="btn btn-default"/></td>
					</tr>
				</table>
				
			</form>
				
		</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contactez-nous</h3>
  <div class="row">
    <div class="col-md-4">
      <p>Des questions? N'hesitez pas!</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Montréal, Canada</p>
      <p><span class="glyphicon glyphicon-phone"></span>Téléphone: +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Courriel: mail@mail.ca </p>
    </div>
	<form action="serveur/messagesUtilisateurs.php" method="post" onSubmit="return validerMsgUtilisateur();">
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Nom" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Courriel" type="text" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Commentaire" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Envoyer</button>
        </div>
      </div>
	  <div class="row">
        <div class="col-md-12 form-group">
          <span id="nameError" class="erreur"></span><br>
		  <span id="emailError" class="erreur"></span><br>
		  <span id="msgError" class="erreur"></span>
		</div>
      </div>
    </div></form>
  </div>
  <br>
  
</div>
<form action="serveur/email.php" method="post">
	<input type="submit">
</form>
<!-- Add Google Maps -->
<div id="googleMap"></div>

<script>
function myMap() {
  var myCenter = new google.maps.LatLng(45.5088400,-73.5878100);
  var mapCanvas = document.getElementById("googleMap");
  var mapOptions = {center: myCenter, zoom: 12};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter, animation: google.maps.Animation.BOUNCE});
  marker.setMap(map);
  var infowindow = new google.maps.InfoWindow({
    content: "Notre office: 123 Boul. Montreal O <br>Telephone: 514 000 1111<br>Site web: <a href=\"http://finadvisor.byethost17.com\">http://finadvisor.byethost17.com</a>"

  });
  infowindow.open(map,marker);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTJ0MfOLctuIdVii6C-9X63MnXxznLoXw&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<?php include 'footer.php';?>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>
