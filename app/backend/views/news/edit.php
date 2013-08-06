<div class="row-fluid">
    <div class="span12">
        <?php
        echo isset($this->message) ? $this->message : '';
        ?>
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-user"></i>
                    Sửa tin tức
                </h3>
            </div>

            <div class="box-content nopadding">
                <form action="<?php echo URL . 'backend/news/saveEdit'; ?>" method="post" class="form-horizontal form-bordered">
                    <div class="control-group">
                        <label for="textfield" class="control-label">Tiêu đề</label>
                        <div class="controls">
                            <input type="hidden" value="<?php echo $this->new['id'];?>" name="id"/>
                            <input class="input-xxlarge" type="text" name="title" value="<?php if (isset($this->new['title'])) echo $this->new['title']; ?>" placeholder="Nhập tên tiêu đề bài viết">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('title'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Mô tả</label>
                        <div class="controls">
                            <textarea id="textarea" class="input-block-level" rows="5" name="description" placeholder="Nhập mô tả nội dung"><?php echo $this->new['description']; ?></textarea>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('description'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textfield">Nội dung</label>
                        <div class="controls">
                            <textarea class="ckeditor" name="content"><?php echo $this->new['content']; ?></textarea>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('content'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select">Chuyên mục</label>
                        <div class="controls">
                            <select class="input-large" id="select" name="category_id">
                                <option value="">Lựa chọn</option>
                                <?php
                                foreach ($this->cats as $cate) {
                                    ?>
                                    <option value="<?php echo $cate['id']; ?>"
                                    <?php
                                    if (isset($this->new['category_id']) && $this->new['category_id'] == $cate['id'])
                                        echo "selected='selected'"
                                        ?>>
                                    <?php echo $cate['name']; ?></option>
                            <?php } ?>
                            </select>
<?php if (isset($this->util->errors)) $this->util->alertErrorField('category_id'); ?>
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
                                    if (isset($this->new['status']) && $this->new['status'] == $key)
                                        echo "selected='selected'"
                                        ?>        
                                            >
                                    <?php echo $value; ?></option>
                            <?php } ?>
                            </select>
<?php if (isset($this->util->errors)) $this->util->alertErrorField('status'); ?>
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