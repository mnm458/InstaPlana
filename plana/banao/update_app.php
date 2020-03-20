<?php 
session_start();
ini_set('max_execution_time','9000000');
include_once("admin/database.php");
///////par=a113456bh-Trg90o
$url=getServerURLUPdate();
$ver=$_GET['ver'];
$time = time();
$json=file_get_contents("http://apps.ranksol.com/app_updates/rankpost/update.php?url=$url&ver=$ver");



$arr=json_decode($json,true);
if(is_array($arr)){
    
    
/*foreach($arr['files'] as $key => $val){
    
 if($val['ext'] !="sql")
    file_put_contents($val['name'].".".$val['ext'], file_get_contents("http://apps.ranksol.com/app_updates/rankpost/update/$val[orig]"));
    else
    {
    $sql=file_get_contents("http://apps.ranksol.com/app_updates/rankpost/update/$val[orig]");
    $res=mysqli_query($con,$sql);
   
    }  
    
    
    
} */
if(is_array($arr['sql']) && count($arr['sql'])>0){
  //  print_r($arr['sql']);
   // die();
    foreach($arr['sql'] as $key => $val){
      $file= read_file("http://apps.ranksol.com/app_updates/rankpost/updated_files/$val?time=$time");
    $queryArray = array();
    $queryArray = explode(';',$file);
    for($i=0;$i<count($queryArray);$i++)
        if(trim($queryArray[$i])!='')
        mysqli_query($con,$queryArray[$i]);  
    }

}


if(strlen($arr['zip'])> 3)
{
download_file($arr['zip'],"http://apps.ranksol.com/app_updates/rankpost/updated_files/$arr[zip]?time=$time");
if(class_exists('ZipArchive'))
{
    $dir=dirname(__FILE__);   
    $zip = new ZipArchive;
    $res = $zip->open("$arr[zip]");
    if ($res === TRUE) {
     //   echo 'ok';
        $zip->extractTo("$dir/");
        $zip->close();
    }else{
        echo 'failed, code:' . $res;
    }
}
else{ 
include_once('admin/pclzip.lib.php');
$archive = new PclZip($arr['zip']);
$v_list=$archive->extract();
    if ($v_list == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
}
@unlink($arr['zip']);
}

if(is_array($arr['del']) && count($arr['del'])>0)
{ 
    foreach($arr['del'] as $val_d)
    @unlink($val_d);    
}


   $sql = "select * from rp_general_data where id =1";
   $query = mysqli_query($con,$sql);
   $data = mysqli_fetch_assoc($query);
   
   $settings = $data['data'];
   $setting_array = json_decode($settings,true);
   $setting_array['version'] = $arr['version'];   
   $data2 = json_encode($setting_array);


$sql="update rp_general_data set data='".$data2."' where id=1";
$ress=mysqli_query($con,$sql);
  // if(isset($_GET['errors']))
  //  echo mysql_error();
    if($ress)
    //$url = $url.'post?update=1';
    $_SESSION['msg'] = 'Application has been Updated Successfully';
    else
    $_SESSION['msg'] = 'Opps! Application has not been Updated!';
    $path = $url.'post';
   // header("location:$url");
   echo '<script>window.location.href="'.$path.'"</script>';
?>

<!--<script>window.location('<?=$path;?>')</script>-->
<?php
}
function getServerURLUPdate()
{
$serverName = $_SERVER['SERVER_NAME'];
$filePath = $_SERVER['REQUEST_URI'];
$withInstall = substr($filePath,0,strrpos($filePath,'/')+1);
$serverPath = $serverName.$withInstall;
$applicationPath = $serverPath;

if(strpos($applicationPath,'http://www.')===false)
{
if(strpos($applicationPath,'www.')===false)
$applicationPath = 'www.'.$applicationPath;
if(strpos($applicationPath,'http://')===false)
$applicationPath = 'http://'.$applicationPath;
}

//$url = $applicationPath.'uploads/';

return $applicationPath;
}

function download_file($zip,$url){

    set_time_limit(0);

$fp = fopen (dirname(__FILE__) . '/'.$zip, 'w+');//This is the file where we save the    information

$ch = curl_init(str_replace(" ","%20",$url));//Here is the file we are downloading, replace spaces with %20

curl_setopt($ch, CURLOPT_TIMEOUT, 50);

curl_setopt($ch, CURLOPT_FILE, $fp); // here it sais to curl to just save it

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);//get curl response

 curl_getinfo($ch);

curl_close($ch);

fwrite($fp, $data);//write curl response to file

fclose($fp);

}
function read_file($url){

set_time_limit(0);

$ch = curl_init(str_replace(" ","%20",$url));//Here is the file we are downloading, replace spaces with %20

curl_setopt($ch, CURLOPT_TIMEOUT, 0);

//curl_setopt($ch, CURLOPT_FILE, $fp); // here it sais to curl to just save it

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$data = curl_exec($ch);//get curl response

curl_close($ch);

return $data;



}
?>
