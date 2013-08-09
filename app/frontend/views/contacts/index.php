<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div id="content">
                    <?php
                    echo isset($this->message) ? $this->message : '';
                    ?>
                    <div class="breadcrumb">
                        <a href="#">Home</a> &raquo;
                        <a href="#">Account</a> &raquo;
                        <a href="#">Register</a>
                    </div>
                    <div class="contact-register">
                        <h1>Liên hệ với chúng tôi</h1>
                        <p>Quý khách có thắc mắc cần giải đáp hoặc góp ý vui lòng điền biểu mẫu phía dưới để gửi cho chúng tôi</p>
                        <form enctype="multipart/form-data" method="post" action="#">
                            <h2>Thông tin của chúng tôi</h2>
                            <div class="content">
                                <div class="left">
                                    <h6>Địa chỉ</h6>
                                    <p>Xuân Phương - Từ Liêm - Hà Nội</p>
                                </div>

                                <div class="right">
                                    <h6>Điện thoại</h6>
                                    <p>0985315508</p>
                                </div>
                            </div>
                            <h2>Thông tin liên hệ</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td><span class="required">*</span> Họ tên:</td>
                                            <td>
                                                <input type="text"  name="name" value="<?php echo isset($this->contact['name']) ? $this->contact['name'] : ''; ?>">
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('name'); ?>
                                            </td>
                                        </tr>
                                        
                                         <tr>
                                            <td><span class="required">*</span> Email:</td>
                                            <td>
                                                <input type="text"  name="email" value="<?php echo isset($this->contact['email']) ? $this->contact['email'] : ''; ?>">
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('email'); ?>
                                            </td>
                                        </tr>
                                        
                                         <tr>
                                            <td><span class="required">*</span> Tiêu đề:</td>
                                            <td>
                                                <input type="text"  name="title" class="long" value="<?php echo isset($this->contact['title']) ? $this->contact['title'] : ''; ?>">
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('title'); ?>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td><span class="required">*</span> Nội dung:</td>
                                            <td>
                                                <textarea name="content" rows="5" cols="40" class="long"><?php echo isset($this->contact['content']) ? $this->contact['content'] : ''; ?></textarea>
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('content'); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="buttons">
                                <div class="right">
                                    <input type="submit" class="button" value="Gửi liên hệ">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end .container-->
</section><!--end #columns-->