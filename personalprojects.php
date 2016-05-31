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
        <link rel="stylesheet" href="projects.css">
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
        <h1 style="font-size: 48px; padding-top: 50px; padding-bottom: 50px">My Personal Projects</h1>
    </div>



    <div class="container marketing">
    <!-- START THE FEATURETTES -->
      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Arduino Timing Lock.</h2>
          <p class="lead">I took up an interest in Arduino and created a simple timing-based passcode 
                          lock that utilizes a servo motor and 3 buttons.  Arduino is a pretty amazing 
                          little piece of technology.  I wish I had one in high school.  I had a heck 
                          of a lot of free time in high school that could have been put to better use. 
                          Also, I would’ve been exposed earlier to the “Arduino programming language” 
                          which is basically C with some C++ capabilities.  The link below will show you my 
                          source code and a little of how the electronic components work.</p>
                          <a class="lead" href="arduino.php">View More</a> 
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="arduino.png" alt="Arduino Logo">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">The AdamSeppi Website</h2>
          <p class="lead">Honestly, this website is a project in and of itself.  I was talking to a mentor 
                          of mine who suggested that I make myself a webpage to show myself off, which was 
                          obviously a good idea.  I used the time I had between school ending and my internship 
                          beginning to create a page all about me.  I didn’t want to pay for templates, themes, 
                          hosting, etc. so I gained a valuable understanding of web development.  And all for 
                          under $1 for the first year (it seems that as a college student I’ve learned to be a 
                          bit frugal).  If anyone’s interested at all in how to do this, please click this link 
                          and I’ll explain how I was able to start this up.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" src="adamseppidotcom.png" alt="Adam Seppi Dot Com">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">WebGL Projects</h2>
          <p class="lead">I took an interest my junior year of college in computer graphics.  Primarily do to a 
                          class at the University of Illinois: CS418 – Interactive Computer Graphics.  The projects 
                          we created were pretty open ended, and I wanted to show them off to my friends and family 
                          without them having go out of their way to install Xcode or Visual Studio.  I decided 
                          to work on converting the projects from OpenGL in C++ to a front-facing web application.  
                          These are currently a work in progress and I hope to have them up soon!!  Here are links 
                          to the videos demonstrating the OpenGL versions:</p>
                          
                          <li class="lead" style="line-height: 8px;"><a href="https://youtu.be/TXDIUacZZTQ">A Big “I”</a></p>
                          <li class="lead" style="line-height: 8px;"><a href="https://youtu.be/25CTsF0leNQ">A Pretty Sweet Flight Simulator</a></p>
                          <li class="lead" style="line-height: 8px;"><a href="https://youtu.be/4s5iOQmqC_0">A Very Rad' Teapot</a></p>
                          
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="teapots.png" alt="Teapots">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">3D Siebel Center</h2>
          <p class="lead">This project is a step back from coding, however, it is a skill I’ve been interested in 
            learning for a while.  An employee from the Computer Science department requested help in generating a 3D 
            model of the Siebel Center building on our campus.  The download link to this model is to be used by 
            computer science students in the upcoming holiday newsletter so that they can 3D print their very own 
            scaled Siebel Center.  I decided to volunteer for this project and it became my responsibility.  I am now 
            the lead of a two person group aiming to complete this project.  I have been working in Google’s SketchUp 
            software, and I am quickly getting the hang of CAD. Upon completion, I will post the link to this as well…
            A first-draft screenshot of the model is shown on the left.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" src="siebel3d.png" alt="Siebel Center">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Xbox Controller Rapid Fire “Mod”</h2>
          <p class="lead">This was one of my first “real” projects that had engineering aspects involved.  I remember 
                          playing Call of Duty online seeing players who could shoot semi-automatic weapons that seemed 
                          as fast as fully automatic ones.  There was just no way they could press the trigger on the 
                          controller that fast.  Well, it turns out, these guys were just being a little smarter than 
                          the controller.  I looked up how they were doing this, and it was a little ingenious hack to 
                          the standard Xbox controller that took less than $5 for me to do. <a href="#">Let me show you how!</a></p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="xboxcontroller.png" alt="Xbox Controller">
        </div>
      </div>

      <p></p>

      <!-- /END THE FEATURETTES -->
    </div>


    <div class="footer">
    <div class="container" style="text-align: center">
        <p style="font-size: 12px; color: #696969; padding-top: 12px"> Developed by <a href="home.php" style="color: #696969; font-style: italic">Adam Seppi</a></p>
    </div>
    </div>

</body>
</html>