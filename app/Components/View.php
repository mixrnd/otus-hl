<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 05.10.19
 * Time: 23:25
 */

namespace App\Components;


class View
{
    /**
     * @var string
     */
    private $template;
    /**
     * @var array
     */
    private $params;

    private $layout;

    public function __construct(string $template, array $params)
    {
        $this->template = __DIR__ . '/../views/' . $template . '.php';
        $this->params = $params;
    }

    public function render()
    {
        $content = $this->renderInternal($this->template, $this->params);

        if ($this->layout) {
            return $this->renderInternal($this->layout, ['content' => $content]);
        }

        return $content;
    }

    public function renderInternal($template, $params)
    {

        extract($params);

        ob_start();
        include($template);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * @param mixed $layout
     */
    public function setLayout($layout): void
    {
        $this->layout = __DIR__ . '/../views/layouts/' . $layout . '.php';;
    }
}