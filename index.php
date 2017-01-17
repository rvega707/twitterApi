<?php

	require "twitteroauth/autoload.php";

	use Abraham\TwitterOAuth\TwitterOAuth;

	$consumerkey = "JEpzkzYnRegbvKSjkcn9gVfgC";

	$consumersecret = "xcmrIeMNLlwvrQkiApLzgGQ6Bx9ZA0qT3ZvijAtAgttBebbZTr";

	$accesstoken = "2255994368-kS6stWhw9b2O90QKT9B7vjcb0aPCFDIV1gFy3Nv";

	$accesstokensecret = "HNxz9ksBRUYeMUXyVC9XgKIHt0htpnMnSKQVlIKJWlwzI";


$connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$content = $connection->get("account/verify_credentials");

$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Twitter Api</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <style type="text/css">
    	img {
    		width: 300px;
    	}
    	
    	.container {
    		background-color: #33CCFE;
    		text-align: center;
    	}

    	body {
    		background-color: white;
    	}
    	#content {
    		margin: 0 auto;
    	}
    </style>

  </head>
  <body>
  <div class="container">
    <img src="logo.png">

    <div id="content"><?php
	foreach ($statuses as $tweet) {

		if ($tweet->favorite_count >= 2){
			
			$status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
			echo $status->html; 
		}
	}


    ?></div>

   </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>