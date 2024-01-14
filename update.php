<?php
$serverName = $_POST['serverName'];
$username = $_POST['username'];
$password = $_POST['password'];
$database = $_POST['database'];

$conn = new mysqli($serverName, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products WHERE id=2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_name = $row['product_name'];
    $price_per_piece = $row['price_per_piece'];
    $description = $row['description'];
} else {
    echo "0 results";
}

$conn->close();
?>

<form method="post" action="">
    <label for="product_name">Product naam:</label><br>
    <input type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>"><br>
    <label for="price_per_piece">Prijs per stuk:</label><br>
    <input type="text" id="price_per_piece" name="price_per_piece" value="<?php echo $price_per_piece; ?>"><br>
    <label for="description">Omschrijving:</label><br>
    <textarea id="description" name="description"><?php echo $description; ?></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>