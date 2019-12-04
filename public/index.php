<?php 
	$title = "Charity Link";
	// include the header
  include ("../private/shared/header.php");
  require ("../private/database.php");

?>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){

  $user_id = $_SESSION['id'];
  $charity_id = $_GET['id'];
  echo $user_id . $charity_id;
}

  ?>


<html>
    <head>
        <title>Charity Link</title>
    </head>
    <body>
        <div class="view" style="background-image: url('images/blue.gif'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="mask rgba-gradient align-items-center">
                <div class="jumbotron jumbotron-fluid">
                  <div class="container">
                    <h1 class="display-4">Welcome to Charity Link</h1>
                    <p class="lead">The Network that Links Charities and the People.</p>
                  </div>
                </div>
                <div class="container">
                    <div class="row">

                        <style type="text/css">
                        .card-img-top {
                          width: 100%;
                          min-height: 220px;
                          object-fit: cover;
                        }
                        </style>


                        <?php
                        $con = db_connect();

                        $query = "SELECT * FROM post";
                        $result_set = mysqli_query($con, $query);

                        while ($event = mysqli_fetch_assoc($result_set)) {

                          $name = $event['name'];

                          echo "<div class=\"col-sm\"> ";
                          echo "<div class=\"card text-center\" style=\"width: 20rem;\">";
                          echo "  <div class=\"card-body\">";
                          echo "    <h5 class=\"card-title\">" . $name . "</h5>";
                          echo "    <img src=" . $event["imgurl"] . " class=\"card-img-top\" >";
                          echo "    <p class=\"card-text\">" . $description . "</p>";
                          echo "    <a href=event/article.php?id=". $event['id'] . " event/event.php class=\"btn btn-outline-success\">Read more</a>";
                          echo "  </div>";
                          echo "</div>";
                          echo "</div>";

                        }
                        db_disconnect($con);

                          ?>




                        </div>


                    </div> 
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>

<?php
	require("../shared/footer.php");
?>
