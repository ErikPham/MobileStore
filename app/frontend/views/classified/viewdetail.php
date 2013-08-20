<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div id="content">
                    <?php
                    echo isset($this->message) ? $this->message : "";
                    ?>
                    <div class="breadcrumb">
                        <?php
                            echo isset($this->breadcrums) ? $this->breadcrums : '';
                        ?>
                    </div>
                    <h1><?php echo $this->data['title']; ?></h1>

                    <div class="row-fluid">
                        <div class="span8">
                            <div class="titleAds clearfix">
                                <ul>
                                    <li>
                                        <i class="icon-time"></i>
                                        Đăng: <?php echo Date::getDatetime($this->data['post_date']); ?>
                                    </li>
                                    <li>
                                        <i class="icon-ok-circle"></i>
                                        Đã xem: <?php echo $this->data['views']; ?>
                                    </li>
                                </ul>
                            </div>

                            <div class="contentAds">
                                <p><?php echo $this->data['content']; ?></p>
                            </div>

                            <div class="relateAds">
                                <h5>Các tin cùng chuyên mục</h5>
                                <?php
                                if (!empty($this->relates)):
                                    ?>
                                    <ul>
                                        <?php
                                        foreach ($this->relates as $relate):
                                            ?>
                                            <li>
                                                <a href="<?php echo URL . 'classified/viewdetail/' . $relate['id'] . '/' .Util::toSlug($relate['title']); ?>"><?php echo $relate['title']; ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="detailInfoAds">
                                <div class="userWrapper">
                                    <ul>
                                        <li>Mã tin: <strong>#<?php echo $this->data['id']; ?></strong></li>
                                        <li>Người đăng: <strong><?php echo $this->data['name']; ?></strong></li>
                                        <li>Tel: <strong><?php echo $this->data['mobile']; ?></strong></li>
                                        <li>Email: <a href="mailto:<?php echo $this->data['email']; ?>"><?php echo $this->data['email']; ?></a></span></li>
                                        <li>Phạm vi rao: <strong><?php echo $this->data['label']; ?></strong></li>
                                        <li>Giá: <strong><?php echo Util::priceFormat($this->data['price']); ?> đ</strong></li>
                                    </ul>
                                </div>
                                <div class="safetyInfo">
                                    <ul>
                                        <li class="tit"><i class="icon-thumbs-up"></i> Hướng dẫn mua hàng an toàn</li>
                                        <li>Không trả tiền trước khi nhận hàng</li>
                                        <li>Kiểm tra hàng cẩn thận, đặc biệt với hàng đắt tiền</li>
                                        <li>Hẹn gặp ở nơi công cộng</li>
                                        <li>Nếu bạn mua hàng hiệu, hãy gặp mặt ở cửa hàng để nhờ xác minh, tránh mua phải hàng giả.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end .container-->
</section><!--end #columns-->