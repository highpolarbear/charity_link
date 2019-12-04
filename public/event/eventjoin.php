<?php
require("../../private/database.php");
require("../../private/initialize.php");

$db = db_connect();

$idNext = 1;
$query = "SELECT id FROM participant";
$result_set = mysqli_query($db, $query);
while($event = mysqli_fetch_assoc($result_set)){
    if ($event["id"] == $idNext){
        $idNext = $idNext + 1;
    }
}


$c_id = $_GET['user_id'];
$u_id =  $_GET['id'];
$query = "INSERT INTO `participant` (`id`, `eid`, `uid`)
VALUES
(". $idNext . " , " . $u_id . " , " . $c_id . " );";


$result = mysqli_query($db, $query);

if($result){
}
else{
    echo $query;
    echo $result;
}
db_disconnect($db);

redirect_to(url_for("/event/event.php?id=".$u_id));
?>