<?php
if (!empty($this->items)):
    foreach ($this->items as $item):
        ?>
        <div  class="row-fluid itemClassified">
            <div class="span6 title">
                <h3>
                    <a href="<?php echo URL . 'classified/viewdetail/' . $item['id'] . '/' .Util::toSlug($item['title']); ?>"><?php echo $item['title']; ?></a>
                </h3>
                <span class="price"><?php echo Util::priceFormat($item['price']) ?> &#273;</span>
            </div>
            <div class="span2 creator">
                <span class="fullname"><?php echo $item['name']; ?></span>
                <span class="mobile"><?php echo $item['mobile']; ?></span>
            </div>
            <div class="span2 viewcount  hidden-phone">
                <span><?php echo $item['views']; ?></span>
            </div>
            <div class="span2 timecreated">
                <span><?php echo Date::getDatetime($item['post_date']); ?></span>
            </div>
        </div>
        <?php
    endforeach;
    ?>
    <?php if ($this->page != ''): ?>
        <div class="pagination pagination-centered pagiAjax" data-type="<?php echo $this->type; ?>">
            <?php echo $this->page; ?>
        </div>
        <script type="text/javascript">
            $('.pagiAjax').delegate('a', 'click', function(e) {
                console.log('hello');
                e.preventDefault();
                dataType = $(this).closest('.pagiAjax').attr('data-type');
                $(this).parent('li').addClass('activePage');
                dataPage = $(this).attr('data-page');
                
                loadClassified(parseInt(dataType), dataPage);
                return false;
            });
        </script>
        <?php
    endif;
else:
    echo '<div  class="row-fluid itemClassified no-post">Chưa có tin nào</div>';
endif;
?>
<script type="text/javascript">

    $('.tab-content').find('.itemClassified:odd').addClass('odd');
</script>

