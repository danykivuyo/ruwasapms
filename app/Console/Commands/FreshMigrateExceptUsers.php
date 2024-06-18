<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class FreshMigrateExceptUsers extends Command
{
    protected $signature = 'migrate:fresh-except-users';
    protected $description = 'Drop all tables and re-run all migrations except the users table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Step 1: Backup the users table
        $this->backupUsersTable();

        // Step 2: Drop all tables except users
        $this->dropAllTablesExceptUsers();

        // Step 3: Re-run migrations
        $this->call('migrate', ['--seed' => true]);

        // Step 4: Restore the users table
        $this->restoreUsersTable();

        $this->info('All tables except users table have been dropped and re-migrated, and users table has been restored.');
    }

    protected function backupUsersTable()
    {
        $this->info('Backing up users table...');
        $users = DB::table('users')->get();
        Storage::put('users_backup.json', $users->toJson());
        $this->info('Users table backup completed.');
    }

    protected function dropAllTablesExceptUsers()
    {
        $this->info('Dropping all tables except users...');
        $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        // $tables = array_filter($tables, function ($table) {
        //     return $table !== 'users';
        // });

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($tables as $table) {
            Schema::drop($table);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->info('All tables except users have been dropped.');
    }

    protected function restoreUsersTable()
    {
        $this->info('Restoring users table...');
        if (Storage::exists('users_backup.json')) {
            $users = json_decode(Storage::get('users_backup.json'), true);
            DB::table('users')->insert($users);
            Storage::delete('users_backup.json');
            $this->info('Users table has been restored.');
        } else {
            $this->warn('No users backup found. Skipping restoration.');
        }
    }
}
