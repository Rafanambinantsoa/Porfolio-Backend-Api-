<?php

namespace App\Http\Controllers;

use App\Http\Requests\sendEmailRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
            ], 422);
        }

        //email
        try {
            Mail::send('emails.contact', [
                'name' => $request->name,
                'email' => $request->email,
                'user_message' => $request->message,
            ], function ($mail) use ($request) {
                $mail->from($request->email , "Contact");
                $mail->to("tsukasashishiosama@gmail.com")->subject('Contact Message');
            });
            return response()->json([
                'data' => 'success',
                'message' => 'Votre message a été envoyé avec succès. Nous vous contacterons bientôt'
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Il y a une erreur dans l'envoi de l'email. Veuillez réessayer.",
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
