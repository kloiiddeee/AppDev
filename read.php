<?php
include 'db_con.php'; 

// Fetch users
$sql = "SELECT ID, Name, Description, Price, Quantity, Barcode, Created_at, Updated_at FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Description"] . "</td>";
        echo "<td>" . $row["Price"] . "</td>";
        echo "<td>" . $row["Quantity"] . "</td>";
        echo "<td>" . $row["Barcode"] . "</td>";
        echo "<td>" . $row["Created_at"] . "</td>";
        echo "<td>" . $row["Updated_at"] . "</td>";
        echo "<td><a href='update.php? id=" . $row["ID"] . "'>Edit</a> | <a href='delete.php? id=" . $row["ID"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No users found</td></tr>";
}

$conn->close();
?>

</body>
</html>