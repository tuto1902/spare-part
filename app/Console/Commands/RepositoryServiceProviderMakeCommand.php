<?php namespace App\Console\Commands;


use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RepositoryServiceProviderMakeCommand extends GeneratorCommand{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repository-service-provider';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repository Service Provider';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository Service Provider';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    public function getStub(){
        return __DIR__.'/stubs/repository-service-provider.stub';
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $contract = $this->getContractInput();

        $model = $this->getModelInput();

        $repository = $this->getRepositoryInput();

        return $this->replaceNamespace($stub, $name)->replaceContract($stub, $contract)->replaceModel($stub, $model)->replaceRepository($stub, $repository)->replaceClass($stub, $name);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Providers';
    }

    /**
     * Replace the contract for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceContract(&$stub, $name)
    {
        $stub = str_replace(
            '{{contract}}', $name, $stub
        );

        return $this;
    }

    /**
     * Replace the model for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceModel(&$stub, $name)
    {
        $stub = str_replace(
            '{{model}}', $name, $stub
        );

        return $this;
    }

    /**
     * Replace the repository for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceRepository(&$stub, $name)
    {
        $stub = str_replace(
            '{{repository}}', $name, $stub
        );

        return $this;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['contract', null, InputOption::VALUE_REQUIRED, 'The name of the contract', null],
            ['model', null, InputOption::VALUE_REQUIRED, 'The name of the model', null],
            ['repository', null, InputOption::VALUE_REQUIRED, 'The name of the repository', null],
        ];
    }

    /**
     * Get the desired contract from the input.
     *
     * @return string
     */
    protected function getContractInput()
    {
        return $this->option('contract');
    }

    /**
     * Get the desired model from the input.
     *
     * @return string
     */
    protected function getModelInput()
    {
        return $this->option('model');
    }

    /**
     * Get the desired repository from the input.
     *
     * @return string
     */
    protected function getRepositoryInput()
    {
        return $this->option('repository');
    }

} 