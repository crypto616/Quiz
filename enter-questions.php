<?php 
    //NEW WORKING PHP SCRIPT

    require_once('connection.php');
    //variable declaration
    $control1 = 0;
    $num_of_questions = 0;
    $question_num_error = '';
    $question_error = '';
    $answer_error = '';
    $answer_array = array();
    $ques_array = array();
    $sent = 0;

    //checking if questions are passed
    if(isset($_GET['questions'])){
        $control1 = 1;
        $num_of_questions = $_GET['questions'];

        if($num_of_questions < 1){
            $control1 = 0;
            $question_num_error = "Please enter a number.";
        }
    }

    
    for($i=0; $i<$num_of_questions; $i++){
        array_push($ques_array, '');
    }
    if(isset($_POST['question'])){
        $control2 = 1;
        $ques_array = $_POST['question'];
        
    if(!isset($_POST['answer']))
    {
        $answer_error = "FILL ALL ANSWERS2";
        $control2 = 0;
    }
    else $answer_array = $_POST['answer'];
  
    
    for($i=0; $i<sizeof($ques_array); $i++){
        //Preventing injections
        $question = $ques_array[$i];
        $question = trim($question);
        //$question = strip_tags($question);
        $question = addslashes($question);

        if($question == ''){
            $question_error = "ALL QUESTIONS REQUIRED";
            $control2 = 0;
            }
        if(!isset($answer_array[$i])){
            print_r($answer_array);
            $answer_error = "FILL ALL ANSWERS2";
            $control2 = 0;
        }
    }

    //Sending data into the database
        if($control2){
            echo "OK";
            for($i=0; $i<sizeof($ques_array); $i++){
                $sql = "INSERT INTO `question-bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$ques_array[$i]', '$answer_array[$i]')";
                $conn->query($sql); 
            }
            echo "Data sent successfully";
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Questions</title>
    <link rel="stylesheet" href="questions-style.css">
</head>
<body>
<img src="2.jpg" class="bg-img" alt="">
<div class="main">

<!-- Form to take input of number of questions -->
<form action="" method="GET">
    <label for="form_num">Enter the number of questions: </label>
    <input type="number" name="questions" id="">
    <button onclick="">Enter</button>
    </form>

    <?php echo $question_num_error; ?>

    <!-- Form to take input of questions running on PHP loop -->
        <form action="" class="form" method="POST">
        <h1>Add your questions!</h1>
        <?php if($question_error != '' || $answer_error != ''){ ?>
        <div class="error-msg"> 
            <?php echo $question_error; ?><br>
            <?php echo $answer_error; ?><br>
        </div> 
        <?php } ?>
        
        <?php for($i=0; $i<$num_of_questions; $i++){?>
        <div class="inputs">
            <div class="question">
                <label for="">Question <?php echo $i+1; ?></label>
                <textarea name="question[]" class="question-text" cols="60" rows="5"><?php echo $ques_array[$i]; ?></textarea>
                <div class="error">
                    
                </div>
                <div class="options">
                    <label><input type="radio" name = "answer[<?php echo $i; ?>]" value="true">True</label>
                    <label><input type="radio" name = "answer[<?php echo $i; ?>]" value="false">False</label>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if($control1){ ?>
        <div class="button"><button>Submit</button></div>
        <?php } ?>
    </form>
</div>

</body>
</html>