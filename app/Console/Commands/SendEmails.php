<?php

namespace App\Console\Commands;

use App\Mail\SendEmailPorta;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $users = User::where('date_last_session', '<', Carbon::now()->subDays(30))->get();

        $this->line("Envio de email");
        $this->line("-----------------------------------------");
        foreach ($users as $key => $user) {
            echo "ID: " . $user->id . " NOMBRE: " .$user->name . " EMAIL: " . $user->email . " FECHA ULTIMO INICIO SESION: " . $user->date_last_session;
            $this->line("\n");
            Mail::to($user->email, $user->name)->send(new SendEmailPorta($user));
        }
        $this->line("-----------------------------------------");
        $this->line("Envio de email");
    }
}
