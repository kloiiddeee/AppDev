<?php
include 'db_con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ID'];
    $name = $_POST['name'];
    $des = $_POST['des'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];

    $stmt = $conn->prepare("UPDATE products SET Name=?, Description=?, Price=?, Quantity=?, Barcode=? WHERE ID=?");
    $stmt->bind_param("ssdisi", $name, $des, $price, $quantity, $barcode, $id);

    if ($stmt->execute() === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE ID=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['Name'];
        $des = $row['Description'];
        $price = $row['Price'];
        $quantity = $row['Quantity'];
        $barcode = $row['Barcode'];
        ?>
        
        <html>
        <head>
            <title>Update Product</title>
           
        </head>
        <body>
            <h2>Update Product</h2>
            <form action="update.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $id; ?>">
                Name <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Name..." required><br>
                Description <input type="text" name="des" value="<?php echo htmlspecialchars($des); ?>" placeholder="Description..." required><br>
                Price <input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>" placeholder="Price..." required><br>
                Quantity <input type="text" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>" placeholder="Quantity..." required><br>
                Barcode <input type="text" name="barcode" value="<?php echo htmlspecialchars($barcode); ?>" placeholder="Barcode..." required><br>
                <input type="submit" value="Update">
                <a href='index.php' style="align-items: center;">Back</a>
            </form>
        </body>
        </html>

        <?php
    } else {
        echo "Product not found";
    }

    $stmt->close();
}

$conn->close();
?>
