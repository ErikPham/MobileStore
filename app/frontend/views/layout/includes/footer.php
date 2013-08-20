<!--end #pav-mass-bottom-->
<section id="footer">
    <div class="footer-center">
        <div class="container">
            <div class="row-fluid">
                <div class="span1">
                    <div class="box pav-custom  pav_social">
                        <section class="box-content">
                            <div class="pav-social">
                                <h3><span>Kết nối</span></h3>
                                <ul>
                                    <li>
                                        <a title="Facebook" href="#" class="facebook">Facebook</a> <a title="" href="#" class="twitte">Twitte</a>
                                    </li>
                                    <li>
                                        <a title="Dribbble" href="#" class="dribbble">Dribbble</a> <a title="" href="#" class="vimeo">Vimeo</a>
                                    </li>
                                    <li>
                                        <a title="Google plus" href="#" class="google">Google plus</a> <a title="" href="#" class="email">Email</a>
                                    </li>
                                    <li>
                                        <a title="Rss" href="#" class="rss">Rss</a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="span2">
                    <div class="box pav-custom  pav-about-us">
                        <section class="box-content">
                            <div class="pav-about">
                                <h3><span>Giới thiệu</span></h3>
                                <ul>
                                    <li><a title="" href="#">Về chúng tôi</a></li>
                                    <li><a title="" href="#">Giao hàng</a></li>
                                    <li><a title="" href="#">Bảo hành</a></li>
                                    <li><a title="" href="#">Tuyển dụng</a></li>
                                    <li><a title="" href="#">Thanh toán</a></li>
                                    <li><a title="" href="#">Điều khoản sử dụng</a></li>
                                    <li><a title="" href="#">Ưu đãi doanh nghiệp</a></li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="span3">
                    <div class="box pav-blog-latest">
                        <h3 class="box-heading"><span class="tcolor">Tin mới</span></h3>
                        <div class="box-content">
                            <div class="pavblog-latest clearfix">
                                <!-- <div class="pavcol1"> -->
                                <?php
                                $fileNew = CACHE . 'latest_news.txt';
                                $news = File::read($fileNew, 'r', true);
                                $news = json_decode($news, true);
                                if (!empty($news)):
                                    foreach ($news as $new):
                                        ?>
                                        <div class="pavcol">
                                            <div class="media">
                                                <a title="<?php echo $new['title']; ?>" href="<?php echo URL . 'news/viewdetail/' . $new['id'] . '/' . Util::toSlug($new['title']); ?>" class="pull-left">
                                                    <img alt="thumb" title="<?php echo $new['title']; ?>" src="<?php echo Publics . 'frontend/data/' . $new['thumb']; ?>"/>
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a title="<?php echo $new['title']; ?>" href="<?php echo URL . 'news/viewdetail/' . $new['id'] . '/' . Util::toSlug($new['title']); ?>"><?php echo $new['title']; ?></a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="box gallery">
                        <h3 class="box-heading">Hãng sản xuất</h3>
                        <div class="box-content clearfix">
                            
                            <?php
                            $fileBrand = CACHE . 'brand_footer.txt';
                            $brands = File::read($fileBrand, 'r', true);
                            $brands = json_decode($brands, true);
                            if (!empty($brands)):
                                //foreach ($brands as $brand):
                                    ?>
                                    <a title="<?php echo $brand['name']; ?>" class="group964427569 cboxElement" href="<?php echo URL . 'product/brand/' . $brand['id'] . '/' . Util::toSlug($brand['name']); ?>">
                                        <img alt="<?php echo $brand['name']; ?>" title="<?php echo $brand['name']; ?>" src="<?php echo Publics . $brand['logo']; ?>"/>
                                    </a>
                                    <?php
                                //endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="box pav-custom  pav_newsletter">
                        <section class="box-content">
                            <div class="pav-newsletter">
                                <h3><span>Bản tin</span></h3>
                                <form method="POST" >
                                    <label>Đăng ký nhận bản tin của chúng tôi:</label>
                                    <p>Bạn sẽ nhận được bản tin mỗi khi chúng tôi có thông báo mới hãy nhập địa chỉ email của bạn...</p>
                                    <div class="subscribe row-fluid">
                                        <input type="text" value="" name="subscribe"> <input type="button" value="&nbsp;">
                                    </div>
                                    <div class="payment-method">
                                        <a title="" href="#"><img src="<?php echo Publics . 'frontend/'; ?>images/paypal.png" alt="paypal"></a>
                                        <a title="" href="#"><img src="<?php echo Publics . 'frontend/'; ?>images/visa.png" alt="visa"></a>
                                        <a title="" href="#"><img src="<?php echo Publics . 'frontend/'; ?>images/master.png" alt="master"></a>
                                        <a title="" href="#"><img src="<?php echo Publics . 'frontend/'; ?>images/amex.png" alt="amex"></a>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="powered">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <nav class="clearfix">
                    <ul>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Khuyến mại</a></li>
                        <li><a href="#">Câu hỏi thường gặp</a></li>
                    </ul>
                </nav>
            </div>
            <div class="span6">
                <address>
                    Copyright &copy; <?php echo date('Y'); ?> Mobile store by <a title="Mobile Store" target="_blank" href="#">MobileStore.com</a>
                    All reversed.
                </address>
            </div>
        </div>
    </div>
</section>
<!--end #powered-->
</div>
<!--end #pageContainer-->
</body>
</html>