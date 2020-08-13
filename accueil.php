<h1>
<?php
session_start();
print"bienvenue"." ".$_SESSION['username']."\n";
?>
</h1>

<h1>
<?php

print"heure et date de votre inscription"." ".$_SESSION['date'];
//session_destroy();
?>
</h1>

<form name="deconnecter" method="post" action="accueil.php">
<div id="deconnection">
<input type="submit" name="sub" value="Se deconnecter" />
</div>
</form>

<?php
if(isset($_POST['sub'])){
    session_destroy();
    header("Location:authentification.php");

}

?>
<div id="slider">
  <figure>
    <img src="image1.jpg"  alt>
    <img src="image2.jpg"  alt>
    <img src="image3.jpg"  alt>
    <img src="image4.jpg"  alt>
    <img src="image5.jpg"  alt>
  </figure>
</div>
<style>
body{
    background-color: #33C6FF;
}
form{
  
    padding: 0;
}

div#slider {
width:500px;
height:500px;
}

div#slider {
  position: absolute; /* postulat de départ */
  top: 60%; left: 50%; /* à 50%/50% du parent référent */
  transform: translate(-50%, -50%); /* décalage de 50% de sa propre taille */

}



div#slider { width: 80%; max-width: 1000px; }
div#slider figure {
  position: relative; 
  width: 500%;
  margin: 0;
  padding: 0;
  font-size: 0;
  text-align: left;
}

div#slider figure img { width: 20%; height: auto; float: left; }

div#slider { width: 80%; max-width: 1000px; overflow: hidden }
@keyframes slidy {
  0% { left: 0%; }
  20% { left: 0%; }
  25% { left: -100%; }
  45% { left: -100%; }
  50% { left: -200%; }
  70% { left: -200%; }
  75% { left: -300%; }
  95% { left: -300%; }
  100% { left: -400%; }
}

div#slider figure {
  position: relative;
  width: 500%;
  margin: 0;
  padding: 0;
  font-size: 0;
  left: 0;
  text-align: left;
  animation: 20s slidy infinite;
}

</style>