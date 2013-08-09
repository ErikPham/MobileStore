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
                        <a href="#">Home</a> &raquo;
                        <a href="#">Account</a> &raquo;
                        <a href="#">Register</a>
                    </div>
                    <div class="account-register">
                        <h1>Đăng ký tài khoản</h1>
                        <p>Nếu bạn đã có tài khoản, xin vui lòng trang <a href="#"> đăng nhập</a>.</p>
                        <form enctype="multipart/form-data" method="post" action="#">
                            <h2>Thông tin tài khoản</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td><span class="required">*</span> Tên đăng nhập:</td>
                                            <td>
                                                <input type="text" name="username" value="<?php echo isset($this->account['username']) ? $this->account['username'] : ''; ?>">
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('username'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Mật khẩu:</td>
                                            <td>
                                                <input type="text" name="password" value=""/>
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('password'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Nhập lại mật khẩu:</td>
                                            <td>
                                                <input type="text" value="" name="confirm">
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('confirm'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Email:</td>
                                            <td>
                                                <input type="text"  name="email" value="<?php echo isset($this->account['email']) ? $this->account['email'] : ''; ?>">
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('email'); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h2>Thông tin cá nhân</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td><span class="required">*</span> Họ tên:</td>
                                            <td>
                                                <input type="text"  name="fullname" value="<?php echo isset($this->account['fullname']) ? $this->account['fullname'] : ''; ?>">
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('fullname'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Giới tính:</td>
                                            <td>
                                                <input type="radio" checked="checked"value="1" name="sex"> Nam 
                                                <input type="radio" value="0" name="sex"> Nữ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Số điện thoại:</td>
                                            <td>
                                                <input type="text"  name="mobile" value="<?php echo isset($this->account['mobile']) ? $this->account['mobile'] : ''; ?>">
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('mobile'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Địa chỉ:</td>
                                            <td>
                                                <textarea name="address"><?php echo isset($this->account['address']) ? $this->account['address'] : ''; ?></textarea>
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('address'); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h2>Bản tin</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td>Theo dõi:</td>
                                            <td>
                                                <input type="radio" value="1" name="subscribe"> Có  
                                                <input type="radio" checked="0" value="0" name="subscribe"> Không
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="buttons">
                                <div class="right">
                                    <input type="submit" class="button" value="Continue">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end .container-->
</section><!--end #columns-->