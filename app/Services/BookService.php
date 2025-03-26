<?php

namespace App\Service;

use App\Repositories\Interfaces\BookRepositoryInterface;
use App\Jobs\ProcessBookImport;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BookService {
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks()
    {
        return $this->bookRepository->getAll();
    }

    public function importBooks(UploadedFile $file)
    {
        $filePath = $file->store('imports'); // Lưu file vào storage

        // Gửi job xử lý queue
        // ProcessBookImport::dispatch($filePath);
        ProcessBookImport::dispatch($filePath)->onQueue('imports');
    }
}