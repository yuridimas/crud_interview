<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountedController extends Controller
{
    public function index()
    {
        return view('pages.counted');
    }

    public function process(Request $request)
    {
        $data = $this->counted($request->number);
        return redirect()->route('counted')->with([
            'number' => $request->number,
            'result' => $data,
        ]);
    }

    public function denominator(int $value)
    {
        $letter = [
            '',
            'satu',
            'dua',
            'tiga',
            'empat',
            'lima',
            'enam',
            'tujuh',
            'delapan',
            'sembilan',
            'sepuluh',
            'sebelas'
        ];

        if ($value < 12) {
            return " " . $letter[$value];
        } else if ($value < 20) {
            return $this->counted($value - 10) . " belas ";
        } else if ($value < 100) {
            return $this->counted($value / 10) . " puluh " . $this->counted($value % 10);
        } else if ($value < 200) {
            return " seratus " . $this->counted($value - 100);
        } else if ($value < 1000) {
            return $this->counted($value / 100) . " ratus " . $this->counted($value % 100);
        } else if ($value < 2000) {
            return " seribu " . $this->counted($value - 1000);
        } else if ($value < 1000000) {
            return $this->counted($value / 1000) . " ribu " . $this->counted($value % 1000);
        } else if ($value < 1000000000) {
            return $this->counted($value / 1000000) . " juta " . $this->counted($value % 1000000);
        } else if ($value < 1000000000000) {
            return $this->counted($value / 1000000000) . " milyar " . $this->counted(fmod($value, 1000000000));
        } else if ($value < 1000000000000000) {
            return $this->counted($value / 1000000000000) . " trilyun " . $this->counted(fmod($value, 1000000000000));
        }
    }

    public function counted($value)
    {
        return trim($this->denominator($value));
    }
}
