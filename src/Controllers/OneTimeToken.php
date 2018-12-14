<?php

namespace LukePOLO\LaravelPassportOneTimeToken\Controllers;

use Illuminate\Http\Request;

class OneTimeToken
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        if($request->user()) {
          return ["access_token" => $request->user()->createToken('OneTimeToken', config('one-time-token.scopes'))->accessToken];        }

        return response('Not Authorized.', 401);
    }
}