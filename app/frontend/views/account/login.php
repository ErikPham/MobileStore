<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div id="content">
                    <?php
                        echo isset($this->message) ? $this->message : "";
                    ?>
                    <div class="breadcrumb">
                        <?php
                            echo isset($this->breadcrums) ? $this->breadcrums : '';
                        ?>
                    </div>
                    <div class="account-login">
                        <h1>Account Login</h1>
                        <div class="login-content">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="inner pav-col-1">
                                        <h2>Khách hàng mới</h2>
                                        <div class="content clearfix">
                                            <p class="pav-title"><b>Đăng ký tài khoản</b></p>
                                            <p class="pav-content">Khi tạo ra một tài khoản bạn sẽ có thể mua sắm nhanh hơn, được cập nhật về tình trạng một đơn đặt hàng, và theo dõi các đơn đặt hàng bạn đã thực hiện trước đó.</p>
                                            <a class="button" href="<?php echo URL .'account/register/dang-ky-tai-khoan.html' ?>">Tiếp tục</a></div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="inner pav-col-2">
                                        <h2>Khách hàng cũ</h2>
                                        <form enctype="multipart/form-data" method="post">
                                            <div class="content clearfix">
                                                <?php
                                                    $url = base64_decode(URI::getSegment(2));
                                                    $urlSplit = explode('=', $url);
                                                    $redirect = (isset($urlSplit[0]) && $urlSplit[0]=='url') ? $urlSplit[1] : 'index';
                                                ?>
                                                <b>Tài khoản:</b><br>
                                                <input type="text" value="" name="username">
                                                <input type="hidden" value="<?php echo $redirect; ?>" name="redirect" />
                                                <br>
                                                <br>
                                                <b>Mật khẩu:</b><br>
                                                <input type="password" value="" name="password">
                                                <br>
                                                <a href="<?php echo URL .'account/forgotten/lay-lai-mat-khau.html' ?>">Quên mật khẩu?</a><br>
                                                <br>
                                                <input type="submit" class="button" value="Đăng nhập">
                                            </div>
                                        </form>
                                    </div>
                                </div>	
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end .container-->
</section><!--end #columns-->