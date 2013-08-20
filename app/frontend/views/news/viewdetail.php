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
                    </div>
                    <div class="blog-content clearfix">
                        <div class="blog-social clearfix">
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
                        <div class="content-wrap clearfix">
                            <div class="itemFullText">
                                <?php echo $this->new['content']; ?>
                            </div>
                        </div>
                    </div>

                    <div class="blog-social clearfix">
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

                    <div class="blog-bottom clearfix">
                        <div id="disqus_thread"></div>
                        <script src="<?php echo Publics ?>frontend/js/jquery/comment.js" type="text/javascript"></script>
                    </div>
                </div>
            </section>