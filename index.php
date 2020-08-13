
<style>
body {
  background-color: lightblue;
}
.hidden{
display:none;
visibility:hidden;
}
.form{
    
  position: relative;
  width: 100px;
  height: 100px;

}
</style> 
<form name="inscription" method="post" action="index.php">
            
            Entrez votre nom : <h1><input type="text" name="nom"/></h1><br/>
            Entrez votre prénom : <h1><input type="text" name="prénom"/></h1><br/>
            Entrez votre mail : <h1><input type="text" name="mail"/></h1><br/>
            Entrez votre mot de passe : <h1><input type="password" name="pw"/></h1><br/>
            Entrez votre message : <h1><input type="text" name="message"/></h1><br/>
            <input type="text" name="titre" class="hidden"/>
            <input type="submit" name="valider" value="OK"/>
        </form>
        <a href="/authentification.php">authentification</a>       
        <?php
        $pdo = null;
        $dsn = 'mysql:host=localhost; dbname=base_project';
        $dbUser = 'root';
        $pw = 'root';
        try{
        $pdo = new PDO($dsn,$dbUser,$pw);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo'Connection failed:' .$e->getMessage();
        }

        if(isset($_POST['valider'])){
            if($_POST['nom'] != "" && $_POST['prénom'] != "" && $_POST['mail'] != "" && $_POST['pw'] != "" && $_POST['mail'] != ""){ 
            if(isset($_POST['titre']) && $_POST['titre']!= ""){
               die();
            }
                $nom = $_POST['nom'];
                $prénom = $_POST['prénom'];
                $mail = $_POST['mail'];
                $pw = md5($_POST['pw']);
                $message = $_POST['message'];

                $ts= $pdo->prepare("SELECT* FROM users WHERE(Mail = '$mail')");
                $ts->execute();
                $nb=$ts->rowCount();                
                if($nb == 1){
                    echo "un compte existe déja avec cette adresse mail";
        
               }elseif($nb == 0){
                
                $sth = $pdo->prepare("
                INSERT INTO users (Nom, Prenom, Mail, Pw, Message, Date, Ip)
                VALUES (:nom, :prenom, :mail, :pw, :message, NOW(), :ip)
              ");
              //$sth->bindParam(':prénom', $prénom);
              $ip = $_SERVER['REMOTE_ADDR'];
              $sth->bindParam(':nom', $nom);
              $sth->bindParam(':prenom', $prénom);
              $sth->bindParam(':mail', $mail); 
              $sth->bindParam(':pw', $pw); 
              $sth->bindParam(':message', $message); 
              $sth->bindParam(':ip', $ip);
              $execute = $sth->execute(); 
              if($execute == true){
                     header('authentification.php');
                     $msgSucces = "vos informations sont enregistrées avec succés cliquez sur authentification";
                     
                }else{
                     $msgError = "erreur d'enregistrement";
                }

             }
        }
    }
    

        
    
        ?>

<div>
<?php
if(isset($msgError)){
    echo $msgError;
}
elseif(isset($msgSucces)){
echo $msgSucces;
}
?>
</div>
