<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div id="content">
                    <?php
                    echo isset($this->message) ? $this->message : '';
                    ?>
                    <div class="breadcrumb">
                        <?php
                            echo isset($this->breadcrums) ? $this->breadcrums : '';
                        ?>
                    </div>
                    <div class="pav-header">
                        <h1>Thanh toán thanh toán</h1>
                    </div>
                    <div class="checkout">
                        <h3 class="text-center text-red"><?php echo $this->step; ?></h3>
                        <h5>1. Phương thức vận chuyển</h5>
                        <form action="<?php echo URL . 'checkout/step2/thanh-toan-buoc-2.html'; ?>" method="post">
                            <table class="form content">
                                <tr>
                                    <td><input type="radio" name="shipping_model" value="1"/> Vận chuyển bởi LaptopStore.Com</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="shipping_model" value="2"/> Quy khách nhận hàng tại LaptopStore</td>
                                </tr>
                            </table>
                            <h5>2. Phương thức thanh toán</h5>
                            <table class="form content">
                                <?php
                                if (!empty($this->payments)):
                                    foreach ($this->payments as $payment):
                                        ?>
                                        <tr>
                                            <td><input type="radio" name="shipping_method" value="<?php echo $payment['id']; ?>"/> <?php echo $payment['name']; ?></td>
                                        </tr>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </table>
                            <h5>3. Ghi chú đơn hàng</h5>
                            <div class="content">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <textarea name="note" style="width: 100%"></textarea>
                                    </div>
                                    <div class="span6">
                                        <p>
                                            Quý khách có thể cung cấp thông tin hướng dẫn Pico xử lý đơn hàng bằng cách điền vào ô bên dưới:
                                        </p>
                                        <p class="text-bold">
                                            Ví dụ: 
                                        </p>
                                        <p>
                                            - Nếu quý khách muốn chúng tôi liên hệ trước khi chuyển hàng, quý khách có thể ghi: 
                                            <span class="darkblue">Gọi điện gặp Ms Thanh theo số 0912343432 trước khi chuyển hàng...</span>
                                        </p>
                                        <p>
                                            - Nếu quý khách muốn nhận hàng vào buổi chiều, quý khách có thể ghi: 
                                            <span class="darkblue">Vui lòng chuyển hàng tầm 4h-6h chiều và gọi điện trước...</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="buttons clearfix">
                                        <div class="pull-left"><a href="<?php echo URL . 'checkout/step1/' . Util::toSlug('thanh toan buoc 1'); ?>" class="button">&laquo; Quay lại bước trước</a></div>
                                        <div class="pull-right"><input type="submit" value="Bước 3: Gửi đơn hàng &raquo;" class="button"/></div>
                                    </div>
                                </div>
                            </div><!--end .row-fluid-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end .container-->
</section><!--end #columns-->