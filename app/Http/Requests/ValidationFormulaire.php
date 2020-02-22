<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationFormulaire extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pseudo'      =>  'required|max:20',
            'email'     =>  'required',
            'nom'      =>  'required|max:20',
            'prenom'      =>  'required|max:20',
            'passwd'      =>  'required|max:10',
            'Cpasswd'      =>  'required|same:passwd',
            'filiere'     =>  'required',



        ];
    }

    public function messages()
    {
        return [
            'pseudo.required'     => 'Le pseudo est requis!',
            'pseudo.max'          =>  'Le pseudo ne doit pas depasser 20 caratères!',
            'email.required'    => 'Email est requis!',
            'nom.required'     => 'Le nom est requis!',
            'nom.max'          =>  'Le nom ne doit pas depasser 20 caratères!',
            'prenom.required'     => 'Le prenom est requis!',
            'prenom.max'          =>  'Le prenom ne doit pas depasser 20 caratères!',
            'passwd.required'     => 'Le mot de passe est requis!',
            'passwd.max'          =>  'Le mot de passe ne doit pas depasser 10 caratères!',
            'Cpasswd.required'     => 'La confirmation du mot de passe est requis!',
            'Cpasswd.same'          =>  'Les mots de passe ne sont pas conformes!',
            'filiere.required'     => 'La filiere est requis!',



        ];
    }
}
