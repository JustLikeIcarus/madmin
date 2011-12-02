<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title><?php echo isset($module_action_title) ? $module_action_title . ' - ' : ''; echo isset($module_title) ? $module_title . ' - ' : ''; echo isset($title) ? $title : ''; ?></title>
	<?php var_dump($css); ?>
	<?php echo isset($css) ? $css : ''; ?>
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php echo isset($js) ? $js : ''; ?>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><?php echo html::anchor('/', html::image('images/logo.png', array('width' => 250, 'alt' => 'las cholas en japon'))); ?></a></h1>
			<h2 class="section_title"><?php echo isset($module_title) ? $module_title : ''; ?></h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<?php if ($Auth->logged_in()): ?>
			<p><?php /*echo $user->name ? $user->name : $user->username;*/ echo $user->username; ?></p>
			<?php echo html::anchor('logout', 'Logout', array('class' => 'logout_user', 'title' => 'Logout')); ?>
			<?php endif; ?>
		</div>
		<div class="breadcrumbs_container">
			<?php if (isset($breadcrumbs)): ?>
			<article class="breadcrumbs">
				<?php 
				$i = 1;
				foreach ($breadcrumbs as $url => $text)
				{
					if ($url == 'current')
					{
						echo '<a class="current">'.$text.'</a>';
					}
					else
					{
						echo html::anchor($url, $text);
					}
					
					if (count($breadcrumbs) > $i)
					{
						echo '<div class="breadcrumb_divider"></div> ';
					}
					
					$i++;
				}
				?>
			</article>
			<?php endif; ?>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<?php if ($Auth->logged_in()): ?>
		
			<form class="quick_search">
				<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
			</form>
			<hr/>
		
			<?php
			foreach ($menus as $section => $menulist)
			{
				echo '<h3>'.$section.'</h3>';

				echo '<ul class="toggle">';
			
				foreach ($menulist as $menu)
				{
					echo '<li class="'.$menu['icon'].'">'.html::anchor($menu['url'], $menu['text']).'</li>';
				}
			
				echo '</ul>';
			}
			?>
		
		<?php else: ?>
		
			<div style="font-size: 14px;line-height: 20px;">
				<p><?php echo isset($guide_text) ? $guide_text : ''; ?></p>
			</div>
		
		<?php endif; ?>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2011 las cholas en jap&#243;n</strong></p>
			<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved"><?php if (isset($module_action_title)) { echo $module_action_title; } elseif (isset($module_title)) { echo $module_title; } else { echo '&nbsp;'; } ?></h3></header>
			
			<?php if ( isset($content) AND ! strpos(trim($content), 'table')): ?>
				<div class="module_content">
			<?php endif; ?>
			
				<?php echo isset($content) ? $content : ''; ?>
				
			<?php if ( isset($content) AND ! strpos(trim($content), 'table')): ?>
				</div>
			<?php endif; ?>
			
		</article>
		
		<div class="spacer"></div>
	</section>


</body>

</html>