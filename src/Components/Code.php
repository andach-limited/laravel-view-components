<?php

namespace Andach\LaravelViewComponents\Components;

class Code extends BaseComponent
{
    protected array $arrayBuildClasses = ['border', 'ring', 'rounded', 'shadow'];

    protected array $arrayElementClasses = ['content', 'header'];

    public string $commandLineHtml = '';

    public function __construct(
        public array|bool $commandLine = [],
        public ?string $language = null,
        public ?bool $lineNumbers = true,
        public ?string $windowStyle = 'windows',
        public ?bool $border = null,
        public ?string $hollow = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
    ) {
        parent::__construct();

        if ($language) {
            $this->twMergeStrings['base'] .= ' language-' . $language;
        }

        if ($this->commandLine) {
            $this->twMergeStrings['content'] .= ' command-line';

            $vars = [
                'data-user',
                'data-host',
                'data-output',
                'data-prompt',
                'data-filter-output',
                'data-continuation-str',
                'data-continuation-prompt',
                'data-filter-continuation',
            ];

            if (is_array($this->commandLine)) {
                foreach ($this->commandLine as $key => $value) {
                    if (in_array($key, $vars)) {
                        $this->commandLineHtml .= $key . '=' . $value . ' ';
                    }
                }
            }

            $lineNumbers = false;
        }

        if ($lineNumbers) {
            $this->twMergeStrings['content'] .= ' line-numbers';
        } else {
            $this->twMergeStrings['content'] .= ' no-line-numbers';
        }

        if ('windows' === $this->windowStyle) {
            $this->twMergeStrings['header'] .= ' justify-end';
        }
    }

    public function render()
    {
        return view(config('view-components.views.code'));
    }
}
