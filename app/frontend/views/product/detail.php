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
                        <a href="#">Home</a> &raquo;
                        <a href="#">Account</a> &raquo;
                        <a href="#">Register</a>
                    </div>
                    <div class="productInfo">
                        <h1><?php echo $this->detail['name']; ?></h1>
                        <div class="product-top">
                            <div class="row-fluid">
                                <div class="span5">
                                    <div id="productgallery">
                                        <div class="main-gallery">
                                            <div class="fixcenter">
                                                <img alt="" src="<?php if (isset($this->mainImage)) echo Publics . $this->mainImage; ?>">
                                            </div>
                                        </div>
                                        <div class="thumb-gallery">
                                            <div class="jcarousel-skin-tango" id="mycarousel">
                                                <ul>
                                                    <?php
                                                    if (!empty($this->images)):
                                                        foreach ($this->images as $image):
                                                            ?>
                                                            <li><img src="<?php echo Publics . $image['source']; ?>" alt="" /></li>
                                                            <?php
                                                        endforeach;
                                                    endif;
                                                    ?>   
                                                </ul>
                                            </div>
                                            <script type="text/javascript" src="<?php echo Publics ?>frontend/js/jquery/jquery.jcarousel.min.js"></script>
                                            <script type="text/javascript" src="<?php echo Publics ?>frontend/js/jquery/jcarousel.js"></script>
                                        </div>
                                    </div>
                                </div>
                                <div class="span7">
                                    <div class="product-box-info">
                                        <div class="share">
                                            <!-- AddThis Button BEGIN -->
                                            <div class="addthis_toolbox addthis_default_style ">
                                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                                <a class="addthis_button_tweet"></a>
                                                <a class="addthis_button_pinterest_pinit"></a>
                                                <a class="addthis_counter addthis_pill_style"></a>
                                            </div>
                                            <script type="text/javascript">var addthis_config = {"data_track_addressbar": true};</script>
                                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52108b8f544f33f1"></script>
                                            <!-- AddThis Button END -->
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span8">
                                                <h6 class="product-status"><?php echo ($this->detail['quantity'] > 0) ? "Còn hàng" : "Hết hàng"; ?></h6>
                                                <h6 class="product-price"><?php echo Util::priceFormat($this->detail['price']); ?> đ</h6>
                                                <div class="pav-add-to-cart clearfix">
                                                    <span>Số lượng </span>
                                                    <input type="text" <?php echo ($this->detail['quantity'] > 0) ? 'value="1"' : 'value="0" readonly'; ?> size="2" name="quantity" class="quantity">
                                                    <input type="hidden" value="<?php echo $this->detail['id']; ?>" size="2" name="product_id">
                                                    <input type="button" class="button" id="button-cart" value="Thêm vào giỏ">
                                                </div>
                                                <div class="product-order-support">
                                                    <ul>
                                                        <li>Nhận hàng trong <strong>12 giờ </strong> tại <strong>Hà Nội</strong></li>
                                                        <li>Xem hàng tại nhà -> hài lòng thanh toán</li>
                                                        <li>Được đổi trả trong vòng 7 ngày với chính sách đặc biệt thuận lợi</li>
                                                        <li>Bảo hành chính hãng 12 tháng</li>
                                                    </ul>
                                                </div>
                                                <div class="pav-compare-wish">
                                                    <div class="links clearfix">
                                                        <a class="wishlist" onclick="addToWishList('49');">
                                                            <span class="icon"></span>
                                                            <span class="text">Lưu yêu thích</span>
                                                        </a>
                                                        <a class="compare" onclick="addToCompare('49');">
                                                            <span class="icon"></span>					
                                                            <span class="text">So sách</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="span4">
                                                <div class="support">
                                                    <img src="http://pico.vn/Images/backgrounds/bg_online.jpg" alt="Support"/>
                                                    <ul class="listSupport">
                                                        <li>
                                                            <strong>Hỗ trợ qua chat</strong>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <img src="http://pico.vn//Images/skype_logo_online.png" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="http://opi.yahoo.com/online?u=picosale5&m=g&t=1&l=us" />
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <strong>Hotline</strong>
                                                        </li>
                                                        <li>
                                                            <span class="text-red">0985315508</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="spec-title">
                            <h4>Thông số kỹ thuật</h4>
                        </div>
                        <section id="technical" class="spec-detail-wrapper clearfix">
                            <div class="span6 shortcode-onehalf">
                                <img src="<?php echo Publics . $this->images[4]['source']; ?>"/>
                            </div>
                            <div class="span6">
                                <table class="tableTechnical">
                                    <tbody>
                                        <tr>
                                            <td>Màn hình:</td>
                                            <td>WVGA, 4.0", 480 x 800 pixels</td>
                                        </tr>
                                        <tr>
                                            <td>CPU:</td>
                                            <td>Solo-core 1 GHz, RAM: 768 MB</td>
                                        </tr>
                                        <tr>
                                            <td>Hệ điều hành:</td>
                                            <td>Android 4.0.3 (ICS)</td>
                                        </tr>
                                        <tr>
                                            <td>Camera chính:</td>
                                            <td>5.0 MP, Quay phim VGA@30fps</td>
                                        </tr>
                                        <tr>
                                            <td>Camera phụ:</td>
                                            <td>VGA (0.3 Mpx)</td>
                                        </tr>
                                        <tr>
                                            <td>Bộ nhớ trong:</td>
                                            <td>4 GB</td>
                                        </tr>
                                        <tr>
                                            <td>Thẻ nhớ ngoài đến:</td>
                                            <td>32 GB</td>
                                        </tr>
                                        <tr>
                                            <td>Dung lượng pin:</td>
                                            <td>1500 mAh</td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2" class="expand-button-wrapper"><a class="expand-button" href="#productinfo">Xem bảng cấu hình chi tiết</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <div class="spec-title">
                            <h4>Bộ sưu tập ảnh</h4>
                        </div>
                        <section id="image" class="spec-detail-wrapper clearfix">
                            <div class="royalSlider rsDefault span12">
                                <?php
                                if (!empty($this->images)):
                                    foreach ($this->images as $image):
                                        ?>
                                        <a href="<?php echo Publics . $image['source']; ?>" data-rsbigimg="<?php echo Publics . $image['source']; ?>" class="rsImg">
                                            Samsung Galaxy Trend S7560-hình 4
                                            <img src="<?php echo Publics . $image['source']; ?>" alt="" class="rsTmb">
                                        </a>

                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </section>
                        <link href="<?php echo Publics ?>frontend/royalslider/royalslider.css" rel="stylesheet">
                        <script src="<?php echo Publics ?>frontend/royalslider/jquery.royalslider.min.js?v=9.3.6"></script>
                        <link href="<?php echo Publics ?>frontend/royalslider/rs-default.css?v=1.0.4" rel="stylesheet">
                        <script src="<?php echo Publics ?>frontend/js/jquery/royalSlider.js" type="text/javascript"></script>
                        <section id="comment" class="clearfix">
                            <div id="disqus_thread"></div>
                            <script src="<?php echo Publics ?>frontend/js/jquery/comment.js" type="text/javascript"></script>
                        </section>
                        <script src="<?php echo Publics ?>frontend/js/jquery/jquery.scrollTo-1.4.2-min.js" type="text/javascript"></script>
                        <script src="<?php echo Publics ?>frontend/js/jquery/waypoints.min.js" type="text/javascript"></script>
                        <script src="<?php echo Publics ?>frontend/js/jquery/navbar2.js" type="text/javascript"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end .container-->
</section>
<!--end #columns-->
