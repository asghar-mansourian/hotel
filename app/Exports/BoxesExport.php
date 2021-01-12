<?php

namespace App\Exports;

use App\Box;
use App\lib\Helpers;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BoxesExport implements FromCollection,WithHeadings
{
    private $boxs_id;
    public function headings(): array
    {
        return ["Id", "Order Id", "Type","Username", "User Id", "Website","Price", "Balance Cargo", "Date and Time"];
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
        $orders = collect();

        foreach ($boxs as $box)
        {
            $boxItems=$box->boxItems()->get();
            $orders = $orders->merge($boxItems);

        }
        $orders = DB::table('order_items')
            ->leftJoin('orders', 'order_items.order_id', 'orders.id')
            ->leftJoin('users', 'orders.user_id', 'users.id')
            ->select(DB::raw('1 as type'), 'users.name as name', 'users.family as family', 'users.id as user_id', 'orders.id as order_id', 'users.usd_balance as balance_usd', 'order_items.id as id', 'order_items.link as website', 'order_items.status', 'order_items.price as price', 'order_items.updated_at as date')
            ->where('order_items.deleted_at', null)
            ->whereIn('order_items.id', $orders->pluck('orderable_id'))->get();
        foreach ($orders as $order)
        {
            $ordersNew['id']= $order->id;
            if($order->type == 1)
                $ordersNew['order_id'] = $order->order_id;
            else
                $order->order_id = '-';
            if($order->type == 1)
                $ordersNew['type'] = 'Order';
            else
                $ordersNew['type'] = 'Invoice';

            $ordersNew['Username'] =  $order->name . ' ' . $order->family;
            $ordersNew['user_id'] = $order->user_id;
            if ($order->type == 1)
            {
                $url_info = parse_url($order->website);
                $url_info = $url_info['host'];
            }
            else{
                if(preg_match('/(http|https|www|ftp|mailto)/', $order->website))
                {
                    $url_info = explode('.',parse_url($order->website)['host'])[1];
                }else{
                    $url_info = str_limit($order->website, 15);
                }
            }
            $ordersNew['website']= $url_info;
            $ordersNew['price']= $order->price . ' ₺';
            if($order->balance_usd <= 0)
                $ordersNew['Balance_Cargo'] = Helpers::formatPrice($order->balance_usd).' $';
            else
                $ordersNew['Balance_Cargo'] = Helpers::formatPrice($order->balance_usd).' $';
            $ordersNew['date']= $order->date;
            $ordersNew1[]=$ordersNew;
        }
        return collect($ordersNew1);
    }
}
