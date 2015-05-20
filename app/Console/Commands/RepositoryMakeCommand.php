<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RepositoryMakeCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'make:repository';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Creates a new set of repository classes, contracts and service providers.';

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
	public function fire()
	{
        $contract = $this->argument('name') . 'Interface';
        $repository = $this->argument('name') . 'Repository';
        $serviceProvider = $this->argument('name') . 'ServiceProvider';
        $model = $this->argument('name');

		$this->callSilent('make:repository-contract', ['name' => $contract]);
        $this->callSilent('make:repository-class', ['name' => $repository, '--contract' => $contract]);
        $this->callSilent('make:repository-service-provider', ['name' => $serviceProvider, '--contract' => $contract, '--repository' => $repository, '--model' => $model]);

        $this->info('Repository created successfully. To activate it, add the following line to the providers array inside config/app.php file:');
        $this->comment("'App\\Providers\\" . $serviceProvider . "',");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['name', InputArgument::REQUIRED, 'The name of the repository.'],
		];
	}

}
