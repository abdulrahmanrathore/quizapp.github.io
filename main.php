<?php 
include 'db.php';
$query = "SELECT * FROM questions";
$total_questions = mysqli_num_rows(mysqli_query($connection,$query));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-utilities.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-utilities.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="dist/style.css">
    <title>Quiz App</title>
</head>
<body>
    <nav class="navbar shadow-lg sticky-top navbar-light bg-light">
            <h2 class="title ms-3">Quiz App By Abdul Rahman</h2>
    </nav>

    <div class="main mx-auto" style="width: 500px;">
        <div class="card mt-4 shadow-lg">
            <h5 class="card-header">Test Your Knowledge</h5>
            <div class="card-body">
                <h5 class="card-title">This is multiple choice quiz to test your Knowledge</h5>
                <p class="card-text">
                    <ul>
                        <li> <strong>Number of questions</strong> <?php echo $total_questions; ?> </li>
                        <li> <strong>Type:</strong> Multiple Choice</li>
                        <li> <strong>Estimate Time:</strong> <?php echo $total_questions*1.5; ?> </li>
                    </ul>
                </p>
                <a href="question.php?n=1" class="start btn btn-secondary btn-lg active" role="button" aria-pressed="true">Start Quiz</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="mt-5 footer-copyright text-center py-3">© 2021 Copyright:
            <a href=""> Abdul Rahman</a>
        </div>
    </footer>

    <script type="text/javascript" src="dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
    
</body>
</html>