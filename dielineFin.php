<!<!DOCTYPE html>
<html>
 <body>

<?php
$formerSize = $_get[“formerSize”];
 $backsealWidth = $_get[“backsealWidth”];
$backsealFoldingDirection =  $_get[“backsealFoldingDirection”];
$formerCenterPosition  = $_get[“formerCenterPosition”];
$repeatLength = $_get[“repeatLength”]; 
$topsealWidth = $_get[“repeatLength”];
$bottomsealWidth = $_get[“bottomselWidth”]; 
$textDirection = $_get[“textDirection”];

$filmWidth = 2*$formerSize + 2*$backsealWidth;

if ($filmWidth/600 > $_get[“repeatLength”]/500) {
    $dielineRatio = $filmWidth/600 }
else { 
    $dielineRatio = $repeatLength/500}

$frontPanelWidth = ($formerSize + 20)/$dielineRatio

if ($backsealFoldingDirection == “right”) {
$eyemarkPositionX = ($filmWidth – 10)/$dielineRatio
$foldingCoveredPositionX = ($filmWidth – 2*$backsealWidth)/$dielineRatio }
else { 
$eyemarkPositionX = 0 
$foldingCoveredPositionX = 0 }

if ($backsealFoldingDirection == “right”) {
if ($formerCenterPosition == “center”) {
	$frontPanelPositionX = ($formerSize/2 + $backsealWidth - 10 )/$dielineRatio}
else { 
       $frontPanelPositionX = ($formerSize/2 + 0.5*$backsealWidth – 10)/$dielineRatio}
}
else {
if ($formerCenterPosition == “center”) { 
 $frontPanelPositionX = ($formerSize/2 + $backsealWidth - 10)/ $dielineRatio
	}
else { 
 $frontPanelPositionX = ($formerSize/2 + 1.5*$backsealWidth – 10)/$dielineRatio}
}
}
?>

<canvas id="dielineCanvas" width="800" height="600" style="border:2px solid #000000;">
</canvas> 
var dieline = document.getElementById("dielineCanvas");
var ctx = dieline.getContext("2d");

<-- 图原点 –>
x0 = 50;
y0 = 100;

eyemarkPositionX = eyemarkPositoinX + x0;
bottomsealPositionY = y0+ (repeatLength – topsealWidth)/dielineRatio;
backsealPositionX = x0+ (filmWidth – backsealWidth)/dielineRatio;

<-- 外框 –>
ctx.rect(x0, y0, filmWidth/dielineRatio, repeatLength/dielineRatio);
ctx.stroke();

<-- front Panel –>
ctx.fillStyle="#F0F0F0”>;
ctx.fillRect(x0+frontPanelPositionX, y0,  frontPanelWidth/dielineRatio, repeatLength/dielineRatio);

<-- 热封区 –>
ctx.fillStyle="#A9A9A9";
ctx.fillRect(x0, y0, filmWidth/dielineRatio, topsealWidth/dielineRatio); 
ctx.fillRect(x0, bottomsealPositionY, filmWidth/dielineRatio, topsealWidth/dielineRatio);
ctx.rect(x0, y0, backsealWidth/dielineRatio, repeatLength/dielineRatio);
ctx.rect(backsealPositionX, y0, backsealWidth/dielineRatio, repeatLength/dielineRatio);

<-- 电眼对比白区 –>
ctx.fillStyle="#EEEEEE";
ctx.fillRect(eyemarkPositionX, y0, 10/dielineRatio, repleatLength/dielineRatio);

<-- 电眼区 –>
ctx.fillStyle="#000000";
ctx.fillRect(eyemarkPositionX, y0, 10/dielineRatio, 5/dielineRatio);
ctx.fillRect(eyemarkPositionX, y0-10+repeatLength/dielineRatio, 10/dielineRatio, 5/dielineRatio);


 </body>
 </html>
