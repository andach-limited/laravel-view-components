<?php

namespace Andach\LaravelViewComponents\Components;

use App\Models\Notification;
use Closure;
use Illuminate\View\Component;

class HeaderNotificationItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Notification $notification)
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view('components.header-notification-item');
    }
}
