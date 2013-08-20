<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <section class="span9">
                <div class="pavblogs" id="content">
                    <div class="breadcrumb">
                        <?php
                            echo isset($this->breadcrums) ? $this->breadcrums : '';
                        ?>
                    </div>
                    <div class="pav-header header-new">
                        <h1><?php echo isset($this->pavHeader) ? $this->pavHeader : ''; ?></h1>
                        <a href="#" class="rss-wrapper"><span class="icon-rss">Rss</span></a>	
                    </div>
                    <div class="pav-filter-blogs">
                        <div class="pav-blogs">
                            <div class="secondary clearfix">
                                <?php
                                if (!is_null($this->news)):
                                    foreach ($this->news as $new):
                                        $url = URL . 'news/viewdetail/' . $new['id'] . '/' . Util::toSlug($new['title']);
                                        $urlCategory = URL . 'news/category/' . $new['category_id'] . '/' . Util::toSlug($new['name']);
                                        ?>
                                        <div class="pavcol1">
                                            <div class="blog-item clearfix">
                                                <div class="blog-header clearfix">
                                                    <h4 class="blog-title">	
                                                        <a title="<?php echo $new['title']; ?>" href="<?php echo $url; ?>"><?php echo $new['title']; ?></a>
                                                    </h4>
                                                </div>
                                                <div class="blog-meta">
                                                    <span class="author"><span>Đăng bởi: </span> <?php echo $new['fullname']; ?></span>
                                                    <span class="publishin">
                                                        <span>Chuyên mục: </span>
                                                        <a title="<?php echo $new['name']; ?>" href="<?php echo $urlCategory; ?>"><?php echo $new['name']; ?></a>
                                                    </span>
                                                    <span class="hits"><span>Lượt xem: </span> <?php echo $new['views']; ?></span>
                                                </div>
                                                <div class="blog-body">
                                                    <div class="row-fluid">
                                                        <div class="span4">
                                                            <div class="image">
                                                                <img align="left" title="<?php echo $new['title']; ?>" src="http://www.pavothemes.com/demo/pav_metro_store/image/cache/data/pavblog/pav-i1-600x300w.jpg">
                                                            </div>
                                                        </div>
                                                        <div class="span8">
                                                            <div class="description">
                                                                <p><?php echo String::theExcerpt($new['description']); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="read-more">
                                                        <a class="readmore" href="<?php echo $url; ?>">Chi tiết</a>
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
                            <div class='pagination pagination-centered'>
                                <?php echo $this->pagination; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

