<?php
    
    namespace App\Console\Commands\Log;
    
    use Illuminate\Support\Facades\Artisan;
    
    
    Artisan::command('logs:clear', function () {
        
        foreach (glob(storage_path('logs/*.log')) as $file) {
            file_put_contents($file, '');
        }
        
        foreach (glob(base_path('*.log')) as $file) {
            file_put_contents($file, '');
        }
        
        $this->comment('Logs have been cleared!');
        
    })->describe('Clear log files');
    
