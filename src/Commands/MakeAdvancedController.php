<?php

namespace Vendor\Package\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeAdvancedController extends Command
{
    protected $signature = 'make:advanced-controller {name}';
    protected $description = 'Create a new controller with predefined methods';

    public function handle()
    {
        $name = $this->argument('name');
        $namespace = 'App\\Http\\Controllers';
        $stub = file_get_contents(__DIR__ . '/../stubs/controller.stub');
        
        $stub = str_replace(['{{ namespace }}', '{{ class }}'], [$namespace, $name], $stub);
        
        $path = app_path("Http/Controllers/{$name}.php");
        File::put($path, $stub);

        $this->info("Controller {$name} created successfully!");
    }
}
