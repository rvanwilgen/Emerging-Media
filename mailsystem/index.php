<?php

	// Classes
	include('lib/classes/mailsystem.php');
	$mailsystem = new mailsystem();
	
	// Views
	$getview = $_GET['view'];
	
	switch ($getview) {
		case 'unsubscribe':		$view = 'lib/views/unsubscribe.php';	break;
		case 'subscribe':		$view = 'lib/views/subscribe.php';		break;
		case 'subscribers':		$view = 'lib/views/subscribers.php';	break;
		case 'login': 			$view = 'lib/views/login.php';			break;
		default: 				$view = 'lib/views/index.php';			
	}

?><html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Mailsystem</title>
    
	<!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" media="screen" href="lib/stylesheets/style.css" />

    <!-- Todo: Favicons 
    <link href="lib/images/favicon.ico" type="image/x-icon" rel="shortcut icon"  />
    <link href="lib/images/favicon-ios.png" rel="apple-touch-icon-precomposed" /> -->


</head>

<body>

<div id="container">

    <ul id="navigation">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?view=login">Login</a></li>
        <li><a href="index.php?view=subscribers">Subscribers</a></li>        
    </ul>
    
    <?php include($view); ?>
    
    </div><!-- container -->

	<!-- Javascipts -->
	<script type="text/javascript" src="lib/javascripts/script.js"></script>

</body>
</html>