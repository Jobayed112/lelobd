<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\InvoiceProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderProductController extends Controller
{
    public function orderList()
    {


        $orders = Order::all();

        return view('pages.admin.order.order_list', compact('orders'));
    }

    public function orderedit($id) {

        $order = Order::findOrFail($id);
        return view('pages.admin.order.order_update',compact('order'));

    }

    public function orderUpdate(Request $request,$id)
    {
            $request->validate([
                'status' => 'required|string|max:255',
                'total_amount' => 'required|numeric|min:0',
                'shipping_address' => 'required|string|max:255',
            ]);
            $order = Order::findOrFail($id);

          $order->update([
                'status' => $request->status,
                'total_amount' => $request->total_amount,
                'shipping_address' => $request->shipping_address,
            ]);


            return redirect()->route('order.list')->with('success', 'Order updated successfully!');

    }
    public function orderDelete($id)
    {
        $order = Order::findOrFail($id);

        if ($order->invoice()->exists()) {
            return redirect()->route('order.list')->with('error', 'Order cannot be deleted because an invoice has already been created.');
        }
        $order->orderItems()->delete();

        $order->delete();

        return redirect()->route('order.list')->with('success', 'Order deleted successfully!');
    }



    public function confirmOrder($orderId)
    {
        DB::beginTransaction();
        try {

            $order = Order::with('orderItems')->findOrFail($orderId);
            $lastInvoice = Invoice::latest()->first();
            $nextInvoiceNumber = $lastInvoice ? $lastInvoice->invoice_number + 1 : 12345678;

            if ($order->invoice()->exists()) {
                return back()->with('error', 'Invoice already created for this order.');
            }

            $invoice = Invoice::create([
                'invoice_number' => $nextInvoiceNumber,
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'total_amount' => $order->total_price,
                'status' => 'confirmed',
            ]);

            foreach ($order->orderItems as $item) {
                InvoiceProduct::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                    'price' => $item->price,
                    'user_id' => $order->user_id,
                ]);
            }

            $order->update(['status' => 'confirmed']);

            DB::commit();
            return redirect()->route('invoice.show', $invoice->id)->with('success', 'Order confirmed and Invoice generated.');
        } catch (\Exception $e) {
            DB::rollback();
            return  back()->with('error','Something went wrong! Please try again.');
        }
    }


    public function invoiceList()
    {
        $invoices = Invoice::with('invoiceProducts.product')->get();
        return view('pages.admin.invoice.invoice_list', compact('invoices'));
    }
    public function showInvoice($invoiceId)
    {
        $invoice = Invoice::with('invoiceProducts.product', 'order')->findOrFail($invoiceId);
        return view('pages.admin.invoice.invoice', compact('invoice'));
    }

    public function invoiceDelete($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);
            $invoice->invoiceProducts()->delete();
            if ($invoice->order && $invoice->order->invoice()->count() == 1) {
                $invoice->order->orderItems()->delete();
                $invoice->order->delete();
            }
            $invoice->delete();
            return redirect()->route('invoice.list')->with('success', 'Invoice deleted successfully.');
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong while deleting the invoice.',
                'mess' => $e->getMessage()
            ]);
        }
    }



public function downloadInvoice($invoice_id)
{
    $invoice = Invoice::with(['user', 'order', 'invoiceProducts.product'])->findOrFail($invoice_id);
    // Load the invoice view into PDF
    $pdf = Pdf::loadView('pages.admin.invoice.pdf', compact('invoice'));

    // Download the PDF
    return $pdf->download('invoice_'.$invoice->invoice_number.'.pdf');
}



    public function orderItemList()
    {


        $orderItems = OrderItem::all();

        return view('pages.admin.order.product_order_list', compact('orderItems'));
    }



    public function orderItemDelete($id)
    {
        $orderItem = OrderItem::findOrFail($id);

        if ($orderItem->order()->exists()) {
            return  back()->with('error', 'Order item cannot be deleted because an invoice has already been created.');
        }
        $orderItem->order()->delete();
        $orderItem->delete();

        return  back()->with('success', 'Order item deleted successfully!');
    }

}
