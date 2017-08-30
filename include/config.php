<?php //config.php
$hostname = "192.168.142.2";
$database = "akl_transport";
$username = "DBAdmin";
$password = "afis233";
$APIKey = "81fd53734c494d1994bc1236585320c5"; # Your API Key here.

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM routes";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "route_id: " . $row["route_id"]. " - Name: " . $row["agency_id"]. " " . $row["route_type"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
