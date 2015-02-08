<?php

session_start();

//home controller

include 'models/view.php';

$viewmodel = new view();

if(empty($_GET["action"])){

    $viewmodel->getView("views/header.php");
    $viewmodel->getView("views/body.php");



}else{

    //If statements on user's actions
    if ($_GET["action"] == "home"){


    }elseif(($_GET["action"] == "loginForm")){

        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/form.php");
   
    // Creates the seesion

    }elseif(($_GET["action"] == "processLogin")){

        if($_POST["username"] == "jon"){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["loggedin"] = true;
        }else{
            $_SESSION["username"] = "";
            $_SESSION["loggedin"] = false;
        }

        $data = $_POST;
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);
    

    }elseif($_GET["action"] == "checkSession"){
        $data = $_SESSION;
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);
       
    }elseif($_GET["action"] == "logOut"){


        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/form.php");
        // Destory's Session
        session_destroy();
    }
}


?>