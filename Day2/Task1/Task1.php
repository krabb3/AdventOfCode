<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 22.03.2019
 * Time: 5:18 PM
 */
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
foreach ($input as $letter){
    echo $letter. '<br/>';
}
