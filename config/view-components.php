<?php

// config for Andach/LaravelViewComponents
return [
    'enable_component_test' => false,

    'pagination' => [
        'simple'   => 'view-components::pagination.simple',
        'standard' => 'view-components::pagination.standard',
    ],

    'views' => [
        'alert'                    => 'view-components::general.alert',
        'attachments-and-comments' => 'view-components::general.attachments-and-comments',
        'avatar'                   => 'view-components::general.avatar',
        'button'                   => 'view-components::general.button',
        'card'                     => 'view-components::general.card',
        'chat'                     => 'view-components::general.chat',
        'code'                     => 'view-components::general.code',
        'form-attachment'          => 'view-components::general.form-attachment',
        'form-checkbox-icon'       => 'view-components::general.form-checkbox-icon',
        'form-section'             => 'view-components::general.form-section',
        'h'                        => 'view-components::general.h',
        'icon'                     => 'view-components::icon',
        'menu-group'               => 'view-components::general.menu-group',
        'no-results'               => 'view-components::general.no-results',
        'progress-bar'             => 'view-components::general.progress-bar',
        'service-button'           => 'view-components::general.service-button',
        'table'                    => 'view-components::general.table',
    ],

    'variants' => [

        'default' => [
            'background'          => 'bg-white dark:bg-slate-900',
            'text'                => 'text-slate-800 dark:text-slate-200',
            'border'              => 'border-slate-200 dark:border-slate-700',
            'shadow'              => 'shadow-slate-300/50 dark:shadow-slate-900/50',
            'ring'                => 'ring-slate-200 dark:ring-slate-700 ring-offset-slate-100 dark:ring-offset-slate-800',
            'hover'               => 'hover:bg-slate-300 hover:dark:bg-slate-900 hover:from-slate-400 hover:to-slate-700 hover:text-slate-800/70 hover:dark:text-slate-400/70',
            'focus'               => 'focus-within:outline focus-within:outline-slate-600 dark:focus-within:outline-slate-400 focus-within:outline-2',
            'active'              => 'bg-slate-300 dark:bg-slate-900 from-slate-400 to-slate-700',
            'gradient'            => 'bg-gradient-to-br from-slate-200 to-slate-100 text-slate-800',
            'divide'              => 'divide-slate-300 dark:divide-slate-700',
            'accent'              => 'accent-slate-600 hover:accent-slate-700',
            'highlightBorder'     => 'border-slate-700',
            'highlightDarkBorder' => 'dark:border-slate-100',
            'inactiveBorder'      => 'border-slate-100',
            'inactiveDarkBorder'  => 'dark:border-slate-700',
        ],

        'dark' => [
            'background'          => 'bg-slate-900',
            'text'                => 'text-slate-300',
            'border'              => 'border-slate-700',
            'shadow'              => 'shadow-slate-900/10',
            'ring'                => 'ring-slate-700 ring-offset-slate-800',
            'hover'               => 'hover:bg-slate-800 hover:from-slate-400 hover:to-slate-700',
            'focus'               => 'focus-within:outline focus-within:outline-slate-900 focus-within:outline-2',
            'active'              => 'bg-slate-800 from-slate-400 to-slate-700',
            'gradient'            => 'bg-gradient-to-br from-slate-700 to-slate-400 text-slate-100',
            'divide'              => 'divide-slate-800',
            'accent'              => 'accent-slate-600 hover:accent-slate-700',
            'highlightBorder'     => 'border-slate-700',
            'highlightDarkBorder' => 'dark:border-slate-100',
            'inactiveBorder'      => 'border-slate-100',
            'inactiveDarkBorder'  => 'dark:border-slate-700',
        ],

        'light' => [
            'background'          => 'bg-slate-50/80 dark:bg-slate-900',
            'text'                => 'text-slate-800 dark:text-slate-200',
            'border'              => 'border-slate-200 dark:border-slate-700',
            'shadow'              => 'shadow-slate-500/10 dark:shadow-slate-900/10',
            'ring'                => 'ring-slate-200 dark:ring-slate-700 ring-offset-slate-100 dark:ring-offset-slate-800',
            'hover'               => 'hover:bg-slate-300 hover:dark:bg-slate-800 hover:from-slate-400 hover:to-slate-700 hover:text-slate-800/70 hover:dark:text-slate-400/70',
            'focus'               => 'focus-within:outline focus-within:outline-slate-600 dark:focus-within:outline-slate-400 focus-within:outline-2',
            'active'              => 'bg-slate-300 dark:bg-slate-800 from-slate-400 to-slate-700',
            'gradient'            => 'bg-gradient-to-br from-slate-700 to-slate-400 text-slate-100',
            'divide'              => 'divide-slate-200 dark:divide-slate-700',
            'accent'              => 'accent-slate-600 hover:accent-slate-700',
            'highlightBorder'     => 'border-slate-700',
            'highlightDarkBorder' => 'dark:border-slate-100',
            'inactiveBorder'      => 'border-slate-100',
            'inactiveDarkBorder'  => 'dark:border-slate-700',
        ],

        'brand' => [
            'background'          => 'bg-brand-200 dark:bg-brand-800',
            'text'                => 'text-brand-800 dark:text-brand-200',
            'border'              => 'border-brand-300 dark:border-brand-900',
            'shadow'              => 'shadow-brand-300/50 dark:shadow-brand-900/50',
            'ring'                => 'ring-brand-200 dark:ring-brand-700 ring-offset-brand-100 dark:ring-offset-brand-800',
            'hover'               => 'hover:bg-brand-300 hover:dark:bg-brand-900 hover:from-brand-400 hover:to-brand-700 hover:text-brand-800/70 hover:dark:text-brand-400/70',
            'focus'               => 'focus-within:outline focus-within:outline-brand-600 dark:focus-within:outline-brand-400 focus-within:outline-2',
            'active'              => 'bg-brand-300 dark:bg-brand-900 from-brand-400 to-brand-700',
            'gradient'            => 'bg-gradient-to-br from-brand-700 to-brand-400 text-brand-100',
            'divide'              => 'divide-brand-300 dark:divide-brand-900',
            'accent'              => 'accent-brand-600 hover:accent-brand-700',
            'highlightBorder'     => 'border-brand-700',
            'highlightDarkBorder' => 'dark:border-brand-100',
            'inactiveBorder'      => 'border-brand-100',
            'inactiveDarkBorder'  => 'dark:border-brand-700',
        ],

        'primary' => [
            'background'          => 'bg-cyan-200 dark:bg-cyan-700',
            'text'                => 'text-cyan-800 dark:text-cyan-200',
            'border'              => 'border-cyan-300 dark:border-cyan-900',
            'shadow'              => 'shadow-cyan-300/50 dark:shadow-cyan-900/50',
            'ring'                => 'ring-cyan-200 dark:ring-cyan-700 ring-offset-cyan-100 dark:ring-offset-cyan-800',
            'hover'               => 'hover:bg-cyan-300 hover:dark:bg-cyan-900 hover:from-cyan-400 hover:to-cyan-700 hover:text-cyan-800/70 hover:dark:text-cyan-400/70',
            'focus'               => 'focus-within:outline focus-within:outline-cyan-600 dark:focus-within:outline-cyan-400 focus-within:outline-2',
            'active'              => 'bg-cyan-300 dark:bg-cyan-900 from-cyan-400 to-cyan-700',
            'gradient'            => 'bg-gradient-to-br from-cyan-700 to-cyan-400 text-cyan-100',
            'divide'              => 'divide-cyan-300 dark:divide-cyan-900',
            'accent'              => 'accent-cyan-600 hover:accent-cyan-700',
            'highlightBorder'     => 'border-cyan-700',
            'highlightDarkBorder' => 'dark:border-cyan-100',
            'inactiveBorder'      => 'border-cyan-100',
            'inactiveDarkBorder'  => 'dark:border-cyan-700',
        ],

        'secondary' => [
            'background'          => 'bg-slate-200 dark:bg-slate-700',
            'text'                => 'text-slate-800 dark:text-slate-200',
            'border'              => 'border-slate-300 dark:border-slate-900',
            'shadow'              => 'shadow-slate-300/50 dark:shadow-slate-900/50',
            'ring'                => 'ring-slate-200 dark:ring-slate-700 ring-offset-slate-100 dark:ring-offset-slate-800',
            'hover'               => 'hover:bg-slate-300 hover:dark:bg-slate-900 hover:from-slate-400 hover:to-slate-700 hover:text-slate-800/70 hover:dark:text-slate-400/70',
            'focus'               => 'focus-within:outline focus-within:outline-slate-600 dark:focus-within:outline-slate-400 focus-within:outline-2',
            'active'              => 'bg-slate-300 dark:bg-slate-900 from-slate-400 to-slate-700',
            'gradient'            => 'bg-gradient-to-br from-slate-700 to-slate-400 text-slate-100',
            'divide'              => 'divide-slate-300 dark:divide-slate-900',
            'accent'              => 'accent-slate-600 hover:accent-slate-700',
            'highlightBorder'     => 'border-slate-700',
            'highlightDarkBorder' => 'dark:border-slate-100',
            'inactiveBorder'      => 'border-slate-100',
            'inactiveDarkBorder'  => 'dark:border-slate-700',
        ],

        'success' => [
            'background'          => 'bg-emerald-200 dark:bg-emerald-700',
            'text'                => 'text-emerald-800 dark:text-emerald-200',
            'border'              => 'border-emerald-300 dark:border-emerald-900',
            'shadow'              => 'shadow-emerald-300/50 dark:shadow-emerald-900/50',
            'ring'                => 'ring-emerald-200 dark:ring-emerald-700 ring-offset-emerald-100 dark:ring-offset-emerald-800',
            'hover'               => 'hover:bg-emerald-300 hover:dark:bg-emerald-900 hover:from-emerald-400 hover:to-emerald-700 hover:text-emerald-800/70 hover:dark:text-emerald-400/70',
            'focus'               => 'focus-within:outline focus-within:outline-emerald-600 dark:focus-within:outline-emerald-400 focus-within:outline-2',
            'active'              => 'bg-emerald-300 dark:bg-emerald-900 from-emerald-400 to-emerald-700',
            'gradient'            => 'bg-gradient-to-br from-emerald-700 to-emerald-400 text-emerald-100',
            'divide'              => 'divide-emerald-300 dark:divide-emerald-900',
            'accent'              => 'accent-emerald-600 hover:accent-emerald-700',
            'highlightBorder'     => 'border-emerald-700',
            'highlightDarkBorder' => 'dark:border-emerald-100',
            'inactiveBorder'      => 'border-emerald-100',
            'inactiveDarkBorder'  => 'dark:border-emerald-700',
        ],

        'warning' => [
            'background'          => 'bg-orange-200 dark:bg-orange-700',
            'text'                => 'text-orange-800 dark:text-orange-200',
            'border'              => 'border-orange-300 dark:border-orange-900',
            'shadow'              => 'shadow-orange-300/50 dark:shadow-orange-900/50',
            'ring'                => 'ring-orange-200 dark:ring-orange-700 ring-offset-orange-100 dark:ring-offset-orange-800',
            'hover'               => 'hover:bg-orange-300 hover:dark:bg-orange-900 hover:from-orange-400 hover:to-orange-700 hover:text-orange-800/70 hover:dark:text-orange-400/70',
            'focus'               => 'focus-within:outline focus-within:outline-orange-600 dark:focus-within:outline-orange-400 focus-within:outline-2',
            'active'              => 'bg-orange-300 dark:bg-orange-900 from-orange-400 to-orange-700',
            'gradient'            => 'bg-gradient-to-br from-orange-700 to-orange-400 text-orange-100',
            'divide'              => 'divide-orange-300 dark:divide-orange-900',
            'accent'              => 'accent-orange-600 hover:accent-orange-700',
            'highlightBorder'     => 'border-orange-700',
            'highlightDarkBorder' => 'dark:border-orange-100',
            'inactiveBorder'      => 'border-orange-100',
            'inactiveDarkBorder'  => 'dark:border-orange-700',
        ],

        'danger' => [
            'background'          => 'bg-red-200 dark:bg-red-700',
            'text'                => 'text-red-800 dark:text-red-200',
            'border'              => 'border-red-300 dark:border-red-900',
            'shadow'              => 'shadow-red-300/50 dark:shadow-red-900/50',
            'ring'                => 'ring-red-200 dark:ring-red-700 ring-offset-red-100 dark:ring-offset-red-800',
            'hover'               => 'hover:bg-red-300 hover:dark:bg-red-900 hover:from-red-400 hover:to-red-700 hover:text-red-800/70 hover:dark:text-red-400/70',
            'focus'               => 'focus-within:outline focus-within:outline-red-600 dark:focus-within:outline-red-400 focus-within:outline-2',
            'active'              => 'bg-red-300 dark:bg-red-900 from-red-400 to-red-700',
            'gradient'            => 'bg-gradient-to-br from-red-700 to-red-400 text-red-100',
            'divide'              => 'divide-red-300 dark:divide-red-900',
            'accent'              => 'accent-red-600 hover:accent-red-700',
            'highlightBorder'     => 'border-red-700',
            'highlightDarkBorder' => 'dark:border-red-100',
            'inactiveBorder'      => 'border-red-100',
            'inactiveDarkBorder'  => 'dark:border-red-700',
        ],
    ],

    'components' => [

        'alert' => [
            'base'     => 'flex flex-wrap items-center mb-4',
            'elements' => [
                'content' => [
                    'base' => 'flex flex-col flex-1 gap-1',
                ],
                'title' => [
                    'base'  => 'font-bold',
                    'sizes' => [
                        'xs'   => 'text-base',
                        'sm'   => 'text-lg',
                        'base' => 'text-xl',
                        'lg'   => 'text-2xl',
                        'xl'   => 'text-3xl',
                    ],
                ],
                'dismiss-button' => [
                    'base'  => '',
                ],
                'dismiss-icon' => [
                    'base'  => 'fill-current text-inherit over:opacity-75 ease-in-out duration-300',
                    'sizes' => [
                        'xs'   => 'w-2',
                        'sm'   => 'w-3',
                        'base' => 'w-4',
                        'lg'   => 'w-5',
                        'xl'   => 'w-6',
                    ],
                ],
            ],
            'sizes' => [
                'xs'   => 'text-xs px-2 py-1 gap-3',
                'sm'   => 'text-sm px-3 py-2 gap-4',
                'base' => 'text-base px-4 py-3 gap-5',
                'lg'   => 'text-lg px-5 py-4 gap-6',
                'xl'   => 'text-xl px-6 py-5 gap-7',
            ],
            'attributes' => [
                'border'  => [true, 'border-2'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [true, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
            ],
        ],

        'avatar' => [
            'base'     => 'inline-flex',
            'elements' => [
                'label' => [
                    'base'  => 'flex w-full justify-center items-center',
                    'sizes' => [
                        'xs'   => 'text-base',
                        'sm'   => 'text-lg',
                        'base' => 'text-xl',
                        'lg'   => 'text-2xl',
                        'xl'   => 'text-3xl',
                    ],
                ],
            ],
            'sizes' => [
                'xs'   => 'h-10 w-10',
                'sm'   => 'h-12 w-12',
                'base' => 'h-16 w-16',
                'lg'   => 'h-20 w-20',
                'xl'   => 'h-24 w-24',
            ],
            'attributes' => [
                'accent'  => [false, 'border-l-8'],
                'border'  => [true, 'border-2'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [true, 'rounded-full'],
                'shadow'  => [false, 'shadow-md/50'],
            ],
        ],

        'card' => [
            'base'     => 'relative flex flex-col mb-4 rounded-lg',
            'elements' => [
                'header' => [
                    'base'  => 'mx-3 mb-0 border-b p-3 text-sm font-medium',
                    //                    'sizes' => [
                    //                        'xs'   => 'px-2 py-1',
                    //                        'sm'   => 'px-3 py-2',
                    //                        'base' => 'px-4 py-3',
                    //                        'lg'   => 'px-5 py-4',
                    //                        'xl'   => 'px-6 py-5',
                    //                    ],
                ],
                'body' => [
                    'base'  => 'mx-3 p-3',
                    //                    'sizes' => [
                    //                        'xs'   => 'px-2 py-1',
                    //                        'sm'   => 'px-3 py-2',
                    //                        'base' => 'px-4 py-3',
                    //                        'lg'   => 'px-5 py-4',
                    //                        'xl'   => 'px-6 py-5',
                    //                    ],
                ],
                'footer' => [
                    'base'  => 'border-t p-3 text-sm font-medium mx-3',
                    //                    'sizes' => [
                    //                        'xs'   => 'px-2 py-1',
                    //                        'sm'   => 'px-3 py-2',
                    //                        'base' => 'px-4 py-3',
                    //                        'lg'   => 'px-5 py-4',
                    //                        'xl'   => 'px-6 py-5',
                    //                    ],
                ],
            ],
            'sizes' => [
                'xs'   => 'text-xs',
                'sm'   => 'text-sm',
                'base' => 'text-base',
                'lg'   => 'text-lg',
                'xl'   => 'text-xl',
            ],
            'attributes' => [
                'border'  => [true, 'border-2'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [true, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
            ],
        ],

        'code' => [
            'base'     => 'w-full bg-gray-800 shadow-2xl rounded-lg overflow-hidden mb-4',
            'elements' => [
                'header' => [
                    'base'  => 'flex',
                    'sizes' => [
                        'xs'   => 'text-xs px-2 pt-1',
                        'sm'   => 'text-sm px-3 pt-2',
                        'base' => 'text-base px-4 pt-3',
                        'lg'   => 'text-lg px-5 pt-4',
                        'xl'   => 'text-xl px-6 pt-5',
                    ],
                ],
                'content' => [
                    'base'  => 'overflow-x-auto',
                    'sizes' => [
                        'xs'   => 'text-xs px-2 py-1',
                        'sm'   => 'text-sm px-3 py-2',
                        'base' => 'text-base px-4 py-3',
                        'lg'   => 'text-lg px-5 py-4',
                        'xl'   => 'text-xl px-6 py-5',
                    ],
                ],
            ],
            'attributes' => [
                'border'  => [true, 'border-2'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [true, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
            ],
        ],

        'h' => [
            'base'       => 'text-6xl font-bold pb-4',
            'attributes' => [
                'border'  => [false, 'border-2'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [false, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
            ],
            'options' => [
                'background' => false,
            ],
            // Set this to the five sizes under 'text-6xl' (or whatever you pick as the H1 size) above so they load in Tailwind.
            'include' => 'text-5xl text-4xl text-3xl text-2xl text-xl',
        ],

        'menu-group' => [
            'base'     => 'list-none p-4 mb-4',
            'elements' => [
                'first-li' => [
                    'base'  => 'rounded-sm mb-0.5 last:mb-0',
                    'sizes' => [
                        'xs'   => 'text-xs',
                        'sm'   => 'text-xs',
                        'base' => 'text-base',
                        'lg'   => 'text-lg',
                        'xl'   => 'text-xl',
                    ],
                ],
                'first-li-selected' => [
                    'base'  => 'rounded-sm mb-0.5 last:mb-0 brightness-80 font-bold',
                    'sizes' => [
                        'xs'   => 'text-xs',
                        'sm'   => 'text-xs',
                        'base' => 'text-base',
                        'lg'   => 'text-lg',
                        'xl'   => 'text-xl',
                    ],
                ],
                'parent' => [
                    'base'  => 'flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700',
                    'sizes' => [
                        'xs'   => 'text-xs',
                        'sm'   => 'text-xs',
                        'base' => 'text-base',
                        'lg'   => 'text-lg',
                        'xl'   => 'text-xl',
                    ],
                ],
                'icon' => [
                    'base'  => 'text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200',
                    'sizes' => [
                        'xs'   => 'text-2xs',
                        'sm'   => 'text-xs',
                        'base' => 'text-sm',
                        'lg'   => 'text-base',
                        'xl'   => 'text-lg',
                    ],
                ],
                'chevron-div' => [
                    'base' => 'flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200',
                ],
                'chevron-svg' => [
                    'base'  => 'w-3 h-3 transition-transform duration-200',
                    'sizes' => [
                        'xs'   => 'text-2xs',
                        'sm'   => 'text-xs',
                        'base' => 'text-sm',
                        'lg'   => 'text-base',
                        'xl'   => 'text-lg',
                    ],
                ],
                'submenu-div' => [
                    'base' => 'lg:hidden lg:sidebar-expanded:block 2xl:block pl-4',
                ],
                'second-li' => [
                    'base' => 'block p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700',
                ],
                'second-li-selected' => [
                    'base' => 'block p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700 brightness-80 font-bold',
                ],
            ],
            'sizes' => [
                'xs'   => 'text-xs',
                'sm'   => 'text-sm',
                'base' => 'text-base',
                'lg'   => 'text-lg',
                'xl'   => 'text-xl',
            ],
            'attributes' => [
                'border'  => [true, 'border-2'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [true, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
            ],
        ],

        'no-results' => [
            'base'     => 'container flex flex-wrap justify-between items-center mx-auto mb-4',
            'elements' => [
                'internal-div' => [
                    'base'  => 'text-center w-full p-10',
                    'sizes' => [
                        'xs'   => 'px-2 py-1',
                        'sm'   => 'px-3 py-2',
                        'base' => 'px-4 py-3',
                        'lg'   => 'px-5 py-4',
                        'xl'   => 'px-6 py-5',
                    ],
                ],
                'title' => [
                    'base'  => 'text-xl mb-2 font-bold',
                    'sizes' => [
                        'xs'   => 'text-base',
                        'sm'   => 'text-lg',
                        'base' => '',
                        'lg'   => 'text-2xl',
                        'xl'   => 'text-3xl',
                    ],
                ],
                'icon' => [
                    'base'  => 'text-xl mb-2 font-bold',
                    'sizes' => [
                        'xs'   => 'text-base',
                        'sm'   => 'text-lg',
                        'base' => '',
                        'lg'   => 'text-2xl',
                        'xl'   => 'text-3xl',
                    ],
                ],
            ],
            'sizes' => [
                'xs'   => 'text-xs px-2 py-1',
                'sm'   => 'text-sm px-3 py-2',
                'base' => 'text-base px-4 py-3',
                'lg'   => 'text-lg px-5 py-4',
                'xl'   => 'text-xl px-6 py-5',
            ],
            'attributes' => [
                'border'  => [false, 'border-2'],
                'ring'    => [true, 'ring-2 ring-offset-2'],
                'rounded' => [false, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
            ],
        ],

        'progress-bar' => [
            'base'     => 'flex items-center w-full text-center mb-4',
            'elements' => [
                'li-complete' => [
                    'base' => '',
                ],
                'li-incomplete' => [
                    'base' => '',
                ],
                'li' => [
                    'base' => 'flex-1 flex flex-col items-center border-b-8 border-solid',
                ],
                'li-not-last' => [
                    'base' => '',
                ],
                'icon' => [
                    'base' => 'flex items-center',
                ],
                'icon-span' => [
                    'base' => 'flex items-center justify-center w-24 h-24 rounded-full shrink-0',
                ],
                'content' => [
                    'base' => 'me-2',
                ],
            ],
            'sizes' => [
                'xs'   => 'text-xs',
                'sm'   => 'text-sm',
                'base' => 'text-base',
                'lg'   => 'text-lg',
                'xl'   => 'text-xl',
            ],
        ],

        'service-button' => [
            'base'     => 'flex items-center justify-start w-64 px-6 py-2 mb-2 hover:brightness-90 hover:font-bold filter hover:filter transition-all duration-200',
            'elements' => [
                'icon' => [
                    'base'  => 'text-base font-bold pr-3',
                    'sizes' => [
                        'xs'   => 'text-xs',
                        'sm'   => 'text-sm',
                        'base' => '',
                        'lg'   => 'text-lg',
                        'xl'   => 'text-xl',
                    ],
                ],
                'separator' => [
                    'base' => 'border-l h-6 w-1 block',
                ],
                'text' => [
                    'base' => 'pl-3',
                ],
            ],
            'sizes' => [
                'xs'   => 'text-xs px-2 py-1',
                'sm'   => 'text-sm px-3 py-2',
                'base' => 'text-base px-4 py-3',
                'lg'   => 'text-lg px-5 py-4',
                'xl'   => 'text-xl px-6 py-5',
            ],
            'attributes' => [
                'border'  => [true, 'border-2'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [false, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
            ],
            'options' => [
                'background' => false,
            ],
        ],

        'table' => [
            'base' => 'table-auto w-full
                [&>thead]:font-semibold [&>thead]:uppercase
                [&>tbody]:divide-y
                [&_th]:px-2 [&_th:first-child]:pl-5 [&_th:last-child]:pr-5 [&_th]:py-3 [&_th]:whitespace-nowrap
                [&_th>div]:font-semibold [&_th>div]:text-left
                [&_td]:px-2 [&_td:first-child]:pl-5 [&_td:last-child]:pr-5 [&_td]:py-1 [&_td]:whitespace-nowrap',
            'sizes' => [
                'xs'   => 'text-xs',
                'sm'   => 'text-sm',
                'base' => 'text-base',
                'lg'   => 'text-lg',
                'xl'   => 'text-xl',
            ],
            'attributes' => [
                'divide'  => [true, ''],
            ],
        ],
    ],
];
