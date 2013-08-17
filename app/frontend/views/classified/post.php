<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <div id="content">
                    <?php
                    echo isset($this->message) ? $this->message : "";
                    ?>
                    <div class="breadcrumb">
                        <a href="#">Home</a> &raquo;
                        <a href="#">Account</a> &raquo;
                        <a href="#">Register</a>
                    </div>
                    <div class="account-register">
                        <h1>Đăng tin rao vặt</h1>
                        <form enctype="multipart/form-data" method="post" action="#" class="form">
                            <h2>Thông tin sản phẩm</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td><span class="required">*</span> Tiêu đề:</td>
                                            <td>
                                                <div class="form-inline">
                                                    <select name="post_type" class="span2">
                                                        <option>Cần mua</option>
                                                        <option>Cần bán</option>
                                                    </select>
                                                    <input type="text" name="username" class="span10" value=""/>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="required">*</span> Nội dung:</td>
                                            <td>
                                                <textarea name="content" class="span12"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="required">*</span> Giá:</td>
                                            <td>
                                                <input name="content" class="span5" /> đ
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="required">*</span> Phạm vi:</td>
                                            <td>
                                                <select name="content" class="span5">
                                                    <option>Toàn quốc</option>
                                                    <option>Hà Nội</option>
                                                </select>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <h2>Thông khác</h2>
                            <div class="content">
                                <table class="form">
                                    <tr>
                                        <td><span class="required">*</span> Họ tên:</td>
                                        <td>
                                            <input name="content" class="span5" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="required">*</span> Điện thoại:</td>
                                        <td>
                                            <input name="content" class="span5" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="required">*</span> Email:</td>
                                        <td>
                                            <input name="content" class="span5" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="required">*</span> Xác nhân:</td>
                                        <td>
                                            <p>Bạn hãy trả lời câu hỏi sau: <strong class="text-red"><?php echo Captcha::getCaptcha(); ?></strong></p>
                                            <input name="content" class="span5" />
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="buttons">
                                <div class="right">
                                    <input type="submit" class="button" value="Continue">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="span3 noticePost">
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
    </div><!--end .container-->
</section><!--end #columns-->