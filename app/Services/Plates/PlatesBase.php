<?php
namespace Services\Plates;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use W\View\Plates\PlatesExtensions;
use \Services\Flash\FlashBags;
//use LogicException;

class PlatesBase implements ExtensionInterface
{
    protected $engine;
    //public $template; // must be public

    public function register(Engine $engine)
    {
        $this->engine = $engine;
        $engine->registerFunction('getFlash', [$this, 'getFlash']);
    }

    /**
     * Affiche le message contenu dans la session flash :
     */
    public function getFlash() {
        $flashBag = new FlashBags();
        if(!empty($flashBag->getFlash())) {
          echo '<div class="alert alert-'.$flashBag->getFlash()['type'].'"><p>'.$flashBag->getFlash()['message'].'</p></div>';
          $flashBag->unsetFlash();
        }
        return NULL;
    }
}
