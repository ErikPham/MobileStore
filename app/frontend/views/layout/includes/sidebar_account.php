<aside class="span3">
    <div class="sidebar" id="column-left">
        <div class="box account">
            <h3 class="box-heading"><span class="tcolor">Tài khoản</span></h3>
            <div class="box-content">
                <ul>
                    <li><a href="<?php echo URL . 'account/myaccount/' . Util::toSlug('tai khoan ca nhan ' . Session::get('username')); ?>">Thông tin cá nhân</a></li>
                    <li><a href="<?php echo URL . 'account/changepassword/' . Util::toSlug('thay doi mat khau ca nhan ' . Session::get('username')); ?>">Đổi mật khẩu</a></li>
                    <li><a href="<?php echo URL . 'account/wishlist/' . Util::toSlug('san pham yeu thich ' . Session::get('username')); ?>">Sản phẩm yêu thích</a></li>
                    <li><a href="<?php echo URL . 'account/order/' . Util::toSlug('hoa don mua hang ' . Session::get('username')); ?>">Hóa đơn mua hàng</a></li>
                    <li><a href="<?php echo URL . 'account/newsletter/' . Util::toSlug('san pham yeu thich ' . Session::get('username')); ?>">Bản tin</a></li>
                    <li><a href="<?php echo URL . 'account/logout/' . Util::toSlug('dang xuat tai khoan ');?>">Thoát</a></li>
                </ul>
            </div>
        </div>
    </div>
</aside>
</div>
</div>
</section>