<?php
    $linkControlPanel   = URL::createLink('admin', 'control', 'index');
    $linkMyProfile      = URL::createLink('admin', 'profile', 'index');
    $linkUserManager    = URL::createLink('admin', 'user', 'index');
    $linkAddUser        = URL::createLink('admin', 'user', 'add');
    $linkGroupManager   = URL::createLink('admin', 'group', 'index');
    $linkAddGroup       = URL::createLink('admin', 'group', 'add');
    $linkLogout         = URL::createLink('admin', 'index', 'logout');
    $linkHome           = URL::createLink('admin', 'index', 'index');
?>

<body>
    <div id="border-top" class="h_blue">
        <span class="title"><a href="<?php echo $linkHome; ?>">Administration</a></span>
    </div>

    <!-- HEADER -->
    <div id="header-box">
        <div id="module-status">
            <span class="viewsite"><a href="/bookstore/index.php?module=default&controller=index&action=index"
                    target="_blank">View Site</a></span>
            <span class="no-unread-messages"><a
                    href="<?php echo $linkLogout; ?>">Log out</a></span>
        </div>
        <div id="module-menu">
            <!-- MENU -->
            <ul id="menu">
                <li class="node"><a href="#">Site</a>
                    <ul>
                        <li><a class="icon-16-cpanel" href="<?php echo $linkControlPanel; ?>">Control Panel</a>
                        </li>
                        <li class="separator"><span></span></li>
                        <li><a class="icon-16-profile" href="<?php echo $linkMyProfile; ?>">My Profile</a>
                        </li>
                    </ul>
                </li>
                <li class="separator"><span></span></li>

                <li class="node"><a href="#">Users</a>
                    <ul>
                        <li class="node">
                            <a class="icon-16-user" href="<?php echo $linkUserManager; ?>">User Manager</a>
                            <ul id="menu-com-users-users" class="menu-component">
                                <li><a class="icon-16-newarticle" href="<?php echo $linkAddUser;?>">Add New
                                        User</a></li>
                            </ul>
                        </li>
                        <li class="node">
                            <a class="icon-16-groups" href="<?php echo $linkGroupManager; ?>">Group Manager</a>
                            <ul id="menu-com-users-groups" class="menu-component">
                                <li><a class="icon-16-newarticle" href="<?php echo $linkAddGroup; ?>">Add New
                                        Group</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class=" node"><a href="#">Book Shopping</a>
                    <ul>
                        <li class="node">
                            <a class="icon-16-category"
                                href="/bookstore/index.php?module=admin&controller=category&action=index">Category
                                Manager</a>
                            <ul id="menu-com-users-users" class="menu-component">
                                <li><a class="icon-16-newarticle"
                                        href="/bookstore/index.php?module=admin&controller=category&action=form">Add
                                        New
                                        Category</a></li>
                            </ul>
                        </li>
                        <li class="node">
                            <a class="icon-16-article"
                                href="/bookstore/index.php?module=admin&controller=book&action=index">Book
                                Manager</a>
                            <ul id="menu-com-users-groups" class="menu-component">
                                <li><a class="icon-16-newarticle"
                                        href="/bookstore/index.php?module=admin&controller=book&action=form">Add
                                        New
                                        Book</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

        <div class="clr"></div>
    </div>