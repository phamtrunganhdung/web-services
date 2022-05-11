<?php

include 'dbconnection.php';

// createElement and appendChild()

$sql = "SELECT * FROM sinhvien";
$result = $conn->query($sql);


$xml = new DOMDocument("1.0");

$xml->formatOutput = true;

$svs = $xml->createElement("SinhVien");

$xml->appendChild($svs);

while ($row = mysqli_fetch_array($result)) {

    $sv = $xml->createElement("sinhvien");

    $svs->appendChild($sv);

    $id = $xml->createElement("id", $row['id']);

    $sv->appendChild($id);

    $name = $xml->createElement("name", $row['name']);

    $sv->appendChild($name);

    $email = $xml->createElement("email", $row['email']);

    $sv->appendChild($email);

    $password = $xml->createElement("password", $row['password']);

    $sv->appendChild($password);

    $scores = $xml->createElement("scores", $row['scores']);

    $sv->appendChild($scores);
}

// xuất tài liệu XML ra trình duyệt để kiểm tra, dùng Developer tool để xem

echo "<xmp>" . $xml->saveXML() . "</xmp>";

// xuất ra tập tin kết quả

$xml->save("reports.xml");
