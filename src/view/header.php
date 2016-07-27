<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Theme Made By www.w3schools.com - No Copyright -->
        <title><?php echo $this->title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            .jumbotron {
                background-color: #333333;
                color: #fff;
                padding: 100px 25px;
            }

            footer .glyphicon {
                font-size: 20px;
                margin-bottom: 20px;
                color: #f4511e;
            }

            .footer{

                margin-top: 200px;
            }

            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            footer {
                background-color: #f2f2f2;
                padding: 25px;
            }

            .carousel-inner img {
                width: 100%; /* Set width to 100% */

                margin: auto;
                min-height: 100px;
            }

            @media (max-width: 200px) {
                .carousel-caption {
                    display: none; 
                }
            }
        </style>
    </head>
    <body>
    </style>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php /* if (Controller\UserController::check())
                      echo '<li><a>Xin chào ' . Controller\UserController::user() . '</a></li><li><a href="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
                      else
                      echo '<li><a href="#" id="myBtn"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                     */ ?>

                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <h1>Company</h1>
        <p>We specialize in blablabla</p>
    </div>