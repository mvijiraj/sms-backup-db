<?php
$x=5; // global scope
function myTest()
{//using x insede thjis function will gwnerate an error
echo "<p>variable x inside function is: $x</p>";
}
MyTest();
echo "<p>variable x outside function is: $x</p>";
?>