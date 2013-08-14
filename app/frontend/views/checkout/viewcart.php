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
                        <h1>Giỏ hàng</h1>
                    </div>
                    <div class="checkout">
                        <?php if (!empty($this->cart)) : ?>
                            <form enctype="multipart/form-data" method="post" action="#">
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
                                            <?php foreach ($this->cart as $id => $item): ?>
                                                <tr>
                                                    <td class="image">
                                                        <a href="#"><img alt="<?php echo $item['name']; ?>" src="<?php echo Publics . $item['thumb']; ?>"></a>
                                                    </td>
                                                    <td class="name">
                                                        <a href="#"><?php echo $item['name']; ?></a>
                                                    </td>
                                                    <td class="quantity">
                                                        <input type="text" size="1" value="<?php echo $item['quantity']; ?>" name="quantity[<?php echo $id; ?>]">
                                                        &nbsp;
                                                        <input type="image" title="Update" alt="Update" src="<?php echo Publics ?>frontend/images/update.png">
                                                        &nbsp;
                                                        <a href="#"><img title="Remove" alt="Remove" src="<?php echo Publics ?>frontend/images/remove.png"></a>
                                                        <?php if (isset($this->util->errors)) $this->util->alertErrorField($id, true); ?>
                                                    </td>
                                                    <td class="price"><?php echo Util::priceFormat($item['price']) . ' vnđ'; ?></td>
                                                    <td class="total"><?php echo Util::priceFormat($item['price'] * $item['quantity']) . ' vnđ'; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <div class="row-fluid">
                                <div class="span9">
                                    <div class="buttons clearfix">
                                        <div class="pull-right right"><a class="button" href="<?php echo URL . 'checkout/step1/' . Util::toSlug('thanh toan buoc 1') ?>">Thanh toán</a></div>
                                        <div class="center pull-left"><a class="button" href="<?php echo URL ?>">Tiếp tục mua hàng</a></div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="cart-total clearfix">
                                        <table id="total">
                                            <tbody>
                                                <tr>
                                                    <td class="right pull-right"><?php echo Util::priceFormat($this->total) . ' vnđ'; ?></td>
                                                    <td class="right pull-right"><b>Tổng tiền:</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="content">Giỏ hảng của bạn hiện đang trống!</div>
                            <div class="buttons">
                                <div class="right"><a class="button" href="<?php echo URL ?>">Quay lại mua hàng</a></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end .container-->
</section><!--end #columns-->