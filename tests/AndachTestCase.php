<?php

namespace Andach\LaravelViewComponents\Tests;

use Andach\LaravelViewComponents\LaravelViewComponentsServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Orchestra\Testbench\TestCase;
use RecursiveIteratorIterator;
use RecursiveRegexIterator;
use RegexIterator;
use RuntimeException;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class AndachTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set(require __DIR__ . '/../config/view-components.php');
        $this->registerAllBladeComponents();
        View::addNamespace('laravel-view-components', __DIR__ . '/../resources/views');
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelViewComponentsServiceProvider::class,
        ];
    }

    protected function registerAllBladeComponents(): void
    {
        $componentNamespace = 'Andach\\LaravelViewComponents\\Components';
        $componentPath      = realpath(__DIR__ . '/../src/Components');

        if (!$componentPath || !is_dir($componentPath)) {
            throw new RuntimeException("Component path not found: {$componentPath}");
        }

        $files = new RegexIterator(
            new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($componentPath, RecursiveDirectoryIterator::SKIP_DOTS)
            ),
            '/\.php$/i',
            RecursiveRegexIterator::GET_MATCH
        );

        foreach ($files as $file) {
            $filePath     = $file[0];
            $relativePath = str_replace($componentPath . DIRECTORY_SEPARATOR, '', $filePath);
            $className    = $componentNamespace . '\\' . str_replace(
                ['/', '\\', '.php'],
                ['\\', '\\', ''],
                $relativePath
            );

            if (class_exists($className) && is_subclass_of($className, \Illuminate\View\Component::class)) {
                $alias = \Illuminate\Support\Str::kebab(class_basename($className));
                Blade::component($alias, $className);
            }
        }
    }
}
