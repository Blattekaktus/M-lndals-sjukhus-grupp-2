<?php
session_start();

$cookiepath = "/tmp/cookies.txt";
$tmeout = 3600; // (3600=1hr)

$baseurl = 'http://193.93.250.83/';

$api_key = "791d0afdc820f14";
$api_secret = "c64033f06be83b7";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $ch = curl_init($baseurl . 'api/method/frappe.auth.get_logged_user');
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: token ' . $api_key . ':' . $api_secret // set authorization header
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $userData = curl_exec($ch);
    $userDataResponse = json_decode($userData, true);
    curl_close($ch);
    
    // Check if the user data fetch was successful
    if (isset($userDataResponse['message']) && $userDataResponse['message'] == $username) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username; 
        header("location: welcome.php");
    } else {
        $msg = "Fel användarnamn eller lösenord!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggning</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
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
    <div class="container mt-5">
        <h2>Inloggning</h2>

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Användarnamn:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Lösenord:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Logga in</button>
        </form>

        <p class="mt-3 text-danger"><?php echo $msg; ?></p>
    </div>
</body>

</html>