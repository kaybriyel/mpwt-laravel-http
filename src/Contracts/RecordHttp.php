<?php

namespace MPWT\Http\Contracts;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface RecordHttp
{
    /**
     * Record incoming request
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function recordRequest(Request $request): bool;

    /**
     * Record response
     *
     * @param \Symfony\Component\HttpFoundation\Response $response
     *
     * @return bool
     */
    public function recordResponse(Response $response): bool;
}
