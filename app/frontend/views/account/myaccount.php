<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
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
                        <h1>Thông tin tài khoản</h1>
                        <p>Nếu quý khách muốn thay đổi thông tin cá nhân điền thông tin theo mẫu.</p>
                        <form enctype="multipart/form-data" method="post" action="#">
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
                                                <input type="radio" <?php if(isset($this->account['sex']) && $this->account['sex'] == 1) echo 'checked="checked"'; ?> value="1" name="sex"> Nam 
                                                <input type="radio" <?php if(isset($this->account['sex']) && $this->account['sex'] == 0) echo 'checked="checked"'; ?> value="0" name="sex"> Nữ
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
                                            <td><span class="required">*</span> Địa chỉ:</td>
                                            <td>
                                                <textarea name="address"><?php echo isset($this->account['address']) ? $this->account['address'] : ''; ?></textarea>
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('address'); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="buttons">
                                <div class="right">
                                    <input type="submit" class="button" value="Thay đổi">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>