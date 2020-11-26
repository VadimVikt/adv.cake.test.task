<?php

class InversionWordInString
{
    private $arUpLowCase = [];

    /**
     * This method inverts the string
     * @param $string
     * @return string
     */

    public function inversionString($string) {
        $arr = explode(' ', $string);
        foreach ($arr as  $item) {
           $this->arUpLowCase[] = $this->upLowCase($item);
        }
        $temp = mb_strtolower($string);
        $resultTemp = preg_replace_callback(
            '~\w+~u',
            function($m) {
                return join('', array_reverse(preg_split('~~u', $m[0])));
            },
            $temp);
        $result = explode(' ', $resultTemp);
        $result = $this->upLowWord($result);
        return implode(' ', $result);
    }

    /**
     * Creates a capitalized word order array
     * @param $word
     * @return bool
     */
    private function upLowCase($word) : bool
    {
        $first = mb_substr($word,0,1,'UTF-8');
        return (mb_strtoupper($first) == $first);
    }

    /**
     * Changes the case of letters in words according to the input string
     * @param $array
     * @return array
     */
    private function upLowWord($array) : array
    {
        foreach ($array as $key => $item) {
            if ($this->arUpLowCase[$key]) {
                $str = mb_strtoupper(substr($item,0,2));
                $array[$key][0]= $str[0];
                $array[$key][1]= $str[1];
            }
        }
        return $array;
    }
}