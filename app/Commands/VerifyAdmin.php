<?php
namespace App\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class VerifyAdmin extends Command
{
    protected $signature = 'verify:admin';
    protected $description = 'Verify admin account creation';

    public function handle()
    {
        $this->info('=== Checking users table ===');
        $user = DB::table('users')->where('email', 'marjovicalejado123@gmail.com')->first();
        if ($user) {
            $this->info('User found: ' . json_encode($user));
        } else {
            $this->error('No user found with email: marjovicalejado123@gmail.com');
        }

        $this->info("\n=== Checking mshop_admin_user table ===");
        try {
            $adminCount = DB::table('mshop_admin_user')->where('status', 1)->count();
            $this->info('Active admin users: ' . $adminCount);
        } catch (\Exception $e) {
            $this->error('Error checking mshop_admin_user table: ' . $e->getMessage());
        }
    }
}
