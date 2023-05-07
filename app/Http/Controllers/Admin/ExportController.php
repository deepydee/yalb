<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        $modelName = $request->input('model');
        $model = new $modelName();

        $rows = [];

        // Get the fillable fields of the model
        $fillableFields = $model->getFillable();

        $model::query()->lazyById(2000, 'id')
            ->each(function ($modelEntity) use (&$rows, $fillableFields) {
                // Filter the model's attributes to include only fillable fields
                $filteredAttributes = array_intersect_key(
                    $modelEntity->getAttributes(),
                    array_flip($fillableFields)
                );

                $rows[] = $filteredAttributes;
        });

        SimpleExcelWriter::streamDownload('export.xlsx')
            ->noHeaderRow()
            ->addRows($rows);
    }
}
