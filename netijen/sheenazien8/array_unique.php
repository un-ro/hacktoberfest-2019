<?php
$array = ['97502501365',
'88831561810',
'9771909534',
'99001279563',
'88831707642',
'9771909421',
'99001278093',
'88831707642',
'99001279633',
'12631608992',
'9771901153',
'12631500162',
'99001277916',
'9771909495',
'99026523210',
'9771909541',
'99001279714',
'9771909455',
'12631462432',
'12631463014',
'9771907177',
'12631462885',
'12631462885',
'12631334704',
'88831706080',
'99001281092',
'99026525236',
'99026525170',
'99026527896',
'99026527513',
'99026515521',
'99026527631',
'99026525343',
'99026525343'];
$jml = count($array);
$wrapper = [];
echo $jml . PHP_EOL;
$rslt = [];
$result = [];
function addArray($wrapper, $array){
    return $wrapper;
}
for ($i = 0; $i <$jml ; $i++) {
    foreach ($array as $index => $value) {
        $wrapper[$i] = $array[$i];
        // echo (count($wrapper) - 1) .' ' . $index . PHP_EOL;
        if($index == (count($wrapper) - 1)){
            // echo $i . $index . PHP_EOL;
            $rslt = addArray($wrapper[$i], $array[$i]);
            if(!in_array($rslt, $result)){
                $result[$i] = $rslt;
            }else{
                continue;
            }
        }
    }
}
echo count($result) . PHP_EOL;
echo implode (", ", $result);
