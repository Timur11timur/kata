<?php

namespace App;

class Song
{
    public function sing()
    {
        $result = '';
        for ($i=99;$i>-1;$i--) {
            $result .= $this->verse($i) . "
            ";
        }

        return $result;
    }

    public function verse($number)
    {
        $current = $this->getNames($number);
        $next = $this->getNames($number-1);

        return $current['name'] . " of beer on the wall
        " . $current['name'] . " of beer
        " . $current['string'] . "
        " . $next['name'] . " of beer on the wall
        ";
    }

    private function getNames($number): array
    {
        switch ($number) {
            case -1:
                $name = '99 bottles';
                $string = 'Take one down and pass it around';
                break;
            case 1:
                $name = $number . ' bottle';
                $string = 'Take one down and pass it around';
                break;
            case 0:
                $name = 'No more bottles';
                $string = 'Go to the store and buy some more';
                break;
            default:
                $name = $number . ' bottles';
                $string = 'Take one down and pass it around';
        }

        return ['name' => $name, 'string' => $string];
    }
}