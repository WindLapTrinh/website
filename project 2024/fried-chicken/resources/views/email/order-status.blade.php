<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Trạng Thái Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333 !important;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #252483;
            color: white;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
        .total-amount {
            text-align: right;
            color: red;
        }
        .note {
            color: red;
            font-weight: bold;
        }
        .address {
            margin-top: 20px;
        }
        p {
            color: black;
        }
        ol {
            color: black;
        }
        li {
            color: black;
        }
    </style>
</head>
<body>

    <p>Kính gửi: <strong>{{ $order->customer->fullname }}</strong>,</p>
    <p>Chúng tôi xin thông báo về tình trạng đơn hàng của bạn với các thông tin sau:</p>

    <table>
        
        <tr>
            <th>Mã Đơn Hàng</th>
            <td>#WIND{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Số Điện Thoại</th>
            <td>{{ $order->customer->phone_number }}</td>
        </tr>
        <tr>
            <th>Địa Chỉ</th>
            <td>{{ $order->customer->address }}</td>
        </tr>
    </table>

    <h3>Thông Tin Sản Phẩm</h3>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá (VNĐ)</th>
                <th>Thành Tiền (VNĐ)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ number_format($product->price * $product->pivot->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="total">Tổng Cộng:</td>
                <td class="total-amount">{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</td>
            </tr>
        </tbody>
    </table>
    
    <p><strong>Bằng chữ:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} Việt Nam Đồng</p>

    <p class="note">LƯU Ý:</p>
    <ul>
        <li>Quý khách vui lòng kiểm tra và hoàn tất thanh toán nếu đơn hàng chưa thanh toán.</li>
        <li>Mọi thắc mắc vui lòng liên hệ theo thông tin hỗ trợ bên dưới.</li>
    </ul>

    <p class="note">CÁC HÌNH THỨC THANH TOÁN</p>
    <ol>
        <li>Thanh toán trực tiếp hoặc chuyển khoản qua ngân hàng:
            <ul>
                <li>Ngân hàng Quân Đội (MB Bank):<br>
                    - Số tài khoản: 0368191416<br>
                    - Mở tại ngân hàng: MB Bank - Chi nhánh quận 3 (Hồ Chí Minh)<br>
                    - Chủ tài khoản: Nguyễn Thanh Phong
                </li>
                <li>Ngân hàng Thương mại Cổ phần Tiên Phong (TP Bank):<br>
                    - Số tài khoản: 0368191416<br>
                    - Mở tại ngân hàng: TP Bank - Chi nhánh quận Gò Vấp (Hồ Chí Minh)<br>
                    - Chủ tài khoản: Nguyễn Thanh Phong
                </li>
            </ul>
        </li>
    </ol>

    <p>Sau khi chuyển khoản, vui lòng gửi thông tin xác nhận thanh toán đến email: <a href="mailto:info.windlaptrinh@gmail.com">info.windlaptrinh@gmail.com</a> hoặc liên hệ số: 0368191416.</p>

    <p>Mọi thông tin cần hỗ trợ vui lòng liên hệ hotline: 0368191416 hoặc phản hồi qua email: <a href="mailto:info.windlaptrinh@gmail.com">info.windlaptrinh@gmail.com</a>.</p>

    <p>Trân trọng!</p>

</body>
</html>
