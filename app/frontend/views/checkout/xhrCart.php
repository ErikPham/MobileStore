<div class="heading">
    <span class="pav-icon"></span>
    <span class="pav-label">Giỏ hàng</span>
    <a><span id="cart-total"><?php echo $this->totalQuantity . ' sản phẩm - ' . Util::priceFormat($this->totalPrice) . ' vnđ'; ?></span></a>
</div>

<div class="content">
    <?php
    if (!empty($this->cart)):
        ?>
        <div class="mini-cart-info">
            <table>
                <tbody>
                    <?php
                    foreach ($this->cart as $id => $cart):
                        $amount = $cart['quantity'] * $cart['price'];
                        ?>
                        <tr>
                            <td class="image"> 
                                <a href="#">
                                    <img title="" alt="" src="">
                                </a>
                            </td>
                            <td class="name">
                                <a href="#"><?php echo $cart['name']; ?></a>
                                <div>
                                </div>
                            </td>
                            <td class="quantity">x&nbsp;<?php echo $cart['quantity']; ?></td>
                            <td class="total"><?php echo Util::priceFormat($amount); ?> vnđ</td>
                            <td class="remove">

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mini-cart-total">
            <table>
                <tbody>
                    <tr>
                        <td class="right"><b>Tổng tiền: <?php echo Util::priceFormat($this->totalPrice); ?> vnđ</b></td>
                        <td class="right"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="checkout">
            <a href="<?php echo URL . 'checkout/viewcart/gio-hang-cua-ban.html' ?>">Xem giỏ hàng</a>  <a href="<?php echo URL . 'checkout/step1/thanh-toan-buoc-1.html'; ?>">Thanh toán</a>
        </div>
    <?php else: ?>
        <div class="empty">Giỏ hàng của bạn đang trống</div>
    <?php endif; ?>
</div>