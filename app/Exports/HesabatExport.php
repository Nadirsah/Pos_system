<?php

namespace App\Exports;

use App\Models\SifarisModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class HesabatExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {   $hesabat = SifarisModel::with('getKategory','getMehsul','getQiymet','getMasa')->get();
        $exportData = collect();
        foreach ($hesabat as $item) {
            $exportData->push([
                'Masa' => $item->getMasa->name,
                'Kategoriya' => $item->getKategory->name,
                'Miqdar' => $item->miqdar,
                'Qiymet' => $item->getQiymet->sale_price,
                'Mehsul' => $item->getMehsul->name,
                'Odenis' => $item->odenis,
                'Sifaris' => $item->sifaris,
                'Daxil olma vaxti' => $item->created_at,
                'Duzelis vaxti' => $item->updated_at,
            ]);
        }
        return $exportData;
    }

    public function headings(): array
    {
        return ["Masa", "Kategoriya", "Miqdar", "Qiymet", "Mehsul", "Odenis", "Sifaris", "Daxil olma vaxti","Duzelis vaxti"];
    }
    
}




