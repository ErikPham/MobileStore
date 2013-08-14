<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <div id="content">
                    <div class="breadcrumb">
                        <a href="#">Home</a> &raquo;
                        <a href="#">Account</a> &raquo;
                        <a href="#">Register</a>
                    </div>
                    <div class="acontent">
                        <h1>Danh sách hóa đơn</h1>
                        <?php
                        if (!empty($this->order)):
                            $i = 0;
                            ?>
                            <table class="border">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã hóa đơn</th>
                                        <th>Số sản phẩm</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày mua</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    <?php
                                    foreach ($this->order as $order):
                                        $i++
                                        ?>
                                        <tr class="center">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $order['id'] ?></td>
                                            <td><?php echo $order['total_quantity'] ?></td>
                                            <td><?php echo $order['total_amout'] ?></td>
                                            <td><?php echo Date::getDate($order['order_date']) ?></td>
                                            <td><?php echo Order::status($order['status']); ?></td>
                                            <td>
                                                <a href="<?php echo URL . 'account/orderdeail/' . $order['id'] . '/' . Util::toSlug('xem chi tiet hoa don') ?>"><img src="<?php echo Publics . 'frontend/images/view.png' ?>" alt="Xem chi tiết hóa đơn" title="Xem chi tiết hóa đơn" /></a>
                                                <?php if ($order['status'] == 1): ?>
                                                    <a href="<?php echo URL . 'account/confirmorder/' . $order['id'] . '/' . Util::toSlug('xac nhan da thanh toan hoa don') ?>"><img src="<?php echo Publics . 'frontend/images/confirm.png' ?>" alt="Xác nhận đã thanh toán" title="Xác nhận đã thanh toán" /></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                    ?>
                                </thead>
                            </table>
                        <?php else: ?>  
                            Bạn chưa có hóa đơn nào
                        <?php endif; ?>
                    </div>
                </div>
            </div>