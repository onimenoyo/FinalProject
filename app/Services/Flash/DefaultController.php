<?php

namespace Controller;

use \Controller\AppController;
use \Utils\FlashBags;

class DefaultController extends AppController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home($id)
	{
			$flashBag = new FlashBags();
			if($id == 1) {
				$flashBag->setFlash('info', "Test de message");
			}

  		$this->show('default/contact');
  }

}
