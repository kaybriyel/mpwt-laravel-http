<?php

namespace MPWT\Http\Traits;

use Illuminate\Http\Request;
use MPWT\Http\RequestFingerPrint;
use Symfony\Component\HttpFoundation\Response;

trait HasRecordHttp
{
    public function recordRequest(Request $request): bool
    {
        $record = (new RequestFingerPrint)->convertToArray($request);

        // TODO

        return true;
    }

    public function recordResponse(Response $response): bool
    {
        
        // TODO

        return true;
    }
}
