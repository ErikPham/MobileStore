<div class="row-fluid">
    <div class="span3">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-bell"></i>
                    Hộp thư
                </h3>
            </div>
            <div class="box-content">
                <ul>
                    <li><i class="icon-envelope"></i>
                        <a href="">Hộp thư đến <span>(<?php echo $this->count; ?>)</span></a>
                    </li>
                    <li>
                        <a href="">Thư đã gửi</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="span9">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="icon-comment"></i>
                    Thông báo
                </h3>
            </div>
            <div class="box-content nopadding">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="accordion">
                            <?php
                            foreach ($this->contacts as $contact) {
                                if ($contact['status'] == 1) {
                                    ?>
                                    <div class="accordion-heading status_true" id="border-button">
                                        <a href="<?php echo URL . 'backend/contacts/detail/' . $contact['id'] . '/' . Util::toSlug($contact['title']); ?>" class="accordion_contact" title="<?php echo $contact['title']; ?>">
                                            <strong class='title_contact'><?php echo $contact['title']; ?></strong>
                                            <strong class='content_contact'><?php echo $contact['content']; ?></strong>
                                        </a>
                                        <p class="meta_data">Ngay đăng</p>
                                    </div>
                                <?php } else { ?>
                                    <div class="accordion-heading" id="border-button">
                                        <a href="<?php echo URL . 'backend/contacts/detail/' . $contact['id'] . '/' . Util::toSlug($contact['title']); ?>" class="accordion_contact" title="<?php echo $contact['title']; ?>">
                                            <strong class='title_contact'><?php echo $contact['title']; ?></strong>
                                            <strong class='content_contact'><?php echo $contact['content']; ?></strong>
                                        </a>
                                    </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end .span-->
    </div><!--end .row-->