<?php

session_start();

require_once('helpers/security.php');

ini_set('display_errors', 1);

$success = isset($_SESSION['success']) ? $_SESSION['success'] : [];
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

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
        <div class="row">
            <h1 class="page-header text-center">Tell Me Somethin' Good!</h1> 
                <form id="contact-form" method="post" action="contact.php" role="form">
                    <div class="messages"></div>
                        <div class="controls">


                            <?php if(empty($success)): ?>
                            <div class="row" style="padding-top: 15px">
                                <div class="test">
                                    <div class="col-xs-1 col-xs-offset-3">
                                        <label class="control-label">Name</label>
                                    </div>
                                    <div class="col-xs-6" style="padding-left: 50px">
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="First and Last Name" autocomplete="off" <?php echo isset($fields['name']) ? 'value="'. e($fields['name']) .'"' : '' ?>>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="test">
                                    <div class="col-xs-1 col-xs-offset-3">
                                        <label class="control-label">Email</label>
                                    </div>
                                    <div class="col-xs-6" style="padding-left: 50px">
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="example@domain.com" autocomplete="off" <?php echo isset($fields['email']) ? 'value="'. e($fields['email']) .'"' : '' ?>>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="test">
                                    <div class="col-xs-1 col-xs-offset-3">
                                        <label class="form_subject">Subject</label>
                                    </div>
                                    <div class="col-xs-6" style="padding-left: 50px">
                                        <input id="form_subject" type="text" name="subject" class="form-control" placeholder="Whatcha wanna talk about?" autocomplete="off" <?php echo isset($fields['subject']) ? 'value="'. e($fields['subject']) .'"' : '' ?>>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="test">
                                    <div class="col-xs-1 col-xs-offset-3">
                                        <label class="form_message">Message</label>
                                    </div>
                                    <div class="col-xs-6" style="padding-left: 50px; padding-bottom: 10px">
                                        <textarea id="form_message" type="text" name="message" class="form-control" placeholder="Your message..." rows="4" data-error="required" autocomplete="off"><?php echo isset($fields['message']) ? e($fields['message']) : '' ?></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>


                            <?php //print_r($success); ?>
                            <?php if(!empty($errors)): ?>
                                <div class="col-xs-6 col-xs-offset-4" style="padding-left: 50px">
                                    <div class="alert alert-danger" role="alert"><ul><li><?php echo implode('</li><li>', $errors); ?></li></ul></div>
                                </div>
                            <?php endif; ?>


                            <div class="row">
                                <div style="padding-top:30px">
                                    <div class="col-xs-2 col-xs-offset-5">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="test">
                                    <div class="col-xs-2 col-xs-offset-5">
                                        <input type="submit" class="btn btn-success btn-send" value="Send Message">
                                    </div>
                                </div>
                            </div>

                            <?php endif; ?>
                            <?php if(!empty($success)): ?>
                                <div class="col-xs-6 col-xs-offset-3" style="padding-left: 50px; text-align: center">
                                    <div class="alert alert-success" role="alert">Thank you! Your message has been delivered. I will respond shortly!!</div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </form>
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

<?php 

    if(isset($success)){
        unset($_SESSION['success']);
    }
        unset($_SESSION['errors']);
        unset($_SESSION['fields']);

?>