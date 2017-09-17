<?php //config.php
$hostname = "csse-info263.canterbury.ac.nz";
$database = "akl_transport";
$username = "info263";
$password = "info263";
$APIKey = "81fd53734c494d1994bc1236585320c5"; # Your API Key here.

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM routes";
$result = $conn->query($sql);

echo '<select name="DROP DOWN ROUTE">'; //opens drop down box
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo '<option value="'.$row['route_long_name'].'">'.$row['route_long_name'].'</option>';
}
        //echo "route_id: " . $row["route_id"]. " - Name: " . $row["agency_id"]. " " . $row["route_type"]. "<br>";
    
} else {
    echo "0 results";
}
echo '</select>'; //closes the drop doqn box
$conn->close();
?>
