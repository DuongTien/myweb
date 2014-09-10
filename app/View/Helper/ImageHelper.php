<?php
class ImageHelper extends AppHelper 
{
    var $helpers = array('Html');
    var $cacheImageFolder = 'cache'; // relative to IMAGES_URL path
    var $htmlAttribute = array();

    /**
     * crop image by size
     * @param $file
     * @param null $fullPath
     * @param null $widthCrop
     * @param null $heightCrop
     * @param array $htmlAttributes
     * @return mixed
     */
    function relative($file, $fullPath = null, $widthCrop = null, $heightCrop = null, $htmlAttributes = array(),$zoom=false)
    {

        if (!$file)
        {
            $this->imageDefault($widthCrop, $heightCrop,$htmlAttributes);
            return;
        }
        $file = $this->getPrettyUrl($file);
        $htmlAttributes += array('alt' =>basename($file));
        $this->htmlAttribute = $htmlAttributes;

        $absPath = str_replace(WWW_ROOT, '', $fullPath);
        $absPath = $this->base.'/'.$absPath.'/'.basename($file);

        $relFile = Configure::read('S.cacheImageDir').'/'.$widthCrop.'-'.$heightCrop.'.'.basename($file); // relative file
        $cacheFile = Configure::read('S.cacheImagePath').'/'.$widthCrop.'-'.$heightCrop.'.'.basename($file);
        if (file_exists($cacheFile))
        {
            if($zoom)
            {
                return '<a class = "zoom" href = "'.$absPath.'">'.$this->Html->image($relFile, $htmlAttributes).'</a>';
            }
            else
            {
                return $relFile;
            }
        }

        //check file existed
        if (!is_dir(Configure::read('S.cacheImagePath'))) {
            mkdir(Configure::read('S.cacheImagePath'), 0777, true);
        }

        if (!is_dir($fullPath)) {
            mkdir($fullPath, 0777, true);
        }
        $url = str_replace('//', '/', $fullPath.'/'.basename($file));
        if (strpos($file, 'http') === 0) {
            if (!Tool::saveImageFromUrl($file, $fullPath)) {
                $this->imageDefault($widthCrop, $heightCrop);
                return;
            }
        }
        if (!basename($file) || !is_file($url)) {
            $this->imageDefault($widthCrop, $heightCrop);
            return;
        }

        //crop image
        $this->cropImage($url, $widthCrop, $heightCrop, $cacheFile);

        if($zoom)
        {
            return '<a class = "zoom" href = "'.$absPath.'">'.$this->Html->image($relFile, $htmlAttributes).'</a>';
        }
        else
        {
            return $relFile;
        }
    }
    function resize($file, $fullPath = null, $widthCrop = null, $heightCrop = null, $htmlAttributes = array(),$zoom=false) 
    {
        
        if (!$file) 
        {
            $this->imageDefault($widthCrop, $heightCrop,$htmlAttributes);
            return;
        }
        $file = $this->getPrettyUrl($file);
        $htmlAttributes += array('alt' =>basename($file));
        $this->htmlAttribute = $htmlAttributes;

        $absPath = str_replace(WWW_ROOT, '', $fullPath);
        $absPath = $this->base.'/'.$absPath.'/'.basename($file);

        $relFile = Configure::read('S.cacheImageDir').'/'.$widthCrop.'-'.$heightCrop.'.'.basename($file); // relative file
        $cacheFile = Configure::read('S.cacheImagePath').'/'.$widthCrop.'-'.$heightCrop.'.'.basename($file);
        if (file_exists($cacheFile)) 
        {
            if($zoom)
            {
                return '<a class = "zoom" href = "'.$absPath.'">'.$this->Html->image($relFile, $htmlAttributes).'</a>';
            }
            else
            {
                return $this->Html->image($relFile, $htmlAttributes);
            }
        }

        //check file existed
        if (!is_dir(Configure::read('S.cacheImagePath'))) {
            mkdir(Configure::read('S.cacheImagePath'), 0777, true);
        }

        if (!is_dir($fullPath)) {
            mkdir($fullPath, 0777, true);
        }
        $url = str_replace('//', '/', $fullPath.'/'.basename($file));
        if (strpos($file, 'http') === 0) {
            if (!Tool::saveImageFromUrl($file, $fullPath)) {
                $this->imageDefault($widthCrop, $heightCrop);
                return;
            }
        }
        if (!basename($file) || !is_file($url)) {
            $this->imageDefault($widthCrop, $heightCrop);
            return;
        }

        //crop image
        $this->cropImage($url, $widthCrop, $heightCrop, $cacheFile);
        
        if($zoom)
        {
            return '<a class = "zoom" href = "'.$absPath.'">'.$this->Html->image($relFile, $htmlAttributes).'</a>';
        }
        else
        {
            return $this->Html->image($relFile, $htmlAttributes);
        }
    }

    /**
     * generate image default
     * @param int $width
     * @param int $height
     * @param array $htmlAttribute
     */
    public function imageDefault($width = 50, $height = 50, $htmlAttribute = array()) {
        $image = 'http://placehold.it/'.$width.'x'.$height;
        $text = '/3C4248&text=' . urlencode(__('No image available'));
        if (Configure::read('debug')) {
            $image .= $text;
        }
        
        if($htmlAttribute) 
        {
            $this->htmlAttribute = $htmlAttribute;
        }
        echo $this->Html->image($image, $this->htmlAttribute);
    }

    /**
     * get pretty url of file
     * @param $file
     * @return mixed|string
     */
    public function getPrettyUrl($file) {

        $file = str_replace('https://', 'http://', $file);
        if (strpos(basename($file), 'safe_image') === 0) {
            $parts = parse_url($file);
            parse_str($parts['query'], $query);
            $file = $query['url'];
        } elseif (strpos($file, 'akamaihd') || strpos($file, 'http://fb') === 0) {
            // image facebook
            $file = FACEBOOK_IMAGE_PREFIX.basename($file);
        }
        $explode = explode('?', $file, 2);
        $file = $explode[0];

        return $file;
    }

    /**
     * crop and save image to cache
     * @param $url
     * @param $widthCrop
     * @param $heightCrop
     * @param $cacheFile
     */
    public function cropImage($url, $widthCrop, $heightCrop, $cacheFile) {
        $types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type

        list($w, $h, $type) = @getimagesize($url);
        if (!$type) {
            debug(__('Can not get info image!'));
            $this->imageDefault($widthCrop, $heightCrop, $this->htmlAttribute);
            return;
        }
        $r = $w / $h;
        $dst_r = $widthCrop / $heightCrop;

        if ($r > $dst_r) {
            $src_w = $h * $dst_r;
            $src_h = $h;
            $src_x = ($w - $src_w) / 2;
            $src_y = 0;
        } else {
            $src_w = $w;
            $src_h = $w / $dst_r;
            $src_x = 0;
            $src_y = ($h - $src_h) / 2;
        }

        $cached = false;
        if (@filemtime($cacheFile) >= @filemtime($url)) {
            $cached = true;
        }

        if (!$cached) {
            $image = call_user_func('imagecreatefrom'.$types[$type], $url);
            if (function_exists("imagecreatetruecolor")) {
                $temp = imagecreatetruecolor($widthCrop, $heightCrop);
                imagecopyresampled($temp, $image, 0, 0, $src_x, $src_y, $widthCrop, $heightCrop, $src_w, $src_h);
            } else {
                $temp = imagecreate ($widthCrop, $heightCrop);
                imagecopyresized($temp, $image, 0, 0, $src_x, $src_y, $widthCrop, $heightCrop, $src_w, $src_h);
            }
            call_user_func("image".$types[$type], $temp, $cacheFile);
            imagedestroy($image);
            imagedestroy($temp);
        }
    }
}