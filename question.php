<?php 
	include 'db.php';
	session_start(); 
	//Set Question Number
	$number = $_GET['n'];

	//Query for the Question
	$query = "SELECT * FROM questions WHERE question_number = $number";

	// Get the question
	$result = mysqli_query($connection,$query);
	$question = mysqli_fetch_assoc($result); 

	//Get Choices
	$query = "SELECT * FROM options WHERE question_number = $number";
	$choices = mysqli_query($connection,$query);
	// Get Total questions
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
    <link rel="stylesheet" type="text/css" href="dist/add.css">
    <title>Quiz App</title>
</head>
<body>
    <nav class="navbar shadow-lg sticky-top navbar-light bg-light">
            <h2 class="title ms-3">Quiz App By Abdul Rahman</h2>
    </nav>

    <div class="main mx-auto" style="width: 690px;">
        <div class="card mt-4 shadow-lg">
            <h5 class="current card-header">Question <?php echo $number; ?> of <?php echo $total_questions; ?></h5>
            <form method="POST" action="process.php">
                <div class="card-body">
                    <h5 class="question card-title"><?php echo $question['question_text']; ?></h5>
                    <p class="card-text">
                        <div class="form-check">
                            <ul class="list-unstyled">
                                <?php while($row=mysqli_fetch_assoc($choices)){ ?>
                                <li><input class="form-check-input" type="radio" name="choice" value="<?php echo $row['id']; ?>" id="flexRadioDefault1"><?php echo $row['coption']; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </p>
                    <div class="next d-flex justify-content-end">
                        <input type="hidden" name="number" value="<?php echo $number; ?>">
                        <input type="submit" name="submit" value="Next" class="start btn btn-secondary btn-lg active " role="button" aria-pressed="true" />
                    </div>
                </div>
            </form>
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