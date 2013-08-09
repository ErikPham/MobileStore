<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-table"></i>
                    Danh sách tin tức
                </h3>
            </div>
            <div class="box-content nopadding">
                <table class="table table-nomargin dataTable table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Chuyên mục</th>
                            <th>Ngày đăng</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($this->news as $new) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $new['title']; ?></td>
                                <td><?php echo String::theExcerpt($new['description']); ?></td>
                                <td>
                                    <?php echo $new['name'];?>
                                </td>
                                <td><?php echo Date::getDatetime($new['post_date']);?></td>
                                <td>
                                    <?php echo ($new['status'] == 1) ? 'Đã duyệt' : 'Chưa duyệt'; ?>
                                </td>
                                <td>
                                    <a class="" href="<?php echo URL . 'backend/news/edit/' . $new['id'] . '/' . Util::toSlug($new['title']); ?>">Sửa</a>
                                    <a class="del" href="<?php echo URL . 'backend/news/delete/' . $new['id'] . '/' . Util::toSlug($new['title']); ?>">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end .span-->
</div><!--end .row-->