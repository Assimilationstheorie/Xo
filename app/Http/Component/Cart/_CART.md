### Php cart
```php
use App\Http\Component\Cart\Cart;
use App\Http\Component\Cart\Addon;
use App\Http\Component\Cart\Product;

// Addons
$a = new Addon(1, 2, 1.50, 1, 'Słuchawki', 0);
echo "Addon cost " . $a->TotalCost() . "<br>";

$a1 = new Addon(2, 1, 2.50, 1, 'Myszka', 2.40);
echo "Addon cost " . $a1->TotalCost() . "<br>";

// Product
$p = new Product(1, 2, 15.44, 2, 'Phone', 15.22);
$p->Addon($a);
$p->Addon($a1);
echo "Product cost " . $p->TotalCost() . "<br>";

// Cart
$c = new Cart(9.99, 100);
$c->Add($p);
$c->Add($p);

echo "<br>";
echo "Products cost " . $c->ProductsCost() . "<br>";
echo "Packing cost " . $c->PackingCost() . "<br>";
echo "Delivery cost " . $c->DeliveryCost() . "<br>";
echo "Cart cost " . $c->TotalCost() . "<br>";
```

### Save, load cart
```php
// Save
$_SESSION['cart'] = serialize($c);

// Load
$cart = unserialize($_SESSION['cart']);

// Show
echo $cart->TotalCost();
```