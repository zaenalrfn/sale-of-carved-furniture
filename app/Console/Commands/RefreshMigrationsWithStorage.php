<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshMigrationsWithStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:refresh-with-storage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh migrations and clean storage files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Cleaning up storage...');

        // Hapus semua file di direktori storage
        Storage::disk('public')->deleteDirectory('product_images');
        Storage::disk('public')->makeDirectory('product_images');
        Storage::disk('public')->deleteDirectory('thumbnails');
        Storage::disk('public')->makeDirectory('thumbnails');

        $this->info('Refreshing migrations...');

        // Jalankan migrate:refresh
        $this->call('migrate:refresh');

        $this->info('Migrations refreshed and storage cleaned successfully!');
    }
}
