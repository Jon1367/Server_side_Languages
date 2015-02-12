<?php

session_start();

//home controller

include 'models/view.php';
include 'models/file.php';
include 'models/login.php';
include 'models/profile.php';
include 'models/users.php';



$viewmodel = new view();
$filemodel = new file();
$loginmodel = new login();
$usersmodel = new users();






if(empty($_GET["action"])){

    $viewmodel->getView("views/header.php");



}else{

    if ($_GET["action"] == "home"){

        
        $data = $usersmodel->getUsers();
        // var_dump($data);
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);



    }elseif(($_GET["action"] == "loginForm")){

        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/form.php");
        //$viewmodel->getView("views/footer.php");

    }elseif(($_GET["action"] == "processLogin")){

        $returnedLogin = $loginmodel->checkuser($_POST);


        if($returnedLogin){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["loggedin"] = true;

        }else{
            $_SESSION["username"] = "";
            $_SESSION["loggedin"] = false;
        }

        // $loginmodel->checkuser($_POST);

        // make data equl to return log in
        // created a protect page
        // check if the user's login if not kick back to the log in
         //$data = $_POST;
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$returnedLogin);
        // $viewmodel->getView("views/footer.php");

    }elseif($_GET["action"] == "checkSession"){
        $data = $_SESSION;
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);
       // $viewmodel->getView("views/footer.php");
    }elseif($_GET["action"] == "uploadForm"){

        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/uploadForm.php");


    }elseif($_GET["action"] == "delete"){

        $usersmodel->deleteUser($_GET["id"]);
        $data = $usersmodel->getUsers();
        // var_dump($data);
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);


    }elseif($_GET["action"] == "updateForm"){

        $data = $usersmodel->getUser($_GET["id"]);
        $viewmodel->getView("views/updateForm.php",$data);

        //$usersmodel->deleteUser($_GET["id"]);
        $data = $usersmodel->getUsers();
        //var_dump($data);
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);


    }elseif($_GET["action"] == "update"){

        $data = $usersmodel->updateUser($_POST["username"],$_POST["password"],$_GET["id"]);
        $viewmodel->getView("views/updateForm.php",$data);

        //$usersmodel->deleteUser($_GET["id"]);
        $data = $usersmodel->getUsers();
        //var_dump($data);
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);


    }elseif($_GET["action"] == "uploadAction"){


        $viewmodel->getView("views/header.php");
        // var_dump($_POST);
        // echo "POST DATA";
        // var_dump($_Files);

        $data = $_SESSION;
        $filemodel->upload($_FILES);
        $viewmodel->getView("views/results.php",$data);



    }elseif($_GET["action"] == "addUser"){

  
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/adduser.php");

    }elseif($_GET["action"] == "addingUser"){

      //,$_GET["id"]
        //$data = $_SESSION;
        
        $data = $usersmodel->addUser($_POST["username"],$_POST["password"]);
        $data = $usersmodel->getUsers();
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);

        //$usersmodel->deleteUser($_GET["id"]);
        $data = $usersmodel->getUsers();
        //var_dump($data);

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

    
       
        // var_dump($_FILES);

        
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);
        $viewmodel->getView("views/uploadForm.php");
        // $filemodel->getImage($_FILES);


        

    }
    elseif($_GET["action"] == "logOut"){


        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/form.php");
        // Destory's Session
        session_destroy();
    }
}


?>