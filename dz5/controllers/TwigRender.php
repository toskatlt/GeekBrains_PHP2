<?php
namespace app\controllers;

use app\interfaces\IRenderer;

class TwigRender implements IRenderer {
	
    protected $templater;
	protected $loader;
	
	public function __construct() {
		$loader = new \Twig\Loader\FilesystemLoader('../templates');
        $this->templater = new \Twig\Environment($loader, []);
    }
	
    public function renderTemplate($template, $params = []) {
        extract($params);
        $template = "{$template}.tmpl";
		$templatePath = $this->templater->loadTemplate($template);
        return $template->renderTemplate($params);
    }
}