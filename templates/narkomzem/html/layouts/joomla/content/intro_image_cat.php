<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$params  = $displayData;
?>
<?php $images = json_decode($displayData->params); ?>
<?php if (isset($images->image) && !empty($images->image)) : ?>
	<div class="pull-center item-image"> 
	<?php if (true) : ?>
		<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($params->id));?>"><img
		<?php if ($images->category_layout):
			echo 'class="caption"' . ' title="' . htmlspecialchars($images->category_layout) . '"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image); ?>" alt="<?php echo htmlspecialchars($images->image_alt); ?>" itemprop="thumbnailUrl"/></a>
	<?php else : ?>
		<img
		<?php if ($images->category_layout):
			echo 'class="caption"' . ' title="' . htmlspecialchars($images->category_layout) . '"';
		endif; ?>
		src="<?php echo htmlspecialchars($images); ?>" alt="<?php echo htmlspecialchars($images->image_alt); ?>" itemprop="thumbnailUrl"/>
	<?php endif; ?> 
	</div>
<?php endif; ?>
