<!DOCTYPE html>
<html>
<head> <meta charset="utf-8" />
    <title>Authentification avec AJAX</title></head>
 
<body>
    <div id="resultat">
    </div>
         
        <h1>Un formulaire de connexion en AJAX</h1>
        <a href="/index.php">cliquez ici pour vous inscrire</a>
    <form>
        <p>
        mail : <input type="text" id="mail" />
        Mot de passe : <input type="password" id="password" />
        <input type="submit" id="submit" value="Se connecter !" />
        </p>
    </form>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</body>
</html>
<style>
body {
  background-color: lightblue;
}
}
</style> 
<script>
 
$(document).ready(function(){
 
    $("#submit").click(function(e){
        e.preventDefault();
 
        $.post(
            'connection.php', // Un script PHP que l'on va créer juste après
            {
                mail : $("#mail").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password : $("#password").val()
            },
 
            function(data){
 
                if(data == 'Success'){

                    window.location.href= "/accueil.php";
                }
                else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")
                     //window.location.href= "/index.php";
                     $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                }
         
            },
            'text'
         );
    });
});
 
</script>