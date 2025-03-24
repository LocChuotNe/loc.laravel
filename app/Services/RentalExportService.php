<?php

namespace App\Services;

use App\Repositories\RentalRepository;
use App\Jobs\ExportRentalExcelJob;

class RentalExportService
{
    protected $rentalRepo;

    public function __construct(RentalRepository $rentalRepo){
        $this->rentalRepo = $rentalRepo;
    }

    public function exportRentals($startDate, $endDate){
        $rentals = $this->rentalRepo->getRentalsForExport($startDate, $endDate);
        ExportRentalExcelJob::dispatch($rentals);

        return [
            'message' => 'Xuất dữ liệu ở chế độ nền',
            'status' => 'Đang xử lý'
        ];
    }
}
