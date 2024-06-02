<?php

namespace MPWT\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use MPWT\Http\Contracts\RecordHttp;
use MPWT\Http\Traits\CanExecuteAfterResponse;
use MPWT\Http\Traits\HasRecordHttp;
use MPWT\Http\Traits\HasRequestFingerPrint;
use Symfony\Component\HttpFoundation\Response;

class IncomingMiddleware implements RecordHttp
{

    use CanExecuteAfterResponse, HasRequestFingerPrint, HasRecordHttp;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->setAppFingerPrint($request);
        $this->recordRequest($request);
        return $next($request);
    }

    /**
     * After response callback
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function terminate(Request $request, Response $response)
    {
        $this->recordResponse($response);
        $this->callMPWTAfterResponseCallbacks();
    }
}
