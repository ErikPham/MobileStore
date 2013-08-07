<section id="slideshow">
    <div class="container">
        <div class="carousel slid pavcontentslider" id="pavcontentslider10">
            <div class="carousel-inner">
                <div class="item">
                    <div class="banner-info">
                        <h4>Mauris sed 2013 donec</h4>
                        <div class="banner-desc">
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing quis; habitant morbi tristique senectus et netus et malesuada fames ac urpis egestas.</p>
                        </div>
                    </div>
                    <div class="banner-image"><img alt="Mauris sed 2013 donec" src="<?php echo Publics . 'frontend/'; ?>images/1-940x457.png">
                    </div>
                </div>
                <div class="item">
                    <div class="banner-info">
                        <h4>Mauris sed 2013 donec</h4>
                        <div class="banner-desc">
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing quis; habitant morbi tristique senectus et netus et malesuada fames ac urpis egestas.</p>
                        </div>
                    </div>
                    <div class="banner-image"><img alt="Mauris sed 2013 donec" src="<?php echo Publics . 'frontend/'; ?>images/2-940x457.png">
                    </div>
                </div>
                <div class="item active">
                    <div class="banner-info">
                        <h4>Mauris sed 2013 donec</h4>
                        <div class="banner-desc">
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing quis; habitant morbi tristique senectus et netus et malesuada fames ac urpis egestas.</p>
                        </div>
                    </div>
                    <div class="banner-image"><img alt="Mauris sed 2013 donec" src="<?php echo Publics . 'frontend/'; ?>images/3-940x457.png">
                    </div>
                </div>
                <div class="item">
                    <div class="banner-info">
                        <h4>Mauris sed 2013 donec</h4>
                        <div class="banner-desc">
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing quis; habitant morbi tristique senectus et netus et malesuada fames ac urpis egestas.</p>
                        </div>
                    </div>
                    <div class="banner-image"><img alt="Mauris sed 2013 donec" src="<?php echo Publics . 'frontend/'; ?>images/4-940x457.png">
                    </div>
                </div>
            </div>
            <a data-slide="prev" href="#pavcontentslider10" class="carousel-control left hidden-tablet hidden-phone">‹</a>
            <a data-slide="next" href="#pavcontentslider10" class="carousel-control right hidden-tablet hidden-phone">›</a>
            <ol class="carousel-indicators">
                <li class="" data-slide-to="0" data-target="#pavcontentslider10"></li>
                <li class="" data-slide-to="1" data-target="#pavcontentslider10"></li>
                <li class="active" data-slide-to="2" data-target="#pavcontentslider10"></li>
                <li class="" data-slide-to="3" data-target="#pavcontentslider10"></li>
            </ol>
        </div>
        <script type="text/javascript">
            $('#pavcontentslider10').carousel({interval: 8000, auto: true, pause: 'hover'});
        </script>
    </div>
</section>
<!--end #slideshow-->
<div id="pav-promotion" class="pav-promotion">
    <div class="container">
        <div class="row-fluid">
            <div class="span4">
                <div class="box pav-custom  pav-free-shipping">
                    <section class="box-content">
                        <div class="pav-block-shipping"><img src="<?php echo Publics . 'frontend/'; ?>images/free-shipping.png" alt="Free Shipping"></div>
                    </section>
                </div>
            </div>
            <div class="span4">
                <div class="box pav-custom  pav-sale-off">
                    <section class="box-content">
                        <div class="pav-block-sale"><img src="<?php echo Publics . 'frontend/'; ?>images/sale.png" alt="Sale"></div>
                    </section>
                </div>
            </div>
            <div class="span4">
                <div class="box pav-custom  pav-spring">
                    <section class="box-content">
                        <div class="pav-block-spring"><img src="<?php echo Publics . 'frontend/'; ?>images/spring.png" alt="Spring"></div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end #pav-promotion-->
<div id="pavo-showcase" class="pav-showcase">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <div class="box productcarousel">
                    <h3 class="box-heading">
                        <span class="tcolor">Latest</span>
                    </h3>
                    <div class="box-content">
                        <div id="productcarousel1" class="box-products slide">
                            <div class="carousel-controls">
                                <a data-slide="prev" href="#productcarousel1" class="carousel-control left">‹</a>
                                <a data-slide="next" href="#productcarousel1" class="carousel-control right">›</a>
                            </div>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row-fluid box-product">
                                        <?php
                                        $index = 1;
                                        $count = count($this->productLatests);

                                        foreach ($this->productLatests as $product):
                                            $urlDetailProduct = URL . 'product/detail/' . $product['id'] . '/' . Util::toSlug($product['name']);
                                            ?>
                                            <div class="span6 product-block">
                                                <div class="product-inner">
                                                    <div class="product_block">
                                                        <div class="image">
                                                            <a href="<?php echo $urlDetailProduct; ?>"><img alt="Samsung Galaxy Tab 10.1" src="<?php echo Publics . $product['thumb']; ?>"></a>
                                                        </div>
                                                        <div class="product_info">
                                                            <h3 class="name"><a href="<?php echo $urlDetailProduct; ?>"><?php echo $product['name']; ?></a></h3>
                                                            <div class="price">
                                                                <span class="price-new"><?php echo number_format($product['price'] . '000'); ?> VNĐ</span>
                                                            </div>
                                                            <div class="pav-action clearfix">
                                                                <div class="cart">
                                                                    <input type="button" class="button" onclick="addToCart('49');" value="Add to Cart">
                                                                </div>
                                                                <div class="wishlist">
                                                                    <a onclick="addToWishList('49');">Add to Wish List</a>
                                                                </div>
                                                                <div class="compare">
                                                                    <a onclick="addToCompare('49');">Add to Compare</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if ($index % 2 == 0 && $index != $count) {
                                                echo '</div>
                                </div><div class="item">
                                            <div class="row-fluid box-product">';
                                            }
                                            $index++;
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                            </div><!--end.carousel-inner-->
                        </div>
                        <!--end #productcarousel1-->
                        <script type="text/javascript">
                             $('#productcarousel1').carousel({interval: false, auto: false, pause: 'hover'});
                        </script>
                    </div>
                    <!--end .box-content-->
                </div>
            </div>
            <!--end .span6-->
            <div class="span6">
                <div class="box productcarousel">
                    <h3 class="box-heading">
                        <span class="tcolor"> Most</span> Viewed
                    </h3>
                    <div class="box-content">
                        <div id="productcarousel2" class="box-products slide">
                            <div class="carousel-controls">
                                <a data-slide="prev" href="#productcarousel2" class="carousel-control left">‹</a>
                                <a data-slide="next" href="#productcarousel2" class="carousel-control right">›</a>
                            </div>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row-fluid box-product">
                                        <?php
                                        $index = 1;
                                        $count = count($this->productLatests);

                                        foreach ($this->productLatests as $product):
                                            $urlDetailProduct = URL . 'product/detail/' . $product['id'] . '/' . Util::toSlug($product['name']);
                                            ?>
                                            <div class="span6 product-block">
                                                <div class="product-inner">
                                                    <div class="product_block">
                                                        <div class="image">
                                                            <a href="<?php echo $urlDetailProduct; ?>"><img alt="Samsung Galaxy Tab 10.1" src="<?php echo Publics . $product['thumb']; ?>"></a>
                                                        </div>
                                                        <div class="product_info">
                                                            <h3 class="name"><a href="<?php echo $urlDetailProduct; ?>"><?php echo $product['name']; ?></a></h3>
                                                            <div class="price">
                                                                <span class="price-new"><?php echo number_format($product['price'] . '000'); ?> VNĐ</span>
                                                            </div>
                                                            <div class="pav-action clearfix">
                                                                <div class="cart">
                                                                    <input type="button" class="button" onclick="addToCart('49');" value="Add to Cart">
                                                                </div>
                                                                <div class="wishlist">
                                                                    <a onclick="addToWishList('49');">Add to Wish List</a>
                                                                </div>
                                                                <div class="compare">
                                                                    <a onclick="addToCompare('49');">Add to Compare</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if ($index % 2 == 0 && $index != $count) {
                                                echo '</div>
                                                    </div>
                                            <div class="item">
                                                <div class="row-fluid box-product">';
                                            }
                                            $index++;
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                            </div><!--end.carousel-inner-->
                        </div>
                        <!--end #productcarousel1-->
                        <script type="text/javascript">
                            $('#productcarousel2').carousel({interval: false, auto: false, pause: 'hover'});
                        </script>
                    </div>
                    <!--end .box-content-->
                </div>
            </div>
            <!--end .span6-->
        </div>
        <!--end .row-fluid-->
    </div>
    <!--end .container-->
</div>
<!--end .pavo-showcase-->

<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div id="content">
                    <div class="content-bottom content-page">
                        <div class="box productcarousel">
                            <h3 class="box-heading"><span class="tcolor">
                                    Special</span>
                            </h3>
                            <div class="box-content">
                                <div id="productcarousel3" class="box-products slide">
                                    <div class="carousel-controls">
                                        <a data-slide="prev" href="#productcarousel3" class="carousel-control left">‹</a>
                                        <a data-slide="next" href="#productcarousel3" class="carousel-control right">›</a>
                                    </div>

                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row-fluid box-product">
                                                <?php
                                                $index = 1;
                                                $count = count($this->productHighPrices);

                                                foreach ($this->productHighPrices as $product):
                                                    $urlDetailProduct = URL . 'product/detail/' . $product['id'] . '/' . Util::toSlug($product['name']);
                                                    ?>
                                                    <div class="span3 product-block">
                                                        <div class="product-inner">
                                                            <div class="product_block">
                                                                <div class="image">
                                                                    <a href="<?php echo $urlDetailProduct; ?>"><img alt="Samsung Galaxy Tab 10.1" src="<?php echo Publics . $product['thumb']; ?>"></a>
                                                                </div>
                                                                <div class="product_info">
                                                                    <h3 class="name"><a href="<?php echo $urlDetailProduct; ?>"><?php echo $product['name']; ?></a></h3>
                                                                    <div class="price">
                                                                        <span class="price-new"><?php echo number_format($product['price'] . '000'); ?> VNĐ</span>
                                                                    </div>
                                                                    <div class="pav-action clearfix">
                                                                        <div class="cart">
                                                                            <input type="button" class="button" onclick="addToCart('49');" value="Add to Cart">
                                                                        </div>
                                                                        <div class="wishlist">
                                                                            <a onclick="addToWishList('49');">Add to Wish List</a>
                                                                        </div>
                                                                        <div class="compare">
                                                                            <a onclick="addToCompare('49');">Add to Compare</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($index % 4 == 0 && $index != $count) {
                                                        echo '</div>
                                </div><div class="item">
                                            <div class="row-fluid box-product">';
                                                    }
                                                    $index++;
                                                endforeach;
                                                ?>
                                            </div>
                                        </div>
                                    </div><!--end.carousel-inner-->
                                </div>
                                <!--end .productcarousel-->
                                <div class="box pav-custom">
                                    <section class="box-content">
                                        <div class="pav-content-bottom">
                                            <div class="row-fluid">
                                                <div class="span3"><img src="images/static3.png" alt=""></div>
                                                <div class="span7">
                                                    <h3>100 kindle fire hd <span>$3.99</span> or less</h3>
                                                    <p>Nunc gavida nisl utrices loborti molis temp tempor quam congue turpis sed psum blandit donec vitae laoreet vestibulum lobortis mattis sapien bero cursus congue urna mauris.</p>
                                                </div>
                                                <div class="span2"><a href="#" data-size="" data-position="top-left" data-align="right" class="circlehover with-symbol"><span class="text">Find out more</span> </a></div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!--end .pav-custom-->
                            </div>
                            <!--end .content-bottom-->
                        </div>
                        <!--end .content-->
                    </div>
                    <!--end .span12-->
                </div>
                <!--end .row-fluid-->
            </div>
            <!--end .container-->
            </section>
            <!--end #columns-->