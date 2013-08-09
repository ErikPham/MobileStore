<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-table"></i>
                    Danh sách chuyên mục
                </h3>
            </div>
            <div class="box-content nopadding">
                <table class="table table-nomargin dataTable table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên chuyên mục</th>
                            <th class="hidden-350">Mô tả</th>
                            <th class="hidden-1024">Vị trí</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($this->category as $cate) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cate['name']; ?></td>
                                <td><?php echo $cate['summary']; ?></td>
                                <td><?php echo $cate['position']; ?></td>
                                <td>
                                    <a class="" href="<?php echo URL . 'backend/category/edit/' . $cate['id'] . '/' . Util::toSlug($cate['name']); ?>">Sửa</a>
                                    <a class="del" href="<?php echo URL . 'backend/category/delete/' . $cate['id'] . '/' . Util::toSlug($cate['name']); ?>">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end .span-->
</div><!--end .row-->