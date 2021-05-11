<?php


        $userObj = Session::get('user');
        $arrMenu = array();
        $arrMenu[] = array('class' => 'index-index', 'link' => URL::createLink('default', 'index', 'index'), 'name' => 'Home');
        $arrMenu[] = array('class' => 'category-index', 'link' => URL::createLink('default', 'category', 'index'), 'name' => 'Category');

        // logged
        if (isset($userObj['login'])) {
            $arrMenu[] = array('class' => 'user-index', 'link' => URL::createLink('default', 'user', 'index'), 'name' => 'My Account');
            $arrMenu[] = array('class' => 'index-logout', 'link' => URL::createLink('default', 'index', 'logout'), 'name' => 'Logout');
        } else{
            $arrMenu[] = array('class' => 'index-register', 'link' => URL::createLink('default', 'index', 'register'), 'name' => 'Register');
            $arrMenu[] = array('class' => 'index-login', 'link' => URL::createLink('default', 'index', 'login'), 'name' => 'Login');
        }

        // have permission
        if(isset($userObj['group_acp'])){
            $arrMenu[] = array('class' => '', 'link' => URL::createLink('admin', 'index', 'login'), 'name' => 'Admin Control Panel');
        }

        $xhtml = '';
        foreach($arrMenu as $key => $value){
            $xhtml .= '<li class="'.$value['class'].'"><a href="'.$value['link'].'">'.$value['name'].'</a></li>';
        }       
?>

<div class="header">
    <div class="logo">
        <a href="index.html"><img src="<?php echo $this->_dirImg; ?>/logo.gif" /></a>
    </div>
    <div id="menu">
        <ul>
            <?php echo $xhtml; ?>
        </ul>
    </div>
</div>