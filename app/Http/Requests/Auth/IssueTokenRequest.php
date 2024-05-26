<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;


class IssueTokenRequest extends FormRequest
{
    public function __construct(\Request $request, User $user){
        // $token = $request->user()->createToken($request->token_name);
        // $token = $request->user()->createToken($request->token_name);
        // return ['token' => $token->plainTextToken];

    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false; // ?
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
        ];
    }
}
