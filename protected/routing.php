<?php 
	if(!array_key_exists('P', $_GET) || empty($_GET['P']))
		$_GET['P'] = 'home';

	switch ($_GET['P']) {
		case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;

		case 'add_thread': IsUserLoggedIn() ? require_once PROTECTED_DIR.'thread/add.php' : header('Location: index.php'); break;

		case 'open_thread': require_once PROTECTED_DIR.'thread/open.php'; break;

		case 'update_thread': IsUserLoggedIn() ? require_once PROTECTED_DIR.'thread/update.php' : header('Location: index.php'); break;

		case 'my_thread': IsUserLoggedIn() ? require_once PROTECTED_DIR.'thread/mythreads.php' : header('Location: index.php'); break;

		case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;

		case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break;

		case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

		case 'users': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/user_list.php' : header('Location: index.php'); break;

		case 'update_users': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/update.php' : header('Location: index.php'); break;

		default: require_once PROTECTED_DIR.'normal/404.php'; break;
	}
?>