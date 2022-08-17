<?php

namespace App\Console;

use App\Jobs\AllPostsMonts;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    public function getRandomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $user = User::where('id', '=', 1)->first();
            $password = $this->getRandomString(10);
            $user->password = bcrypt($password);
            $user->save();
            Log::alert($password);
        })->monthlyOn(1);

        $schedule->call(function () {
            $user = User::where('id', '=', 1)->first();
            $password = $this->getRandomString(10);
            $user->password = bcrypt($password);
            $user->save();
            Log::alert($password);
        })->monthlyOn(15);

        $schedule->job(new AllPostsMonts())->monthly();
        $schedule->command('queue:work redis')->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
