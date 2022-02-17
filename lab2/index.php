<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Lab2</title>
</head>

<body>
    <div class="form-rss text-center">
        <h3>Nhập link RSS muốn xem</h3>
        <form method='post' action="newsFeeds.php">

            <input type="text" name="url">

            <input class="btn btn-success" type="submit" name="submit" value="Lấy tin">

        </form>
        <h3>Một số tin của VN Express</h3>
        <form method='post' action="newsFeeds.php">

            <select name="url">
                <option value="https://vnexpress.net/rss/tin-xem-nhieu.rss">Tin xem nhiều</option>
                <option value="https://vnexpress.net/rss/the-gioi.rss">Thế giới</option>
                <option value="https://vnexpress.net/rss/thoi-su.rss">Thời sự</option>
                <option value="https://vnexpress.net/rss/kinh-doanh.rss">Kinh doanh</option>
                <option value="https://vnexpress.net/rss/khoa-hoc.rss">Khoa học</option>
                <option value="https://vnexpress.net/rss/giao-duc.rss">Giáo dục</option>
                <option value="https://vnexpress.net/rss/oto-xe-may.rss">Xe</option>
            </select>

            <input class="btn btn-success" type="submit" name="submit" value="Lấy tin">

        </form>
    </div>
    <div class="content-rss">

        <?php
        $url = "https://vnexpress.net/rss/tin-moi-nhat.rss";

        $newsFeeds = simplexml_load_file($url);

        if ($newsFeeds) {

            $siteTitle = $newsFeeds->channel->title;

            echo "<h1 class='text-center'>" . $siteTitle . "</h1>";



            foreach ($newsFeeds->channel->item as $item) {

                $title = $item->title;

                $description = $item->description;

                $link = $item->link;



        ?>
                <div class="post text-center">

                    <div class="post-head">

                        <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>

                    </div>

                    <div class="post-content">

                        <?php echo $description ?>

                    </div>

                </div>



            <?php


            }

            ?>

        <?php

        } else {

            if (!$invalidUrl) {

                echo "<h2>Không tìm thấy nội dung</h2>";
            }
        }
        ?>
    </div>
</body>

</html>