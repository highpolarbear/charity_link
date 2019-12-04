<?php 
  $title = "Charity Link";

  require("event_path.php");

  require_once("../../private/initialize.php");
  
  if (!isset($_GET["id"])){// || !isset($_SESSION["id"])){
    redirect_to(url_for("index.php"));
  }
  $event = CharityEvent::find_by_id($_GET["id"]);
  
  //if ($event->organiser_id != $_SESSION['id']) {redirect_to(url_for("index.php"));}
  
  $event->delete();

  redirect_to(url_for("event/index.php"));



?>