<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Galaxy Tab S9 Series bất ngờ lộ diện qua tài liệu tiếp thị, có tới ba phiên bản',
                'image' => '/images/news/1.webp',
                'content' => 'Theo thông tin rò rỉ, các thiết bị mới sẽ được trang bị chip Snapdragon 8 Gen 2, đi cùng khả năng kháng nước chuẩn IP67. Bút S-Pen cho Galaxy Tab S9 cũng nhận nhiều chứng nhận khác nhau, bao gồm Bluetooth SIG,  FCC và REL của Canada.Không dừng lại ở đó, dòng Galaxy Tab S9 cũng có thể bao gồm máy tính bảng Galaxy Tab S9 FE sau khi ba thiết bị đề cập ở trên ra mắt. Đây có thể là phiên bản "Fan Edition" của Galaxy Tab S9 tương tự như các sản phẩm khác đến từ Samsung.Bạn mong đợi điều gì từ dòng Galaxy Tab S9 sắp tới? Nếu thích dùng máy tính bảng cao cấp của Samsung, bạn tham khảo thêm nhiều mẫu Galaxy Tab S giá tốt khác tại Thế Giới Di Động bằng cách click vào nút màu cam bên dưới.',
                'number_love' => 0,
                'view_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Flagship Samsung giảm đến 10 triệu, hỗ trợ trả góp 0% tất cả các máy',
                'image' => '/images/news/2.webp',
                'content' => 'Theo thông tin rò rỉ, các thiết bị mới sẽ được trang bị chip Snapdragon 8 Gen 2, đi cùng khả năng kháng nước chuẩn IP67. Bút S-Pen cho Galaxy Tab S9 cũng nhận nhiều chứng nhận khác nhau, bao gồm Bluetooth SIG,  FCC và REL của Canada.Không dừng lại ở đó, dòng Galaxy Tab S9 cũng có thể bao gồm máy tính bảng Galaxy Tab S9 FE sau khi ba thiết bị đề cập ở trên ra mắt. Đây có thể là phiên bản "Fan Edition" của Galaxy Tab S9 tương tự như các sản phẩm khác đến từ Samsung.Bạn mong đợi điều gì từ dòng Galaxy Tab S9 sắp tới? Nếu thích dùng máy tính bảng cao cấp của Samsung, bạn tham khảo thêm nhiều mẫu Galaxy Tab S giá tốt khác tại Thế Giới Di Động bằng cách click vào nút màu cam bên dưới.',
                'number_love' => 0,
                'view_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        News::insert($data);
    }
}
