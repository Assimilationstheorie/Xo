## Shopping cart

### Import classes
```php
<?php
use App\Http\Component\Cart\Addon;
use App\Http\Component\Cart\Product;
use App\Http\Component\Cart\ShoppingCart;
?>
```

### Create addon
```php
<?php
$a = new Addon(1, 3.50, 2, 0, 'Spinacz');

// Show
echo $a->Cost();
echo $a->PackingCost();
?>
```

### Create product
```php
<?php
$p = new Product(1, 4.50, 1, 1, 'iPhone case');
$p->Addon($a);

// Show
echo $p->Cost();
echo $p->PackingCost();
?>
```

### Cart
```php
<?php
// Create cart
$cart = new ShoppingCart(9.99, 60);
$cart->Add($p);
$cart->Add($p);

// Show
echo $cart->Cost();
echo $cart->PackingCost();
echo $cart->DeliveryTotalCost();
?>
```

### Save, load cart
```php
<?php
use App\Http\Component\Cart\Addon;
use App\Http\Component\Cart\Product;
use App\Http\Component\Cart\ShoppingCart;

// Session
session_start();

// Shop id or alias
$id = 123;

// Load cart from session
$cart = unserialize($_SESSION['cart'][$id]);

// Do something with cart
if(!empty($cart))
{
	// Show
	echo $cart->Cost();
	echo $cart->PackingCost();
	echo $cart->DeliveryTotalCost();
}

// Save cart to session
$_SESSION['cart'][$id] = serialize($cart);
?>
```