<div class="row-fluid">
    <div class="span12">
        <?php
        echo isset($this->message) ? $this->message : '';
        ?>
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-user"></i>
                    Thay đổi thông tin cá nhân
                </h3>
            </div>

            <div class="box-content nopadding">
                <form action="<?php echo URL . 'backend/account/saveprofile' ?>" method="post" class="form-horizontal form-bordered">
                    <div class="control-group">
                        <label for="textfield" class="control-label">Họ tên</label>
                        <div class="controls">
                            <input type="text" name="fullname" value="<?php echo isset($this->user['fullname']) ? $this->user['fullname'] : ''; ?>">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('fullname'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Giới tính</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="sex" value="1" <?php echo (isset($this->user['sex']) && $this->user['sex'] == 1) ? "checked='checked'": ''; ?>> Nam
                            </label>
                            <label class="radio">
                                <input type="radio" name="sex" value="0" <?php echo (isset($this->user['sex']) && $this->user['sex'] == 0) ? "checked='checked'": ''; ?>> Nữ
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label for="textfield" class="control-label">Số điện thoại</label>
                        <div class="controls">
                            <input type="text" name="mobile" value="<?php echo isset($this->user['mobile']) ? $this->user['mobile'] : ''; ?>">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('mobile'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textarea">Địa chỉ</label>
                        <div class="controls">
                            <textarea class="input-block-level" name="address"><?php echo isset($this->user['address']) ? $this->user['address'] : ''; ?></textarea>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('address'); ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end .span-->
</div><!--end .row-->
