<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
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
                'title' => 'Về chúng tôi',
                'content' => '<p>Chào mừng bạn đến với BigDeal - nơi tận hưởng mua sắm trực tuyến đa dạng và tiện lợi cho các sản phẩm điện tử.</p>

                <p>BigDeal là một website bán hàng trực tuyến chuyên về các thiết bị điện tử hàng đầu trên thị trường. Chúng tôi cung cấp một loạt các sản phẩm điện tử như điện thoại di động, máy tính, máy ảnh, TV và nhiều hơn nữa. Với mục tiêu mang lại sự hài lòng tuyệt đối cho khách hàng, chúng tôi cam kết đem đến những sản phẩm chất lượng, dịch vụ tuyệt vời và trải nghiệm mua sắm tuyệt vời.</p>

                <p>Tại BigDeal, chúng tôi hiểu rằng việc mua sắm trực tuyến có thể đôi khi gặp khó khăn và lo ngại. Vì vậy, chúng tôi cam kết cung cấp một giao diện dễ sử dụng, thông tin chi tiết về sản phẩm, đánh giá khách hàng và dịch vụ hỗ trợ chuyên nghiệp. Chúng tôi luôn đặt khách hàng lên hàng đầu và tạo điều kiện thuận lợi nhất cho việc mua sắm trực tuyến.</p>

                <p>Với đội ngũ nhân viên giàu kinh nghiệm và đam mê về công nghệ, chúng tôi tự hào là những chuyên gia trong việc tư vấn và cung cấp thông tin chi tiết về các sản phẩm điện tử. Chúng tôi luôn cập nhật các xu hướng mới nhất, công nghệ tiên tiến và đảm bảo rằng bạn sẽ tìm thấy những sản phẩm tốt nhất phù hợp với nhu cầu của mình.</p>

                <p>BigDeal xem khách hàng là trung tâm của mọi hoạt động. Chúng tôi cam kết đáp ứng mọi yêu cầu và mong muốn của khách hàng. Chúng tôi cung cấp chính sách bảo hành dài hạn, chính sách đổi trả linh hoạt và hỗ trợ khách hàng 24/7. Chúng tôi tin rằng sự hài lòng của khách hàng là thành công của chúng tôi.</p>

                <p>Cảm ơn bạn đã tin tưởng và lựa chọn BigDeal là địa chỉ mua sắm điện tử trực tuyến hàng đầu. Hãy cùng khám phá và trải nghiệm những sản phẩm tuyệt vời tại BigDeal!</p>',
                'slug' => 'about-us',
            ],
            [
                'title' => 'Chính sách hoàn trả',
                'content' => '<p>Chính sách hoàn trả của chúng tôi được thiết kế để đảm bảo quyền lợi của khách hàng khi mua sắm tại BigDeal. Chúng tôi cam kết đem lại sự hài lòng tuyệt đối cho khách hàng.</p>

                <h3>1. Quy định chung</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut justo finibus, tincidunt risus id, consectetur leo. Maecenas fringilla enim id volutpat consequat. Donec gravida augue nec mi dapibus, at placerat risus tincidunt. In et rutrum felis, id lacinia massa. Sed venenatis tellus in elit rhoncus pharetra. Vivamus nec tincidunt mauris.</p>

                <h3>2. Điều kiện hoàn trả</h3>
                <p>Phương thức và điều kiện hoàn trả sản phẩm tại BigDeal như sau:</p>
                <ul>
                    <li>Sản phẩm phải còn nguyên vẹn, không bị hư hỏng, không có dấu hiệu sử dụng.</li>
                    <li>Khách hàng cần xuất trình hóa đơn hoặc phiếu mua hàng để chứng minh mua hàng tại BigDeal.</li>
                    <li>Thời gian hoàn trả sản phẩm không quá 30 ngày kể từ ngày mua hàng.</li>
                </ul>

                <h3>3. Quá trình hoàn trả</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut justo finibus, tincidunt risus id, consectetur leo. Maecenas fringilla enim id volutpat consequat. Donec gravida augue nec mi dapibus, at placerat risus tincidunt. In et rutrum felis, id lacinia massa. Sed venenatis tellus in elit rhoncus pharetra. Vivamus nec tincidunt mauris.</p>

                <p>Mọi thắc mắc và yêu cầu hoàn trả sản phẩm, xin vui lòng liên hệ với chúng tôi qua thông tin liên hệ có sẵn trên website.</p>',
                'slug' => 'return-policy',
            ],
            [
                'title' => 'Chính sách giao hàng',
                'content' => '<p>Chính sách hoàn trả của chúng tôi được thiết kế để đảm bảo quyền lợi của khách hàng khi mua sắm tại BigDeal. Chúng tôi cam kết đem lại sự hài lòng tuyệt đối cho khách hàng.</p>

                <h3>1. Quy định chung</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut justo finibus, tincidunt risus id, consectetur leo. Maecenas fringilla enim id volutpat consequat. Donec gravida augue nec mi dapibus, at placerat risus tincidunt. In et rutrum felis, id lacinia massa. Sed venenatis tellus in elit rhoncus pharetra. Vivamus nec tincidunt mauris.</p>

                <h3>2. Điều kiện hoàn trả</h3>
                <p>Phương thức và điều kiện hoàn trả sản phẩm tại BigDeal như sau:</p>
                <ul>
                    <li>Sản phẩm phải còn nguyên vẹn, không bị hư hỏng, không có dấu hiệu sử dụng.</li>
                    <li>Khách hàng cần xuất trình hóa đơn hoặc phiếu mua hàng để chứng minh mua hàng tại BigDeal.</li>
                    <li>Thời gian hoàn trả sản phẩm không quá 30 ngày kể từ ngày mua hàng.</li>
                </ul>

                <h3>3. Quá trình hoàn trả</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut justo finibus, tincidunt risus id, consectetur leo. Maecenas fringilla enim id volutpat consequat. Donec gravida augue nec mi dapibus, at placerat risus tincidunt. In et rutrum felis, id lacinia massa. Sed venenatis tellus in elit rhoncus pharetra. Vivamus nec tincidunt mauris.</p>

                <p>Mọi thắc mắc và yêu cầu hoàn trả sản phẩm, xin vui lòng liên hệ với chúng tôi qua thông tin liên hệ có sẵn trên website.</p>',
                'slug' => 'delivery-policy',
            ],
        ];

        Page::insert($data);
    }
}
