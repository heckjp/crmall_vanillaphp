<?php
namespace Libs;

class CheckLanguage{
    private $allowed_languages;
    private $defaut_lang;
    private $language;

    public function __construct(){
        $this->language= substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $this->allowed_languages = array('en','pt','es','ru','fr');
        $this->default_lang='en';
    }

    public function getLang(){
        in_array($this->language,$this->allowed_languages) ? $lang=$this->language :  $lang=$this->default_lang; 
        return $lang;
    }
}