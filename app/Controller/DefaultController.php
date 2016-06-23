<?php

namespace Controller;

use \Controller\Controller;
use \Model\NewsModel;
use \Services\Flash\FlashBags;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$news = new NewsModel();
		$all_news= $news->findAll();
		$this->show('default/home', ['news' => $all_news ]);
	}

}
