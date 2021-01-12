<?php

namespace App\Exports;

use App\Box;
use App\Currency;
use App\lib\Helpers;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Boxes2Export implements FromCollection,WithHeadings
{
    private $boxs_id;
    public function headings(): array
    {
        return ["TASIMA SENEDI NO", "FATURA TOPLAMI", "FATURA DOVIZ KODU","GONDEREN FIRMA", "GONDEREN VERGI NO", "GONDERILEN FIRMA","BRUT AGIRLIK", "ESYA TANIMI"];
    }
    public function __construct(array $boxs_id)
    {
        $this->boxs_id = $boxs_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {

        $boxs = Box::whereIn('id',$this->boxs_id )->get();
        $toValue = Currency::query()
            ->where('from', 'TRY')
            ->where('to', 'USD')
            ->first()->to_value;

        foreach ($boxs as $box) {
            $boxItems = $box->boxItems()->get();
            foreach ($boxItems as $boxItem) {

                $priceDollar = $boxItem->orderable->price * $toValue;
                $ordersNew['id'] = $boxItem->orderable_id;
                $ordersNew['FATURA_TOPLAMI'] = $boxItem->orderable->weight_price + Helpers::formatPrice($priceDollar);
                $ordersNew['FATURA_DOVIZ_KODU'] = 'USD';
                $ordersNew['GONDEREN_FIRMA'] = 'AZAL EXPRESS ULUSLARARASI TAŞIMACILIK TİCARET LİMİTED ŞİRKETİ ';
                $ordersNew['GONDEREN_VERGI_NO'] = 'AZAL EXPRESS ULUSLARARASI TAŞIMACILIK TİCARET LİMİTED ŞİRKETİ ';
                $ordersNew['GONDERILEN_FIRMA'] = $boxItem->orderable->order->user->name.' '.$boxItem->orderable->order->user->family;
                $ordersNew['BRUT_AGIRLIK'] = $boxItem->orderable->weight;
                $ordersNew['ESYA_TANIMI'] = $boxItem->orderable->description;

                $ordersNew1[]=$ordersNew;

            }


        }
        return collect($ordersNew1);
    }
}
