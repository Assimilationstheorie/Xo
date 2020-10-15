### Menu panel sample
```php
<?php
namespace App\Http\View\Menu;

use App\Http\View\Menu\MenuPanel;

$m = new MenuPanel();
// Part
$m->AddLink('/panel/orders', '/panel/orders/all', 'Orders');
$m->AddSubLink('/panel/orders', '/panel/orders/all', 'All');
$m->AddSubLink('/panel/orders', '/panel/orders/add', 'Add');
// Part
$m->AddLink('/panel/profil', '/panel/profil/info', 'Profil');
$m->AddSubLink('/panel/profil', '/panel/profil/info', 'Info');
$m->AddSubLink('/panel/profil', '/panel/profil/avatar', 'Avatar');
$m->AddSubLink('/panel/profil', '/panel/profil/pass', 'Password');
// Get html
$main = $m->ShowMain();
$sub = $m->ShowSub();
?>
```