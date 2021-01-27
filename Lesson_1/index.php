<?php

define('TEMPLATES_DIR', './templates/');
define('LAYOUTS_DIR', 'layouts/');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

function render($page, $params = [])
{

	$Menu = ['HOME', 'PRODUCTS',
			'HISTORY' =>
				[
					'About Us',
					'Our Team'
				],
			'SHOWROOM',
			'CONTACT' =>
				[
					'Feedback',
					'Location',
				]
			];

    $Catalog = [
        [
            'name' => 'Product 1',
            'price' =>100
        ],
        [
            'name' => 'Product 2',
            'price' =>200
        ],
        [
            'name' => 'Product 3',
            'price' =>300
        ],
    ];

    return renderTemplate(LAYOUTS_DIR . 'main',
        [
            'header' => renderTemplate('header', ['name' => 'Guest']),
            'menu' => renderTemplate('menu', $Menu),
            'catalog' => renderTemplate('catalog', $Catalog),
            'footer' => renderTemplate('footer')
        ]
    );
}

function renderTemplate($page, $params = []) {
    ob_start();
    $fileName = TEMPLATES_DIR . $page . ".php";

    if (!is_null($params)) {
        extract($params);
    }

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("Такой {$fileName} страницы не существует. 404");
    }

    return ob_get_clean();
}

echo render($page);