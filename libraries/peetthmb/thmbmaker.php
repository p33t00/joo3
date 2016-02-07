<?php

defined('_JEXEC') or die;

class PeetLibThmbmaker
{
	static private $allowed_ext = array(
		".jpeg",
		".gif",
		".jpg",
		".png"
		);
	static private $imgInstance;

	static public function mkThbm($img, $dest_w = 160, $dest_h = 105)
	{
		$ext = strtolower(strrchr($img, "."));
		if (in_array($ext, self::$allowed_ext)) 
		{
			$dims = self::getDims($img, $dest_w, $dest_h);
			self::killInstance();
			return $dims;
		}
		die('file suppose to be an image!!!');
	}

	private function getImgInstance($img){
		if(!isset(self::$imgInstance)){
			self::$imgInstance = new JImage($img);
		}
		return self::$imgInstance;
	}

	private function getDims($img, $dest_w, $dest_h){
		$i = self::getImgInstance($img);

		if(($w = $i->getWidth()) == ($h = $i->getHeight())){
			$dims['height'] = $dims['width'] = $dest_h;
		}

		$dims['height'] = $dest_h;
		$dims['width'] = round($w / ($h / $dest_h));

		return $dims;
	}

	private function killInstance(){
		self::$imgInstance = null;
	}
}