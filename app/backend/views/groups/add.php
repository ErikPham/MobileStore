<div class="row-fluid">
    <div class="span12">
        <?php
        echo isset($this->message) ? $this->message : '';
        ?>
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-user"></i>
                    Thêm mới nhóm
                </h3>
            </div>

            <div class="box-content nopadding">
                <form action="<?php echo URL . 'backend/groups/saveAdd'; ?>" method="post" class="form-horizontal form-bordered">
                    <div class="control-group">
                        <label for="textfield" class="control-label">Tên nhóm</label>
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
                        <label class="control-label" for="select">Loại nhóm</label>
                        <div class="controls">

                            <select class="input-large" id="select" name="type">
                                <option value="">Lựa chọn</option>
                                <?php foreach ($this->type as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"<?php if (isset($_POST['type']) && $_POST['type'] == $key) echo "selected='selected'" ?>>
                                        <?php echo $value; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('type'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select">Trạng thái</label>
                        <div class="controls">
                            <select class="input-large" id="select" name="status">
                                <option value="">Lựa chọn</option>
                                 <?php
                                foreach ($this->status as $key => $value) {
                                    ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('status'); ?>
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