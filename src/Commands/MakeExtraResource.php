<?php

namespace Manajet\ExtraResource\Commands;

use Illuminate\Foundation\Console\ResourceMakeCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class MakeExtraResource extends ResourceMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:extraresource {name} {--collection}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new extra resource';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->collection()
                    ? __DIR__.'/../Stubs/extra-collection.stub'
                    : __DIR__.'/../Stubs/extra-resource.stub';
    }
}
