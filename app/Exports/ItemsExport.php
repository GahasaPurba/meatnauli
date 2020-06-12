<?php

namespace App\Exports;

use App\Item;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ItemsExport implements FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize
{
    use Exportable;

    public function query()
    {
        return Item::query();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Harga',
            'Stok',
            'Berat (gr)',
            'Kategori',
            'Penjual',
            'Tanggal Dipost',
        ];
    }

    public function map($items): array
    {
        return [
            $items->name,
            $items->price,
            $items->stock,
            $items->weight,
            $items->souvenir_category->name,
            $items->user->name,
            Date::dateTimeToExcel($items->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
