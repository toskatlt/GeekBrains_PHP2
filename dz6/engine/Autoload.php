<?php

namespace app\engine;

class Autoload {
    public function loadClass($className) {
        $fileName = str_replace(['app\\','\\'],[substr(DIR_ROOT, 0, -1) . preg_replace("@\w+.php@", "", DIR_SELF) . '../', DS], $className) . ".php";
        if (file_exists($fileName)) {
        	include $fileName;
			echo $fileName."<br>";
        }
    }
}