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
                        <a href="<?php echo URL ?>backend/contacts">Hộp thư đến <span>(<?php echo $this->count; ?>)</span></a>
                    </li>
                    <li><i class="icon-reply"></i>
                        <a href="<?php echo URL ?>backend/contacts/replys">Thư đã gửi <span>(<?php echo $this->countReply; ?>)</span></a>
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
                    Thư đã gửi
                </h3>
            </div>
            <div class="box-content nopadding">
                <table class="table table-nomargin dataTable table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th class="hidden-1024">Họ tên</th>
                            <th>Nội dung</th>
                            <th class="hidden-350">Ngày gửi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($this->replys as $reply) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <a href='<?php echo URL . 'backend/contacts/detail/' . $reply['idct'] . '/' . Util::toSlug($reply['title']); ?>'><?php echo $reply['fullname']; ?></a>
                                </td>
                                <td>
                                    <a href='<?php echo URL . 'backend/contacts/detail/' . $reply['idct'] . '/' . Util::toSlug($reply['title']); ?>'><?php echo String::theExcerpt($reply['content']); ?></a>
                                </td>
                                <td><?php echo Date::getDatetime($reply['post_date']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>