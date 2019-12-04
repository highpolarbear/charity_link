<?php 
	$title = "Charity Link";
	// include the header
	require("user_path.php");
	include ("../private/shared/header.php");

?>

<?php 


	require_once('../../private/initialize.php');

	$errors = [];
	$username = '';
	$password = '';

	if(is_post_request()) {

	$username = $_POST['username'] ?? '';
	$password = $_POST['password'] ?? '';

	// Validations
	if(is_blank($username)) {
		$errors[] = "Username cannot be blank.";
	}
	if(is_blank($password)) {
		$errors[] = "Password cannot be blank.";
	}

	// if there were no errors, try to login
	if(empty($errors)) {
        $_SESSION['username'] = $username;
		$user = User::find_by_username($username);
		// test if admin found and password is correct
		if($user != false && $user->verify_password($password)) {
		// Mark admin as logged in
        $session->login($user);
        session_start();
        $_SESSION['id'] = $user->id;
        $_SESSION["logged_in"] = true;
		redirect_to(url_for('index.php'));
		} else {
		// username not found or password does not match
		$errors[] = "Log in was unsuccessful.";
		}

	}

	}

?>

<?php $title = 'Log in'; ?>
<?php include(SHARED_PATH."/header.php"); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
      <div class="container">
            <div class="card">
              <div class="card-body">
                <p class="card-title" style="text-align:center; font-weight:bold; font-size: 3rem;"><?php echo ("Log in") ?></p>
                <div class="row">
                    <div class="col-md">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1.5">
                                Username:
                            </div>
                            <div class="col-md-2"> 
                                <input type="text" name="username" value="<?php echo h($username); ?>"/><br />
                            </div>
                        </div>
                            <br/>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1.5">
                                Password:
                            </div>
                            <div class="col-md-2"> 
                                <input type="password" name="password" value="" /><br />
                            </div>
                        </div>
                  </div>
                </div> 
                <br/>
                <div class="row d-flex justify-content-center">
                    <input type="submit" name="submit" value="Submit"  />
                </div>
              </div>
            </div> 
        </div>
  </form>

</div>



<?php
	require("../../private/shared/footer.php");
?>