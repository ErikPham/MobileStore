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
                        <h1>Chi tiết hóa đơn</h1>
                        <table class="list">
                            <thead>
                                <tr>
                                    <td colspan="2" class="left">Thông tin hóa đơn</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="left twoCol">
                                        <p><span>Mã hóa đơn: <?php echo $this->order['id']; ?></span></p>
                                        <p><span>Ngày mua: <?php echo Date::getDatetime($this->order['order_date']); ?></span></p>
                                    </td>
                                    <td class="left">
                                        <p><span>Phương thức vận chuyển: <?php Order::shipping($this->order['shipping_type']); ?></span></p>
                                        <p><span>Phương thức thanh toán: <?php echo $this->order['name']; ?></span></p>   
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="list">
                            <thead>
                                <tr>
                                    <td colspan="2" class="left">Thông khác</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="left top twoCol">
                                        <p><span>Trạng thái hóa đơn: </span> <?php echo Order::status($this->order['status']); ?></p>
                                        <?php if ($this->order['status'] == 1): ?>
                                            <p><span>Xác nhận: </span><a href="<?php echo URL . 'account/confirmorder/' . $this->order['id'] . '/' . Util::toSlug('xac nhan da thanh toan hoa don') ?>" class="text-red">Xác nhận đã thanh toán</a>
                                            <?php endif; ?>
                                    </td>
                                    <td class="left top">
                                        <p>Ghi chú vận chuyển</p>
                                        <p>
                                            <?php echo $this->order['note']; ?>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="list">
                            <thead class="hidden-phone">
                                <tr>
                                    <td class="center">STT</td>
                                    <td class="left">Hình ảnh</td>
                                    <td class="left">Tên</td>
                                    <td class="center">Số lượng</td>
                                    <td class="center">Đơn giá</td>
                                    <td class="center">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($this->items as $item):
                                    $i++;
                                    ?>
                                    <tr>
                                        <td class="center"><?php echo $i; ?></td>
                                        <td class="left">
                                            <img alt="<?php echo $item['name']; ?>" src="<?php echo Publics . $item['thumb']; ?>">
                                        </td>
                                        <td class="left">
                                            <?php echo $item['name']; ?>
                                        </td>
                                        <td class="center">
                                            <?php echo $item['quantity']; ?>
                                        </td>
                                        <td class="center"><?php echo Util::priceFormat($item['price']) . ' vnđ'; ?></td>
                                        <td class="center"><?php echo Util::priceFormat($item['price'] * $item['quantity']) . ' vnđ'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="5" class="right">Tổng trị giá đơn hàng</td>
                                    <td class="center text-red"><?php echo Util::priceFormat($this->total) . ' vnđ'; ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="buttons">
                            <div class="right"><a class="button" href="<?php echo URL . 'account/order/' . Util::toSlug('hoa don mua hang ' . Session::get('username')); ?>">Xem danh sách hóa đơn</a></div>
                        </div>
                        
                    </div>
                </div>
            </div>