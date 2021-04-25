<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xây Dụng Website Bán Hàng</title>
    <link href="booptrap/booptrapcss/bootstrap.min.css" media="screen" rel="stylesheet">
    <link rel="stylesheet" href="booptrap/booptrapcss/bootstrap.min.css.map" media="screen">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="Atyle.css">
    <link rel="stylesheet" href="/booptrapcss/bootstrap.min.css">

    <!----------------- link JS -------------------------------->
    <script src="/booptrapjs/bootstrap.min.js"></script>
    <script src="/booptrapjs/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/7d65f38fc8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   
    <script src="https://kit.fontawesome.com/7d65f38fc8.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: whitesmoke;">
<div class="header" style="background-image: url('img/bg3.jpg');">
        <div class="header-overlay"></div>
        <div class="header-nav">
            <div class="header-nav-item">
               
                    <button class="header-nav-item-btn">
                        <i class="far fa-user"></i>
                        <?php
                    session_start();
                    if(isset($_SESSION["user"])!=""){
                        echo "<li>Hello: ".$_SESSION["user"]."</li>";
                    }else{
                        echo "<li>You not sign in</li>";
                    }
                 ?>
                    </button>
                   <a href="register.php"><button id="btn1" class="header-nav-item-btnitem">Sign Up</button></a>
                   <a href="list_product.php"> <button class="header-nav-item-btnitem">Product</button></a>
                   <a href="add_product.php"> <button class="header-nav-item-btnitem">Add Product</button></a>
                   <a href="index.php"> <button class="header-nav-item-btnitem">Home</button></a>
            </div>
        </div>
    </div>
</body>
</html>
