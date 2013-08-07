<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-title">
                <h3>
                    <i class="icon-comments"></i>
                    Hộp thư đến
                </h3>
                <div class="actions">
                    <a class="btn btn-mini content-refresh" href="#"><i class="icon-refresh"></i></a>
                    <a class="btn btn-mini content-slideUp" href="#"><i class="icon-angle-down"></i></a>
                </div>
            </div>
            <div class="box-content nopadding" style="display: block;">
                <ul class="messages">
                    <li class="left">
                        <div class="image">
                            <img alt="" src="<?php echo URL ?>/publics/img/demo/user-2.jpg">
                        </div>
                        <div class="message">
                            <span class="caret"></span>
                            <span class="name"><?php echo $this->contact['name']; ?></span>
                            <p><strong><?php echo $this->contact['title']; ?></strong></p>
                            <p><?php echo $this->contact['content']; ?></p>
                            <span class="time"><i class=" icon-calendar"></i>&nbsp;<?php echo $this->contact['contact_date']; ?></span>
                        </div>
                    </li>
                    <li class="typing">
                        <span class="name"><?php echo Session::get('username'); ?></span>&nbsp;đang trả lời<img alt="" src="<?php echo URL ?>/publics/img/loading.gif">
                    </li>
                    <li class="insert">
                        <form action="<?php echo URL . 'backend/contacts/saveReply'; ?>" method="POST" id="message-form">
                            <div class="hidden">
                                <input type="hidden" name="id_contacts" value="<?php echo $this->contact['id']; ?>"/>
                                <input type="hidden" name="author_id" value="<?php echo Session::get('userid'); ?>"/>
                                <input type="hidden" name="post_date" value="<?php echo date("Y-d-m"); ?>"/>
                            </div>
                            <div class="text">
                                <input type="text" class="input-block-level" placeholder="Nhập thư trả lời..." name="content">
                            </div>
                            <div class="submit">
                                <button type="submit"><i class="icon-share-alt"></i></button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>