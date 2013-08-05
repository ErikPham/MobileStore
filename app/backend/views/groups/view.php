<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-table"></i>
                    Danh sách nhóm
                </h3>
            </div>
            <div class="box-content nopadding">
                <table class="table table-nomargin dataTable table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên nhóm</th>
                            <th class="hidden-350">Mô tả</th>
                            <th class="hidden-1024">phân loại</th>
                            <th class="hidden-480">Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($this->groups as $group) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $group['name']; ?></td>
                                <td><?php echo $group['summary']; ?></td>
                                <td>
                                    <?php echo ($group['type'] == 1) ? 'Admin' : 'Sản phẩm'; ?>
                                </td>
                                <td><?php echo ($group['status'] == 1) ? 'Đã duyệt' : 'Chưa duyệt'; ?></td>
                                <td>
                                    <a class="" href="<?php echo URL . 'backend/groups/edit/' . $group['id'] . '/' . Util::toSlug($group['name']); ?>">Sửa</a>
                                    <a class="del" href="<?php echo URL . 'backend/groups/delete/' . $group['id'] . '/' . Util::toSlug($group['name']); ?>">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end .span-->
</div><!--end .row-->