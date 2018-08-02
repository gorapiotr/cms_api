<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\DB;

class ChangePassworController extends Controller
{
    public function process(ChangePasswordRequest $request)
    {
        return $this->getPasswordResetTableRow($request);
    }

    public function getPasswordResetTableRow($request)
    {
        return DB::table('password_reset')->where([
            'email' => $request->email,
            'token' => $request->token])->get();
    }
}
