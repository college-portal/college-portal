<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeFilterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filter { name : The name of the Filter }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a filter class in app\\Filters';

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
        $name = $this->getFilterName();
        file_put_contents('./app/Filters/' . $name . 'Filters.php', $this->getFileContents($name));
    }

    private function getFilterName() {
        $name = $this->argument('name');

        if (!$name) {
            throw new \Exception('Invalid Filter Name');
        }

        return ucwords(preg_replace('/filter(s)?/i', '', $name));
    }

    private function getFileContents($name) {
        return preg_replace('/\n(    ){2}/i', "\n", "<?php

        namespace App\Filters;

        use App\User;
        use App\Models\\$name;
        use Illuminate\Http\Request;
        use Carbon\Carbon;

        class ${name}Filters extends BaseFilters
        {
            protected \$request;

            public function __construct(Request \$request)
            {
                \$this->request = \$request;
                parent::__construct(\$request);
            }
        }");
    }
}
