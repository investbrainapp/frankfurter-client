<?php

declare(strict_types=1);

namespace Investbrain\Frankfurter;

use Illuminate\Support\Facades\Facade;

class Frankfurter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Investbrain\Frankfurter\FrankfurterClient::class;
    }
}
