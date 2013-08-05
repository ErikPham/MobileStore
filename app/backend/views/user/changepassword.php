<div class="row-fluid">
    <div class="span12">
        <?php
        echo isset($this->message) ? $this->message : '';
        ?>
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-user"></i>
                    Đổi mật khẩu
                </h3>
            </div>

            <div class="box-content nopadding">
                <form action="<?php echo URL . 'backend/user/savepassword' ?>" method="post" class="form-horizontal form-bordered">
                    <div class="control-group">
                        <label for="textfield" class="control-label">Mật khẩu cũ</label>
                        <div class="controls">
                            <input type="password" name="old" value="">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('old'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Mật khẩu mới</label>
                        <div class="controls">
                            <input type="password" name="new" value="">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('new'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Nhập lại mật khẩu</label>
                        <div class="controls">
                            <input type="password" name="confirm" value="">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('confirm'); ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Đồi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end .span-->
</div><!--end .row-->