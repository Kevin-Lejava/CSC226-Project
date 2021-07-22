<?php 

   include "database/connection.php";

    if(!isset($_SESSION)) { 
        session_start(); 
    } 

    if(isset($_POST['signIn']))
        if(empty($_POST['username']) || empty($_POST['password']))
        echo "<br><br>Missing Field!";
        
        else{

            include "database/connection.php";

            $query = "SELECT * FROM users where username = ?";

            $stmt = $conn->prepare($query);

            $stmt -> bind_param('s' , $_POST['username']);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0){
                $userpass = NULL;
                $username = NULL;
                $userId = NULL;

                while($row = $result->fetch_assoc()) {
                    $userpass = $row['password'];
                    $username = $row['username'];
                    $userId = $row['id'];
                }
                if (password_verify($_POST['password'], $userpass)) {
                                
                    $hash_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                    if ( password_needs_rehash ( $hash_password, PASSWORD_BCRYPT )) {
                        $newHash = password_hash( $_POST['password'], PASSWORD_BRCYPT);
                                    
                        $queryINS = "INSERT INTO users (password) VALUES (?)";

                        $stmt = $conn->prepare($queryINS);

                        $stmt -> bind_param('s', $newHash);

                        $stmt->execute();
                    }

                    session_start();
                    $_SESSION['user'] = $username;
                    $_SESSION['id'] = $userId;
                    header("location:index.php");
                }

                else 
                    echo 'Invalid Username and Password.';
        }
    }

    if(isset($_POST['signUp'])){

        if(empty($_POST['usernameNew']) || empty($_POST['passwordNew']) || empty($_POST['passwordConfirm']))
        echo "<br><br>Missing Field!";
        
        else if($_POST['passwordNew'] != $_POST['passwordConfirm'])
            echo "<br><br>The passwords don't match!";
        
        else if(!preg_match('/[a-zA-Z0-9]/',$_POST['usernameNew'])|| !preg_match('/[a-zA-Z0-9]/',$_POST['passwordNew']) 
                || !preg_match('/[a-zA-Z0-9]/',$_POST['passwordConfirm'])) 
            echo "<br><br>Only alpha-numeric characters are allowed!";
        
        else{

            $userNew = $_POST['usernameNew'];

            $hash_password = password_hash($_POST['passwordNew'], PASSWORD_BCRYPT);

            $queryINS = "INSERT INTO users (username, password) VALUES (?, ?)";

            $stmt = $conn->prepare($queryINS);

            $stmt -> bind_param('ss' , $userNew , $hash_password);

            $stmt->execute();

            echo "<br><br><a href='login.php'>Account Created! Click here to return to sign in page.</a> ";
        }
    }

    if(isset($_POST['logout'])){
        if(count($_SESSION) > 0){
            session_unset();
            session_destroy();
        }
    }

    if(isset($_POST['addCart'])){

        if(isset($_SESSION['user'])){

            $queryINS = "INSERT INTO cart (userId, itemId) VALUES (?, ?)";

            $stmt = $conn->prepare($queryINS);

            $stmt -> bind_param('is', $_SESSION['id'] , $_POST['item_sku']);

            $stmt->execute();
        }

        if(!isset($_SESSION['user']))
            header("location:cartError.php");
        
    }

    if(isset($_POST['checkout'])){
        
        if(empty($_POST['first-name']) || empty($_POST['last-name']) || 
        empty($_POST['creditNumber']) || empty($_POST['expiration-date']) || 
        empty($_POST['CVV']) || empty($_POST['address']) ||
        empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip'])){

        echo "<div class='alert alert-danger' role='alert'>
                Error: Failed to submit form. One or more of the required field's was left empty.
            </div>";

        }

        else{

            htmlspecialchars($_POST['first-name']);
            htmlspecialchars($_POST['last-name']);
            htmlspecialchars($_POST['creditNumber']);
            htmlspecialchars($_POST['CVV']);
            htmlspecialchars($_POST['address']);
            htmlspecialchars($_POST['address2']);
            htmlspecialchars($_POST['city']);
            htmlspecialchars($_POST['state']);
            htmlspecialchars($_POST['zip']);

            header("location: checkoutSuccess.html");
            }

    }
?>