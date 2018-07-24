<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository { name : The name of the Repository to be created }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new repository in the app\Repositories folder';

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
        $name = $this->getRepositoryName();
        file_put_contents('./app/Repositories/' . $name . 'Repository.php', $this->getFileContents($name));
    }

    private function getRepositoryName() {
        $name = $this->argument('name');

        if (!$name) {
            throw new \Exception('Invalid Repository Name');
        }

        return ucwords(preg_replace('/repository/i', '', $name));
    }

    private function getFileContents($name) {
        return preg_replace('/\n(    ){2}/i', "\n", "<?php

        namespace App\Repositories;
        
        use App\User;
        use App\Models\\$name;
        use App\Filters\\${name}Filters;
        use Carbon\Carbon;
        
        class ${name}Repository
        {
            public function model()
            {
                return app(${name}::class);
            }

            public function list(User \$user, ${name}Filters \$filters) {
                return \$this->model()->filter(\$filters)->paginate();
            }
        
            public function single(\$id, ${name}Filters \$filters = null) {
                \$q = \$this->model();
                if (\$filters) {
                    \$q = \$q->filter(\$filters);
                }
                return \$filters ? \$filters->transform(\$q->findOrFail(\$id)) : \$q->findOrFail(\$id);;
            }
        
            public function delete(\$id) {
                return \$this->model()->where('id', \$id)->delete();
            }
        
            public function create(\$opts) {
                return \$this->model()->create(\$opts);
            }
        
            public function update(\$id, \$opts = []) {
                \$item = \$this->model()->findOrFail(\$id);
                \$item->fill(\$opts);
                \$item->save();
                return \$item;
            }
        
            public function count(${name}Filters \$filters)
            {
                return \$this->model()->filter(\$filters)->select('id', DB::raw('count(*) as total'))->count();
            }
        }");
    }
}
