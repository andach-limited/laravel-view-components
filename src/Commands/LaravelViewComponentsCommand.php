<?php

namespace Andach\LaravelViewComponents\Commands;

use Illuminate\Console\Command;

class LaravelViewComponentsCommand extends Command
{
    public $signature = 'laravel-view-components';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
