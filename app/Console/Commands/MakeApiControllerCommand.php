<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeApiControllerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:controller:api 
                                { name : The name of the controller to be created }
                                { --filter : Whether or not the filter should be created }
                                { --repository : Whether or not the filter should be created }
                                { --service : Whether or not the service should be created }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a Controller class in app\Http\Controllers\Api folder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->getControllerName();
        $this->generateDependencies($name);
        file_put_contents('./app/Http/Controllers/Api/' . $name . 'Controller.php', $this->getFileContents($name));
    }

    private function getControllerName() {
        $name = $this->argument('name');

        if (!$name) {
            throw new \Exception('Invalid Controller Name');
        }

        return ucwords(preg_replace('/controller/i', '', $name));
    }

    private function getFileContents($name) {
        return preg_replace('/\n(    ){2}/i', "\n", "<?php

        namespace App\Http\Controllers\Api;
        
        use Illuminate\Http\Request;
        use App\Services\\${name}Service;
        use App\Filters\\${name}Filters;
        
        class ${name}Controller extends ApiController
        {
            protected \$service;
        
            public function __construct(${name}Service \$service) {
                \$this->service = \$service;
            }
        
            public function service() {
                return \$this->service;
            }
        }
        ");
    }

    private function generateDependencies($name) {
        $arg_name = $this->argument('name');
        if ($this->option('filter')) {
            Artisan::call('make:filter', [ 'name' => $arg_name ]);
            echo "\"${name}Filter\" created\n";
        }
        if ($this->option('repository')) {
            Artisan::call('make:repository', [ 'name' => $arg_name ]);
            echo "\"${name}Repository\" created\n";
        }
        if ($this->option('service')) {
            Artisan::call('make:service', [ 'name' => $arg_name ]);
            echo "\"${name}Service\" created\n";
        }
    }
}
