<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Thư viện Swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" />

</head>

<body>
    <?php
    include('connect.php');
    session_start();
    ?>
    <div class="container">
        <h1>Shopping Cart</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                error_reporting(0);
                $totalprice = 0;
                foreach ($_SESSION['wishlist'] as $key => $value) {
                    $sql = "SELECT * FROM products where product_id = $key;";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                ?>
                            <tr>

                                <td><?php echo $row["pro_name"] ?></td>
                                <td><?php echo $row["price"] ?></td>
                                <td>
                                    <input type="number" value="<?php echo $value ?>" min="1" max="10">
                                </td>
                                <td><?php echo $total = $row["price"] * $value; ?></td>
                                <td>
                                    <form method="POST" action="deletep.php">
                                        <input type="hidden" name="id" value="<?php echo $key; ?>">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">X</button>
                                    </form>
                                </td>

                            </tr>
                <?php
                            $totalprice =   $totalprice +  $total;
                        }
                    }
                } ?>
                <tr>
                    <td colspan="3" class="text-right ">Total</td>
                    <td><?php echo $totalprice ?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <a href="showproduct.php" class="btn btn-default">Continue Shopping</a>
            <a onclick="checkout()" class="btn btn-primary">Checkout</a>
        </div>
    </div>
</body>

</html>
<script>
    function checkout(){
        Swal.fire('Thành công', 'Bạn đã mua hàng thành công.', 'success');
        <?php 
                unset($_SESSION['wishlist']);
                // header('Location: shoppingcart.php');
        ?>
    }
</script>