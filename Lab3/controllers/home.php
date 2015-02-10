<?php

session_start();

//home controller

include 'models/view.php';
include 'models/file.php';
include 'models/login.php';



$viewmodel = new view();//instanciating the view(model) to link on this page
$filemodel = new file();
$loginmodel = new login();





if(empty($_GET["action"])){

    $viewmodel->getView("views/header.php"); 

}else{

    if ($_GET["action"] == "home"){

    }elseif(($_GET["action"] == "loginForm")){

        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/form.php");
      

    }elseif(($_GET["action"] == "processLogin")){

        $returnedLogin = $loginmodel->checkuser($_POST);


        if($returnedLogin){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["loggedin"] = true;

        }else{
            $_SESSION["username"] = "";
            $_SESSION["loggedin"] = false;
        }

        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$returnedLogin);


    }elseif($_GET["action"] == "checkSession"){
        $data = $_SESSION;
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);

    }elseif($_GET["action"] == "uploadForm"){

        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/uploadForm.php");


    }elseif($_GET["action"] == "uploadAction"){


        $viewmodel->getView("views/header.php");
        // var_dump($_POST);
        // echo "POST DATA";
        // var_dump($_Files);

        $data = $_SESSION;
        $filemodel->upload($_FILES);
        $viewmodel->getView("views/results.php",$data);



    }elseif($_GET["action"] == "profile"){

        
  
        // $data = $_SESSION;
        // $profileLogin = $profilemodel->getUser($_POST);
        // var_dump($profileLogin);
        //isset($_session[logedin])
        $data = $_SESSION;
        if(isset($_SESSION["loggedin"])){
            if($_SESSION["loggedin"] == false){

            header("Location: ?controller=home&action=loginForm");

            }
        } else{

            header("Location: ?controller=home&action=loginForm");
        }

    
       



        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);
        $viewmodel->getView("views/uploadForm.php");



        

    }
    elseif($_GET["action"] == "logOut"){


        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/form.php");

        session_destroy();
    }
}


?>