<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo BASE_URL; ?>/static/user_end/images/favicon.ico">
        <title>Harkalm Investments</title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo BASE_URL; ?>/static/user_end/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo BASE_URL; ?>/static/user_end/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo BASE_URL; ?>/static/user_end/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?php echo BASE_URL; ?>/static/user_end/css/style.css" rel="stylesheet">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <header id="header">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><img src="<?php echo BASE_URL; ?>static/user_end/images/logo.png" alt="logo" /></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                             <?php if (isset($_SESSION['user_email']) && $_SESSION['user_password'] != '') { ?>
                            <li><a href="<?php echo BASE_URL; ?>user_controller/logout">Log Out</a></li>
                            <li><a href="<?php echo BASE_URL; ?>user_controller/members_view">View Members</a></li>
                              <?php }
                               else { ?>
                            <li><a href="<?php echo BASE_URL; ?>user_controller/user_login">Log In</a></li>
                            <li><a href="<?php echo BASE_URL; ?>user_controller">Sign Up</a></li>
                            <?php } ?>
                        </ul>
                    </div><!--/.navbar-collapse -->
                </div>
            </nav>
        </header>

