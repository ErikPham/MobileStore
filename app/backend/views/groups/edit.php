<div class="row-fluid">
    <div class="span12">
        <?php
        echo isset($this->message) ? $this->message : '';
        ?>
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-user"></i>
                    Sửa nhóm
                </h3>
            </div>

            <div class="box-content nopadding">
                <form action="<?php echo URL . 'backend/groups/saveEdit' ?>" method="post" class="form-horizontal form-bordered">
                    <div class="control-group">
                        <label for="textfield" class="control-label">Tên nhóm</label>
                        <div class="controls">
                            <input type="hidden" name="id" value="<?php echo $this->group['id']; ?>"/>
                            <input type="text" name="name" value="<?php if (isset($this->group['name'])) echo $this->group['name']; ?>" placeholder="Nhập tên chuyên mục">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('name'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Mô tả</label>
                        <div class="controls">
                            <textarea id="textarea" class="input-block-level" rows="5" name="summary" placeholder="Nhập tóm tắt"><?php echo $this->group['summary'] ?></textarea>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('summary'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select">Phân loại</label>
                        <div class="controls">
                            <select class="input-large" id="select" name="type">
                                <option value="">Lựa chọn</option>
                                <?php foreach ($this->type as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"
                                            <?php if (isset($this->group['type']) && $this->group['type'] == $key) echo "selected='selected'" ?>>
                                                <?php echo $value; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('position'); ?>
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
                                    <option value="<?php echo $key; ?>"
                                    <?php
                                    if (isset($this->group['status']) && $this->group['status'] == $key)
                                        echo "selected='selected'"
                                        ?>        
                                            >
                                        <?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('type'); ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end .span-->
</div><!--end .row-->