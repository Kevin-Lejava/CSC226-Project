<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

    <title>Parts List</title>
</head>

<body>
    <?php require "navbar.php"?>

    <h1>All in stock parts</h1>

    <?php
        $query = "SELECT * FROM ESTORE WHERE ITEM_TYPE = 'RAM'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        $result = $stmt->get_result();

        $result = $conn->query($query) or die($conn->error);
    
        echo "<div class='d-flex align-content-start flex-wrap'>";

        while($row = $result -> fetch_assoc()){
        
            echo "<div class='card' style='width: 18rem;'>
                    <img src= " . $row['IMG_LINK'] . " class='card-img-top' alt='AMD Ryzen'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $row['ITEM_NAME'] . "</h5>
                            <form action = 'cart.php' method = 'POST'>

                            <input type='hidden' name='item_sku' value=" . $row['SKU'] . ">
                            <button type='submit' name='addCart' class='btn btn-primary'>Add to Cart</button>
                            </form>
                        </div>
                </div>";
        }
        echo "</div>";
    ?>

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