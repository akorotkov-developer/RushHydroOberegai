<?php

class email2img {

	const HEIGHT = 15;
	const OFFSET = 1;
	const UPLOAD_PATH = '/upload/email/';

	protected $path = null;

	public function __construct() {
		$this->path = $_SERVER['DOCUMENT_ROOT'].self::UPLOAD_PATH;
	}

	protected function createFileName($email) {
		return md5('RusHydro_________'.$email.'_'.self::HEIGHT.'_180731').'.png';
	}

	protected function createImage($email, $path) {
		$font 	= dirname(__FILE__).DIRECTORY_SEPARATOR.'tahoma.ttf';
		$size	= 9;

		$box 	= imageftbbox($size, 0, $font, $email);
		$width 	= abs($box[0]) + abs($box[2]) + 2;
		$height = self::HEIGHT;

		$im = imagecreatetruecolor($width, $height);
		//imageantialias($im, false);
		imagesavealpha($im, true);
		imagefill($im, 0, 0, imagecolorallocatealpha($im, 255, 255, 255, 127));

        $c = imagecolorallocate($im, 0, 160, 255);
        imagettftext($im, $size, 0, 0, 11, $c, $font, $email);
//		imageline($im, 0, $height - self::OFFSET, $width, $height - self::OFFSET, $c);

		imagepng($im, $path, 0);
		imagedestroy($im);
	}

	protected function getImagePath($email) {
		$name = $this->createFileName($email);
		$path = $this->path.$name;

		if (!file_exists($path)) {
			$this->createImage($email, $path);
		}

		return self::UPLOAD_PATH.$name;
	}

	public function getImageHtml($email) {
		return '<img style="vertical-align: bottom;" src="'.$this->getImagePath($email).'" />';
	}

	public function pregReplaceEmails($matches) {
		if (strpos($matches[0], 'email-noimg') !== false) {
			return $matches[0];
		}

		return $this->getImageHtml($matches[1]);
	}

	public function parse($text) {
		$text = 
			preg_replace_callback(
				'/<a[^>]*href="mailto:([^"]+)"[^>]*>.+<\/a>/miuU', 
				array($this, 'pregReplaceEmails'), 
				$text
			);

		return $text;
	}

}
