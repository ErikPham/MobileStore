<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-table"></i>
                    Danh sách tin rạo vặt
                </h3>
            </div>
            <div class="box-content nopadding">
                <table class="table table-nomargin dataTable table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Loại tin</th>
                            <th>Đối tượng</th>
                            <th>Ngày đăng</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($this->advs as $adv) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $adv['title']; ?></td>
                                <td><?php echo String::theExcerpt($adv['content']); ?></td>
                                <td><?php echo number_format($adv['price']); ?></td>
                                <td><?php echo ($adv['delegate_type'] == 1) ? 'Cần bán' : 'Cần mua'; ?></td>
                                <td><?php echo ($adv['post_type'] == 1) ? 'Công ty' : 'Cá nhân'; ?></td>
                                <td><?php echo $adv['post_date']; ?></td>
                                <td><?php echo ($adv['status'] == 0) ? 'Chưa xét duyệt' : 'Đã duyệt'; ?></td>
                                <td>
                                    <a class="btn btn-success" title="Xem chi tiết" href="<?php echo URL . 'backend/adv/detail/' . $adv['id'] . '/' . Util::toSlug($adv['title']); ?>"><i class="icon-eye-open"></i></a>
                                    <a class="del btn btn-primary" title="Xóa" href="<?php echo URL . 'backend/adv/delete/' . $adv['id'] . '/' . Util::toSlug($adv['title']); ?>"> <i class="icon-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end .span-->
</div><!--end .row-->