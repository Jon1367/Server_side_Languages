<?

class login{

    public function checkuser($user){


    	$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', 'root', 'root');



    	$sql = "select username, password from users where 
    	username = :un and password=:pass";

    	$st=$dbh->prepare($sql);

    	$st->execute(array(":un"=>$user["username"],
    		":pass"=>md5($user["password"])));


    	if($st->fetchAll()){
    		return 1;
    	}else{

    		return 0;
    	}
    }




}


?>