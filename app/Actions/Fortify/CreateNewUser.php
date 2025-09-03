<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'string', 'min:8', 'same:confirmPassword'],
            'confirmPassword' => ['required', 'string', 'min:8'],
        ])->validate();
        // $validator = Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //         Rule::unique(User::class),
        //     ],
        //     'password' => ['required', 'string', 'min:8', 'same:confirmPassword'],
        //     'confirmPassword' => ['required', 'string', 'min:8'],
        // ]);

        // if ($validator->fails()) {
        //     dd($validator->errors() . " with username: " . $username); // This shows validation errors
        // }

        $userData = [
            'name' => $input['name'],
            'username' => fake()->unique()->username(),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ];

        // dd($userData);

        return User::create($userData);
    }
}
