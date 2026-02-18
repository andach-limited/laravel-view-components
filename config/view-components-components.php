<?php

return [
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

        'breadcrumbs' => [
            'base'     => '-mt-px',
            'elements' => [
                'inner-div' => ['base' => 'sticky top-0 inset-x-0 z-20 px-4 sm:px-6 lg:px-8 lg:hidden'],
                'sub-div'   => ['base' => 'flex items-center py-2'],
                'button'    => [
                    'base'    => 'size-8 flex justify-center items-center gap-x-2 rounded-lg',
                    'inherit' => ['border'],
                ],
                'list'      => ['base' => 'ms-3 flex items-center whitespace-nowrap'],
                'item'      => ['base' => 'flex items-center text-sm'],
                'item-last' => ['base' => 'flex items-center text-sm font-bold'],
                'span'      => ['base' => 'mx-2'],

            ],
            'attributes' => [
                'border' => [true, 'border-y'],
            ],
        ],

        'button' => [
            'base'     => 'justify-center items-center text-center overflow-hidden mb-4',
            'elements' => [
                'content' => [
                    'base'  => 'grow',
                    'sizes' => [
                        'xs'   => 'px-2 py-1',
                        'sm'   => 'px-3 py-2',
                        'base' => 'px-4 py-3',
                        'lg'   => 'px-5 py-4',
                        'xl'   => 'px-6 py-5',
                    ],
                ],
                'prefix' => [
                    'base'  => '',
                    'sizes' => [
                        'xs'   => 'px-2 py-1',
                        'sm'   => 'px-3 py-2',
                        'base' => 'px-4 py-3',
                        'lg'   => 'px-5 py-4',
                        'xl'   => 'px-6 py-5',
                    ],
                ],
                'suffix' => [
                    'base'  => '',
                    'sizes' => [
                        'xs'   => 'px-2 py-1',
                        'sm'   => 'px-3 py-2',
                        'base' => 'px-4 py-3',
                        'lg'   => 'px-5 py-4',
                        'xl'   => 'px-6 py-5',
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
                'accent'   => [false, 'border-l-8'],
                'animate'  => [false, 'hover:shadow-none hover:scale-95 ease-in-out duration-300'],
                'border'   => [true, 'border-2'],
                'divide'   => [false, 'divide-x-2'],
                'full'     => [false, 'w-full'],
                'gradient' => [false, ''],
                'hover'    => [true, ''],
                'ring'     => [false, 'ring-2 ring-offset-2'],
                'rounded'  => [true, 'rounded'],
                'shadow'   => [false, 'shadow-md'],
            ],
        ],

        'card' => [
            'base'     => 'relative flex flex-col mb-4',
            'elements' => [
                'header' => [
                    'base'  => 'mx-3',
                    'sizes' => [
                        'xs'   => 'px-2 py-1 text-xs',
                        'sm'   => 'px-3 py-2 text-sm',
                        'base' => 'px-4 py-3 text-base',
                        'lg'   => 'px-5 py-4 text-lg',
                        'xl'   => 'px-6 py-5 text-xl',
                    ],
                ],
                'body' => [
                    'base'  => 'mx-3',
                    'sizes' => [
                        'xs'   => 'px-2 py-1 text-xs',
                        'sm'   => 'px-3 py-2 text-sm',
                        'base' => 'px-4 py-3 text-base',
                        'lg'   => 'px-5 py-4 text-lg',
                        'xl'   => 'px-6 py-5 text-xl',
                    ],
                ],
                'footer' => [
                    'base'  => 'mx-3',
                    'sizes' => [
                        'xs'   => 'px-2 py-1 text-xs',
                        'sm'   => 'px-3 py-2 text-sm',
                        'base' => 'px-4 py-3 text-base',
                        'lg'   => 'px-5 py-4 text-lg',
                        'xl'   => 'px-6 py-5 text-xl',
                    ],
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
                'divide'  => [true, 'divide-y'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [true, 'rounded-lg'],
                'shadow'  => [false, 'shadow-md'],
            ],
        ],

        'checkbox' => [
            'base'     => 'flex flex-col px-3',
            'elements' => [
                'label' => [
                    'base' => 'flex items-center',
                ],
                'input' => [
                    'base' => 'w-4 h-4',
                ],
            ],
            'attributes' => [
                'accent' => [true, ''],
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

        'content' => [
            'base'     => 'flex-1',
            'elements' => [
                'div' => ['base' => 'mx-auto max-w-7xl px-4 py-6'],
            ],
        ],

        'dark-toggle' => [
            'base'       => 'inline-flex h-9 items-center justify-center px-3 text-sm',
            'attributes' => [
                'border'  => [true, 'border-2'],
                'rounded' => [true, 'rounded'],
            ],
        ],

        'error' => [
            'base'     => 'font-inter antialiased min-h-screen flex items-center justify-center',
            'elements' => [
                'div'      => ['base' => 'flex flex-col items-center'],
                'number'   => ['base' => 'text-8xl font-bold'],
                'subtitle' => ['base' => 'font-bold text-3xl xl:text-5xl lg:text-4xl mt-10'],
                'content'  => ['base' => 'font-medium text-sm md:text-xl mt-8'],
                'back'     => ['base' => 'mt-8'],
                'logo'     => ['base' => 'mt-8'],
                'img'      => ['base' => 'w-24 h-24'],
            ],
        ],

        'faq' => [
            'base'     => '[&_svg]:open:rotate-0 mb-4',
            'elements' => [
                'answer' => [
                    'base'  => 'bg-white/80 dark:bg-slate-800',
                    'sizes' => [
                        'xs'   => 'px-2 py-1',
                        'sm'   => 'px-3 py-2',
                        'base' => 'px-4 py-3',
                        'lg'   => 'px-5 py-4',
                        'xl'   => 'px-6 py-5',
                    ],
                ],
                'expand-icon' => [
                    'base'  => 'fill-current text-inherit hover:opacity-75 rotate-45 ease-in-out duration-300',
                    'sizes' => [
                        'xs'   => 'w-2',
                        'sm'   => 'w-3',
                        'base' => 'w-4',
                        'lg'   => 'w-5',
                        'xl'   => 'w-6',
                    ],
                ],
                'question' => [
                    'base'  => 'list-none -webkit-details-marker:hidden flex justify-between items-center cursor-pointer',
                    'sizes' => [
                        'xs'   => 'px-2 py-1 gap-1',
                        'sm'   => 'px-3 py-2 gap-2',
                        'base' => 'px-4 py-3 gap-3',
                        'lg'   => 'px-5 py-4 gap-4',
                        'xl'   => 'px-6 py-5 gap-5',
                    ],
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
                'accent'  => [false, 'border-l-8'],
                'border'  => [true, 'border-2'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [true, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
            ],
        ],

        'footer' => [
            'base'     => '',
            'elements' => [
                'div' => ['base' => 'mx-auto flex max-w-7xl items-center px-4 h-16'],
            ],
            'attributes' => [
                'border' => [true, 'box-border border-t'],
            ],
        ],

        'form' => [],

        'form-error' => [
            'base' => 'text-xs italic',
            'text' => false,
        ],

        'h' => [
            'base'       => 'text-4xl font-bold pb-4',
            'attributes' => [
                'border'  => [false, 'border-2'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [false, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
            ],
            'options' => [
                'background' => false,
            ],
            // Set this to the five sizes under 'text-4xl' (or whatever you pick as the H1 size) above so they load in Tailwind.
            'include' => 'text-3xl text-2xl text-xl text-lg',
        ],

        'header' => [
            'base'     => 'top-0 z-30 backdrop-blur h-16 px-4',
            'elements' => [
                'div' => ['base' => 'mx-auto h-16 flex max-w-7xl items-center gap-3'],
            ],
            'attributes' => [
                'border'  => [true, 'border-b box-border'],
            ],
        ],

        'header-left' => [
            'base' => 'hidden min-w-0 flex-1 lg:block',
        ],

        'header-mobile' => [
            'base'     => 'flex items-center gap-2 lg:hidden',
            'elements' => [
                'button' => ['base' => 'inline-flex h-9 w-9 items-center justify-center lg:hidden'],
            ],
        ],

        'header-right' => [
            'base' => 'ml-auto flex items-center gap-2',
        ],

        'input' => [
            'base'     => 'mb-4',
            'elements' => [
                'input' => [
                    'base' => 'peer block w-full border-2 rounded appearance-none py-2 px-3 leading-tight focus:outline-none focus:shadow-outline',
                ],
                'label' => [
                    'base' => 'relative block px-3',
                ],
                'span' => [
                    'base' => 'block mb-2 px-3',
                ],
                'floating' => [
                    'base' => 'absolute duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0]
                        px-2 peer-focus:px-2 ml-2
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2
                        peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto left-3',
                    'forceInherit' => [
                        'pageBackground',
                    ],
                ],
            ],
            'conditional-elements' => [
                'input' => [
                    'type' => [
                        'color' => [
                            'base' => 'py-0',
                        ],
                    ],
                ],
            ],
            'attributes' => [
                'border'  => [false, 'border-2'],
                'hollow'  => [true, ''],
                'rounded' => [true, 'rounded'],
                'shadow'  => [false, 'shadow'],
            ],
        ],

        'layout' => [
            'base' => 'min-h-screen',
        ],

        'main' => [
            'base' => 'flex min-h-screen flex-col lg:pl-72',
        ],

        'menu' => [
            'base'     => '[--auto-close:lg] -translate-x-full transform w-68 h-full fixed inset-y-0 start-0 z-60 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0',
            'elements' => [
                'inner-div'        => ['base' => 'relative flex flex-col h-full max-h-full'],
                'logo-div'         => ['base' => 'px-6 pt-4 flex items-center'],
                'logo-a'           => ['base' => 'flex-none rounded-xl text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80'],
                'content-div'      => ['base' => 'h-full'],
                'content-nav'      => ['base' => 'pt-3 w-full flex justify-center'],
                'sidebar-div'      => ['base' => 'min-w-fit'],
                'sidebar-backdrop' => [
                    'base' => 'fixed inset-0 bg-opacity-30 z-40 lg:hidden lg:z-auto',
                ],
                'sidebar'        => ['base' => 'flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-[100dvh] overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 transition-all duration-200 ease-in-out'],
                'sidebar-header' => ['base' => 'lg:hidden flex justify-between mb-10 pr-3 sm:px-2'],
                'close-button'   => ['base' => 'lg:hidden'],
            ],
            'attributes' => [
                'border'  => [true, 'border-e'],
            ],
        ],

        'menu-group' => [
            'base'     => 'flex flex-col space-y-1',
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
                'parent' => [
                    'base'  => 'flex items-center gap-2 py-2 px-4 text-sm rounded-lg',
                    'sizes' => [
                        'xs'   => 'text-xs',
                        'sm'   => 'text-xs',
                        'base' => 'text-base',
                        'lg'   => 'text-lg',
                        'xl'   => 'text-xl',
                    ],
                    'attributes' => [
                        'hover' => [true, 'hover:brightness-90 hover:font-bold'],
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
                'icon-span' => [
                    'base' => 'w-4 flex justify-center',
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
                    'base' => 'pl-12',
                ],
                'second-li' => [
                    'base'       => 'block p-1 rounded',
                    'attributes' => [
                        'hover' => [true, 'hover:brightness-90 hover:font-bold'],
                    ],
                ],
                'a-selected' => [
                    'base' => 'brightness-80 font-extrabold',
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
                'border'  => [false, 'border-2'],
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

        'radio' => [
            'base'     => 'flex flex-col px-3',
            'elements' => [
                'label' => [
                    'base' => 'flex items-center',
                ],
                'input' => [
                    'base' => 'w-4 h-4',
                ],
            ],
            'attributes' => [
                'accent' => [true, ''],
            ],
        ],

        'search' => [
            'base'     => 'relative',
            'elements' => [
                'icon-div' => ['base' => 'absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5'],
                'icon'     => ['base' => 'shrink-0 size-4'],
                'input'    => ['base' => 'py-2 ps-10 pe-16 block w-full'],
            ],
            'attributes' => [
                'border'  => [true, 'border-2'],
                'rounded' => [true, 'rounded'],
            ],
        ],

        'select' => [
            'base'     => 'mb-4',
            'elements' => [
                'select' => [
                    'base'    => 'block w-full border-2 rounded appearance-none p-2 leading-tight focus:outline-none focus:shadow-outline',
                    'inherit' => [
                        'background',
                    ],
                ],
                'label' => [
                    'base' => 'relative block px-3',
                ],
                'span' => [
                    'base' => 'block mb-2 px-3',
                ],
                'floating' => [
                    'base' => 'absolute duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0]
                        px-2 peer-focus:px-2 ml-2
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2
                        peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto left-3',
                    'forceInherit' => [
                        'pageBackground',
                    ],
                ],
            ],
            'attributes' => [
                'border'  => [false, 'border-2'],
                'hollow'  => [true, ''],
                'rounded' => [true, 'rounded'],
                'shadow'  => [false, 'shadow'],
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

        'sessions' => [
            'base' => '',
        ],

        'sidebar' => [
            'base'       => 'fixed inset-y-0 left-0 z-50 flex w-72 transform flex-col lg:translate-x-0',
            'attributes' => [
                'border'  => [true, 'border-r'],
            ],
        ],

        'sidebar-footer' => [
            'base'       => 'flex items-center px-4',
            'attributes' => [
                'border'  => [true, 'box-border border-t'],
            ],
        ],

        'sidebar-menu' => [
            'base'       => 'flex-1 overflow-y-auto px-3 py-4',
            'attributes' => [
                'border'  => [true, 'border-r'],
            ],
        ],

        'sidebar-top' => [
            'base'       => 'flex h-16 items-center gap-3 px-4',
            'attributes' => [
                'border'  => [true, 'border-b box-border'],
            ],
        ],

        'submit' => [
            'base'     => 'mb-4 flex items-center justify-between',
            'elements' => [
                'button' => ['base' => 'font-bold py-2 px-4 focus:outline-none focus:shadow-outline'],
            ],
            'attributes' => [
                'accent'  => [false, 'border-l-8'],
                'animate' => [false, 'hover:shadow-none hover:scale-95 ease-in-out duration-300'],
                'border'  => [false, 'border-2'],
                'divide'  => [false, 'divide-x-2'],
                'full'    => [true, 'w-full'],
                'ring'    => [false, 'ring-2 ring-offset-2'],
                'rounded' => [true, 'rounded'],
                'shadow'  => [false, 'shadow-md'],
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

        'textarea' => [
            'base'     => 'mb-4',
            'elements' => [
                'input' => [
                    'base' => 'peer block w-full border-2 rounded appearance-none py-2 px-3 leading-tight focus:outline-none focus:shadow-outline',
                ],
                'label' => [
                    'base' => 'relative block px-3',
                ],
                'span' => [
                    'base' => 'block mb-2 px-3',
                ],
                'floating' => [
                    'base' => 'absolute duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0-0]
                        px-2 peer-focus:px-2 ml-2
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-6 peer-focus:top-2
                        peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto left-3',
                    'forceInherit' => [
                        'pageBackground',
                    ],
                ],
            ],
            'conditional-elements' => [
                'input' => [
                    'type' => [
                        'color' => [
                            'base' => 'py-0',
                        ],
                    ],
                ],
            ],
            'attributes' => [
                'border'  => [false, 'border-2'],
                'hollow'  => [true, ''],
                'rounded' => [true, 'rounded'],
                'shadow'  => [false, 'shadow'],
            ],
        ],
    ],
];
