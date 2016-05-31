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
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
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
	        <h1 style="font-size: 42px; padding-top: 40px; padding-bottom: 40px">Arduino Timing Lock</h1>
	</div>

	<div class="container marketing">
	<hr class="featurette-divider">
		<div class="row featurette">
        <div class="col-md-9 col-md-push-3">
          <h2 class="featurette-heading"><span class="text-muted">A Little Background First...</span></h2>
          <p class="lead" style="font-size: 18px">I had been thinking about adding a passcode lock to my room for some amount of time, but I thought with Arduino, 
          				  I might be able to do this on my own instead of buying one.  This project began as almost a joke I guess you 
          				  could say.  I had roommates during college, who, after a night on the town wanted to keep the party going back at 
          				  our place.  The aforementioned roommates also thought that I was just as excited to hang out with them when they got 
          				  back and would barge into my room and wake me up.  I got to thinking that there could be a way to fool them even 
          				  if they already knew the code!  My thought was to add a second level of security to a passcode lock: rhythm.  
          				  This way, a person needs to have a good sense of timing <span style="font-style: italic">as well as</span> the code to bypass the lock.  I ran with this 
          				  idea and created a circuit that activated a servo motor if the button combination was correct <span style="font-style: italic">along with</span> a 
          				  correct ratio of time between the five button presses.</p>
        </div>
        <div class="col-md-3 col-md-pull-9">
          <img class="featurette-image img-responsive center-block" style="border-radius: 40%;"src="timelockon.jpeg" alt="Arduino Unlocked">
        </div>
      </div>
	</div>

    <div class="container marketing">
    <hr class="featurette-divider" style="padding-bottom: 30px">
        <h1>The Big Idea</h1>
        <p>The main idea for this project was to implement the functionality of a passcode lock. I started by hooking up the electrical components on the breadboard and gathering an understanding of the electromechanical nature of a servomotor system. Beneath my source code is a schematic for the circuit for in depth reference.</p>
        <p>Once I was able to properly control the servo motor, I moved on to trying to activate the servo only when the user inputs a correct code.  This was relatively simple, but I had multiple options to consider.  I chose to use a polling based code that sits in a while loop until it receives a “valid press” signal from a helper function.  The helper function sets the corresponding button flag which is checked upon returning to the main loop. If the reset button is pressed, all stored input and counters are reset. After 5 valid presses have been stored, the input is checked against the key. If correct the servo opens, but if the input is invalid, the LED flashes thrice and the same functionality as a reset press occurs.</p>
        <p><span style="font-weight: bold">WHY POLLING?</span> An alternative method that may provide slightly more accurate timing functionality is using the Arduino’s interrupts. Since Arduino UNO (the model I used) only has two functioning interrupt ports, a little hack must be implemented.  All of the buttons can be connected to a single interrupt port AS WELL AS their unique port.  This would eliminate the need for my code to sit in a while loop as the interrupts from a button press would override the current running code.  Since I would still need to poll the unique ports to find which button triggered the interrupt, I figured I would not use this method as it didn’t truly help my functionality.</p>
        <p>Now on to adding the timing upgrade to the passcode lock…  My original method was hard-coding the timing constraints that must be satisfied with a max and min difference of 20 milliseconds (I know, I know, hard-coding is ignorant, but hey, you live and you learn) .  Now inside the valid press function, after I set the button flag, I record the time in milliseconds once the “valid press” is recognized. I store the difference between the last button press and the current button press into a “times” array.  These differences are later checked against the hard-coded timing constraints.  Through some user testing, I recognized even the best of us aren’t perfect metronomes, and so I allow for a 1 mistake buffer where the lock will still open.</p>
        <p style="padding-bottom: 20px">It was still bugging me, though, that even with a relatively simple timing pattern, this was awfully difficult to pass.  Especially when coming back to the lock the next day where the rhythm in your head is a little hazy.  I decided to fix this by changing the hardcoded times to hardcoded percentages.  Now I normalize the time differences by the total time of the combination of all the button presses.  This way, as long as you know the rhythm it isn’t affected if one day you’re moving a little slow or if you’re a little hyped up on some coffee or Red Bull. It turns out that this modification made the lock much more user friendly. <span style="font-style: oblique">Check out the code below for in depth explanation in the comments...</span></p>
        <div class="row">
            <div class="col-md-8 col-md-push-2">
                <div class="well" style="height: 500px; overflow-y: auto">
<pre class="prettyprint">    
    #include <Servo.h>
    const int reset = 2;
    const int one = 4;
    const int two = 5;
    const int three = 6;
    const int led = 7;
    Servo myServo;
    volatile int pressedflag = 0;
    int i=0;
    int numbers[5]={};
    int numberskey[5]={1,1,2,3,3};
    //unsigned long times[5]={};

    //Percentage Thresholds
    float perckey[8] = { 
                      .05,.15,       //between 1-2
                      .35,.45,       //between 2-3
                      .35,.45,       //between 3-4
                      .05,.15        //between 4-5
                    };

    //To store times
    float perc[4] = {};

    /*
    unsigned long timesminkey[5]={53,240,63,245,201};//{63,250,73,255,211};
    unsigned long timesmaxkey[5]={113,360,123,355,291};//{103,350,113,345,281};
    */


    unsigned long buttontime = 0;
    unsigned long lastbuttontime = 0;
    int flag1=0;
    int flag2=0; 
    int flag3=0;
    int flagreset=0;
    int wrongflag=0;
    int wrongcount=0;
    int x=0;
    long temp=0;

    //To speed up normalization  Might be faster in crucial area to leave this out.  ie. Where do we need to be fast? button recording or checking?
    float runningtotal=0;

    void setup() {
      myServo.attach(3);
      myServo.write(0);
      delay(1000);
      pinMode(one, INPUT);
      pinMode(two, INPUT);
      pinMode(three, INPUT);
      pinMode(led, OUTPUT);
      pinMode(reset, INPUT);
      digitalWrite(led, LOW);
      //attachInterrupt(0, changeflag, RISING);
      Serial.begin(9600);
      for(i=0;i<5;i++)
        numbers[i]=0;
      for(i=0;i<4;i++)
        perc[i]=0;
      i=-1;
      delay(100);
    }

    void loop() {
      // put your main code here, to run repeatedly:
      while(1){
        if(validpress()){
          if(flag1){
            numbers[i]=1;
            //flag1=0;
            break;
          }
          if(flag2){
            numbers[i]=2;
            //flag2=0;
            break;
          }
          if(flag3){
            numbers[i]=3;
            //flag3=0;
            break;
          } 
          if(flagreset){
            digitalWrite(led, LOW);
            flagreset=0;
            for(i=0;i<5;i++){
              numbers[i]=0;
            }
            for(i=0;i<4;i++){
              perc[i]=0;
            }
            myServo.write(0);
            i=-1;  
            runningtotal=0;
          }        
        } 
      }

      Serial.print(numbers[0]);
      Serial.print(numbers[1]);
      Serial.print(numbers[2]);
      Serial.print(numbers[3]);
      Serial.print(numbers[4]);
      //Serial.print(numbers[5]);
      Serial.println();
      Serial.print(numberskey[0]);
      Serial.print(numberskey[1]);
      Serial.print(numberskey[2]);
      Serial.print(numberskey[3]);
      Serial.print(numberskey[4]);
      Serial.println();
      //Serial.println(numberskey[5]);
      if(i==4){
        for(x=0;x<5;x++){
          if(numbers[x]!=numberskey[x]){
            Serial.println("wrong code");
            wrongflag=1;
          }
        }
        Serial.println();
        //Normalize here!
        for(x=0; x<4; x++){
           runningtotal=runningtotal+perc[x];
        }
        Serial.println(runningtotal);
        for(x=0;x<4;x++){
            Serial.print(perc[x]);
            Serial.print("  /   ");
            Serial.print(perc[x]/runningtotal);
            Serial.print(" for x = ");
            Serial.println(x);
          if( ((perc[x]/runningtotal) < perckey[2*x]) || (perc[x]/runningtotal > perckey[2*x+1])){
            Serial.println("wrong time");
            wrongcount++;
          }
        }

        if(wrongcount>1){
          wrongflag=1;
        }
        Serial.print("wrongflag = ");
        Serial.println(wrongflag);

        if(wrongflag==0){
          digitalWrite(led, HIGH);
          myServo.write(50);
        }

        else{
          digitalWrite(led, HIGH);
          delay(100);
          digitalWrite(led, LOW);
          delay(100);
          digitalWrite(led, HIGH);
          delay(100);
          digitalWrite(led, LOW);
          for(i=0;i<5;i++){
            numbers[i]=0;
          }
          for(i=0;i<4;i++){
            perc[i]=0;
          }
          myServo.write(0);
          i=-1;
          wrongflag=0;
          wrongcount=0;
          runningtotal=0;
        }
      }

    //  Serial.print(numbers[6]);
    //  Serial.print(numbers[7]);
    //  Serial.print(numbers[8]);
    //  Serial.print(numbers[9]);

      Serial.println();
      delay(10);
    }

    boolean validpress(){
      
      if(digitalRead(one) && flag1==0){
        buttontime = millis();
        flag1=1;
      }
      else if(digitalRead(two) && flag2==0){
        buttontime = millis();
        flag2=1;
      }
      else if(digitalRead(three)&& flag3==0){
        buttontime = millis();
        flag3=1;
      }
      else if(digitalRead(reset)){
        buttontime = millis();
        flagreset=1;
      }
      
      if(!digitalRead(one)){
        flag1=0; 
      }
      if(!digitalRead(two)){
        flag2=0; 
      }
      if(!digitalRead(three)){
        flag3=0; 
      }
      
      if(buttontime-lastbuttontime>0){
        i++;
        Serial.print("press ");
        Serial.print(i);
        Serial.print(" = ");
        Serial.println(buttontime-lastbuttontime);
        if(i>0 && i<5){
          perc[i-1] = buttontime-lastbuttontime;
        }
        lastbuttontime = buttontime;
        return true;
      }
      else{
        return false;
      }
    }
    //void changeflag(){
    //  pressedflag=1;
    //}</div>
            </pre>
          </div>
        </div>
        <img class="center-block" style="margin: auto" src="timelockdiagram.png" alt="Arduino Block Diagram">
      </div>
    </div>


    <div class="container" style="padding-bottom:20px">
    <hr class="featurette-divider">
      <div style="text-align: center">
        <h1 style="padding: 0; margin: 0;">Video Demo</h1>
        <h2 class="text-muted" style="padding: 0; margin: 0;">(For visual learners)</h2>
      </div>
        <div class="row">
          <div class="col-md-6">
              <img class="center-block" style="margin-left: auto; margin-right: auto; margin-top: 21px; border-radius: 10px" width="320" height="589" src="timelock.png" alt="Time Lock">
          </div>
          <div class="col-md-6">
            <video class="center-block" style="margin: auto; padding: 0;" width="320" height="610" controls>
              <source src="timelock.mp4" type="video/mp4">
              Your browser does not support the video tag.
            </video>
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
