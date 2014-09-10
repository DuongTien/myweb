<?php

/**
 * All functions that not related to cakephp should be here
 */
class Tool 
{
    public static function uploadFile($dirPath,$data,$allow=null)
    {

        if(empty($data['name']))
        {
            return null; // No file uploaded
        }
        
        $name = $data['name'];
        $alias = Tool::getAlias($name);
        $tmp = $data['tmp_name'];
        
        /* ---------- Check size { ---------- */
//        if($data['size'] > 10000)
//        {
//            return false;
//        }
        /* ---------- Check size } ---------- */
        
        /* ---------- Check ext { ---------- */
        $ext = substr($name, strrpos($name, '.') + 1);
        $ext = strtolower($ext);
                
        if(empty($allow))
        {
            $allow = array
            (
                'jpg','png','gif','bmp',
                'flv','swf','mp3','wav',
                'pdf','doc','docx','xls','xlsx','ppt','pptx','txt',
                'xml','sql',
                'rar','zip','gz','psd'
            );
        }
        else if($allow == 'image')
        {
            $allow = array('jpg','png','gif','bmp');
        }

        $has = false;
        
        if(!is_array($allow))
        {
            $allow = array($allow);
        }
        
        foreach($allow as $item)
        {           
            if($ext == $item)
            {
                $has = true;
                break;
            }
        }
        
        if($has == false)
        {
            return UPLOAD_INVALID_TYPE;
        }
        /* ---------- Check ext } ---------- */
        
        Tool::createDir($dirPath);

        $newName = time().'_'.$name;
        move_uploaded_file($tmp, $dirPath.'/'.$newName);
        chmod($dirPath.'/'.$newName, 0777);
        return $newName;
    }
    
    /**
     * upload multiple file at a time
     *
     * @throws NotFoundException
     * @param string $dirPath: dir path to upload
     * @param array $data: data uploaded
     * @param array $allow: extensions allowed to upload
     * @return void
     */
    public static function uploadMultipleFile($dirPath,$data,$allow=null)
    {
        $fileNames = array();
        foreach($data as $key=>$item)
        {
            if(!empty($item['name']))
            {
                $fileNames[$key] = Tool::uploadFile($dirPath,$item,$allow);
            }
        }
        
        return $fileNames;
    }
    
    /**
     * move files uploaded from tmp directory to destination directory
     *
     * @throws NotFoundException
     * @param string $toDir: destination directory
     * @param array $files: list of file names to move
     * @return void
     */
    public static function moveUploadFile($toDir,$files)
    {
        Tool::createDir($toDir);
        $fromDir = Configure::read('S.uploadDir.tmp');
        
        if(is_array($files))
        {
            foreach($files as $file)
            {
                if($file == UPLOAD_INVALID_TYPE || $file == UPLOAD_INVALID_SIZE)
                {
                    // Do nothing
                }
                else
                {
                    if(file_exists($fromDir.$file))
                    {
                        if (@copy($fromDir.$file,$toDir.$file))
                        {
                            unlink($fromDir.$file);
                        }     
                    }    
                }
            }
        }
        else
        {
            if(file_exists($fromDir.$files))
            {
                if (@copy($fromDir.$files,$toDir.$files))
                {
                    unlink($fromDir.$files);
                }     
            }
        }
    }
    
    public static function createDir($dirPath)
    {
        if(!is_dir($dirPath))
        {
            mkdir($dirPath, 0777);
            chmod($dirPath, 0777);
        }
    }
    
    public static function getFileExtension($str) 
    {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }
    
    public static function getAlias($str)
    {
        $result = trim($str);
        $result = str_replace(array('!','@','#','$','%','^','&','*','(',')','{','}','\"','\'','<','>',',','.','?','\\','/',':','|','+','=','~','`'),'',$result); // 1 byte
        $result = str_replace(array('！','＠','＃','＄','％','＾','＆','＊','（','）','｛','｝','\“','\‘','＜','＞','、','。','？','\￥','／','：','｜','＋','＝','～','‘'),'',$result); // 2 byte
        $result = str_replace(' ','-',$result); // 1 byte
        $result = str_replace('　','-',$result); // 2 byte
        
        while(strpos($result,'--') != false)
        {
            $result = str_replace('--','-',$result);
        }
        
        //$result = $result.URL_EXT;
        
        return mb_strtolower($result,'utf8');
    }
    
    public static function delDir($dirName)
    {
        if(is_dir($dirName))
        {
            if (is_dir($dirName))
            $dirHandle = opendir($dirName);
            if (!$dirHandle)
                return false;
            while($file = readdir($dirHandle))
            {
                if ($file != "." && $file != "..") 
                {
                    if (!is_dir($dirName."/".$file))
                    unlink($dirName."/".$file);
                    else
                    {
                        $a=$dirName.'/'.$file;
                        Tool::delDir($a);
                    }
                }
            }
            closedir($dirHandle);
            rmdir($dirName);
            return true;
        }
     }


    public static function saveImageFromUrl($url, $path = null) {
        $imageName = basename($url);
        if (!$path) {
            $path = Configure::read('S.uploadDir');
        }

        $file = @file_get_contents($url);
        if (trim($file)) {
            if (@file_put_contents(str_replace('//', '/', $path.'/'.$imageName), $file)) {
                return $imageName;
            };
        }
        return null;
    }
}









/**
 * Remove last slash.
 * @param $sStr
 * @return string
 */
function rmvLastSlash($sStr)
{
    return rtrim($sStr, '/');
}
function sqle($str) {
    return mysql_real_escape_string($str);
}
function seo($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    return str_replace('_', '-', strtolower( Inflector::slug($str) ));
}
function toolEncode($data) {
    return base64_encode(json_encode($data));
}
function toolDecode($data) {
    return json_decode(base64_decode($data), true);
}
function findIp() {
    if(getenv("HTTP_CLIENT_IP")) {
        return getenv("HTTP_CLIENT_IP");
    } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
        return getenv("HTTP_X_FORWARDED_FOR");
    } else {
        return getenv("REMOTE_ADDR");
    }
}

if (!function_exists('vd')) {
    function vd($var = false, $trace = 1, $showHtml = false, $showFrom = true) {
        if ($showFrom) {
            $calledFrom = debug_backtrace();
            for ($i = 0; $i < $trace; $i++) {
                if (!isset($calledFrom[$i]['file'])) {
                    break;
                }
                echo substr($calledFrom[$i]['file'], 1);
                echo ' (line <strong>' . $calledFrom[$i]['line'] . '</strong>)';
                echo "<br />";
            }
        }
        echo "<pre class=\"cake-debug\">\n";

        $var = var_dump($var);
        if ($showHtml) {
            $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
        }
        echo $var . "\n</pre>\n";
    }
    function vdd($var = false, $trace = 1, $showHtml = false, $showFrom = true) {
        if ($showFrom) {
            $calledFrom = debug_backtrace();
            for ($i = 0; $i < $trace; $i++) {
                if (!isset($calledFrom[$i]['file'])) {
                    break;
                }
                echo substr($calledFrom[$i]['file'], 1);
                echo ' (line <strong>' . $calledFrom[$i]['line'] . '</strong>)';
                echo "<br />";
            }
        }
        echo "<pre class=\"cake-debug\">\n";

        $var = var_dump($var);
        if ($showHtml) {
            $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
        }
        echo $var . "\n</pre>\n";
        die;
    }

    function getData($sUrl, $aData = null) {
        $mCurlHandle = curl_init($sUrl);
        $sCookiePath = '/tmp/cookies.txt';
        if (empty($aData)) {
            curl_setopt($mCurlHandle, CURLOPT_CUSTOMREQUEST, "GET");
        } else {
            $sData = json_encode($aData);
            curl_setopt($mCurlHandle, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($mCurlHandle, CURLOPT_POSTFIELDS, $sData);
            curl_setopt($mCurlHandle, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($sData)));
        }
        curl_setopt($mCurlHandle, CURLOPT_COOKIEJAR, $sCookiePath);
        curl_setopt($mCurlHandle, CURLOPT_COOKIEFILE, $sCookiePath);
        curl_setopt($mCurlHandle, CURLOPT_RETURNTRANSFER, true);
        $sResult = curl_exec($mCurlHandle);

        return $sResult;
    }
}

function getCurrencyBrainTree()
{
    $html = new DOMDocument();
    @$html->loadHTML(file_get_contents('https://www.braintreepayments.com/docs/php/reference/currencies'));
    $divs = $html->getElementsByTagName('ul');
    foreach($divs as $div) {
        if ($div->getAttribute('class') || $div->getAttribute('id')) {
            continue;
        }
        $events[] = $div->nodeValue;
        break;
    }
    $events = nl2br($events[0]);
    $explode = explode('<br />', $events);
    $currency = array();
    foreach ($explode as $li) {
        if (!trim(strip_tags($li))) {
            continue;
        }
        $explodeLi = explode(' - ', $li, 2);
        $currency[] = array(
            'name' => trim($explodeLi[0]),
            'code' => trim($explodeLi[1])
        );
    }
    return $currency;
}
function distance($lat1, $lng1,$lat2, $lng2)
{
    //list($lat1, $lng1) = $location1;
    //list($lat2, $lng2) = $location2;
    $dp = deg2rad(abs($lat1 - $lat2));
    $dr = deg2rad(abs($lng1 - $lng2));
    $p =  deg2rad($lat1 + (($lat2 - $lat1) / 2));
    $m = 6335439 / sqrt(pow((1 - 0.006694 * pow(sin($p), 2)), 3));
    $n = 6378137 / sqrt(1 - 0.006694 * pow(sin($p), 2));
    //$d = round(sqrt(pow(($m * $dp), 2) + pow(($n * cos($p) * $dr), 2)), 4);
    $d = sqrt(pow(($m * $dp), 2) + pow(($n * cos($p) * $dr), 2));
    return $d;
}

/**
 * @param $lat1
 * @param $lng1
 * @param $lat2
 * @param $lng2
 * @param $unit : 'K' => 'Km', 'M' => 'Miles', 'N' => 'Nautical Miles'
 * @return float
 */
function getDistance($lat1, $lng1, $lat2, $lng2, $unit = 'K') {
     $theta = $lng1 - $lng2;
     $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
     $dist = acos($dist);
     $dist = rad2deg($dist);
     $miles = $dist * 60 * 1.1515;
     $unit = strtoupper($unit);

    switch ($unit) {
        case 'K':
            $distance = $miles * 1.609344;
            break;
        case 'N':
            $distance = $miles * 0.8684;
            break;
        default:
            $distance = $miles;
            break;
    }
    return $distance;
}
