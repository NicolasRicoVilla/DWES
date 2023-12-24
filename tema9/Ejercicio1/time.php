<?php
require '../../vendor/autoload.php';

use SebastianBergmann\Timer\Timer;
use SebastianBergmann\Timer\ResourceUsageFormatter;

$timer = new Timer;

$timer->start();

for($i = 0; $i < 1000000; $i++) {
    echo $i;
}
echo "\n";
print(new ResourceUsageFormatter)->resourceUsage($timer->stop());

?>