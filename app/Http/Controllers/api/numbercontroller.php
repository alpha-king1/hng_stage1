<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class numbercontroller extends Controller
{
    private function isPrime($num)
    {
        if ($num < 2) return false;
        for ($i = 2; $i * $i <= $num; $i++) {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    // Check if a number is perfect
    private function isPerfect($num)
    {
        $sum = 0;
        for ($i = 1; $i < $num; $i++) {
            if ($num % $i == 0) {
                $sum += $i;
            }
        }
        return $sum === $num;
    }

    // Check if a number is Armstrong
    private function isArmstrong($num){
        $absNum = abs($num);
        $sum = 0;
        $digits = str_split((string)$absNum);
        $power = count($digits);

        foreach ($digits as $digit) {
            $sum += pow((int)$digit, $power);
        }

        return $sum === $absNum;
}

    // Calculate the sum of digits
    private function digitSum($num)
    {
        if($num < 0){
            return null;
        }
        return array_sum(str_split((string)$num));
    }

    private function getProperties($num)
{
    $properties = [];

    if ($num % 2 == 0) {
        $properties[] = 'even';
    }
    
    else {
        $properties[] = 'odd';
    }

    if ($this->isArmstrong($num)) {
        $properties[] = 'armstrong';
    }

    return $properties;
}

    public function index(Request $request)
    {
        
        $number = $request->number;

        if (!preg_match('/^-?\d+$/', $number)) {
            return response()->json([
                'number' => 'alphabet',
                'error' => true
            ], 400);
        }

        $number = (int)$number;
        $response = Http::get("http://numbersapi.com/{$number}");

        return response()->json([
            'number' => $number,
            'is_prime' => $this->isPrime($number),
            'is_perfect' => $this->isPerfect($number),
            'properties' => $this->getProperties($number),
            'digit_sum' => $this->digitSum($number),
            'fun_fact' => $response->body(),
        ]);
    }

    public function test(){
        return response()->json([
            'message'=> 'hello world',
        ]);
    }
}
