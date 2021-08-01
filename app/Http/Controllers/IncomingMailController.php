<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class IncomingMailController extends Controller
{
    public function store(Request $request)
    {
        info($request->all());

        $email = Email::createFromRequest($request);


        return response()->json([
            'message' => "Success",
            'sender' => $email->to
        ], 200);
    }
}
