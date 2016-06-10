<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		// LOGIN
		['GET', '/register', 'User#register', 'register'],
		['POST', '/register', 'User#registerUser', 'registerUser'],
		['GET', '/login', 'User#login', 'login'],
		['POST', '/login', 'User#loginUser', 'loginUser'],
		['GET', '/logout', 'User#logout', 'logout'],
	);
