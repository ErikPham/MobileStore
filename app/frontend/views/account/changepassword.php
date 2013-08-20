<section id="pav-page-title"></section>
<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <div id="content">
                    <?php
                    echo isset($this->message) ? $this->message : '';
                    ?>
                    <div class="breadcrumb">
                        <?php
                            echo isset($this->breadcrums) ? $this->breadcrums : '';
                        ?>
                    </div>
                    <div class="account-register">
                        <h1>Thay đổi mật khẩu</h1>
                        <form enctype="multipart/form-data" method="post" >
                            <h2>Thay đổi mật khẩu</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td><span class="required">*</span> Mật khẩu cũ:</td>
                                            <td>
                                                <input type="password"  name="old"/>
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('old'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Mật khẩu mới:</td>
                                            <td>
                                                <input type="password"  name="new" />
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('new'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Nhập lại:</td>
                                            <td>
                                                <input type="password"  name="confirm" />
                                                <?php if (isset($this->util->errors)) $this->util->alertErrorField('confirm'); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="buttons">
                                <div class="right">
                                    <input type="submit" class="button" value="Thay đổi">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>