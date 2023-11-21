
		<div class="container comment-form">
			<h3 class="">Login</h3>
			<p class="error">
				<?php
				if (isset($_GET["status_message"]))
					echo $_GET["status_message"];
				?>
			</p>
			<form class="form-wrapper" method="post" action="backend/controller/loginControll.php">
				<input type="text" name="email" placeholder="Email">
				<input type="password" name="password" placeholder="Password">
				<input type="hidden" name="tbname" value="user">
				<input type="submit" name="login" value="Log In">
			</form>
		</div>
