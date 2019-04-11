<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 10.04.2019
 * Time: 8:40 PM
 */
$input = file('input.txt');

$count = 0;
foreach ($input as $word){
    if(preg_match('/(.)\1/', $word)){
        if(preg_match('/\w*[aeiou]\w*[aeiou]\w*[aeiou]\w*/', $word)){
            if(strpos($word, 'ab') === false && strpos($word, 'cd') === false && strpos($word, 'pq') === false && strpos($word, 'xy') === false){
                ++$count;
            }
        }
    }
}
echo $count;