<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userEmailValidator = ['required','string','max:255','email:rfc,dns,filter,spoof'];
        $userPasswordValidator = [];
        $userRoleValidator = [];
        $currentPasswordValidtor = [];
        if($this->input('mode') == 'edit' && !empty($this->input('id'))){
            $userEmailValidator[] = Rule::unique('users','email')->ignore($this->input('id'));
            $authUser = Auth::user();
            if($authUser->id == $this->input('id')){
                $currentPasswordValidtor[]  = 'current_password:web';
                //$userPasswordValidator[] = 'current_password:web';
                if($this->input('current_password')){
                    $userPasswordValidator[] = 'required';
                }
            }
        }else{
            $userEmailValidator[] = Rule::unique('users','email')->ignore($this->input('id'));
            $userPasswordValidator[] = 'required';
            $userRoleValidator[] = 'required';
        }
        $userPasswordValidator = array_merge($userPasswordValidator,[ 'string','max:20','min:8',"", 'confirmed','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/']);
        $userRoleValidator = array_merge($userRoleValidator,[Rule::in([config('constant.ADMIN_ROLE_NAME'), config('constant.USER_ROLE_NAME')])]);
        return [
            'name' => ['required','string', 'max:100'],
            'email' => $userEmailValidator,
            'password' => $userPasswordValidator,
            'current_password'=>$currentPasswordValidtor,
            'role' => $userRoleValidator,
        ];
    }
}
