<?php

namespace Atom\Installation\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Atom\Installation\Installation
 */
class Installation extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return \Atom\Installation\Installation::class;
    }
}
