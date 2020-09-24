### Php cart
```php
use App\Http\Component\Cart\Cart;
use App\Http\Component\Cart\Addon;
use App\Http\Component\Cart\Product;


$a = new Addon(1, 1, 1.50, 0, 'Słuchawki', 0); // 6.50
echo "Addon cost " . $a->TotalCost() . "<br>";

$a1 = new Addon(2, 1, 2.50, 0, 'Myszka', 0); // 6.50
echo "Addon cost " . $a1->TotalCost() . "<br>";

$p = new Product(1, 1, 15.44, 0, 'Telefon', 0); // 146.50
$p->Addon($a);
$p->Addon($a1);
echo "Product cost " . $p->TotalCost() . "<br>";

$c = new Cart(9.99, 600);
$c->Add($p);
$c->Add($p);
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