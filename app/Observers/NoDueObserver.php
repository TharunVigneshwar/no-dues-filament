<?php

namespace App\Observers;

use App\Models\FixFeesDetail;
use App\Models\NoDues;

class NoDueObserver
{
    /**
     * Handle the NoDues "created" event.
     */
    public function creating(NoDues $noDues): void
    {
        $data = FixFeesDetail::where('id', $noDues->fix_fees_detail_id)->value('fees');

        $noDues->balance_fees =  $data - $noDues->paying_fees;
    }

    /**
     * Handle the NoDues "updated" event.
     */
    public function updating(NoDues $noDues): void
    {
        $data = FixFeesDetail::where('id', $noDues->fix_fees_detail_id)->value('fees');

        $noDues->balance_fees =  $data - $noDues->paying_fees;
    }

    /**
     * Handle the NoDues "deleted" event.
     */
    public function deleted(NoDues $noDues): void
    {
        //
    }

    /**
     * Handle the NoDues "restored" event.
     */
    public function restored(NoDues $noDues): void
    {
        //
    }

    /**
     * Handle the NoDues "force deleted" event.
     */
    public function forceDeleted(NoDues $noDues): void
    {
        //
    }
}
