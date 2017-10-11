<?php

    include 'functions.php';
    
    if (isset($_GET['submit'])) {
        $_SESSION['answerOne'] = $_GET['answerOne'];
        $_SESSION['answerTwo'] = $_GET['answerTwo'];
    }
    
    $answerOne = $_SESSION['answerOne'];
    $answerTwo = $_SESSION['answerTwo'];
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Homework 3 </title>
        <meta charset="utf-8" />
        
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        
        <form method="get" action="">
            
            <fieldset>
                <legend> Question 1 </legend>
                <p>What is the command to push to github?</p>
                <input type="text" name="answerOne" value="<?php echo $answerOne; ?>" />
            </fieldset>
            
            <fieldset>
                <legend> Question 2 </legend>
                <p>What does HTML stand for?</p>
                <input type="text" name="answerTwo" value="<?php echo $answerTwo; ?>" />
            </fieldset>
            
            <fieldset>
                <legend> Question 3 </legend>
                <p>What does PHP stand for?</p>
                <select name="category_1">
                    <option value="">- Select One -</option>
                    <option <?=selectedAnswerThree('Private Home Page')?> >Private Home Page</option>
                    <option <?=selectedAnswerThree('Personal Hypertext Processor')?> >Personal Hypertext Processor</option>
                    <option <?=selectedAnswerThree('PHP: Hypertext Processor')?> >PHP: Hypertext Processor</option>
                </select>
            </fieldset>
            
            <fieldset>
                <legend> Question 4 </legend>
                <p>How do you write "Hello World" in PHP?</p>
                <select name="category_2">
                    <option value="">- Select One -</option>
                    <option <?=selectedAnswerFour('"Hello World";')?> >"Hello World";</option>
                    <option <?=selectedAnswerFour('echo "Hello World";')?> >echo "Hello World";</option>
                    <option <?=selectedAnswerFour('Document.Write("Hello World");')?> >Document.Write("Hello World");</option>
                </select>
            </fieldset>
            
            <fieldset>
                <legend> Question 5 </legend>
                <p>All variables in PHP start with which symbol?</p>
                <div class="size">
                    <input type="radio" id="ans1" name="answer" value="&" <?= ($_GET['answer']=='&')?"checked":"" ?> >
                    <label for="ans1"> & </label> <br />
                    
                    <input type="radio" id="ans2" name="answer" value="$" <?= ($_GET['answer']=='$')?"checked":"" ?> >
                    <label for="ans2"> $ </label> <br />
                    
                    <input type="radio" id="ans3" name="answer" value="!" <?= ($_GET['answer']=='!')?"checked":"" ?> >
                    <label for="ans3"> ! </label>
                </div> <br />
            </fieldset>
            
            <input class="submit" type="submit" name="submit" value="Submit" /> 
        
        </form>
        
        <br /> <br />
        
        <?php
            
            if (isset($_GET['submit'])) {
                if (!empty($_GET['answerOne'])) {
                    if (!empty($_GET['answerTwo'])) {
                        if (!empty($_GET['category_1'])) {
                            if (!empty($_GET['category_2'])) {
                                if (!empty($_GET['answer'])) {
                                    $answerThree = $_GET['category_1'];
                                    $answerFour = $_GET['category_2'];
                                    $answerFive = $_GET['answer'];
                                    echo "<h1>Total points: " . checkAnswers($answerOne, $answerTwo, $answerThree, $answerFour, $answerFive) . "/5 </h1>";
                                } else {
                                    echo "<h2> Question 5 was left blank, please select an answer! </h2>";
                                }
                            } else {
                                echo "<h2>Question 4 was left blank, please select an answer! </h2>";
                            }
                        } else {
                            echo "<h2> Question 3 was left blank, please select an answer! </h2>";
                        }
                    } else {
                        echo "<h2> Question 2 was left blank, please select an answer! </h2>";
                    }
                } else {
                    echo "<h2> Question 1 was left blank, please select an answer! </h2>";
                }
            }
        
        ?>
        
        <hr class="hrColour"/>
        <footer>
            <img id="imgResize" src="img/csumb.jpg" alt="theses"/>
            <div class="foot">
            CST336. 2017&copy; Stine <br />
            <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
            It is used for academic purposes only.
            </div>
        </footer>
        
    </body>
</html>