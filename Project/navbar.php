<?php require "formHandle.php";?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Links</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Looking for parts?
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="catalogAll.php">All</a>
                    <a class="dropdown-item" href="motherboards.php">Motherboards</a>
                    <a class="dropdown-item" href="vidCards.php">Graphics Cards</a>
                    <a class="dropdown-item" href="processors.php">Processors</a>
                    <a class="dropdown-item" href="powerSupply.php">Power Supplies</a>
                    <a class="dropdown-item" href="ram.php">RAM</a>
                    <a class="dropdown-item" href="case.php">Cases</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>

            <?php if(isset($_SESSION['user']))
                echo 
                    "<li>
                        <a class='nav-link' href='cart.php'>Cart</a>
                    </li>
                </ul>     
                    <form action='login.php' method='POST' class='form-inline my-2 my-lg-0'>
                        Hello ". $_SESSION['user'] . "<button class='btn btn-outline-success my-2 my-sm-0' name='logout' type='submit'>Logout?</button>
                    </form>";


                if(!isset($_SESSION['user']))
                   echo 
                   "<form action='login.php' method='POST' class='form-inline my-2 my-lg-0'>
                        <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Log in here</button>
                    </form>";

            ?>
        
    </div>
</nav>