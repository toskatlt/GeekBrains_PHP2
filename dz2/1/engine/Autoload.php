<?php
class Autoload {
    public function loadClass($className) {
		$classNameReplace = str_replace(["app", "\\"], ["..", "/"], $className);
		$fileName = "{$classNameReplace}.php";
		if (file_exists($fileName)) {
			include_once $fileName;
			var_dump($fileName);
		}
    }
}