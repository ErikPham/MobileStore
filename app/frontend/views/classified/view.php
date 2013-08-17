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
                    <h1>Rao vặt</h1>
                    <div class="row-fluid filterWrapper">
                        <div class="span10 clearfix">
                            <div class="filter title-filter">
                                <div class="filter-by-type">
                                    <span class="left">Tìm</span
                                    <span> theo</span>
                                </div>
                            </div>
                            <div class="filter by-city">
                                <div class="filter-name clearfix">
                                    <h4>Toàn quốc</h4>
                                </div>
                                <div class="filter-list-wrapper clearfix">
                                    <ul class="filter-list clearfix" id="list-city">
                                    </ul>
                                </div>
                            </div>

                            <div class="filter by-price">
                                <div class="filter-name clearfix">
                                    <h4>Mọi mức giá</h4>
                                </div>
                                <div class="filter-list-wrapper clearfix">
                                    <ul class="filter-list clearfix">
                                        <li class="checked" data-price="">
                                            <a href="#">Mọi mức giá</a>
                                        </li>
                                        <li data-price="10"><a href="#">Trên 9 triệu</a></li>
                                        <li data-price="9"><a href="#">Dưới 9 triệu</a></li>
                                        <li data-price="8"><a href="#">Dưới 8 triệu</a></li>
                                        <li data-price="7"><a href="#">Dưới 7 triệu</a></li>
                                        <li data-price="6"><a href="#">Dưới 6 triệu</a></li>
                                        <li data-price="5"><a href="#">Dưới 5 triệu</a></li>
                                        <li data-price="4"><a href="#">Dưới 5 triệu</a></li>
                                        <li data-price="3"><a href="#">Dưới 3 triệu</a></li>
                                        <li data-price="2"><a href="#">Dưới 2 triệu</a></li>
                                        <li data-price="1"><a href="#">Dưới 1 triệu</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="filter by-time">
                                <div class="filter-name clearfix">
                                    <h4>3 Tháng qua</h4>
                                </div>
                                <div class="filter-list-wrapper clearfix">
                                    <ul class="filter-list clearfix">
                                        <li data-time="1"><a href="#">1 ngày qua</a></li>
                                        <li data-time="7"><a href="#">1 tuần qua</a></li>
                                        <li data-time="30"><a href="#">1 tháng qua</a></li>
                                        <li data-time="90" class="checked"><a href="#">3 Tháng qua</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="span2">
                            <a href="#postAds" data-toggle="modal" id="postClassisFied" class="btn">
                                <i class="icon-edit"></i> Đăng tin
                            </a>
                        </div>
                    </div><!--end .filterWrapper-->

                    <div class="row-fluid">
                        <div class="span9">
                            <div class="tabs-wrapper noBorderBottom">
                                <div id="tabs" class="row-fluid title-tabs">
                                    <div class="span6 btnTab">
                                        <a page-type="0" href="#tab-all-product">Tất cả</a>
                                        <a page-type="1" href="#tab-sale">Cần bán</a>
                                        <a page-type="2" href="#tab-buy">Cần mua</a>
                                    </div>
                                    <div class="span2 hidden-phone">
                                        Người đăng
                                    </div>
                                    <div class="span2  hidden-phone">
                                        Xem
                                    </div>
                                    <div class="span2  hidden-phone">
                                        Thời gian đăng
                                    </div>
                                </div>
                                <div id="tab-all-product" class="tab-content nopadding">

                                </div>



                                <div id="tab-sale" class="tab-content nopadding">

                                </div>

                                <div id="tab-buy" class="tab-content nopadding">

                                </div>

                                <script type="text/javascript">
                                    $('#tabs a').tabs();
                                </script>
                            </div>

                        </div>

                        <div class="span3">
                            <div class="boxSidebar">
                                <h3 class="title">Tin có thể bị xóa khi</h3>
                                <div class="contentBox">
                                    <ul>
                                        <li>
                                            Sử dụng ký tự đặc biệt
                                        </li>
                                        <li>
                                            Nội dung sơ sài, không có xuất xứ, tình trạng máy
                                        </li>
                                        <li>
                                            Giá bán không hợp lý, có dấu hiệu lừa đảo. VD: 1đ, 100đ
                                        </li>
                                        <li>
                                            Quảng cáo cho shop, công ty
                                        </li>

                                        <li>
                                            Số điện thoại không liên lạc được
                                        </li>
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
