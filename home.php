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

    <div class="jumbotron">
        <div class="container">
            <h1>Adam Seppi</h1>
            <p>Always Tinkering. Forever Learning.</p>
        </div>
    </div>

    <div class="about-myself">
        <div class="container">
            <h2>ReadMe</h2>
            <p>I imagine that the backstory behind my pursuits to enter the technology field is shared by a multitude 
                of fellow "tech-enthusiasts".  Like any geek these days, I started out being a little too interested in 
                my Xbox. I became very intrigued by the mysteries of what was powering my childhood passion.  With a crazy 
                imagination, I would tinker around with my videogame controllers and other electronics that I had, albeit 
                some of them unfortutely didn't make it through my experiments...R.I.P.  At the encouragement of a couple 
                of high school teachers, I chose to enroll in the Computer Engineering program at the esteemed University 
                of Illinois at Urbana-Champaign.  At U of I, I took my first two programming classes, and after that, I 
                took a great interest in programming languages.  From that point on, it has been a very fun journey to keep
                expanding my horizons in order to become a great software engineer.</p>
        </div>
    </div>

    <div class="learn-more">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Personal Endeavors</h3>
                    <p>I've tried to spend chunks of my free time exploring some of my interests. Feel free to take a look at past projects I have completed and current projects</p>
                    <p><a href="personalprojects.php">View More</a></p>
                </div>
                <div class="col-md-6">
                    <h3>Class Projects</h3>
                    <p>Through my years at the University of Illinois I have been able to complete some amazing projects.  Some open ended and some assigned. Take a look for yourself!</p>
                    <p><a href="classprojects.php">View More</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
    <div class="container" style="text-align: center">
        <p style="font-size: 12px; color: #696969; padding-top: 12px"> Developed by <a href="home.php" style="color: #696969; font-style: italic">Adam Seppi</a></p>
    </div>
    </div>

</body>
</html>
