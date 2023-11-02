<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boka tid - Mölndals Vårdcentral</title>
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
        <h2>Boka tid hos oss</h2>
        <p>Vänligen fyll i följande information för att boka en tid:</p>

        <form action="confirmation.php" method="post">
            <div class="form-group">
                <label for="patientName">Namn:</label>
                <input type="text" class="form-control" id="patientName" name="patientName" required>
            </div>

            <div class="form-group">
                <label for="reason">Anledning för besöket:</label>
                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="date">Datum:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="time">Tid:</label>
                <select class="form-control" id="time" name="time">
                    <option>09:00 - 10:00</option>
                    <option>10:00 - 11:00</option>
                    <option>11:00 - 12:00</option>
                    <option>13:00 - 14:00</option>
                    <option>14:00 - 15:00</option>
                    <option>15:00 - 16:00</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Boka tid</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>