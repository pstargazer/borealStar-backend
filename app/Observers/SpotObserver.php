<?php

namespace App\Observers;

use App\Models\Spot;

class SpotObserver
{
    /**
     * Handle the Spot "created" event.
     */
    // TODO: get name and other data trough gecoder and store 
    public function created(Spot $spot): void
    {
    }

    /**
     * Handle the Spot "updated" event.
     */
    // TODO: get name and other data trough gecoder and store 
    public function updated(Spot $spot): void
    {
        //
    }

    /**
     * Handle the Spot "deleted" event.
     */
    public function deleted(Spot $spot): void
    {
        //
    }

    /**
     * Handle the Spot "restored" event.
     */
    public function restored(Spot $spot): void
    {
        //
    }

    /**
     * Handle the Spot "force deleted" event.
     */
    // TODO: purge excess names from localisation table
    public function forceDeleted(Spot $spot): void
    {
        //
    }
}
