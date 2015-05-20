<?php namespace App\Console\Commands;


use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RepositoryClassMakeCommand extends GeneratorCommand{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repository-class';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository Class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    public function getStub(){
        return __DIR__.'/stubs/repository-class.stub';
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

        return $this->replaceNamespace($stub, $name)->replaceContract($stub, $contract)->replaceClass($stub, $name);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
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
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['contract', null, InputOption::VALUE_REQUIRED, 'The name of the contract', null],
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
} 