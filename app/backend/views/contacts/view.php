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
                    <li><i class="icon-reply"></i>
                        <a href="">Thư đã gửi</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="span9">
        <div class="box box-bordered box-color">
            <div class="box-title">
                <h3>
                    <i class="icon-inbox"></i>
                    Hộp thư đến
                </h3>
            </div>
            <div class="box-content nopadding">
                <div class="highlight-toolbar">
                    <div class="pull-left"><div class="btn-toolbar">
                            <div class="btn-group"><a title="" rel="tooltip" class="btn" href="#" data-original-title="Refresh results"><i class="icon-refresh"></i></a></div>
                            <div class="btn-group">
                                <a title="" rel="tooltip" class="btn del" href="#" data-original-title="Delete"><i class="icon-trash"></i></a>
                            </div>
                        </div></div>
                    <div class="pull-right">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="btn" href="#"><i class="icon-angle-left"></i></a>
                                <a data-toggle="dropdown" class="btn" href="#"><i class="icon-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-nomargin table-mail">
                    <thead>
                        <tr>
                            <th class="table-checkbox hidden-350">
                                <input type="checkbox" class="sel-all">
                            </th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th class="table-icon hidden-350"></th>
                            <th class="table-date hidden-350">Ngày đăng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->contacts as $contact) {
                            if ($contact['status'] == 1) {
                                ?>
                                <tr>
                                    <td class="table-checkbox hidden-350">
                                        <input type="checkbox" class="selectable">
                                    </td>
                                    <td class="table-fixed-medium">
                                        <a style="color: green;" href="<?php echo URL . 'backend/contacts/detail/' . $contact['id'] . '/' . Util::toSlug($contact['title']); ?>" class="accordion_contact" title="<?php echo $contact['title']; ?>"> <?php echo $contact['title']; ?></a>
                                    </td>
                                    <td>
                                        <a style="color: green;" href="<?php echo URL . 'backend/contacts/detail/' . $contact['id'] . '/' . Util::toSlug($contact['title']); ?>" class="accordion_contact" title="<?php echo $contact['title']; ?>"> <?php echo $contact['content']; ?></a>
                                    </td>
                                    <td class="table-icon hidden-350">
                                        <i class="icon-paper-clip"></i>
                                    </td>
                                    <td class="table-date hidden-350">
                                        <?php echo $contact['contact_date']; ?>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td class="table-checkbox hidden-350">
                                        <input type="checkbox" class="selectable">
                                    </td>

                                    <td class="table-fixed-medium">
                                        <a href="<?php echo URL . 'backend/contacts/detail/' . $contact['id'] . '/' . Util::toSlug($contact['title']); ?>" class="accordion_contact" title="<?php echo $contact['title']; ?>"> <?php echo $contact['title']; ?></a>
                                    </td>
                                    <td>
                                        <a  href="<?php echo URL . 'backend/contacts/detail/' . $contact['id'] . '/' . Util::toSlug($contact['content']); ?>" class="accordion_contact" title="<?php echo $contact['title']; ?>"> <?php echo $contact['content']; ?></a>
                                    </td>
                                    <td class="table-icon hidden-350">
                                        <i class="icon-paper-clip"></i>
                                    </td>
                                    <td class="table-date hidden-350">
                                        <?php echo $contact['contact_date']; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>