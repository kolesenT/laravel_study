<?php

namespace App\Console\Commands;

use App\Mail\EmailConfirm;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailNotVerificationUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify-verification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email not verified user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all()->whereNull('email_verified_at');

        //если таких пользов. нет, то выдавать сообщение
        if ($users->count() == 0) {
            $this->warn('All verified!');

            return  self::FAILURE;
        }

        foreach ($users as $user) {
            Mail::to($user->email)->send(new EmailConfirm($user));
        }
        $this->info('Suceccfull');

        return $this::SUCCESS;
    }
}
