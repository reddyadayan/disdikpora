<?php

namespace App\Exports;

use App\Models\Datasd;
use Maatwebsite\Excel\Concerns\FromCollection;

class DatasdExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Datasd::all();
    }
}
