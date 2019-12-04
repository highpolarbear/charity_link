<?php 
	$title = "Charity Link";
	// include the header
	require("user_path.php");
  require("../../private/shared/header.php");

  require_once("../../private/initialize.php"); 
  
  if (!$_SESSION['logged_in']){
    redirect_to(url_for("/user/login.php"));
  }

  $user = User::find_by_id($_SESSION['id']);
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

        
        <div class="jumbotron jumbotron-fluid" style="background-color: #c0e3e5;">
          <div class="container">
            <h1 class="display-4">Profile</h1>
            <p class="lead">Welcome back, <?php echo $_SESSION['username']; ?></p>
          </div>
        </div>
        
        <div class="container">
            <br/>
            <div class="row">
                <div class="col-md">
                    <a href="../event/events.php" class="btn btn-outline-success btn-block">Join charity event</a>
                </div>
                <div class="col-md">
                    <a href="../event/eventform.php" class="btn btn-outline-success btn-block">Create charity event</a>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md">
                    <div class="card text-center">
                          <div class="card-body">
                            <h5 class="card-text" style="text-align:center; font-weight:bold; text-decoration: underline; font-size: 2rem;">Charity events participated in</h5>
                              <?php
                                $events = $user->get_all_events_participated();
                                if (sizeof($events) == 0){
                                  echo '<br/>Fill up this list by going to wholesome charity events!';
                                }
                                foreach ($events as $event){
                                  echo '<br/>
                                  <div class="row">
                                      <div class="col-md-4">
                                              <img src="images/charity_icon.png" class="card-img" alt="...">
                                      </div>

                                      <div class="col-md-8">
                                          <div class="card text-center">
                                            <div class="card-body">
                                              <h5 class="card-title"><b>'.$event->name.'</b></h5>
                                              <p class="card-text">'.$event->description.'</p>
                                              <a href="'.url_for("/event/event.php?id=".$event->id).'" class="btn btn-outline-success">Read more</a>
                                            </div>   
                                          </div>          
                                      </div>  
                                  </div>';
                                }
                              ?>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card text-center">
                          <div class="card-body">
                            <h5 class="card-text" style="text-align:center; font-weight:bold; text-decoration: underline; font-size: 2rem;">Charity events created</h5>
                              <?php
                              $eventmade = $user->get_all_events_created();
                              if (sizeof($eventmade) == 0){
                                echo '<br/>Fill up this list by hosting some charity events!';
                              }
                              foreach($eventmade as $event){
                                echo '<br/>
                                <div class="row">
                                    <div class="col-md-4">
                                            <img src="images/charity_icon.png" class="card-img" alt="...">
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card text-center">
                                          <div class="card-body">
                                            <h5 class="card-title">'.$event->name.'</h5>
                                            <h5 class="card-title">'.$event->description.'</h5>
                                            <a href="'.url_for("event/event.php?id=".$event->id).'" class="btn btn-outline-success">Read more</a>
                                          </div>   
                                        </div>          
                                    </div>  
                                </div>';
                              }
                                ?>
                        </div>
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
	require("../../private/shared/footer.php");
?>