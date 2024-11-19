<!DOCTYPE html>
<html>

<head>
    <title>ISMART STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href={{ asset('css/bootstrap/bootstrap-theme.min.css') }} rel="stylesheet" type="text/css" />
    <link href={{ asset('css/bootstrap/bootstrap.min.css') }} rel="stylesheet" type="text/css" />
    <link href={{ asset('reset.css') }} rel="stylesheet" type="text/css" />
    <link href={{ asset('css/carousel/owl.carousel.css') }} rel="stylesheet" type="text/css" />
    <link href={{ asset('css/carousel/owl.theme.css') }} rel="stylesheet" type="text/css" />

    <link href={{ asset('css/font-awesome/css/font-awesome.css') }} rel="stylesheet" type="text/css" />
                <link href={{ asset('css/font-awesome/css/font-awesome.min.css') }} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/import/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/category_product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/detail_product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/detail_blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/import/contact.css') }}">
    <link href={{ asset('responsive.css') }} rel="stylesheet" type="text/css" />

    <script src={{ asset('js/jquery-2.2.4.min.js') }} type="text/javascript"></script>
    <script src={{ asset('js/elevatezoom-master/jquery.elevatezoom.js') }} type="text/javascript"></script>
    <script src={{ asset('js/bootstrap/bootstrap.min.js') }} type="text/javascript"></script>
    <script src={{ asset('js/carousel/owl.carousel.js') }} type="text/javascript"></script>
    <script src={{ asset('js/main.js') }} type="text/javascript"></script>
    <script src={{ asset('js/template/main.js') }} type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href={{url('/')}} title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href={{route('product.all')}} title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href={{route('post.all')}} title="">Blog</a>
                                </li>
                                <li>
                                    <a href={{url('/trang-chu/bai-viet/chi-tiet/cau-chuyen-nhung-nam-thang-cua-tuoi-tre-16.html')}} title="">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href={{route('customer.contact')}} title="">Đặt bàn</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href={{url('/')}} title="" id="logo" class="fl-left infomation-admin">
                            <img class="image-logo" src={{ asset('images/logo/wind-app.png') }} />
                            <p>Wind Lập Trình</p>
                        </a>
                        <div id="search-wp" class="fl-left">
                            <form method="POST" action="">
                                <input type="text" name="s" id="s"
                                    placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">{{ count($cartItems) }}</span>
                            </a>
                            @if (count($cartItems) > 0)
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">{{ count($cartItems) }}</span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span>{{ count($cartItems) }} sản phẩm</span> trong giỏ
                                            hàng
                                        </p>
                                        <ul class="list-cart">
                                            @foreach ($cartItems as $item)
                                                <li class="clearfix">
                                                    <a href="" title="" class="thumb fl-left">
                                                        <img src={{ asset($item['image']) }} alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="" title=""
                                                            class="product-name">{{ $item['name'] }}</a>
                                                        <p class="price">
                                                            {{ number_format($item['price'], 0, ',', '.') }}
                                                        </p>
                                                        <p class="qty">Số lượng:
                                                            <span>{{ $item['quantity'] }}</span>
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right">
                                                {{ number_format($totalPrice, 0, ',', '.') }}
                                                đ</p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href={{ route('cart.home') }} title="Giỏ hàng"
                                                class="view-cart fl-left">Giỏ hàng</a>
                                            <a href={{ route('cart.checkout') }} title="Thanh toán"
                                                class="checkout fl-right">Thanh
                                                toán</a>
                                        </dic>
                                    </div>
                                </div>
                            @else
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">{{ count($cartItems) }}</span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span>{{ count($cartItems) }} sản phẩm</span> trong giỏ
                                            hàng
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
            <div id="footer-wp">
                <div id="foot-body">
                    <div class="wp-inner clearfix">
                        <div class="block" id="info-company">
                            <h3 class="title">WIND LẬP TRÌNH</h3>
                            <p class="desc">
                                Wind thiết kế website chuẩn SEO theo google, tích hợp lên các công cụ tiềm kiếm
                                google free, chúng tôi thiết kế theo yêu cầu khách hàng, hỗ trợ 24/7. Đặc biệt
                                chúng tôi luôn cập nhập update công nghệ mới theo nhu cầu của khách hàng.
                            </p>
                            <div id="payment">
                                <div class="thumb">
                                    <img src={{ asset('images/img-foot.png') }} alt="">
                                </div>
                            </div>
                        </div>
                        <div class="block menu-ft" id="info-shop">
                            <h3 class="title">Thông tin cửa hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <p>Thành phố Hồ Chí Minh, Việt Nam</p>
                                </li>
                                <li>
                                    <p>0968.191.416</p>
                                </li>
                                <li>
                                    <p>info.windlaptrinh@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="block menu-ft policy" id="info-shop">
                            <h3 class="title">Chính sách mua hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <a href="" title="">Quy định - chính sách</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách bảo hành - đổi trả</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách hội viện</a>
                                </li>
                                <li>
                                    <a href="" title="">Giao hàng - lắp đặt</a>
                                </li>
                            </ul>
                        </div>
                        <div class="block" id="newfeed">
                            <h3 class="title">Bảng tin</h3>
                            <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                            <div id="form-reg">
                                <form method="POST" action="">
                                    <input type="email" name="email" id="email"
                                        placeholder="Nhập email tại đây">
                                    <button type="submit" id="sm-reg">Đăng ký</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="foot-bot">
                    <div class="wp-inner">
                        <p id="copyright">© Bản quyền thuộc về Wind Lập Trình | Website e-commerce</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-respon">
            <a href="?page=home" title="" class="logo">VSHOP</a>
            <div id="menu-respon-wp">
                <ul class="" id="main-menu-respon">
                    <li>
                        <a href="?page=home" title>Trang chủ</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Điện thoại</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Samsung</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?page=category_product" title="">Iphone X</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Iphone 8</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Nokia</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Máy tính bảng</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Laptop</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Đồ dùng sinh hoạt</a>
                    </li>
                    <li>
                        <a href="?page=blog" title>Blog</a>
                    </li>
                    <li>
                        <a href="#" title>Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="btn-top"><img src={{ asset('images/icon-to-top.png') }} alt="" /></div>
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
</body>

</html>
