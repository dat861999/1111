
<?php 
    require_once("entities/product.class.php");
    $prods = Product::list_product();
    include_once("header.php");
    require_once("entities/category.class.php");
?>
<?php
if (!isset($_GET["cateid"])) {
    // $prods = Product::list_product();
    $conn = mysqli_connect('localhost', 'root', '', 'ecommerce1');
    $result = mysqli_query($conn, 'select count(ProductID) as total from product');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
// phan trang
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $result = mysqli_query($conn, "SELECT * FROM product LIMIT $start, $limit");
    $row = mysqli_fetch_assoc($result);
} else {
    $cateid = $_GET["cateid"];
    // $prods = Product::list_product_by_cateid($cateid);
    $conn = mysqli_connect('localhost', 'root', '', 'ecommerce1');
    $result = mysqli_query($conn, 'select count(ProductID) as total from product where CateID='.$cateid.'');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 7;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $result = mysqli_query($conn, "SELECT * FROM product Where CateID='$cateid' LIMIT $start, $limit");
    $row = mysqli_fetch_assoc($result);
}
//end phan trang
$cates = Category::list_category();
//end phan trang
?>


   <div class="container text-center">
   <div class="col-lg-3">

    <h1 class="my-4">Danh Mục Sản Phẩm</h1>
    <div class="list-group">
     <?php
     foreach ($cates as $row) {
        echo "<li class='list-group-item'><a href=list_product.php?cateid=" . $row["CateID"] . ">" . $row["CategoryName"] . "</a></li>";
        }
        ?>
    </div>

</div>
    <div class="col-sm-9">
    <h3>Sản Phẩm</h3>
    
    <div class="row">
    <?php  while ($row = mysqli_fetch_assoc($result)) { ?>
     <div class="card" style="width: 25rem;">
            <a href="product_detail.php?id=<?php echo $row["ProductID"];?>">
             <img class="card-img-top" src="<?php echo "".$row["Picture"];?>" alt="Image" width="50%" class="img-responsive" alt="Card image cap">
            </a>
        <div class="card-body">
            <h5 class="card-title"><?php echo $row["ProductName"]?></h5>
            <p class="card-text"><?php echo $row["Description"]?></p>
            <h4 class="card-title"><?php echo $row["Price"]?></h4>
            <button type="button" class="btn btn-primary" onclick="location.href='shopping_cart.php?id=<?php echo $row['ProductID']?>'">Buy</button>
        </div>
        </div>         
            <?php } ?>
    </div>
</div>
    </div>
    <!-- //phan trang -->
    
    <!-- goi list product -->
    <div class="container-center" style="padding-left: 55%;padding-top: 20px;">
    <?php
    if ($current_page > 1 && $total_page > 1) {
        echo '<a href="list_product.php?page=' . ($current_page - 1) . '">Prev</a> | ';
    }
    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $current_page) {
            echo '<span>' . $i . '</span> | ';
        } else {
            echo '<a href="list_product.php?page=' . $i . '">' . $i . '</a> | ';
        }
    }
    if ($current_page < $total_page && $total_page > 1) {
        echo '<a href="list_product.php?page=' . ($current_page + 1) . '">Next</a> | ';
    }
    ?>
</div>



       