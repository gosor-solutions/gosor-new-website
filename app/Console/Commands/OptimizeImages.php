<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptimizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize images in public/images/gosor/';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = public_path('images/gosor');
        $this->info("Optimizing images in {$path}...");

        \Spatie\LaravelImageOptimizer\Facades\ImageOptimizer::optimize($path);

        $this->info('Image optimization complete.');
    }
}
