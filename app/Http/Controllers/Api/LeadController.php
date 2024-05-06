<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ], [
            'name.required' => "Devi inserire il tuo nome",
            'email.required' => "Devi inserire la tua email",
            'email.email' => "Devi inserire una mail corretta",
            'content.required' => "Ma scrivici qualcosa sfaticato!!",
        ]);


        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);

        }

        $newLead = new Lead();
        $newLead->fill($request->all());
        $newLead->save();

        Mail::to('alalanfedeli@yahoo.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true,
            'content' => 'SUCCESSONE',
            'request' => $request->all()
        ]);
    }
}