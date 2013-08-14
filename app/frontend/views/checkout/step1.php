<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div id="content">
                    <div class="breadcrumb">
                        <a href="#">Home</a> &raquo;
                        <a href="#">Account</a> &raquo;
                        <a href="#">Register</a>
                    </div>
                    <div class="pav-header">
                        <h1>Thanh toán đơn hàng</h1>
                    </div>
                    <div class="checkout">
                        <h3 class="text-center text-red"><?php echo $this->step; ?></h3>
                        <h5>1. Thông tin của quý khách</h5>
                        <div class="cart-info">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="long">Họ tên</td>
                                        <td class="text-bold"><?php echo $this->customer['fullname']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td class="text-bold"><?php echo $this->customer['email']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Điện thoại</td>
                                        <td class="text-red"><?php echo $this->customer['mobile']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td class="text-red"><?php echo $this->customer['address']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Thông tin cá nhân trên sẽ được chúng tôi dùng để liên hệ với quý khách trong thanh toán và chuyển hàng, nếu sai thông tin hoặc quý khách muốn cập nhật mới thông tin vui lòng</p>
                        </div>
                        <h5>2. Danh sách sản phẩm đặt mua</h5>
                        <div class="cart-info">
                            <table class="pav-shop-cart">
                                <thead class="hidden-phone">
                                    <tr>
                                        <td class="image">Hình ảnh</td>
                                        <td class="name">Tên</td>
                                        <td class="quantity">Số lượng</td>
                                        <td class="price">Đơn giá</td>
                                        <td class="total">Thành tiền</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->cart as $item): ?>
                                        <tr>
                                            <td class="image">
                                                <a href="#"><img alt="<?php echo $item['name']; ?>" src="<?php echo Publics . $item['thumb']; ?>"></a>
                                            </td>
                                            <td class="name">
                                                <a href="#"><?php echo $item['name']; ?></a>
                                            </td>
                                            <td class="quantity">
                                                <?php echo $item['quantity']; ?>
                                            </td>
                                            <td class="price"><?php echo Util::priceFormat($item['price']) . ' vnđ'; ?></td>
                                            <td class="total"><?php echo Util::priceFormat($item['price'] * $item['quantity']) . ' vnđ'; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="4" class="text-right text-bold">Tổng trị giá đơn hàng cần thanh toán</td>
                                        <td class="text-right text-red"><?php echo Util::priceFormat($this->total) . ' vnđ'; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Nếu quý khách có nhu cầu đặt thêm hàng hoặc bỏ bớt hàng, vui lòng</p>
                        </div>
                        
                        
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="buttons clearfix">
                                    <div class="pull-left"><a href="" class="button">&laquo; Quay lại giỏ hàng</a></div>
                                    <div class="pull-right"><a href="<?php echo URL .'checkout/step2/' . Util::toSlug('thanh toan buoc 2'); ?>" class="button">Bước 2: Thông tin thanh toán &raquo;</a></div>
                                </div>
                            </div>
                        </div><!--end .row-fluid-->
                    </div>
                </div>
            </div>
        </div>
    </div><!--end .container-->
</section><!--end #columns-->