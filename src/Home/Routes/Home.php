<?php

namespace App\Home\Routes;

use Neoan\Routing\Attributes\Web;
use Neoan\Routing\Interfaces\Routable;
use Neoan\Store\Store;

#[Web('/', '/home.html')]
class Home implements Routable
{
    public function __invoke(): array
    {

        Store::write('pageTitle', 'Home');
        return ['name' => 'Home'];
    }
}