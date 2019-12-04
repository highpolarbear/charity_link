<?php 
  $title = "Charity Link";
  require("event_path.php");
	// include the header
  require("../../private/shared/header.php");
  require ("../../private/database.php");

?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../nav.css">

        <title>Charity Link</title>
    </head>
    <body>

    <style type="text/css">
      .img-fluid {
        width: 40%;
        min-height: 220px;
        object-fit: cover;
      }
      </style>

    <?php

      $con = db_connect();

      $query = "SELECT * FROM post";
      $result_set = mysqli_query($con, $query);

      while ($event = mysqli_fetch_assoc($result_set)) {

        if ($event['id'] == $_GET['id']){
          $name = $event['name'];
          $description = $event['description'];


          echo " <center>";
          echo "  <div class=\"card-body\">";
          echo "    <h1 class=\"card-title\">" . $name . "</h1>";
          echo "    <img src=" . $event["imgurl"] . " class=\"img-fluid\" >";
          echo "    <p class=\"text-justify\">" . $description . "</p>";
          echo "  </div>";
          echo " </center>";

        }
        
      }
      db_disconnect($con);

    ?>

        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>

<?php
	require("../../private/shared/footer.php");
?>