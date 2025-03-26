<?php

namespace App\Jobs;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BookImport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\BookService;
use App\Repositories\Interfaces\BookRepositoryInterface;
use App\Repositories\Eloquent\BookRepository;

class ProcessBookImport implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $filePath;
    protected $bookRepository;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     */
    public function handle(BookReposotiryINterface $bookRepository)
    {
        if (!file_exists($filePath)){
            Log::error("file không tồn tại: " .filePath);
            return;
        }
        try{
            // $filePath = storage_path('app/'. $this->filePath);
            Log::info("Processing import for file: " .$filePath);
            Excel::import(new BookImport($this->bookRepository), $filePath);
        } catch(\Exception $e) {
            Log::error("Error importing file: " . $e->getMessage());
        }
        // $bookRepository = new BookRepository();
        // Excel::import(new BookImport($bookRepository), storage_path('app/' . $this->filePath));
    }
}
