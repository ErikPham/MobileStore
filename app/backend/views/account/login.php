<div class="wrapper">
    <h1><a href="index.html"><img src="<?php echo URL ?>publics/img/logo-big.png" alt="" class='retina-ready' width="59" height="49">FLAT</a></h1>
    <div class="login-body">
        <h2>Đăng nhập</h2>
        <form action="#" method='POST'>
            <div class="email">
                <input type="text" name='username' placeholder="Tên tài khoản" value="<?php if(isset($this->data)) echo $this->data['username'];?>" class='input-block-level'>
            </div>
            <div class="pw">
                <input type="password" name="password" placeholder="Mật khẩu" class='input-block-level'>
            </div>
            <div class="submit">
                <input type="submit" value="Đăng nhập" class='btn btn-primary'>
            </div>
        </form>

        <div class="forget">
            <a href="#"><span>Quên mật khẩu?</span></a>
        </div>
    </div>
</div>