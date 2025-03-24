<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RentalExport;
use Illuminate\Support\Facades\Storage;

class ExportRentalExcelJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $rentals;

    public function __construct($rentals)
    {
        $this->rentals = $rentals;
    }

    public function handle(): void
    {
        $fileExport = 'rental_orders_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        Excel::store(new RentalExport($this->rentals), 'public/exports/' . $fileExport);
    }
}
