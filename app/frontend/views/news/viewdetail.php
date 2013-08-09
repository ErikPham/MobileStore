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
                    </div>
                    <div class="blog-content clearfix">
                        <div class="content-wrap clearfix">
                            <div class="itemFullText">
                                <?php echo $this->new['content']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="blog-social clearfix">

                    </div>
                    <div class="blog-bottom clearfix">
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>