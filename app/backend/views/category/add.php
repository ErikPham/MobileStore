<div class="row-fluid">
    <div class="span12">
        <?php
        echo isset($this->message) ? $this->message : '';
        ?>
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-user"></i>
                    Thêm mới chuyên mục
                </h3>
            </div>

            <div class="box-content nopadding">
                <form action="<?php echo URL . 'backend/category/saveAdd'; ?>" method="post" class="form-horizontal form-bordered">
                    <div class="control-group">
                        <label for="textfield" class="control-label">Tên chuyên mục</label>
                        <div class="controls">
                            <input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" placeholder="Nhập tên chuyên mục">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('name'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Mô tả</label>
                        <div class="controls">
                            <textarea id="textarea" class="input-block-level" rows="5" name="summary" placeholder="Nhập tóm tắt"></textarea>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('summary'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select">Vị trí</label>
                        <div class="controls">

                            <select class="input-large" id="select" name="position">
                                <option value="">Lựa chọn</option>
                                <?php for ($i = 1; $i < $this->position +1; $i++) { ?>
                                    <option value="<?php echo $i; ?>" <?php if (isset($_POST['position']) && $_POST['position'] == $i) echo "selected='selected'" ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('position'); ?>
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