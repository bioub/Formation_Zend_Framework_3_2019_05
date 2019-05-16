<?php


namespace Application\View\Helper;


use Zend\Http\Request;
use Zend\View\Helper\AbstractHelper;

class MenuItem extends AbstractHelper
{
    /** @var Request */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function __invoke($label, $url)
    {
        $attrs = '';

        if (strpos($this->request->getUri()->getPath(), $url) === 0) {
            $attrs = 'class="active"';
        }

        return <<<HTML
<li $attrs><a href="$url">$label</a></li>
HTML;
    }

}