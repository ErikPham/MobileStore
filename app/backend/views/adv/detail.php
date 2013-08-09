<div class="row-fluid">
    <?php
        echo isset($this->message) ? $this->message : '';
    ?>
    <div class="span8">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-reorder"></i>
                    Chi tiết tin rạo vặt
                </h3>
                <div class="actions">
                    <a class="btn btn-mini content-refresh" href="#"><i class="icon-refresh"></i></a>
                    <a class="btn btn-mini content-remove" href="#"><i class="icon-remove"></i></a>
                    <a class="btn btn-mini content-slideUp" href="#"><i class="icon-angle-down"></i></a>
                </div>
            </div>
            <div class="box-content nopadding" style="display: block;">
                <table class="table table-nomargin table-bordered">
                    <tr>
                        <td>Tiêu đề</td>
                        <td><?php echo $this->adv['title']; ?></td>
                    </tr>
                    <tr>
                        <td>Giá</td>
                        <td><?php echo number_format($this->adv['price']); ?></td>
                    </tr>
                    <tr>
                        <td>Loại tin</td>
                        <td><?php echo ($this->adv['delegate_type'] == 1) ? 'Cần bán' : 'Cần mua'; ?></td>
                    </tr>
                    <tr>
                        <td>Đối tượng</td>
                        <td><?php echo ($this->adv['post_type'] == 1) ? 'Công ty' : 'Cá nhân'; ?></td>
                    </tr>
                    <tr>
                        <td>Ngày đăng</td>
                        <td><?php echo $this->adv['post_date']; ?></td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td><?php echo ($this->adv['status'] == 0) ? 'Chưa xét duyệt' : 'Đã duyệt'; ?></td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td><?php echo $this->adv['content']; ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <button class="btn btn-small btn-inverse" onclick="window.history.back();"><i class="icon-circle-arrow-left white"></i> Quay lại</button>
                            <a class="del btn btn-primary" href="<?php echo URL . 'backend/adv/delete/' . $this->adv['id'] . '/' . Util::toSlug($this->adv['title']); ?>"><i class="icon-trash"></i> Xóa</a>
                            <?php if ($this->adv['status'] == 0) { ?>
                                <a class="btn btn-success update" href="<?php echo URL . 'backend/adv/updateStatus/' . $this->adv['id'] . '/' . Util::toSlug($this->adv['title']); ?>"><i class="icon-check"></i> Xác nhận</a>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="span4">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-reorder"></i>
                    Ảnh liên quan
                </h3>
            </div>
            <div class="box-content" style="display: block;">
                <div class="grids">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="thumbnail">
                                <img alt="" src="http://www.placehold.it/80">
                            </div>

                            <div class="thumbnail">
                                <img alt="" src="http://www.placehold.it/80">
                            </div>
                            <div class="thumbnail">
                                <img alt="" src="http://www.placehold.it/80">
                            </div>

                            <div class="thumbnail">
                                <img alt="" src="http://www.placehold.it/80">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>