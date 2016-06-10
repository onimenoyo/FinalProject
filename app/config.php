<?php

$w_config = [
   	//information de connexion à la bdd
	'db_host' => 'localhost',											//hôte (ip, domaine) de la bdd
    'db_user' => 'root',												//nom d'utilisateur pour la bdd
    'db_pass' => '',														//mot de passe de la bdd
    'db_name' => 'finalproject',						//nom de la bdd
    'db_table_prefix' => 'fp_',										//préfixe ajouté aux noms de table

	//authentification, autorisation
	'security_user_table' => 'fp_users',											//nom de la table contenant les infos des utilisateurs
	'security_id_property' => 'id',														//nom de la colonne pour la clef primaire
	'security_username_property' => 'pseudo',									//nom de la colonne pour le "pseudo"
	'security_lastname_property' => 'lastname',								//nom de la colonne pour le "lastname"
	'security_firstname_property' => 'firstname',							//nom de la colonne pour le "firstname"
	'security_email_property' => 'email',											//nom de la colonne pour l'"email"
	'security_password_property' => 'password',								//nom de la colonne pour le "mot de passe"
	'security_avatar_property' => 'avatar',										//nom de la colonne pour le "avatar"
	'security_role_property' => 'role',												//nom de la colonne pour le "role"
	'security_token_property' => 'token',											//nom de la colonne pour le "token"
	'security_last_connexion_property' => 'last_connexion',		//nom de la colonne pour le "last_connexion"
	'security_ip_property' => 'ip',														//nom de la colonne pour le "ip"
	'security_created_at_property' => 'created_at',						//nom de la colonne pour le "created_at"
	'security_modified_at_property' => 'modified_at',					//nom de la colonne pour le "modified_at"


	'security_login_route_name' => 'login',										//nom de la route affichant le formulaire de connexion
];

require('routes.php');
