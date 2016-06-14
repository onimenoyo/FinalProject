<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],



		// LOGIN
		['GET', '/register', 'User#register', 'register'],
		['POST', '/register', 'User#registerUser', 'registerUser'],
		['GET', '/login', 'User#login', 'login'],
		['POST', '/login', 'User#loginUser', 'loginUser'],
		['GET', '/logout', 'User#logout', 'logout'],
		['GET', '/forgotpassword', 'User#forgotpassword', 'forgotpassword'],
		['POST', '/forgotpassword', 'User#forgotpassworduser', 'forgotpassworduser'],
		['GET', '/forgotpassword/[:token]', 'User#forgotpasswordmodif', 'forgotpasswordmodif'],
		['POST', '/forgotpassword/[:token]', 'User#forgotpasswordmodifpost', 'forgotpasswordmodifpost'],
		['GET', '/profil', 'User#profil', 'profil'],
		['POST', '/profil', 'User#profilPost', 'profilPost'],
	);
