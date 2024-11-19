@extends('layouts.main')

@section('content')
    <div class="page-title-area mb-2">
        <div class="container">
            <div class="content text-center">
                <h1 class="title-contact">Liên hệ</h1>
                <ul class="list-unstyled">
                    <li class="d-inline"><a href="index.html" class="text-white">Trang chủ</a></li>
                    <li class="d-inline text-white">/</li>
                    <li class="d-inline active text-white">Liên hệ</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title area -->

    <!-- Start Contact Area -->
    <div id="contact" class="contact-area contact-6 pt-120 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="item-single mb-30">
                        <div class="icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="text">
                            <p><a href="tel:+990123456789">+84 368191416</a></p>
                            <p><a href="tel:+990456123789">+84 387799985</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item-single mb-30">
                        <div class="icon">
                        </div>
                        <div class="text">
                            <p><a href="mailTo:info.windlaptring@gmail.com">info.windlaptring@gmail.com</a></p>
                            <p><a href="mailTo:windlaptrinh@gmail.com">windlaptrinh@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item-single mb-50">
                        <div class="icon">
                        </div>
                        <div class="text">
                            <p>Thành phố Hồ Chí Minh, Việt Nam</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <form id="contactForm" action={{route('customer.booking')}} method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-30">
                                    <input type="text" name="name" class="form-control" id="name" required
                                        data-error="Enter your name" placeholder="nhập tên của bạn..." />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-30">
                                    <input type="email" name="email" class="form-control" id="email" required
                                        data-error="Enter your email" placeholder="nhập email của bạn...*" />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-30">
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="8" required
                                        data-error="Please enter your message" placeholder="vui lòng nhập nội dung..."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn primary-btn primary-btn-5 btn-seend-meesgae"
                                    title="Send message">Xác nhận</button>
                                <div id="msgSubmit"></div>
                            </div>
                        </div>      
                    </form>
                </div>
                <div class="col-lg-6 mb-30">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501726.5407345099!2d106.36556175435443!3d10.754618130150035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1717926914293!5m2!1svi!2s"
                        width="600" height="310" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->
@endsection
