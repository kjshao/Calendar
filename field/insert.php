<?php
function indata($x){
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "field_basic";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO fbasic (time,d1a,d1b,d2a,d2b,d3a,d3b,d4a,d4b,d5a,d5b,d6a,d6b,d7a,d7b)
    VALUES ('$x[0]','$x[1]','$x[2]',
            '$x[3]','$x[4]','$x[5]',
            '$x[6]','$x[7]','$x[8]',
            '$x[9]','$x[10]','$x[11]',
            '$x[12]','$x[13]','$x[14]')";
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?>
