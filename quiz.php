<?php
    require_once('connection.php');

    //PHP SCRIPT FOR QUESTIONS
    $question_array = array();
    $answer_key = array();
    $question_total = 0;
    $user_answers = array();
   
    $count=0;
    $result = $conn->query("SELECT `question_id`, `question` FROM `question-bank` WHERE 1");
    while($row = mysqli_fetch_array($result)){
        array_push($question_array, $row['question']);
        array_push($answer_key, $row['question_id']);
        $count++;
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="questions-style.css">
    <title>Quiz</title>
    <script>
        window.onblur = ()=>{
            alert('Aukaat me raho bhosdike')
        }
    </script>
</head>
<body>
    <img src="2.jpg" class="bg-img" alt="">

    <div class="main">
        <div class="form">
            <h1>Here's Your Quiz</h1>
            <form action="result.php" class="form" method="POST">
            <label for="name">Name</label>

            <!-- PHP loop for printing out questions -->
                    <?php for($i=0; $i<$count; $i++){ ?>
                    <div class="question-set">
                        <div class="question-label">
                            <label class="question_tag">
                                <?php echo "Ques.".($i+1); ?>
                            </label>
                        </div>
                        <div class="questions">
                                <?php echo $question_array[$i]; ?>  
                        </div>
                        <div class="answers">
                            <label>
                                <input type="radio" name="answer[<?php echo $i; ?>]" value="true" checked="answer[<?php echo $i; ?>]">
                                <span>True</span>
                            </label>
                            <label>
                                <input type="radio" name="answer[<?php echo $i; ?>]" value="false">
                                <span>False</span>
                            </label>
                        </div>
                    </div>
                    <?php } ?>
                    <button type="submit">Submit</button>
            </form>

        </div>

    </div>
</body>
</html>