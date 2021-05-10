<?php
    $imgURL = $this->_dirImg;
    $arrMenu = array(
        array('link' => URL::createLink('admin', 'book', 'add'), 'name' => 'Add new book', 'image' => 'icon-48-article-add'),
        array('link' => URL::createLink('admin', 'book', 'index'), 'name' => 'Book manager', 'image' => 'icon-48-article'),
        array('link' => URL::createLink('admin', 'group', 'index'), 'name' => 'Group manager', 'image' => 'icon-48-groups'),
        array('link' => URL::createLink('admin', 'user', 'index'), 'name' => 'User manager', 'image' => 'icon-48-user')
    );
    $xhtml = '';
    foreach($arrMenu as $key => $value){
        $image = $imgURL . '/header/' . $value['image'].'.png'; 
        $xhtml .= '<div class="icon-wrapper">
                    <div class="icon">
                        <a href="'.$value['link'].'">
                            <img src="'.$image.'" alt="'.$image.'">
                            <span>'.$value['name'].'</span>
                        </a>
                    </div>
                </div>';
    }
?>

<div id="element-box">
    <div id="system-message-container"></div>
    <div class="m">
        <div class="adminform">
            <div class="cpanel-left">
                <div class="cpanel">
                    <?php echo $xhtml; ?>
                </div>
            </div>

        </div>
        <div class="clr"></div>
    </div>
</div>