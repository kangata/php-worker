<?php

namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;

trait HasDatabase
{
    /**
     * Setup database config
     *
     * @return void
     */
    public function withDatabase(): void
    {
        $capsule = new Capsule;

        $config = require $this->basePath.'/config/database.php';

        $capsule->addConnection($config['connections'][$config['default']]);

        foreach ($config['connections'] as $name => $conf) {
            $capsule->addConnection($conf, $name);
        }

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}
