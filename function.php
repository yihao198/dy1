<?PHP
//echo("qq");
function reg($user,$pass){
global $$user;
if(check_array($user)){
return(-1);
}else{
$$user=array('user'=>$user,'pass'=>$pass,'ip'=>$_SERVER["REMOTE_ADDR"]);
save_array($user);
return(1);
} 
} 

function check_user($user,$pass){
global $$user;
read_array($user);
if(${$user}['pass']<>$pass or !$user){
return(-1);
} else{
return(1);
}
} 

function check_online($user){
global $$user;
read_array($user);
if(${$user}['ip']<>$_SERVER["REMOTE_ADDR"]){
return(-2);
exit();
}
} 

function login($user,$pass){
global $$user;
$data=check_user($user,$pass);
if($data==1){
${$user}['ip']=$_SERVER["REMOTE_ADDR"];
} 
return($data);
} 

function get_data($user,$pass,$name){
global $$user;
$data=check_user($user,$pass);
if($data==-1){
return(-1);
} else{
check_online($user);
return(${$user}[$name]);
} 

} 

function save_data($user,$pass,$name,$value){
global $$user;
$data=check_user($user,$pass);
if($data==-1){
return(-1);
} else{
check_online($user);
${$user}[$name]=$value;
save_array($user);
return(1);
} 

} 


function check_array($array_name){
$file=dirname(__FILE__)."\\".$array_name.".txt";
if(file_exists($file)){
return(true);
} else{
return(false);
}
} 

function read_array($array_name){
global $$array_name;
$file=$array_name.".txt";
$handle = @fopen($file, "r"); 
if($handle){
$$array_name=unserialize(fread($handle, filesize ($file)));
if(!isset($$array_name)){
$$array_name=array();
}
return($$array_name);
} else{
$$array_name=array();
} 
}

function save_array($array_name){
global $$array_name;
$file=dirname(__FILE__)."\\".$array_name.".txt";
file_put_contents($file,serialize($$array_name));
}

function unset_array($array_name){
global $$array_name;
$file=dirname(__FILE__)."\\".$array_name.".txt";
@unlink($file);
$$array_name="";
}


?>