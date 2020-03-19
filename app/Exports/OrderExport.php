<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\OrderDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrderExport implements FromCollection, ShouldAutoSize
{
    protected $start;
    protected $end;

    function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
    
    public function collection()
    {
        $orders = Order::where('status',1)->whereDate('created_at','>=',$this->start)->whereDate('created_at','<=',$this->end)
            ->orderBy('created_at')->orderBy('customer_id')->get();
        $result = [];
        if(date('d/m/Y',strtotime($this->start))==date('d/m/Y',strtotime($this->end)))
        {
            $title = [
                '0' => "Báo cáo tổng hợp ngày ".date('d/m/Y',strtotime($this->start)),
                '1' => "",
                '2' => "",
                '3' => "",
                '4' => "",
                '5' => "",
                '6' => "",
                '7' => "",
            ];
        }
        else
        {
            $title = [
                '0' => "Báo cáo tổng hợp từ ".date('d/m/Y',strtotime($this->start))." đến ".date('d/m/Y',strtotime($this->end)),
                '1' => "",
                '2' => "",
                '3' => "",
                '4' => "",
                '5' => "",
                '6' => "",
                '7' => "",
            ];
        }
        array_push($result,$title);
        array_push($result,[
            '0' => "Ngày thu mua",
            '1' => "Mã đơn hàng",
            '2' => "Họ tên",
            '3' => "Địa chỉ",
            '4' => "Số điện thoại",
            '5' => "Khối lượng sau khấu trừ",
            '6' => "Tiền giao dịch",
            '7' => "Dư nợ",
        ]);
        foreach ($orders as $o) {
            $order = [
                '0' => date('d/m/Y',strtotime($o->created_at)),
                '1' => $o->id,
                '2' => $o->orderCustomer->name,
                '3' => $o->orderCustomer->address,
                '4' => $o->orderCustomer->phone,
                '5' => $o->total_weight,
                '6' => $o->total_money,
                '7' => $o->total_money_paid,
            ];
            array_push($result,$order);
        }
        $count = count($result);
        if($count == 2)
        {
            $sum = [
                '0' => "Tổng",
                '1' => "",
                '2' => "",
                '3' => "",
                '4' => "",
                '5' => '0',
                '6' => '0',
                '7' => '0',
            ];
        }
        else
        {
            $sum = [
                '0' => "Tổng",
                '1' => "",
                '2' => "",
                '3' => "",
                '4' => "",
                '5' => '=SUM(F3:F'.$count.')',
                '6' => '=SUM(G3:G'.$count.')',
                '7' => '=SUM(H3:H'.$count.')',
            ];
        }
        array_push($result,$sum);
        return (collect($result));
    }
}
