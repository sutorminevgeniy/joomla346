<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
?>

<ul itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumb<?php echo $moduleclass_sfx; ?>">
    <?php // Показывать надпись "Вы здесь" ?>
    <?php if ($params->get('showHere', 1)) : ?>
	<li class="active">
	    <?php echo JText::_('MOD_BREADCRUMBS_HERE'); ?>&#160;
	</li>
    <?php else : ?>
	<li class="active">
	    <span class="divider icon-location"></span>
	</li>
    <?php endif; ?>

    <?php
    // Получение списка ссылок
    // Get rid of duplicated entries on trail including home page when using multilanguage
    for ($i = 0; $i < $count; $i++)
    {
	if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link)
	{
	    unset($list[$i]);
	}
    }

    // Найти последние и предпоследние пункты в списке
    end($list);
    $last_item_key = key($list);
    prev($list);
    $penult_item_key = key($list);

    // Сделать ссылку, если не последний элемент
    $show_last = $params->get('showLast', 1);

    // Генерирование хлебных крошек
    foreach ($list as $key => $item) :
	if ($key != $last_item_key) :
	    // Создание всех уровней, кроме последнего пункта - вместе с сепаратором ?>
	    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<?php if (!empty($item->link)) : ?>
		    <a itemprop="item" href="<?php echo $item->link; ?>" class="pathway">
			    <span itemprop="name">
				    <?php echo $item->name; ?>
			    </span>
		    </a>
		<?php else : ?>
		    <span itemprop="name">
			    <?php $item->name; ?>
		    </span>
		<?php endif; ?>

		<?php // Разделитель текста ?>
		<?php if (($key != $penult_item_key) || $show_last) : ?>
		    <span class="divider">
			    <?php echo $separator; ?>
		    </span>
		<?php endif; ?>
		<meta itemprop="position" content="<?php echo $key + 1; ?>">
	    </li>
	<?php elseif ($show_last) :
	// Показывать последний ?>
	    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
		<span itemprop="name">
			<?php echo $item->name; ?>
		</span>
		<meta itemprop="position" content="<?php echo $key + 1; ?>">
	    </li>
	<?php endif;
    endforeach; ?>
</ul>
