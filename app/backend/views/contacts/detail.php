<div class="row-fluid">
    <?php
    echo isset($this->message) ? $this->message : '';
    ?>
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
                            <img alt="" src="<?php echo URL ?>publics/img/demo/user-2.jpg">
                        </div>
                        <div class="message">
                            <div class="delete" style="float: right;"><a class="del" href="<?php echo URL . 'backend/contacts/delete/' . $this->contact['id'] . '/' . Util::toSlug($this->contact['title']); ?>"><i class="icon-trash"></i></a></div>
                            <span class="caret"></span>
                            <span class="name"><?php echo $this->contact['name']; ?></span>
                            <p><strong><?php echo $this->contact['title']; ?></strong></p>
                            <p><?php echo $this->contact['content']; ?></p>
                            <span class="time"><i class=" icon-calendar"></i>&nbsp;<?php echo Date::getDatetime($this->contact['contact_date']); ?></span>
                        </div>
                    </li>
                    <?php
                    $count = count($this->reply);
                    if ($count > 0):
                        foreach ($this->reply as $reply) {
                            ?>
                            <li class="right">
                                <div class="image">
                                    <img alt="" src="<?php echo URL ?>publics/img/demo/user-2.jpg">
                                </div>
                                <div class="message">
                                    <span class="caret"></span>
                                    <span class="name"><?php echo $reply['fullname']; ?></span>
                                    <p><?php echo $reply['content']; ?></p>
                                    <span class="time">
                                        <?php echo Date::getDatetime($reply['post_date']); ?>
                                    </span>
                                </div>
                            </li>
                        <?php } else: ?>
                        <li class="right">
                            <div class="message">
                                <p>Chưa có thư trả lời!</p>
                            </div>
                        </li>
                       
                        <li class="insert">
                            <form id='bb' method="post" action="<?php echo URL . 'backend/contacts/reply'; ?>" class="form-horizontal form-bordered form-validate">
                                <div class="hidden">
                                    <input type="hidden" name="id_contact" value="<?php echo $this->contact['id']; ?>"/>
                                    <input type="hidden" name="email" value="<?php echo $this->contact['email']; ?>"/>
                                    <input type="hidden" name="title" value="<?php echo $this->contact['title']; ?>"/>
                                    <input type="hidden" name="name" value="<?php echo $this->contact['name']; ?>"/>
                                    <input type="hidden" name="account_id" value="<?php echo Session::get('user_id'); ?>"/>
                                    <input type="hidden" name="post_date" value="<?php echo time(); ?>"/>
                                </div>
                                <div class="text">
                                    <input type="text" name="content" class="input-block-level" placeholder="Nhập thư trả lời..." value="<?php if (isset($_POST['content'])) echo $_POST['content']; ?>"/>
                                </div>
                                <div class="submit">
                                    <button type="submit"><i class="icon-share-alt"></i></button>
                                </div>
                            </form>
                        </li>
                        <li>
                            <?php if (isset($this->util->errors)) $this->util->alertErrorField('content'); ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>