<?php

	$w_routes = array(
		// HOME
		['GET', '/', 'Default#home', 'default_home'],

		// LOGIN
		['GET', '/register', 'User#register', 'register'],
		['POST', '/register', 'User#registerUser', 'registerUser'],
		['GET', '/login', 'User#login', 'login'],
		['POST', '/login', 'User#loginUser', 'loginUser'],
		['GET', '/logout', 'User#logout', 'logout'],
		['GET', '/validmail/[:token]', 'User#validmail', 'validmail'],
		['GET', '/forgotpassword', 'User#forgotpassword', 'forgotpassword'],
		['POST', '/forgotpassword', 'User#forgotpassworduser', 'forgotpassworduser'],
		['GET', '/forgotpassword/[:token]', 'User#forgotpasswordmodif', 'forgotpasswordmodif'],
		['POST', '/forgotpassword/[:token]', 'User#forgotpasswordmodifpost', 'forgotpasswordmodifpost'],
		['GET', '/profil', 'User#profil', 'profil'],
		['POST', '/profil', 'User#profilPost', 'profilPost'],

		//ADMIN
		['GET', '/admin', 'Admin#dashboard', 'dashboard'],
		//ADMIN USER
		['GET', '/admin/user', 'Admin#admin_user', 'admin_user'],
		['GET', '/admin/user/modif/[:id]', 'Admin#admin_user_modif', 'admin_user_modif'],
		['POST', '/admin/user/modif/[:id]', 'Admin#admin_user_modif_post', 'admin_user_modif_post'],
		['GET', '/admin/user/delete/[:id]', 'Admin#admin_user_delete', 'admin_user_delete'],
		//ADMIN NEWS
		['GET', '/admin/news', 'Admin#admin_news', 'admin_news'],
		['GET', '/admin/news/add', 'Admin#admin_news_add', 'admin_news_add'],
		['POST', '/admin/news/add', 'Admin#admin_news_add_post', 'admin_news_add_post'],
		['GET', '/admin/news/modif/[:id]', 'Admin#admin_news_modif', 'admin_news_modif'],
		['POST', '/admin/news/modif/[:id]', 'Admin#admin_news_modif_post', 'admin_news_modif_post'],
		['GET', '/admin/news/delete/[:id]', 'Admin#admin_news_delete', 'admin_news_delete'],
		//ADMIN CHARACTERS
		['GET', '/admin/characters', 'Admin#admin_characters', 'admin_characters'],
		['GET', '/admin/characters/modif/[:id]', 'Admin#admin_characters_modif', 'admin_characters_modif'],
		['POST', '/admin/characters/modif/[:id]', 'Admin#admin_characters_modif_post', 'admin_characters_modif_post'],
		['GET', '/admin/characters/delete/[:id]', 'Admin#admin_characters_delete', 'admin_characters_delete'],
		//ADMIN INVENTORY
		['GET', '/admin/inventory', 'Admin#admin_inventory', 'admin_inventory'],
		['GET', '/admin/inventory/modif/[:id]', 'Admin#admin_inventory_modif', 'admin_inventory_modif'],
		['POST', '/admin/inventory/modif/[:id]', 'Admin#admin_inventory_modif_post', 'admin_inventory_modif_post'],
		['GET', '/admin/inventory/delete/[:id]', 'Admin#admin_inventory_delete', 'admin_inventory_delete'],
		//ADMIN OBJECTS
		['GET', '/admin/objects', 'Admin#admin_objects', 'admin_objects'],
		['GET', '/admin/objects/modif/[:id]', 'Admin#admin_objects_modif', 'admin_objects_modif'],
		['POST', '/admin/objects/modif/[:id]', 'Admin#admin_objects_modif_post', 'admin_objects_modif_post'],
		['GET', '/admin/objects/delete/[:id]', 'Admin#admin_objects_delete', 'admin_objects_delete'],
		//ADMIN PNJ
		['GET', '/admin/pnj', 'Admin#admin_pnj', 'admin_pnj'],
		['GET', '/admin/pnj/modif/[:id]', 'Admin#admin_pnj_modif', 'admin_pnj_modif'],
		['POST', '/admin/pnj/modif/[:id]', 'Admin#admin_pnj_modif_post', 'admin_pnj_modif_post'],
		['GET', '/admin/pnj/delete/[:id]', 'Admin#admin_pnj_delete', 'admin_pnj_delete'],

		//JEU
		['GET', '/game/intro', 'Game#intro', 'intro'],
		['GET', '/game/intro2', 'Game#intro2', 'intro2'],
		['POST', '/game/intro2', 'Game#character_creation_post', 'character_creation_post'],
		['GET', '/game/intro3/[:id]', 'Game#intro3', 'intro3'],
		['GET', '/game/camp/[:id]', 'Game#camp', 'camp'],
		['GET', '/game/explore/[:id]/[:lieu]', 'Game#explore', 'explore'],
		['POST', '/game/explore/[:id]/[:lieu]', 'Game#exploration', 'exploration'],
		['GET', '/game/fight/[:id]/[:lieu]/[:cible]', "Game#fight", 'fight'],

		// AJAX

		['GET', '/game/attack/ajax/[:id]/[:lieu]/[:cible]/[:weapon]', "Game#attack", 'attack'],


		//MailController
		['GET', '/test/mail', 'Mail#mail', 'mail'],
	);
