<?php
namespace CodinPro\Lib;

class View
{
    private $tplPath;
    private $vars = [];

    /**
     * View constructor.
     * @param $tplPath
     */
    public function __construct($tplPath)
    {
        $this->tplPath = $tplPath;
    }

    public function render($templatePath){
        ob_start();
        include $this->tplPath . $templatePath . '.tpl';
        $template = ob_get_contents();
        ob_end_clean();

        return $template;
    }

    public function get($var, $default = '')
    {
        return isset($this->vars[$var]) ? $this->vars[$var] : $default;
    }

    public function setVar($var, $value)
    {
        $this->vars[$var] = $value;
    }
}