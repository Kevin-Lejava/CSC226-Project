<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<?php require "formHandle.php"?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Checkout</title>
</head>

<body>

    <?php require "navbar.php"?>

    <h1>Please provide your credit card information and shipping address.</h1>

    <form action = "checkout.php" method = "POST">
        <fieldset>
            <legend>Credit Card Information</legend>
            <div class="form-row">
                <div class="col">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name" class="form-control" placeholder="First name"
                    ><br>

                    <label for="creditNumber">Credit Card Number</label>
                    <input type="text" id="creditNumber" name="creditNumber" class="form-control"
                        placeholder="XXXX-XXXX-XXXX-XXXX"><br>

                    <label for="CVV">CVV</label>
                    <input type="text" id="CVV" name="CVV" class="form-control"><br>
                </div>
                <div class="col">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" class="form-control" placeholder="Last name"><br>

                    <label for="expiration-date">Expiration Date</label>
                    <input type="date" id="expiration-date" name="expiration-date"><br>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <Legend>Billing Information</Legend>

            <div class="form-row">

                <div class="col">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address"><br>

                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control" id="city"><br>
                </div>

                <div class="col">
                    <label for="address2">Address 2</label>
                    <input type="text" name="address2" class="form-control" id="address2" placeholder="Optional"><br>

                    <label for="state">State</label>
                    <select id="state" name="state" class="form-control">
                        <option value>...</option>
                        <option value="NY">NY</option>
                        <option value="NJ">NJ</option>
                        <option value="Any-other">Any of the other 48 states</option>
                    </select><br>
                </div>

                <div class="col">
                    <label for="zip">Zip Code</label>
                    <input type="text" name="zip" class="form-control" id="zip"><br>
                </div>
            </div>
        </fieldset>

        <button type="submit" name = "checkout" value="submit" class="btn btn-primary">Place Order</button>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>