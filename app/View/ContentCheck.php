<?php

namespace App\View;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class ContentCheck
{
    /**
     * @var Collection
     */
    public static $instances;

    protected $empty = true;

    public function __construct()
    {
        if (is_null(static::$instances)) {
            static::$instances = collect();
        }

        if (ob_start()) {
            static::$instances->push($this);
        }
    }

    public function check()
    {
        ob_start();
    }

    public function endCheck()
    {
        $contents = trim(ob_get_clean());

        if (! empty($contents)) {
            $this->empty = false;
            echo e(new HtmlString($contents));
        }
    }

    public function render()
    {
        $contents = ob_get_clean();

        if (! $this->empty) {
            echo e(new HtmlString($contents));
        }
    }
}