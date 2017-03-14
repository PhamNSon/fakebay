<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Fashion, Sport, Electronic and More | Ebay Fake';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('other.css') ?>
	<?= $this->Html->css('bootstrap-datetimepicker.min.css') ?>
	
	
	<?= $this->Html->script('jquery-3.1.1.min.js') ?>
	<?= $this->Html->script('bootstrap.min.js') ?>
	<?= $this->Html->script('bootstrap-datetimepicker.min.js') ?>
	<?= $this->Html->script('bootstrap-datetimepicker.en.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class = "navbar navbar-inverse">
		<div class = "container-fluid">
			<div class = "navbar-header">
				<button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "" aria-expanded = "false">
					<span class = "sr-only">Toggle navigation</span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
				<?php echo $this->Html->link('Best Ebay', ['controller' => 'Products', 'action' => 'index'], ['class' => 'navbar-brand']); ?>
			</div>

			<div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
				<ul class = "nav navbar-nav">
					<li><?php echo $this->Html->link('Products', ['controller' => 'Products', 'action' => 'index']); ?></li>
					<li class = "dropdown">
						<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">Categories<span class = "caret"></span></a>
						<ul class = "dropdown-menu"> 
							<?php foreach ($query as $drp): ?>
								<li><?= $this->Html->link($drp->name, ['controller' => 'Products', 'action' => 'categorydetail', $drp->id]); ?></li>
							<?php endforeach; ?>
						</ul>
					</li>
					<li><?php echo $this->Html->link('About Us', ['controller' => 'Products', 'action' => 'about']); ?></li>
				</ul>
				<ul class="nav navbar-nav navbar-right ">
					<?php 
						$session = $this->request->session();
						$user = $session->read('actlogin');
					?>
					<li>
					<?php 
						if ($user) {						
							echo '<li class="text-uppercase">';
							echo $this->Html->link('Welcome, '.$user['name'], ['controller' => 'Users', 'action' => 'view', $user['id']]);
							echo '</li>';
							echo '<li>';
							echo $this->Html->link('Profile', ['controller' => 'Users', 'action' => 'view', $user['id']]);
							echo '</li>';
						}else {
							echo '<li>';
							echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']); 
							echo '</li>';
						}
					?>
					</li>
					<li>
					<?php
						if ($user) {
							echo $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']);
						}else {
							echo $this->Html->link('Register', ['controller' => 'Users', 'action' => 'register']); 
						}						
					
					?></li>
				</ul>
			</div>
		</div>
    </nav>
	<div class="text-center">
		<legend><?= $this->Flash->render() ?></legend>
	</div>
    <div class = "container-fluid clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
