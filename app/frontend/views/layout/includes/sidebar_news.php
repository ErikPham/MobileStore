<aside class="span3">
    <div class="sidebar" id="column-left">
        <div class="box pav-blog-latest">
            <h3 class="box-heading"><span class="tcolor">Xem</span> nhiều</h3>
            <div class="box-content">
                <div class="pavblog-latest clearfix">
                    <?php
                    foreach ($this->viewmosts as $new):
                        $url = URL . 'news/viewdetail/' . $new['id'] . '/' . Util::toSlug($new['title']);
                        ?>
                        <div class="pavcol">
                            <div class="media">
                                <a title="<?php echo $new['title']; ?>" href="<?php echo $url; ?>" class="pull-left">
                                    <img align="left" title="" src="http://www.pavothemes.com/demo/pav_metro_store/image/cache/data/pavblog/pav-i1-40x40.jpg"/>
                                </a>						
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a title="<?php echo $new['title']; ?>" href="<?php echo $url; ?>"><?php echo $new['title']; ?></a>
                                    </h4>
                                </div>
                            </div>
                        </div><!--end .pavcol-->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</aside>
</div>
</div>
</section>