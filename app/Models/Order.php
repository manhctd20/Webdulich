<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    public static $data;
    protected $guarded = [];
    // public $timestamps = false;
    public static function book_tour($request)
    {
        self::$data = new Order();
        self::$data->user_id = $request->user_id;
        self::$data->tour_id = $request->tour_id;
        self::$data->fromDate = $request->fromDate;
        self::$data->num_people = $request->num_people;
        self::$data->totalPrice = $request->totalPrice;
        self::$data->address = $request->address;
        self::$data->phone = $request->phone;
        // self::$data->status = $request->status;
        self::$data->save();
    }

    public static function update_tour_booking($request)
    {
        $order_id = $request->input('order_id');
        $phone = $request->input('phone');
        $num_people = $request->input('num_people');
        $address = $request->input('address');
        $fromDate = $request->input('fromDate');
        $total_price = $request->input('totalPrice');

        // // Trả về kết quả hoặc thực hiện các xử lý khác nếu cần
        // Kiểm tra xem order_id có tồn tại hay không
        $order = Order::find($order_id);

        if ($order) {
            // Cập nhật thông tin đặt tour nếu order_id hợp lệ
            $order->phone = $phone;
            $order->num_people = $num_people;
            $order->address = $address;
            $order->fromDate = $fromDate;
            $order->totalPrice = $total_price;
            $order->save();

            // Trả về kết quả hoặc thực hiện các xử lý khác nếu cần
        } else {
            // Xử lý khi order_id không tồn tại (có thể báo lỗi hoặc thực hiện xử lý tùy ý)
            // Ví dụ: return response()->json(['error' => 'Không tìm thấy đơn hàng'], 404);
        }
    }

    public static function getOrdersData()
    {
        $ordersData = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(CASE WHEN (status = 0 OR status = 1 OR status = 2) THEN 1 ELSE 0 END) as completed_orders'),
            DB::raw('SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as canceled_orders')
        )
        ->groupBy('date')
        ->orderBy('date')
        ->get();
        $ordersData = $ordersData->map(function ($item) {
            return [
                'date' => $item->date,
                'completed_orders' => (int)$item->completed_orders,
                'canceled_orders' => (int)$item->canceled_orders,
            ];
        });
        
        return $ordersData;
    }
}
