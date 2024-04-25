<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class pagination extends Component
{
    public $pagination_data;
    public $next;
    public $prev;
    public $currentRoute;
    public $href;
    /**
     * Create a new component instance.
     */
    public function __construct($data)
    {
        $this->getCurrentRoute();
        //
        $this->pagination_data = $data;
//        dd($this->pagination_data);
        $this->prev = $this->getPageNumberFromUrl($this->pagination_data['prev_page_url']);
        $this->next = $this->getPageNumberFromUrl($this->pagination_data['next_page_url']);
    }

    function getCurrentRoute()
    {
        $this->currentRoute = \Illuminate\Support\Facades\Request::fullUrlWithoutQuery("page");
        if ($this->currentRoute == url('/')) {
            $this->currentRoute = "/all";
        }

    }
    function getPageNumberFromUrl($url) {
        $parsedUrl = parse_url($url);
        if(isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $query);
            if(isset($query['page'])) {
                return $query['page'];
            }
        }
        return null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.pagination');
    }
}
