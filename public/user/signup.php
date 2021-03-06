<?php 
	$title = "Charity Link";
  // include the header
  require("user_path.php");
	include ("../../private/shared/header.php");
  require_once("../../private/initialize.php");?>

<?php

require_once('../../private/initialize.php');

require_not_logged_in();

if(is_post_request()) {

  // Create record using post parameters
  $user = new User($_POST);
  $result = $user->save();

  if($result === true) {
    $new_id = $user->id;
    $session->message('The user was created successfully.');
    redirect_to(url_for('user/user.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $user = new User;
}

?>

<div id="content">

  <div class="user new">
    <h1>Sign Up</h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('/user/signup.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations" class="row d-flex justify-content-center">
        <input type="submit" value="Create User" />
      </div>
    </form>

  </div>

</div>
<!-- 
require_once('../../private/initialize.php'); -->

<?php
	require("../../private/shared/footer.php");
?>