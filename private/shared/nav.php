<?php  session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];?>

<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="nav.css">

        <title>Charity Link</title>
    </head>

<?php
  if (!isset($home_dir)){
    $home_dir = "../public/";
  }
  ?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #303c6c;">
  <a class="navbar-brand" href=<?php echo $home_dir ?> style="color:white">CharityLink</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href=<?php echo $home_dir ?> style="color:white">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href= <?php echo $home_dir."event/events.php" ?> style="color:white">Charities</a>
        </li>
    </ul>
      
    <div class="form-inline my-2 my-lg-0">
      <!-- if user not logged in display next block -->
      <?php 


      // echo $session->id;

      if(! isset($_SESSION['id'])){

      echo "<a class=\"btn btn-outline-success my-2 my-sm-0\" href=" . $home_dir .  "user/login.php style=\"color:white\">Log in</a>
      &nbsp;
      <a class=\"btn btn-outline-success my-2 my-sm-0\" href=". $home_dir . "user/signup.php style=\"color:white\">Sign up</a>";
      }

      else if ( isset($_SESSION['id'])){

      //<!-- if user is logged in display next block -->
      
      echo " <ul class=\"navbar-nav mr-auto\">
          <li class=\"nav-item\">
        <a class=\"nav-link\" id=\"profileButton\" href= " .  $home_dir . "user/user.php style=\"color:white\">" . $_SESSION['username'] . "</a>
      </li>
          <li class=\"nav-item\">
      <a class=\"btn btn-outline-success my-2 my-sm-0\" href=" . $home_dir . "user/logout.php style=\"color:white\">Log out</a>    
          </li>
      </ul>
      ";
      }
      ?>
      
      </div>
<!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
-->
  </div>
</nav>