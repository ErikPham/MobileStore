
<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <section class="span9">
                <div class="pavblogs" id="content">
                    <div class="breadcrumb">
                        <a href="#">Home</a> &raquo;
                        <a href="#">Account</a> &raquo;
                        <a href="#">Register</a>
                    </div>
                    <div class="pav-header">
                        <h1><?php echo isset($this->pavHeader) ? $this->pavHeader : ''; ?></h1>
                        <a href="#" class="rss-wrapper"><span class="icon-rss">Rss</span></a>	
                    </div>
                    <div class="pav-filter-blogs">
                        <div class="pav-blogs">
                            <div class="secondary clearfix">
                                <?php
                                if (!is_null($this->news)):
                                    foreach ($this->news as $new):
                                        ?>
                                        <div class="pavcol1">
                                            <div class="blog-item clearfix">
                                                <div class="blog-header clearfix">
                                                    <span class="created hidden-phone">
                                                        <span class="day">09</span>
                                                        <span class="month">Mar</span> /
                                                        <span class="month">2013</span>
                                                    </span>
                                                    <h4 class="blog-title">	
                                                        <a title="Neque porro quisquam est, qui dolorem ipsum" href="http://www.pavothemes.com/demo/pav_metro_store/index.php?route=pavblog/blog&amp;id=10"><?php echo $new['title']; ?></a>
                                                    </h4>
                                                </div>
                                                <div class="blog-meta">
                                                    <span class="author"><span>Đăng bởi: </span> admin</span>
                                                    <span class="publishin">
                                                        <span>Chuyên mục: </span>
                                                        <a title="Computer" href="http://www.pavothemes.com/demo/pav_metro_store/index.php?route=pavblog/category&amp;id=21">Computer</a>
                                                    </span>
                                                    <span class="hits"><span>Lượt xem: </span> 256</span>
                                                </div>
                                                <div class="blog-body">
                                                    <div class="row-fluid">
                                                        <div class="span4">
                                                            <div class="image">
                                                                <img align="left" title="Neque porro quisquam est, qui dolorem ipsum" src="http://www.pavothemes.com/demo/pav_metro_store/image/cache/data/pavblog/pav-i1-600x300w.jpg">
                                                            </div>
                                                        </div>
                                                        <div class="span8">
                                                            <div class="description">
                                                                <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="read-more">
                                                        <a class="readmore" href="#">Chi tiết</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <div class="pav-pagination pagination clearfix">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>