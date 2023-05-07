<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        // dd($request->all());
        $modelName = $request->input('model');
        $model = new $modelName();

        $rows = SimpleExcelReader::create($request->file, 'xlsx')
            ->noHeaderRow()
            ->getRows()
            ->map(fn ($model) => (string) Str::of($model[0])->before(' '))
            ->take(2)
            ->toArray();
            // ->dump();


        // dd($rows[0]);

        foreach ($rows as $row) {
            $attribute = new Attribute();
            $attribute->title = $row; // assuming the first column contains the attribute name

            $attribute->save();
        }

        return redirect()->back()->with('success', 'Attributes imported successfully.');
    }
}
