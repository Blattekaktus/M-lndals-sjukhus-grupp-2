<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mölndals Vårdcentral</title>
    <!-- Länkar till Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
 
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mölndals Vårdcentral</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="start.php">Hem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inlogg.php">Logga in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="boka_tid.php">Boka tid</a>
                </li>
            </ul>
        </div>
    </nav>
   
    <!-- Huvudinnehåll -->
    <div class="container mt-5">
        <h1>Välkommen till ett bättre 1177!</h1>
        <p>Prenumerera på vårt season pass och få ett läkarbesök till halva priset!</p>

        <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        echo "<p>Dagens datum är tyvärr: " . date('Y-m-d') . "</p>";
        ?>
    </div>

    <!-- Länkar till Bootstrap JavaScript (och valfritt jQuery om det behövs) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>


<?php

echo "Hej Jacob, vi provar igen";
?>