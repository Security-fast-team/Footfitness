<?php 

// Number converter from bangla to english and en2bn 
class Converter2 
{
    public static $bn = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
    public static $en = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];

    public static function bn2en($number)
    {
        return str_replace(self::$bn, self::$en, $number);
    }

    public static function en2bn($number)
    {
        return str_replace(self::$en, self::$bn, $number);
    }
}

function en2bn($bn_number){
   return Converter2::en2bn($bn_number);
}
// uses 
// $a = '১২'; //(12)
// $b = '৫'; //(5)

// $c = Converter::bn2en($a) + Converter::bn2en($b); // $c = 17
// echo Converter::en2bn($c); // ১৭

