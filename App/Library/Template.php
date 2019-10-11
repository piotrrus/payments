<?php

namespace App\Library;

class Template {

    private $_scriptPath = \Conf::VIEW_PATH . "/";
    private $properties;

    public function setScriptPath($scriptPath) {
        $this->_scriptPath = $scriptPath;
    }

    public function render(string $filename, $properties = []) {   
        ob_start();
        $filename = $this->_scriptPath . $filename . '.php';

        if (file_exists($filename)) {
            extract($properties);
            include($filename);
        } else {
            $this->templateNotFoundException($filename);
        }
        return ob_get_clean();
    }

    private function templateNotFoundException(string $filename) {
        echo "Error during loading the file: " . $filename;
    }

}
