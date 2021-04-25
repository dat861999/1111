<?php
include_once("header.php")

?>
<?php
require_once("entities/product.class.php");
$prods = Product::list_product();
require_once("entities/category.class.php");

?>
<?php
if (!isset($_GET["cateid"])) {
    $prods = Product::list_product();
} else {
    $cateid = $_GET["cateid"];
    $prods = Product::list_product_by_cateid($cateid);
}
$cates = Category::list_category();
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
    $result = mysqli_query($conn, 'select count(ProductID) as total from product where CateID=' . $cateid . '');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 3;

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
$cates = Category::list_category();
//end phan trang
?>
<div class="container">
    <div class="wrapper">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/bg13.png" style="padding: 2rem;border-radius: 20px;" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/bg11.png" style="padding: 1rem;border-radius: 30px;" alt="First slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <h1 style="text-align: center;background-color: black;color: white;">Product Popular</h1>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/600e7411a9a34e36b96fe8f0/1ess7aq2i';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <?php foreach ($prods as $item) { ?>
                <div class="col-md-4 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img-actions">
                                <a href="product_detail.php?id=<?php echo $item["ProductID"]; ?>">
                                    <img src="<?php echo "" . $item["Picture"]; ?>" class="card-img img-fluid" width="96" height="350" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="card-body bg-light text-center">
                            <div class="mb-2">
                                <h6 class="font-weight-semibold mb-2"><a href="product_detail.php?id=<?php echo $item["ProductID"]; ?>" class="text-default mb-2" data-abc="true"></a><?php echo $item["ProductName"] ?> </h6>
                            </div>
                            <h3 class="mb-0 font-weight-semibold"><?php echo $item["Price"] ?></h3>
                            <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                            <div class="text-muted mb-3"><?php echo $item["Description"] ?></div>
                            <button type="button" class="btn bg-cart" onclick="location.href='shopping_cart.php?id=<?php echo $item['ProductID'] ?>'"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- phantrang -->
<!-- Site footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Categories</h6>
                <ul class="footer-links">
                    <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                    <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                    <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                    <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                    <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                    <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="list_product.php">Product</a></li>
                    <!-- <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
              <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li> -->
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
                    <a href="#">Scanfcode</a>.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- goi listproduct -->