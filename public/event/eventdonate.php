<?php 
	$title = "Charity Link";
	require("event_path.php");
	// include the header
	require("../../private/shared/header.php");

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
        <div>
            <?php include '../nav.php'; ?>
        </div>
    </head>
    <body>
        
        <br/>
        
        <div class="row d-flex justify-content-center">
                     <img src="https://media.giphy.com/media/uhyTFbEwoyDio/giphy.gif" alt="Donate gif" style="width: 16rem; height: 12rem;" >
        </div>
        
        <br/>
        
        <div class="container">
            <div class="card">
              <div class="card-body">
                <p class="card-title" style="text-align:center; font-weight:bold; font-size: 3rem;">Donate</p>
                <div class="row">
                    <div class="col-md">
                        <h3>Billing Address</h3>
                        
                        </br>
                
                        <div class="row">
                            <div class="col-md-4">
                                <label for="full_name">Full Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="full_name" name="name" placeholder="Bob Ross">
                            </div>
                        </div>
                        
                        </br>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <label for="address">Address</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="address" name="address" placeholder="1 Kingdom St">
                            </div>
                        </div>
                        
                        </br>
                
                        <div class="row">
                            <div class="col-md-4">
                                <label for="city">City</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="city" name="city" placeholder="London">
                            </div>
                        </div>
                        
                        </br>
                  
                        <div class="row">
                            <div class="col-md-4">
                                <label for="postcode">Postcode</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="postcode" name="postcode" placeholder="W26BY">
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md">
                        <h3>Payment</h3>
                        
                        </br>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label for="fname">Accepted Cards</label>
                            </div>
                            <div class="col-md-8">
                                <img src="images/card_icon.jpg" alt="..." style="width: 4rem; height: 2rem;" >
                                <a href="https://www.paypal.com/signin?returnUri=https%3A%2F%2Fwww.paypal.com%2Fmyaccount%2Ftransfer&state=%2F" target="_blank">
                                    <img src="images/paypal_icon.jpg" alt="..." style="width: 4rem; height: 2rem;" >
                                </a>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="address">Name on Card</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="anme" name="name" placeholder="Bob Ross">
                            </div>
                        </div>
                        
                        </br>
                  
                        <div class="row">
                            <div class="col-md-4">
                                <label for="card_number">Credit Card Number</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" id="card_number" name="card_number" placeholder="0000111122223333">
                            </div>
                        </div>
                
                        </br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="expiry_date">Expiry Date</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="expiry_date" name="expiry_date" placeholder="01/23">
                            </div>
                        </div>

                        </br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="cvv">CVV</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" id="cvv" name="cvv" placeholder="123">
                            </div>
                        </div>

                        </br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="amount">Amount in £</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" id="amount" name="amount" placeholder="10">
                            </div>
                        </div>
                        
                    </div>
                </div>

                </br>

                <div class="row d-flex justify-content-center">
                    <input href="../event.php?id=<?php echo ("event_id") ?>" class="btn btn-outline-success" type="submit" value="Submit"> 
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