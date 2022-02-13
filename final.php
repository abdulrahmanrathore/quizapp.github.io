<?php 

session_start();

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
            <h5 class="current card-header">Your Result</h5>
            <form method="POST" action="process.php">
                <div class="card-body">
                    <h5 class="question card-title">Congratulation You have completed this test succesfully.</h5>
                    <p class="card-text"> 
                        <p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?>  </p>
				        <?php unset($_SESSION['score']); ?>   
                    </p>
                </div>
            </form>
            <div class="front d-flex justify-content-end p-5">
                <a href="index.php" class="btn btn-secondary">Go to Starting page</a>
            </div>
        </div>
    </div>


    <footer>
        <div class="mt-1 footer-copyright text-center py-3">© 2021 Copyright:
            <a href=""> Abdul Rahman</a>
        </div>
    </footer>

    <script type="text/javascript" src="dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
</body>
</html>