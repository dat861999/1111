<?php
    include_once("header.php")

?>

<form method="post" class="login100-form validate-form">
					<span class="login100-form-logo">
						<img src="img/logo.png"width="100px" alt="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Đăng Nhập
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="txtname" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="txtpass" placeholder="Gmail">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="txtemail" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
				

					<div class="container-login100-form-btn">
						<input type = 'submit' name="btn-signup" value="Sign Up" class="login100-form-btn">
						
                        
					</div>

				
				</form>