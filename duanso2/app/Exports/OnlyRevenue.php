<?php

namespace App\Exports;

use App\DealMoney;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class OnlyRevenue implements  FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        $wallet = \App\Wallet::where('user_id', Auth::user()->id)->first();
        $user_id = $wallet->id;
        return $data = DealMoney::where('user_id', $user_id)->where('type', 1)->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'User_id',
            'Type',
            'Money',
            'Description',
            'Created at',
            'Updated at'
        ];
    }

    /**
     * @inheritDoc
     */
    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
