
<html>
  <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/normalize.css"/>
<div id="info">
<?

// PHP
// echo $_POST["firstname"];

function store($aray){

	
	$info = array();

	foreach ($aray as $key => $value) {
		# code...

		array_push($info,$key,$value);
	}

	// echo var_dump($info);

	return $info;

}

$info = store($_POST);




foreach ( $info as $key) {
	# code...

	echo "<p class = 'info'>".$key ."</p> ";

	

		if ($key == 'FL') {
			# code...
			echo "<p class = 'info'>"."Sun Shine State"."</p>";
		}
		if ($key == 'NY') {
			# code...
			echo "<p class = 'info'>"."New York "."</p>";
		}
	
}



?>
</div>
</html>