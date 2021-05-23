<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('messages.home'), route('home'));
});

// Home > Products
Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('messages.products'), route('product.list'));
});

// Home > Products > [Product]
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('products');
    $trail->push($product->getName(), route('product.show', $product->getId()));
});

// Home > Products > [Product] > Customization
Breadcrumbs::for('customize', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('product', $product);
    $trail->push(__('messages.customize'), route('customization.show', $product->getId()));
});

// Home > My orders
Breadcrumbs::for('orders', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('messages.my_order'), route('order.list'));
});

// Home > my orders > [order]
Breadcrumbs::for('order', function (BreadcrumbTrail $trail, $order) {
    $trail->parent('orders');
    $trail->push(__('messages.order') . ' ' . strval($order->getId()), route('order.show', $order->getId()));
});

// Home > Customizable products
Breadcrumbs::for('customizables', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('messages.customizable_products'), route('customization.list'));
});

// Home > Allied products
Breadcrumbs::for('allied', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('messages.allied_products'), route('ally.index'));
});

// Home > [Search]
Breadcrumbs::for('search', function (BreadcrumbTrail $trail, $term) {
    $trail->parent('home');
    $trail->push("'$term'", route('search.index'));
});
