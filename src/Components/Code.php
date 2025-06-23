<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class Code extends BaseComponent
{
    protected array $arrayBuildClasses = ['border', 'ring', 'rounded', 'shadow'];
    protected array $arrayElementClasses = ['content', 'header'];
    public string $commandLineHtml = '';

    public function __construct(
        public ?bool $border = null,
        public ?string $classes = null,
        public array|bool $commandLine = [],
        public ?string $hollow = null,
        public ?string $language = null,
        public ?bool $lineNumbers = true,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
        public ?string $windowStyle = 'windows',
        public ?string $contentClasses = null,
        public ?string $headerClasses = null,
    ) {
        parent::__construct();

        if ($language)
        {
            $this->classes .= ' language-' . $language;
        }

        if ($this->commandLine)
        {
            $this->contentClasses .= ' command-line';

            $vars = [
                'data-user',
                'data-host',
                'data-output',
                'data-prompt',
                'data-filter-output',
                'data-continuation-str',
                'data-continuation-prompt',
                'data-filter-continuation'
            ];

            if (is_array($this->commandLine))
            {
                foreach ($this->commandLine as $key => $value)
                {
                    if (in_array($key, $vars))
                    {
                        $this->commandLineHtml .= $key . '=' . $value . ' ';
                    }
                }
            }

            $lineNumbers = false;
        }

        if ($lineNumbers)
        {
            $this->contentClasses .= ' line-numbers';
        } else {
            $this->contentClasses .= ' no-line-numbers';
        }

        if ($this->windowStyle == 'windows') {
            $this->headerClasses .= ' justify-end';
        }
    }

    public function render()
    {
        return view(config('view-components.views.code'));
    }
}
