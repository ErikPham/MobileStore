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
                            <input class="input-xxlarge" type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" placeholder="Nhập tên tiêu đề bài viết">
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('title'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Mô tả</label>
                        <div class="controls">
                            <textarea id="textarea" class="input-block-level" rows="5" name="description" placeholder="Nhập mô tả nội dung"></textarea>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('description'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textfield">Nội dung</label>
                        <div class="controls">
                            <textarea class="ckeditor" name="content"></textarea>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('content'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select">Chuyên mục</label>
                        <div class="controls">
                            <select class="input-large" id="select" name="category">
                                <option value="">Lựa chọn</option>
                                
                            </select>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('category'); ?>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="select">Trạng thái</label>
                        <div class="controls">
                            <select class="input-large" id="select" name="status">
                                <option value="">Lựa chọn</option>
                                
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