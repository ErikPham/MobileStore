<div class="row-fluid">
    <div class="span12">
        <?php
        echo isset($this->message) ? $this->message : '';
        ?>
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-user"></i>
                    Thêm mới moduler
                </h3>
            </div>

            <div class="box-content nopadding">
                <form action="<?php echo URL . 'backend/permissions/saveAcl'; ?>" method="post" class="form-horizontal form-bordered">
                    <div class="control-group">
                        <label for="textfield" class="control-label">Module</label>
                        <div class="controls">
                            <input type="text" name="module" value="<?php if (isset($_POST['module'])) echo $_POST['module']; ?>" placeholder="Vui lòng nhập modul">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('module'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Quyền</label>
                        <div class="controls">

                            <input type="text" name="action" value="<?php if (isset($_POST['action'])) echo $_POST['action']; ?>" placeholder="Vui lòng nhập quyền"/>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('action'); ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end .span-->
</div><!--end .row-->