<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create-admin {email} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');
        if (! $password) {
            $password = 'IamAdmin';
        }

        //если пользов. уже существует, то выдавать сообщение
        if (User::query()->where('email', $email)->exists()) {
            $this->error('User already exists');

            return  self::FAILURE;
        }

        $user = new User();
        $user->name = 'Admin';
        $user->email = $email;
        $user->password = $password;
        $user->role_id = Role::query()->Where('name', User::IS_ADMIN)->first()->id;
        $user->email_verified_at = new \DateTime();
        $user->save();

        if (! $this->argument('password')) {
            $this->info(sprintf('Admin password: %s', $password));
        }

        return self::SUCCESS;
    }
}
