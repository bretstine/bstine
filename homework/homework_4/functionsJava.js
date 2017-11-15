function checkAnswers() {
    
    var count = 0;
    
    $("#firstAns").empty();
    var answerOne = document.getElementById("answerOne").value;
    if (answerOne == "git push") {
        $("#firstAns").append("<h3 style='color:green; text-shadow:1px 1px black'>Correct Answer!</h3>");
        count++;
    } else if (answerOne == "") {
        alert("Question 1 was left blank");
        return;
    } else {
        $("#firstAns").append("<h3 style='color:red; text-shadow:1px 1px black'>Incorrect Answer! Correct answer is 'git push'");
    }
    
    $("#secondAns").empty();
    var answerTwo = document.getElementById("answerTwo").value;
    if (answerTwo == "Hypertext Markup Language" || answerTwo == "hypertext markup language") {
        $("#secondAns").append("<h3 style='color:green; text-shadow:1px 1px black'>Correct Answer!</h3>");
        count++;
    } else if (answerTwo == "") {
        alert("Question 2 was left blank");
        return;
    } else {
        $("#secondAns").append("<h3 style='color:red; text-shadow:1px 1px black'>Incorrect Answer! Correct answer is 'Hypertext Markup Language'");
    }
    
    $("#thirdAns").empty();
    var category_1 = document.getElementById("category_1");
    var ansCat_1 = category_1.options[category_1.selectedIndex].value;
    if (ansCat_1 == 3) {
        $("#thirdAns").append("<h3 style='color:green; text-shadow:1px 1px black'>Correct Answer!</h3>");
        count++;
    } else if (ansCat_1 == "") {
        alert("Question 3 was left blank");
        return;
    } else {
        $("#thirdAns").append("<h3 style='color:red; text-shadow:1px 1px black'>Incorrect Answer! Correct answer is 'PHP: Hypertext Preprocessor'");
    }
    
    $("#fourthAns").empty();
    var category_2 = document.getElementById("category_2");
    var ansCat_2 = category_2.options[category_2.selectedIndex].value;
    if (ansCat_2 == 2) {
        $("#fourthAns").append("<h3 style='color:green; text-shadow:1px 1px black'>Correct Answer!</h3>");
        count++;
    } else if (ansCat_2 == "") {
        alert("Question 4 was left blank");
        return;
    } else {
        $("#fourthAns").append('<h3 style="color:red; text-shadow:1px 1px black">Incorrect Answer! Correct answer is `echo "Hello World";`');
    }
    
    $("#fifthAns").empty();
    var ansRadio = "";
    if (document.getElementById('ans2').checked) {
        ansRadio = document.getElementById('ans2').value;
        $("#fifthAns").append("<h3 style='color:green; text-shadow:1px 1px black'>Correct Answer!</h3>");
        count++;
    } else if (ansRadio == "") {
        alert("Question 5 was left blank");
        return;
    } else {
        $("#fifthAns").append("<h3 style='color:red; text-shadow:1px 1px black'>Incorrect Answer! Correct answer is '$'");
    }
    
    $("#final").empty();
    $("#final").append("<br /> <br />");
    $("#final").append("<h1>Total Score: " + count + "/5</h1>");
    
}