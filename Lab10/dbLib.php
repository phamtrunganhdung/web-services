<?php

$db_msg = "";

function connectDatabase()
{

    $username = "dung";

    $password = "anhdung0403";



    try {

        $db = new PDO("mysql:dbname=sensors;host=localhost;port=3307", $username, $password);
    } catch (PDOException $e) {

        $db = -1;

        $db_msg = "Khong ket noi duoc co so du lieu" . $e->getMessage();
    }

    return $db;
}



function recordSensor($name, $value, $status)
{

    $db = connectDatabase();

    if ($db) {

        $sql = "INSERT  INTO sensorsInfo(SensorName, SensorValue, SensorStatus) VALUES (\"$name\", \"$value\", $status)";

        try {

            $r = $db->query($sql);
        } catch (PDOException $e) {

            echo "Loi trong qua trinh gi du lieu" . $e->getMessage();
        }
    }
}
