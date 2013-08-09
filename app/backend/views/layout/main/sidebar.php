<div class="container-fluid" id="content">
    <div id="left">
        <form action="http://www.eakroko.de/flat/search-results.html" method="GET" class='search-form'>
            <div class="search-pane">
                <input type="text" name="search" placeholder="Search here...">
                <button type="submit"><i class="icon-search"></i></button>
            </div>
        </form>
        <div class="subnav">
            <div class="subnav-title">
                <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Hộp thư</span></a>
            </div>
            <ul class="subnav-menu">
                <li>
                    <a href="<?php echo URL ?>backend/contacts">Hộp thư đến</a>
                </li>
                <li>
                    <a href="<?php echo URL ?>backend/adv">Tin rạo vặt</a>
                </li>
                <li>
                    <a href="#">Pages</a>
                </li>
                <li>
                    <a href="#">Comments</a>
                </li>
            </ul>
        </div>

        <div class="subnav">
            <div class="subnav-title">
                <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Quản lý quyền</span></a>
            </div>
            <ul class="subnav-menu">
                <li>
                    <a href="<?php echo URL ?>backend/permissions/add_acl">Quản lý module</a>
                </li>
                <li>
                    <a href="<?php echo URL ?>backend/permissions/acl_group">Quản lý nhóm quyền</a>
                </li>
                <li>
                    <a href="#">Pages</a>
                </li>
                <li>
                    <a href="#">Comments</a>
                </li>
            </ul>
        </div>
    </div>