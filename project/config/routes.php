<?php
	use \Core\Route;
	
	return [
		new Route('/', 'main', 'index'),
		new Route('/category/:id', 'site', 'category'),
		new Route('/site/:id', 'site', 'one'),
		new Route('/sites/', 'site', 'all'),
		new Route('/add_site/', 'site', 'form'),
		new Route('/add_form_handler/', 'site', 'add'),
	];