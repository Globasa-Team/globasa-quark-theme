<?php
namespace Grav\Theme;

use Grav\Common\Grav; // used to add Quark as a Twig namespace (below)
use Grav\Common\Theme;

class GlobasaQuark extends Quark
{
    /*
    Add Quark as a Twig namespace
    to be able to extend that theme's individual blocks

    From:
    https://learn.getgrav.org/16/cookbook/twig-recipes#extend-base-template-of-i
    */
    public static function getSubscribedEvents() {
        return [
            'onTwigLoader' => ['onTwigLoader', 10]
        ];
    }

    public function onTwigLoader() {
        parent::onTwigLoader();

        // add quark theme as namespace to twig
        $quark_path = Grav::instance()['locator']->findResource('themes://quark');
        $this->grav['twig']->addPath($quark_path . DIRECTORY_SEPARATOR . 'templates', 'quark');
    }
    /* end add Quark as a Twig namespace */


    // Access plugin events in this class
}
