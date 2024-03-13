<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class sendEmailRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Règles de validation pour la requête.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'message' => 'required|min:10',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ];
    }

    /**
     * Méthode appelée si la validation échoue.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'success' => false,
            'errors' => $validator->errors()->toArray(),
        ];

        response()->json($response, 422);
    }
}
