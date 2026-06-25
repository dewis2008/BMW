<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

#[Signature('app:create-admin-user {--name=R&S Admin} {--email=} {--password=}')]
#[Description('Create or promote an admin user for the enquiries dashboard')]
class CreateAdminUser extends Command
{
    public function handle(): int
    {
        $name = (string) $this->option('name');
        $email = (string) ($this->option('email') ?: $this->ask('Admin email'));
        $password = (string) ($this->option('password') ?: $this->secret('Admin password'));

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:10'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => $password,
                'is_admin' => true,
            ],
        );

        $this->info("Admin user ready: {$user->email}");

        return self::SUCCESS;
    }
}
