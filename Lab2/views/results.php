<!-- foundation links -->
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/normalize.css" />
<script src="js/vendor/modernizr.js"></script>

<div class="row">

	<h1 class="small-6 small-centered columns">Welcome to Gamer Nation</h1>

	<div class="small-4 small-centered columns">

		<h3>Hello  ,
		<?

			echo $par2["username"];

		?>
		</h3>
		<h4>Your Hash Password:</h4>
		<p>
		<?
			echo md5($par2["password"]);
			//$hal
		?>
		</p>
	</div>
</div>
<!-- foundation js -->
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
   $(document).foundation();
</script>
