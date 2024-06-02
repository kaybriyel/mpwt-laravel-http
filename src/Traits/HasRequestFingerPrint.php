<?php

namespace MPWT\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MPWT\Http\RequestFingerPrint;
use MPWT\Utils\Constants\General;

trait HasRequestFingerPrint
{

    /**
     * Generate request unique identfier
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return string|false
     *
     */
    public function getFingerPrint(Request $request)
    {
        return (new RequestFingerPrint)->unique($request);
    }

    /**
     * Set finger print on app
     *
     * @return void
     */
    public function setAppFingerPrint(Request $request)
    {
        if (app()->offsetExists(General::FINGER_PRINT)) {
            return;
        }

        $fingerPrint = $this->getFingerPrint($request);

        app()->fingerPrint = $fingerPrint;

        Log::withContext([
            'context_id' => $fingerPrint
        ]);
    }
}
