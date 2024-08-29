<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Crud</title>
    
</head>
<body>
    

<h2>Input Products</h2>
    <form action="create.php" method="post" style="border-radius: 2px solid #000; border: #000;">
        Name: <input type="text" name="name" required><br>
        Description: <input type="text" name="des" required><br>
        Price: <input type="text" name="price" required><br>
        Quantity: <input type="text" name="quantity" required><br>
        Barcode: <input type="text" name="barcode" required><br>
        
        <input type="submit" value="Add Product">
    </form>


    <br>
    <br>
    <br>

    <h2>List of Products</h2>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Barcode</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Actions</th>
        </tr>
        <?php include 'read.php'; ?>
    </table>

</body>
</html>