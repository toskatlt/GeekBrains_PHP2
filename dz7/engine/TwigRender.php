<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.05.2019
 * Time: 0:16
 */

namespace app\engine;


use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{
    protected $twig;


    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../templates');
        $this->twig =  new \Twig\Environment($loader, []);
    }


    public function renderTemplate($template, $params = []) {

        return $this->twig->render($template . ".tmpl", $params);

    }
}