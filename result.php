<?php
    require_once('connection.php');
    if(isset($_POST['answer'])){
        $answer = $_POST['answer'];
        print_r($answer);
        $sql = "SELECT `answer` FROM `question-bank`";
        $result = $conn->query($sql);
        $correct = 0;
        $incorrect = 0;
        $unattempted = 0;
        $i = 0;
        
        while($row = $result->fetch_assoc()){
            if(isset($answer[$i])){
                if($answer[$i] == $row['answer'])
                    $correct++;
                else $incorrect++;
            }
            else $unattempted++;
            $i++;
        }
    }
    else{
        header('Location: quiz.php');
        exit;
    }

    $total_questions = $i;
    echo $correct.'<br/>';
    echo $incorrect.'<br/>';
    echo $unattempted.'<br/>';
    $percentage = ($correct/$total_questions) * 100;
    echo $percentage.'%';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="questions-style.css">
</head>
<body>
    <img src="2.jpg" class="bg-img" alt="">

    
</body>
</html>