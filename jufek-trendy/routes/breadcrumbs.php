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

// Admin Menu
Breadcrumbs::for('adminmenu', function (BreadcrumbTrail $trail) {
    $trail->push(__('messages.admin_menu'), route('admin.home'));
});

//Admin Menu > Products
Breadcrumbs::for('productmenu', function (BreadcrumbTrail $trail) {
    $trail->parent('adminmenu');
    $trail->push(__('messages.menu_products'), route('admin.product.menu'));
});

//Admin Menu > Products > Create Product
Breadcrumbs::for('createproduct', function (BreadcrumbTrail $trail) {
    $trail->parent('productmenu');
    $trail->push(__('messages.create_product'), route('admin.product.create'));
});

//Admin Menu > Products > List Products
Breadcrumbs::for('listproduct', function (BreadcrumbTrail $trail) {
    $trail->parent('productmenu');
    $trail->push(__('messages.list_products'), route('admin.product.list'));
});

//Admin Menu > Products > List Products > Product
Breadcrumbs::for('showproduct', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('listproduct');
    $trail->push($product->getName(), route('admin.product.show', $product->getId()));
});

//Admin Menu > Orders
Breadcrumbs::for('ordermenu', function (BreadcrumbTrail $trail) {
    $trail->parent('adminmenu');
    $trail->push(__('messages.menu_orders'), route('admin.order.menu'));
});

//Admin Menu > Orders > List Orders
Breadcrumbs::for('listorder', function (BreadcrumbTrail $trail) {
    $trail->parent('ordermenu');
    $trail->push(__('messages.list_orders'), route('admin.order.list'));
});

//Admin Menu > Orders > List Orders > Order
Breadcrumbs::for('showorder', function (BreadcrumbTrail $trail, $order) {
    $trail->parent('listorder');
    $trail->push(__('messages.order') . ' ' . $order->getId(), route('admin.order.show', $order->getId()));
});

//Admin Menu > Categories
Breadcrumbs::for('categorymenu', function (BreadcrumbTrail $trail) {
    $trail->parent('adminmenu');
    $trail->push(__('messages.menu_categories'), route('admin.category.menu'));
});

//Admin Menu > Categories > Create Category
Breadcrumbs::for('createcategory', function (BreadcrumbTrail $trail) {
    $trail->parent('categorymenu');
    $trail->push(__('messages.create_category'), route('admin.category.create'));
});

//Admin Menu > Categories > List Categories
Breadcrumbs::for('listcategory', function (BreadcrumbTrail $trail) {
    $trail->parent('categorymenu');
    $trail->push(__('messages.list_categories'), route('admin.category.list'));
});

//Admin Menu > Categories > List Categories > Category
Breadcrumbs::for('showcategory', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('listcategory');
    $trail->push($category->getName(), route('admin.category.show', $category->getId()));
});

//Admin Menu > Customizations
Breadcrumbs::for('customizationmenu', function (BreadcrumbTrail $trail) {
    $trail->parent('adminmenu');
    $trail->push(__('messages.menu_customizations'), route('admin.customization.menu'));
});

//Admin Menu > Customizations > Create Customization
Breadcrumbs::for('createcustomization', function (BreadcrumbTrail $trail) {
    $trail->parent('customizationmenu');
    $trail->push(__('messages.create_customization'), route('admin.customization.create'));
});

//Admin Menu > Customizations > List Customizations
Breadcrumbs::for('listcustomization', function (BreadcrumbTrail $trail) {
    $trail->parent('customizationmenu');
    $trail->push(__('messages.list_customizations'), route('admin.customization.list'));
});

//Admin Menu > Customizations > List Customizations > Customization
Breadcrumbs::for('showcustomization', function (BreadcrumbTrail $trail, $customization) {
    $trail->parent('listcustomization');
    $trail->push($customization->getName(), route('admin.customization.show', $customization->getId()));
});
