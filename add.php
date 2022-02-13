<?php  include 'db.php';
if(isset($_POST['submit'])){
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];
	// Choice Array
	$choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];
	$choice[3] = $_POST['choice3'];
	$choice[4] = $_POST['choice4'];
	$choice[5] = $_POST['choice5'];

 // First Query for Questions Table

	$query = "INSERT INTO questions (";
	$query .= "question_number, question_text )";
	$query .= "VALUES (";
	$query .= " '{$question_number}','{$question_text}' ";
	$query .= ")";

	$result = mysqli_query($connection,$query);
	
	//Validate First Query
	if($result){
		foreach($choice as $option => $value){
			if($value != ""){
				if($correct_choice == $option){
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
			


				//Second Query for Choices Table
				$query = "INSERT INTO options (";
				$query .= "question_number,is_correct,coption)";
				$query .= " VALUES (";
				$query .=  "'{$question_number}','{$is_correct}','{$value}' ";
				$query .= ")";

				$insert_row = mysqli_query($connection,$query);
				// Validate Insertion of Choices

				if($insert_row){
					continue;
				}else{
					die("2nd Query for Choices could not be executed" . $query);
					
				}

			}
		}
		$message = "Question has been added successfully";
	}

	




}

		$query = "SELECT * FROM questions";
		$questions = mysqli_query($connection,$query);
		$total = mysqli_num_rows($questions);
		$next = $total+1;
		

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

    <div class="main">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Add a Question</h1>
                    <?php if(isset($message)){
                        echo "<h2>". $message . "</h2>";
                        }
                    ?>
                    <form method="POST" action="add.php">
                        <fieldset>
                            <p class="card-text mt-3">
                                <h6 class="card-subtitle mb-2 text-muted">Quetion Number:</h6>
                                <input type="number" name="question_number" placeholder="Q.NO" value="<?php echo $next;?>" />
                            </p>
                            
                            <p class="card-text mt-3">
                                <label for="formGroupExampleInput" class="form-label">Question Text:</label>
                                <input type="text" name="question_text" class="form-control" id="formGroupExampleInput" placeholder="Write question">
                            </p>
                            <p class="card-text">
                                <label for="formGroupExampleInput" class="form-label">Choice 1:</label>
                                <input type="text" name="choice1" class="form-control" id="formGroupExampleInput" placeholder="Write choice 1">
                            </p>
                            <p class="card-text">
                                <label for="formGroupExampleInput" class="form-label">Choice 2:</label>
                                <input type="text" name="choice2" class="form-control" id="formGroupExampleInput" placeholder="Write choice 2">
                            </p>
                            <p class="card-text">
                                <label for="formGroupExampleInput" class="form-label">Choice 3:</label>
                                <input type="text" name="choice3" class="form-control" id="formGroupExampleInput" placeholder="Write choice 3">
                            </p>
                            <p class="card-text">
                                <label for="formGroupExampleInput" class="form-label">Choice 4:</label>
                                <input type="text" name="choice4" class="form-control" id="formGroupExampleInput" placeholder="Write choice 4">
                            </p>
                            <p class="card-text">
                                <label for="formGroupExampleInput" class="form-label">Choice 5:</label>
                                <input type="text" name="choice5" class="form-control" id="formGroupExampleInput" placeholder="Write choice 5">
                            </p>
                            
                            <p class="card-text">
                                <label for="formGroupExampleInput" class="form-label">Correct Option Number: </label>
                                <input type="number" name="correct_choice" placeholder="Ans. No." value="" />
                            </p>
                            <input type="submit" name="submit" class="btn btn-primary" value="submit" />
                        </fieldset>
                    </form>

                </div>
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
