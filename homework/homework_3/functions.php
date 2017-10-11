<?php
    
    session_start();

    function selectedAnswerThree($option) {
        if ($option == $_GET['category_1']) {
            return "selected";
        }
    }
    
    function selectedAnswerFour($option) {
        if ($option == $_GET['category_2']) {
            return "selected";
        }
    }
    
    function checkAnswers($answerOne, $answerTwo, $answerThree, $answerFour, $answerFive) {
        $count = 0;
        
        if ($answerOne == 'git push') {
            $count++;
        }
        if ($answerTwo == 'Hyper Text Markup Language' || $answerTwo == 'hyper text markup language') {
            $count++;
        }
        if ($answerThree == 'PHP: Hypertext Processor'){
            $count++;
        }
        if ($answerFour == 'echo "Hello World";') {
            $count++;
        }
        if ($answerFive == '$') {
            $count++;
        }
        
        return $count;
    }

?>