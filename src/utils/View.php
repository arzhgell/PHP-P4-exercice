<?php
class View {
    private $data = [];
    private $layout = 'default';

    public function assign($key, $value) {
        $this->data[$key] = $value;
    }

    public function setLayout($layout) {
        $this->layout = $layout;
    }

    public function render($template) {
        extract($this->data);
        
        ob_start();
        require_once __DIR__ . "/../views/{$template}.php";
        $content = ob_get_clean();

        require_once __DIR__ . "/../views/layouts/{$this->layout}.php";
    }
} 