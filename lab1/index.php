<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Lab1</title>
</head>

<body>
    <div class="form-rss text-center">
        <h3>Nhập link RSS muốn xem</h3>
        <form method='post' action="newsFeeds.php">

            <input type="text" name="url">

            <input class="btn btn-success" type="submit" name="submit" value="Lấy tin">

        </form>

    </div>
</body>

</html>