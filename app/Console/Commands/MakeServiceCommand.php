<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service { name : The name of the Service }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a service class in the App\Services folder';

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
        $name = $this->getServiceName();
        file_put_contents('./app/Services/' . $name . 'Service.php', $this->getFileContents($name));
    }

    private function getServiceName() {
        $name = $this->argument('name');

        if (!$name) {
            throw new \Exception('Invalid Service Name');
        }

        return ucwords(preg_replace('/service/i', '', $name));
    }

    private function getFileContents($name) {
        return preg_replace('/\n(    ){2}/i', "\n", "<?php

        namespace App\Services;
        
        use App\Repositories\\${name}Repository;
        use Carbon\Carbon;
        
        class ${name}Service
        {
            public function repo()
            {
                return app(${name}Repository::class);
            }
        }");
    }
}
