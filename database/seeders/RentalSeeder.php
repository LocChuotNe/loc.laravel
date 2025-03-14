<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rental;
use App\Models\Customer; // Thêm dòng này
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RentalSeeder extends Seeder
{
    public function run()
    {
         // Lấy danh sách khách hàng và sách từ database
         $customers = Customer::all();
         $books = Book::all();
 
         // Kiểm tra nếu chưa có dữ liệu
         if ($customers->isEmpty() || $books->isEmpty()) {
             $this->command->warn('Chưa có dữ liệu trong bảng customers hoặc books. Hãy chạy seeder cho chúng trước!');
             return;
         }
 
         // Tạo 10 bản ghi thử nghiệm
         $rentals = [];
         for ($i = 0; $i < 10; $i++) {
             $rentalDate = Carbon::now()->subDays(rand(5, 30));
             $returnDate = (rand(0, 1) == 1) ? $rentalDate->copy()->addDays(rand(5, 20)) : null;
            
            $status = 'pending'; // Mặc định là 'pending'
            if ($returnDate) {
                $status = 'returned'; // Nếu có ngày trả, đặt là 'returned'
            } elseif ($rentalDate->diffInDays(now()) > 20) {
                $status = 'overdue'; // Nếu quá hạn 20 ngày thì đặt là 'overdue'
            }

             $rentals[] = [
                 'customer_id'  => $customers->random()->id,
                 'book_id'      => $books->random()->id,
                 'rental_date'  => $rentalDate,
                 'return_date'  => $returnDate,
                 'status'       => $status,
                 'created_at'   => now(),
                 'updated_at'   => now(),
             ];
         }
 
         // Chèn dữ liệu vào database
         DB::table('rentals')->insert($rentals);
         
         $this->command->info('Seeder rentals đã chạy thành công!');
    }
}
