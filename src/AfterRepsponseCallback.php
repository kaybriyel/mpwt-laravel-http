<?php

namespace MPWT\Http;

use MPWT\Http\Contracts\AfterRepsponseCallback as ContractsAfterRepsponseCallback;

class AfterRepsponseCallback implements ContractsAfterRepsponseCallback
{

    /**
     * @var array callback queues
     */
    private static $afterResponseCallbacks = [];

    public function addAfterResponseCallbacks(callable $callback): void
    {
        self::$afterResponseCallbacks[] = $callback;
    }

    public function callAfterResponseCallbacks(): void
    {
        // first in first out
        while ($callback = array_shift(self::$afterResponseCallbacks)) {
            $callback();
        }
    }
}
