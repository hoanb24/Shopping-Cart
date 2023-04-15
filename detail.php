<?php
session_start();
$id = $_GET["id"];
include('connect.php');
$sql = "SELECT * FROM products where product_id=$id;";
$result = $mysqli->query($sql);
$_SESSION['wishlist'] = array();
?>
<!-- ***** Call to Action Start ***** -->
<div class="container">


  <?php if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

  ?>
      <center>
        <div class="row">

          <div class="col-md-8">
            <div class="card">
              <img class="card-img-top" src="<?php echo $row["img"] ?>" alt="Card image cap">
              <div class="card-body">
                <h3 class="card-title"><?php echo $row["pro_name"] ?></h3>
                <p class="card-text"><?php echo $row["descriptionp"] ?></p>
                <h6 class="card-subtitle mb-2 text-muted" style="color:red;">Price : $<?php echo $row["price"] ?></h6>
                <form action="" method="post">
                  <label for="quantity">Quantity:</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" value="1">
                  <br />
                  <br />
                  <input type="submit" class="btn btn-success" name="submit" value="Mua ngay">
                </form>
                <a href="showproduct.php"><button>Back</button></a>
                <?php
                  error_reporting(0);
                  if ($_POST["submit"]) {
                
                    $quantity = $_POST["quantity"];
                    // Thêm sản phẩm vào giỏ hàng
                    $product += array($id => $quantity);
                    $_SESSION['wishlist'] += $product;
                    // Hiển thị thông báo thành công
                    header('Location:shoppingcart.php');
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </center>
  <?php }
  } ?>