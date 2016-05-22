<?php

session_start();

ini_set('display_errors', 1);

include("counter.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>AdamSeppiWebpage</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
<body>

    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Add Logo -->
        <div class="navbar-header">
            <a href="home.php" class="navbar-brand pull-left">AdamSeppi</a>
            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>
        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                <li class=""><a href="home.php">Home</a></li>
                <li class=""><a href="#">About</a></li>
                <li class=""><a href="contacthtml.php">Contact</a></li>

                <!-- Dropdown Menu -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle-left" data-toggle="dropdown">Browse <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class=""><a href="personalprojects.php">Personal Projects</a></li>
                        <li class=""><a href="classprojects.php">Class Projects</a></li>
                        <li class=""><a href="resume2015.pdf" download>Resumé</a></li>
                    </ul>
                </li> 
            </ul>
        </div>
    </div>
    </nav>

    <div class="container">
        <h1>My Personal Projects</h1>
    </div>


    <div class="footer">
    <div class="container" style="text-align: center">
        <p style="font-size: 12px; color: #696969; padding-top: 12px"> Developed by <a href="home.php" style="color: #696969; font-style: italic">Adam Seppi</a></p>
    </div>
    </div>

</body>
</html>