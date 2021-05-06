<?php
class Helper
{
    // CREATE BUTTON
    public static function cmsButton($name, $id, $link, $icon, $type = 'new')
    {
        $xhtml = '<li class="button" id="'. $id .'">';
                    
        if ($type == 'new') {
            $xhtml .= '<a class="modal" href="'.$link.'"><span class="'.$icon.'"></span>'.$name.'</a>';
        } elseif ($type = 'submit') {
            $xhtml .= '<a class="modal" href="#" onclick="javascript:submitForm(\''.$link.'\');"><span class="'.$icon.'"></span>'.$name.'</a>';
        }
        $xhtml .= '</li>';
        return $xhtml;
    }

    // CREATE Icon STATUS
    public static function cmsStatus($value, $link, $id)
    {
        $className = ($value == 0) ? 'unpublish' : 'publish';
        $xhtml = '<a class="jgrid" id="status-'. $id .'" href="javascript:changeStatus(\''. $link .'\');"> 
                    <span class="state '.$className.'"></span>
                    </a>';
        return $xhtml;
    }

    // Create Icon Group ACP
    public static function cmsGroupACP($groupAcpValue, $link, $id)
    {
        $strGroupACP 	= ($groupAcpValue == 0) ? 'unpublish' : 'publish';
    
        $xhtml			= '<a class="jgrid" id="group-acp-'.$id.'" href="javascript:changeGroupACP(\''.$link.'\');">
								<span class="state '.$strGroupACP.'"></span>
							</a>';
        return $xhtml;
    }

    // CREATE DATE FORMAT
    public static function formartDate($format, $value)
    {
        $result = '';
        if (!empty($value) && $value !='0000-00-00') {
            $result = date($format, strtotime($value));
        }
        // echo '<h3>'.$result .'</h3>';

        return $result;
    }

    // Create Title sort
	public static function cmsLinkSort($name, $column, $columnPost, $orderPost){
        echo $column .'<br/>';
        // echo $columnPost;
		$img	= '';
		$order	= ($orderPost == 'desc') ? 'asc' : 'desc';
		if($column == $columnPost){
			$img	= '<img src="'.TEMPLATE_URL.'admin/main/images/admin/sort_'.$orderPost.'.png" alt="">';
		}else{
            // echo 'error';
        }
		$xhtml = '<a href="#" onclick="javascript:sortList(\''.$column.'\',\''.$order.'\')">'.$name.$img.'</a>';
		return $xhtml;
	}
}