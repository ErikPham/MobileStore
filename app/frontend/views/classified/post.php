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
                    <div class="classified-register">
                        <h1>Đăng tin rao vặt</h1>
                        <form enctype="multipart/form-data" method="post"  class="form">
                            <h2>Thông tin sản phẩm</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td><span class="required">*</span> Tiêu đề:</td>
                                            <td>
                                                <div class="form-inline">
                                                    <select name="post_type" class="span2">
                                                        <option value="1">Cần mua</option>
                                                        <option value="2">Cần bán</option>
                                                    </select>
                                                    <input type="text" name="title" class="span10" value="<?php echo isset($this->classified['title']) ? $this->classified['title'] : ''; ?>"/>
                                                    <?php if (isset($this->util->errors)) $this->util->alertErrorField('title'); ?>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="required">*</span> Nội dung:</td>
                                            <td>
                                                <textarea name="content" class="span12"><?php echo isset($this->classified['content']) ? $this->classified['content'] : ''; ?></textarea>
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('content'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="required">*</span> Giá:</td>
                                            <td>
                                                <p>Bạn không cần điền đơn vị hàng nghìn</p>
                                                <input name="price" class="span5" value="<?php echo isset($this->classified['price']) ? $this->classified['price'] : ''; ?>" /> .000 đ
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('price'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="required">*</span> Phạm vi:</td>
                                            <td>
                                                <select name="location_id" class="span5">
                                                    <?php
                                                    if (!empty($this->locations)):
                                                        foreach ($this->locations as $location):
                                                            ?>
                                                            <option value="<?php echo $location['id']; ?>"><?php echo $location['label']; ?></option>
                                                            <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
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
                                            <input name="name" class="span5" value="<?php echo isset($this->classified['name']) ? $this->classified['name'] : ''; ?>" />
                                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('name'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="required">*</span> Điện thoại:</td>
                                        <td>
                                            <input name="mobile" class="span5" value="<?php echo isset($this->classified['mobile']) ? $this->classified['mobile'] : ''; ?>" />
                                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('mobile'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="required">*</span> Email:</td>
                                        <td>
                                            <input name="email" class="span5" value="<?php echo isset($this->classified['email']) ? $this->classified['email'] : ''; ?>" />
                                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('email'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="required">*</span> Xác nhân:</td>
                                        <td>
                                            <p>Bạn hãy trả lời câu hỏi sau (Đáp án là số): <strong class="text-red"><?php echo Captcha::getCaptcha(); ?></strong></p>
                                            <input name="captcha" class="span5" />
                                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('captcha'); ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="buttons">
                                <div class="right">
                                    <input type="submit" class="button" value="Đăng tin"/>
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