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

   
 
    if( isset($_POST['mail']) && isset($_POST['password']) ){
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $req1 = $pdo->query("SELECT* FROM users WHERE(Mail = '$mail')");
        $donnees1 = $req1->fetch();
       

        $ts= $pdo->prepare("SELECT* FROM users WHERE(Mail = '$mail')");
        $ts->execute();
        $result = $ts->fetch(PDO::FETCH_ASSOC);
        $nb=$ts->rowCount(); 
        if($nb==1){ // Si les infos correspondent...
           
            session_start();
            $_SESSION['username'] = $result['Nom'];
            $_SESSION['date'] = $result['Date'];
            echo "Success";    
        }
        else{ // Sinon
            echo "Failed";
        }
    }
?>