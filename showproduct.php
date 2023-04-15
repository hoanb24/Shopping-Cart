<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    h3 {
      margin-left: 100px;
      color: red;
      font-weight: bold;
      margin-top: 20px;
    }

    .form-control {
      width: 200px;
      margin-left: 1400px;
    }

    .search {
      position: absolute;
      margin-left: 1620px;
      margin-top: -54px;

    }
    .fa-cart-shopping{
      position: absolute;
        margin-top: 53px;
        margin-left: 1300px;
    }
  </style>
</head>

<body>
    <div><a href="shoppingcart.php"><i class="fa-solid fa-cart-shopping"></i></a></div>
  <h3>SẢN PHẨM BÁN CHẠY</h3>
  <form action="search.php" method="get">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="search">
    </div>
    <button type="submit" class="btn btn-primary search">Tìm kiếm</button>
  </form>
  <div class="container">
    <?php include('connect.php') ?>
    <div class="row">
      <?php
      $sql = "SELECT * FROM Products";

      $result = $mysqli->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) { ?>

          <div class="col-md-3">
            <div class="card">
              <img class="card-img-top" src="<?php echo $row['img'] ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row["pro_name"] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["price"] ?></h6>
                <a href="detail.php?id=<?php echo $row["product_id"] ?>" class="btn btn-primary">Details</a>
                <a href="shoppingcart.php?id=<?php echo $row["product_id"]; ?>" class="btn btn-success">ADD WISHLIST</a>
              </div>
            </div>

          </div>
      <?php }
      } ?>

    </div>

</body>