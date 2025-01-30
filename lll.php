<?php
$a=array("course"=>"css","name"=>"phpIntro");
echo $a["course"];

//echo"<br>";
// print_r($a);
$va=array();
$va[]="lana";
$va[]="Hello";
print_r($va);

$stuff=array("name"=>"chuck", "course"=>"PHPIntro");
echo"<br>";
foreach($stuff as $k=>$v)
{
    echo"$k is $v <br>";
}



$products=array("tomato"=>array(
    "price"=>200,
    "color"=>"red",
    "type"=>"vege",
),
"paper"=>array(
    "color"=>"green",
    "price"=>200,
));
echo $products["tomato"]["price"];
echo"<br>";
foreach($products as $k=>$vv)
{
    echo $k."<br>";
    foreach($vv as $k=>$v){
        echo"$k is $v <br>";
    }
}

?>
<form method="post">
pepsi<input type="checkbox" name="pepsi"/>
V7<input type="checkbox" name="V7"/>
suntop<input type="checkbox" name="suntop"/>
<input type="submit" name="ll">
</form> 
<?php

echo $_POST["pepsi"];

print_r($_POST);
?>














