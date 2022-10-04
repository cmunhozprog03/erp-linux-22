<?php

namespace App\Observers;

use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryObserver
{
    /**
     * Handle the Subcategory "created" event.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return void
     */
    public function creating(Subcategory $subcategory)
    {
        $subcategory->url = Str::slug($subcategory->name);
    }

    /**
     * Handle the Subcategory "updated" event.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return void
     */
    public function updating(Subcategory $subcategory)
    {
        //
    }

    /**
     * Handle the Subcategory "deleted" event.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return void
     */
    public function deleted(Subcategory $subcategory)
    {
        //
    }

    /**
     * Handle the Subcategory "restored" event.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return void
     */
    public function restored(Subcategory $subcategory)
    {
        //
    }

    /**
     * Handle the Subcategory "force deleted" event.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return void
     */
    public function forceDeleted(Subcategory $subcategory)
    {
        //
    }
}
