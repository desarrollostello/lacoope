<?php

namespace App\Observers;

use App\Models\popup;


class PopupObserver
{
    /**
     * Handle the popup "created" event.
     *
     * @param  \App\Models\popup  $popup
     * @return void
     */
    public function created(popup $popup)
    {
        //
    }

    public function creating(popup $popup)
    {
        
    }

    /**
     * Handle the popup "updated" event.
     *
     * @param  \App\Models\popup  $popup
     * @return void
     */
    public function updated(popup $popup)
    {
        //
    }

    /**
     * Handle the popup "deleted" event.
     *
     * @param  \App\Models\popup  $popup
     * @return void
     */
    public function deleted(popup $popup)
    {
        //
    }

    /**
     * Handle the popup "restored" event.
     *
     * @param  \App\Models\popup  $popup
     * @return void
     */
    public function restored(popup $popup)
    {
        //
    }

    /**
     * Handle the popup "force deleted" event.
     *
     * @param  \App\Models\popup  $popup
     * @return void
     */
    public function forceDeleted(popup $popup)
    {
        //
    }
}
