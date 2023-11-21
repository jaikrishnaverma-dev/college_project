
<div class="container comment-form">
	<h3 class="">Membership Form </h3>
	<p class="error">
				<?php
				if (isset($_GET["status_message"]))
					echo $_GET["status_message"];
				?>
			</p>
	<form class="form-wrapper" method="post" action="./backend/controller/insert_without_login.php">
		<input name="name"  id="full-name" type="text" placeholder="Full name*">
		<input name="dob" type="date" class="col-lg-50" placeholder="Date of birth*">
		<input name="qualification" type="text" class="col-lg-50" placeholder="Qualifaction">
		<input name="designation" type="text" placeholder="Designation">
		<input name="college_name" type="text" placeholder="college">
		<input name="university_name" type="text" placeholder="University">
		<textarea name="address" placeholder="address for correspondence"></textarea>
		<input name="phone" type="number" placeholder="phone number">
		<input name="email" type="email" placeholder="Email">
		<input name="books_published" type="number" class="col-lg-50" placeholder="Number of book published">
		<input name="article published" type="number" class="col-lg-50" placeholder="Number of article published">
		<input name="membership_session" type="text" placeholder="membership session">
		<input name="amount" type="number" placeholder="paid amount">
		<textarea name="comment" placeholder="Write a comment....."></textarea>
		<input type="hidden" name="tbname" value="members" >
		<input type="submit" value="Submit">
	</form>
	<a href="https://j-payment-simulation.vercel.app/" style="margin-bottom: 50px;" class="registration-btn">Simulate Fee Payment</a>
</div>
