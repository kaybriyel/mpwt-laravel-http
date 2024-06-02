<?php

namespace MPWT\Http\Traits;

use MPWT\Http\AfterRepsponseCallback;

trait CanExecuteAfterResponse
{
    /**
     * Add callable function to be called in kernel terminate method
     *
     * @param callable $callback
     *
     * @return void
     */
    public function addMPWTAfterResponseCallbacks(callable $callback)
    {
        (new AfterRepsponseCallback)->addAfterResponseCallbacks($callback);
    }

    /**
     * Executes all callbacks
     *
     * @return void
     */
    public function callMPWTAfterResponseCallbacks()
    {
        (new AfterRepsponseCallback)->callAfterResponseCallbacks();
    }
}
