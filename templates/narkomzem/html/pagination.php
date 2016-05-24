<?php
 
defined( '_JEXEC' ) or die;
 
function pagination_list_render( $list )
{
    // Reverse output rendering for right-to-left display.
    $html = '<ul>';
    $html .= '<li class="pagination-start">' . $list['start']['data'] . '</li>';
    $html .= '<li class="pagination-prev">' . $list['previous']['data'] . '</li>';

    foreach ($list['pages'] as $page)
    {
	    $html .= '<li>' . $page['data'] . '</li>';
    }

    $html .= '<li class="pagination-next">' . $list['next']['data'] . '</li>';
    $html .= '<li class="pagination-end">' . $list['end']['data'] . '</li>';
    $html .= '</ul>';

    return $html;
}
 
function pagination_item_active( &$item )
{
    $title = '';
    $class = '';

    if (!is_numeric($item->text))
    {
	    JHtml::_('bootstrap.tooltip');
	    $title = ' title="' . $item->text . '"';
	    $class = 'hasTooltip ';
    }
    
    $app = JFactory::getApplication();
    if ($app->isAdmin())
    {
	    return '<a' . $title . ' href="#" onclick="document.adminForm.' . $this->prefix
	    . 'limitstart.value=' . ($item->base > 0 ? $item->base : '0') . '; Joomla.submitform();return false;">' . $item->text . '</a>';
    }
    else
    {
	    return '<a' . $title . ' href="' . $item->link . '" class="' . $class . 'pagenav">' . $item->text . '</a>';
    }
}
 
function pagination_item_inactive( &$item )
{
    $app = JFactory::getApplication();
    if ( $app->isAdmin()) 
    {
	    return '<span>' . $item->text . '</span>';
    }
    else
    {
	    return '<span class="pagenav">' . $item->text . '</span>';
    }
}

