<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainController extends GeneralController
{
    public function indexDomain()
    {
        return view('frontend.domains.index');
    }
    public function aboutDomain()
    {
        return view('frontend.domains.about');
    }
    public function checkDomain(Request $request)
    {
        $domain = $request->get('keyDomain');
        if(isset($domain)){
//            $domain = $GET_['keyDomain'];
            if ( gethostbyname($domain) != $domain ) {
                $result = 'Rất tiếc, tên miền đã được đăng ký';
                $statusCode = 400;
            } else {
                $result = 'Chúc mừng, bạn có thể đăng ký tên miền này';
                $statusCode = 200;
            }
        }

        return response()->json(['result'=> $result], $statusCode);

    }
}
