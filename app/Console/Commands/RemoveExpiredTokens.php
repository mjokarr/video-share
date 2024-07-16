<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\SanctumServiceProvider;
use PhpOption\Option;

class RemoveExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:remove_all {--day=7 : the number of days than should be removed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all expired tokens';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiration = config('sanctum.expiration');

        if($expiration)
        {
            $day = $this->option('day');
            $expireTokens = PersonalAccessToken::where('created_at', '<', now()->subMinutes($expiration + ($day * 24 * 60)));
            $expireTokens->delete();
            $this->info('expired tokens successfully removed');
        }

        $this->warn('The expire time is not set');
    }
}
