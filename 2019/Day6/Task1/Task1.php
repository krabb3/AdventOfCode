<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */


$input = file('input.txt');
$allOrbits = [];
$way = [];
foreach ($input as $orbit){
    $orbitArr = explode(')', $orbit);
    $orbitArr[0] = trim($orbitArr[0]);
    $orbitArr[1] = trim($orbitArr[1]);
    if(!in_array($orbitArr[0], $allOrbits, true)){
        $allOrbits[] = $orbitArr[0];
    }
    if(!in_array($orbitArr[1], $allOrbits, true)){
        $allOrbits[] = $orbitArr[1];
    }
    $way[$orbitArr[0]][$orbitArr[1]] = $orbitArr[1];
}
$counter = 0;
foreach($allOrbits as $orbit){
    $search = $orbit;
    while(true){
        $search = multiDimSearch($way, $search, $search);
        if($search){
            $counter++;
            continue;
        }
        break;
    }

}
echo $counter;
function multiDimSearch($products, $field, $value)
{
    foreach($products as $key => $product)
    {
        if ( $product[$field] ?? null === $value )
            return $key;
    }
    return false;
}
?>
<body style="background-color: black; color: white;"></body>
