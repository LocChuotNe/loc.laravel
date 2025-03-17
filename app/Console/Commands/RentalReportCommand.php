<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Rental;

class RentalReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rental:report {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Thống kê đơn thuê theo ngày';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $date = $this->argument('date') ?? Carbon::today()->toDateString();

        $rentals = Rental::whereDate('rental_date', $date)->get();
        dd($rentals);

        $this->info("Thống kê đơn thuê ngày: $date");
        foreach ($rentals as $rental) {
            $this->line("ID: {$rental->id} - User: {$rental->user->name} - Status: {$rental->status}");
        }
    }
}
