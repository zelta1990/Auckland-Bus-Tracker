
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
$query = "SELECT distinct route_short_name FROM `akl_transport`.`routes`";
if ($result=$conn->query($query)) {
    // output data of each row
    
    
    while($row = $result->fetch_assoc()) {
    echo '<option value="'.$row['route_short_name'].'">'.$row['route_short_name'].'</option>';
}
          
} else {
    echo "0 results";
}	
	echo '</select>'; //closes the drop doqn box
$conn->close();
?>
