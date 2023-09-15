<?php
$connect = mysqli_connect('localhost','root','','grocery') or die ("Db connection Fail");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product CRUD Form</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add a New Product</h2>
    <form action="index.php" method="post">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="discount">Discount:</label>
        <input type="number" id="discount" name="discount" step="0.01" required>

        <label for="description">Description:</label>
        <textarea id="description" name="descp" rows="4" cols="50" required></textarea>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <input type="submit" name="create" value="Add Product">
        <input type="reset" value="Reset Value">
    </form>

    <?php
if(isset($_POST['create'])){
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $descp = $_POST['descp'];
    $quantity = $_POST['quantity'];
$run = mysqli_query($connect,"INSERT INTO product(name,brand,price,discount,descp,quantity) value('$name','$brand','$price','$discount','$descp','$quantity')");
    if($run){
        echo "<script>window.open('index.php','_self')</script>";
        echo "<script>alert('Successfully Added')</script>";
    }
    else{
        echo "<script>alert('Failed')</script>";
    }
} ?>
<table>
    <tr>
        <th>Serial No.</th>
        <th>Product Name</th>
        <th>Brand</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
<?php
    $query = mysqli_query($connect,"SELECT * FROM product");
    while($data = mysqli_fetch_array($query)){
        $id = $data['id'];
        $name = $data['name'];
        $brand = $data['brand'];
        $price = $data['price'];
        $discount = $data['discount'];
        $descp = $data['descp'];
        $quantity = $data['quantity'];

        echo "
            <tr>
                <td>$id</td>        
                <td>$name</td>        
                <td>$brand</td>        
                <td>$price</td>        
                <td>$discount</td>        
                <td>$descp</td>        
                <td>$quantity</td>        
                <td>
                    <a href='index.php?id=$id' class='del'>Delete</td>
             </tr>";
    }
?>
</table>
</body>
</html>
