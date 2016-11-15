<?php

namespace TeachMe\Components;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Routing\UrlGenerator;
use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;

class HtmlBuilder extends CollectiveHtmlBuilder
{
    private $config;
    private $view;

    public function __construct(Config $config, View $view, UrlGenerator $url)
    {
        $this->config = $config;
        $this->view = $view;
        $this->url = $url;
    }

    public function menu($items)
    {
        if (!is_array($items)) {
            $items = $this->config->get($items, array());
        }

        return $this->view->make('partials/menu', compact('items'));
    }

    public function classes(array $classes)
    {
        $html = '';
        foreach ($classes as $name => $bool) {
            if (is_int($name)) {
                $name = $bool;
                $bool = true;
            }
            if ($bool) {
                $html .= $name.' ';
            }
        }
        if (!empty($html)) {
            return ' class="'.trim($html).'"';
        }

        return '';
    }

    public function splitTitle($title)
    {
        $split_title = explode(substr($title, -1), $title);
        return $split_title[0];
    }
}
