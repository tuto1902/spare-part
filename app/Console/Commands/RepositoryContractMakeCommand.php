<?php namespace App\Console\Commands;


use Illuminate\Console\GeneratorCommand;

class RepositoryContractMakeCommand extends GeneratorCommand{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repository-contract';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repository contract class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Contract';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    public function getStub(){
        return __DIR__.'/stubs/repository-contract.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Contracts\Repositories';
    }
} 