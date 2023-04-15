
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
    .search{
      position: absolute;
      margin-left: 1620px;
      margin-top: -54px;
      
    }
  </style>
</head>

<?php
include('connect.php');

if (isset($_GET['search'])) {
  $keyword = $_GET['search'];
  $sql = "SELECT * FROM Products WHERE pro_name LIKE '%$keyword%'";
  $result = $mysqli->query($sql);
} else {
  header('Location: index.php');
}

?>
<body>
    


<!-- Hiển thị kết quả tìm kiếm -->
<h3>Kết quả tìm kiếm cho "<?php echo $keyword ?>"</h3>
<div class="container">
  <div class="row">
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { ?>

        <div class="col-md-3">
          <div class="card">
            <img class="card-img-top" src="<?php echo $row['img'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["pro_name"] ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["price"] ?></h6>
              <a href="detail.php?id=<?php echo $row["product_id"] ?>" class="btn btn-primary">Details</a>
              <a href="shoppingcart.php?id=<?php echo $row["product_id"] ?>" class="btn btn-success">ADD WISHLIST</a>
            </div>
          </div>
        </div>
    <?php }
    } else {
      echo "<p>Không tìm thấy sản phẩm nào phù hợp.</p>";
    } ?>

  </div>
</div>
</body>