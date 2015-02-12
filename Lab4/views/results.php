
<div class="row">

	<h1 id="rHeader">All Users</h1>

	<div class="small-3 large-centered columns">
		<?

		 //    echo $par2["username"];
			// echo md5($par2["password"]);
		  
			foreach ($par2 as $user) {

				echo $user["username"];
				echo " <a class='red' href='?controller=home&action=delete&id=".$user["id"]."'>delete</a>";
				echo " <a href='?controller=home&action=updateForm&id=".$user["id"]."'>update</a>";

				echo "<br>";

				# code...
			}
		?>
	</div>	
</div>
