<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateDocsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:docs { email? : The user to access the API endpoints ... Defaults to ADMIN_EMAIL environment variable }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates API documentation';

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
        $email = $this->argument('email') ?? env('ADMIN_EMAIL');

        if (!$email) {
            $this->error('no email specified');
            return;
        }

        $password = $this->getPassword();
        echo "\n";

        try {
            $token = \JWTAuth::attempt([ 'email' => $email, 'password' => $password ]);

            if ($token) {
                $this->call('api:generate', [
                    '--routePrefix' => 'api/*',
                    '--header' => "Authorization: Bearer $token"
                ]);
            }
            else {
                $this->error('Invalid Credentials');
            }
        }
        catch (\Exception $ex) {
            $this->error($ex);
        }
    }

    private function getPassword($prompt = "Enter Password:") {
        echo $prompt;

        system('stty -echo');

        $password = trim(fgets(STDIN));

        system('stty echo');

        return $password;
    }
}
