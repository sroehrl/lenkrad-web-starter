<?php

namespace Configuration;

use Neoan\Database\Database;
use Neoan\Database\SqLiteAdapter;
use Neoan\Helper\Env;
use Neoan\NeoanApp;
use Neoan\Render\Renderer;
use Neoan\Routing\AttributeRouting;
use Neoan\Store\Store;

class Loader
{
    public function __invoke(NeoanApp $app): self
    {
        $app->invoke(new AttributeRouting('App'));
        $this->templating($app);
//        $this->database();
        return $this;
    }
    private function templating(NeoanApp $app): void
    {
        Store::write('pageTitle', 'My App');
        Renderer::setTemplatePath('src/views');
        Renderer::setHtmlSkeleton('configuration/views/layout.html', 'main', [
            'title' => Store::dynamic('pageTitle'),
            'webPath' => $app->webPath
        ]);
    }
    private function database(): void
    {

        Database::connect(new SqLiteAdapter([
            'location' => Env::get('DB_LOCATION', __DIR__ . '/database.db')
        ]));
    }
}