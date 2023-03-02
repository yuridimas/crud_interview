<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class BankAccountController extends Controller
{
    public function index()
    {
        return view('pages.bank_accounts.index');
    }

    public function process(Request $request)
    {
        $rules = [
            'bank_id' => ['required', 'string']
        ];

        $attributes = [
            'bank_id' => 'ID Bank'
        ];

        $this->validate($request, $rules, [], $attributes);
        $response = Http::asForm()->post(Config::get('services.kanaldata.endpoint') . '/kanaldata/Webservice/bank_account', [
            'bank_id' => $request->bank_id
        ]);

        if ($response->successful()) {
            return redirect()->route('bank-account')->with(['data' => $response->json()]);
        }
    }
}
