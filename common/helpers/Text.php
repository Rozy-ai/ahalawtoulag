<?php
namespace common\helpers;
use Yii;

class Text{

    public static function translit($text)
    {
        $matrix=array(
            /*"А"=>"a","Б"=>"b","В"=>"v","Г"=>"g","Д"=>"d",
            "Е"=>"e","Ё"=>"yo","Ж"=>"j","З"=>"z","И"=>"i",
            "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
            "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
            "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"c","Ч"=>"ch",
            "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
            "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"yo","ж"=>"j",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
            "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",*/
            //tm
            "ä"=>"a","ü"=>"u","ç"=>"ch","ý"=>"y","ň"=>"n","ö"=>"o",
            "ş"=>"sh","ž"=>"j",
            "Ä"=>"a","Ü"=>"u","Ç"=>"ch","Ý"=>"y","Ň"=>"n","Ö"=>"o",
            "Ş"=>"sh","Ž"=>"j",
            "«"=>"","»"=>""," "=>"-","."=> "", "/"=> "-","\""=>"","'"=>"","&"=>""
        );

        $text = strtr(trim(mb_strtolower($text,"utf-8")),$matrix);
        $text = str_replace("--", "-", $text);
        $text = str_replace(",", "", $text);

        return $text;
    }

    public static function stripTags($text)
    {
        $output = "";

        if(strlen(strip_tags(trim($text)))>0 )
            $output = trim(strip_tags(html_entity_decode(stripslashes(nl2br($text)),ENT_NOQUOTES,"Utf-8")));

        return $output;
    }



    public static function text_divider($description, $length){
        $description = strip_tags($description);
        if( strlen(trim($description)) > 0 ){
            $description = mb_substr($description, 0, $length, "utf-8");
            $description = rtrim($description, "!,.-");
            if(intval(strrpos($description, ' '))>0){
                $description = substr($description, 0, strrpos($description, ' '));
            }
        }

        //mb_substr($this->stripTags(str_replace("&nbsp;", " ", preg_replace( "/\r|\n/", "",$descriptionSeleted))),0,150,"utf-8")

        return $description;
    }

    public static function IsEmpty($text){
        return (isset($text) && strlen(trim($text)) > 0 );
    }

    public static function CheckForNull($text){
        return $text ? $text : '';
    }

    public static function Pre($model, $die = null){
        echo'<pre>';
        print_r($model);
        echo'</pre>';

        if($die == null)
            die;
    }

    public static function FormattingOff($text){
        $text = str_replace('<img src=','<img class="img-responsive" src=',$text);
        $text = str_replace('<ul>','<ul class="textList">',$text);
        return $text ? $text : '';
    }

    public static function PtoBr($text){
        $text = str_replace(array('<p>','</p>'),array('','<br /><br />'),$text);
        return $text ? $text : '';
    }

    public static function get_paragraphs($text){
        $pattern="!<p>(.+?)</p>!sim";
        preg_match_all($pattern,$text,$matches,PREG_PATTERN_ORDER);
        return $matches;
    }
}
