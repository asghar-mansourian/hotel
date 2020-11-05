<?php


namespace App\Collections;


use Illuminate\Database\Eloquent\Collection;

class InvoiceCollection extends Collection
{
    public function filterViaStatus($keyStatus)
    {
        if (!$keyStatus)
            return $this;

        return $this->where('status', $keyStatus);
    }
}
