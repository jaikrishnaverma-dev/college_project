	<?php include './master/header.php';
	if (!isset($_GET['page'])) {
		include('home.php');
	} else
		switch ($_GET['page']) {
			case 'login':
				include('login.php');
				break;
			case 'registration':
				include('registration.php');
				break;
			case 'about':
				include('about.php');
				break;
			case 'payment':
				include('payment.php');
				break;
			case 'activities':
				include('activities.php');
				break;
			case 'contact':
				include('contact.html');
				break;
			case 'membership':
				include('membership.php');
				break;
			case 'payment_success':
				include('payment_success.php');
				break;
			case 'payment_success':
				include('payment_success.php');
				break;
			default:
				include('home.php');
		}

	include './master/footer.php' ?>