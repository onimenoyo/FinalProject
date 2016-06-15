<?php

namespace Controller;

use \Controller\Controller;

use \Services\Flash\FlashBags;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{

		//$flashBag = new FlashBags();

		//$flashBag->setFlash('info', "Test de message");

		$this->show('default/home');
	}

}
