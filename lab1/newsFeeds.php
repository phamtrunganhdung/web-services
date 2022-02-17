<?php


$url = "";

if (isset($_POST['submit'])) {

    if ($_POST['url'] != '') {

        $url = $_POST['url'];
    }
}



$invalidUrl = false;

if (@simplexml_load_file($url)) {

    $newsFeeds = simplexml_load_file($url);
} else {

    $invalidUrl = true;

    echo "<h2>Link RSS không hợp lệ</h2>";
}



// echo "<pre>";

// print_r($newsFeeds);

// echo "</pre>";

// die;


$i = 0;

if ($newsFeeds) {

    $siteTitle = $newsFeeds->channel->title;

    echo "<h1 class='text-center'>" . $siteTitle . "</h1>";



    foreach ($newsFeeds->channel->item as $item) {

        $title = $item->title;

        $description = $item->description;

        $link = $item->link;

        if ($i > 5) {

            break;
        }

?>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <title>$siteTitle</title>
        </head>

        <body>
            <div class="post text-center">

                <div class="post-head">

                    <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>

                </div>

                <div class="post-content">

                    <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)); ?>

                </div>

            </div>
        </body>

        </html>



    <?php

        $i++;
    }

    ?>
    <div class="back text-center">
        <form action="index.php">
            <input class="btn btn-danger" type="submit" value="Back"></input>
        </form>
    </div>
<?php

} else {

    if (!$invalidUrl) {

        echo "<h2>Không tìm thấy nội dung</h2>";
    }
}

?>