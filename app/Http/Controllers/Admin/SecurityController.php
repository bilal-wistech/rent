<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Refund;
use App\Models\Bookings;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\DataTables\SecurityDataTable;
use App\Http\Requests\SecurityRefundRequest;

class SecurityController extends Controller
{
    public function index(SecurityDataTable $dataTable)
    {
        $data['from'] = isset(request()->from) ? request()->from : null;
        $data['to'] = isset(request()->to) ? request()->to : null;

        if (isset(request()->property)) {
            $data['properties'] = Properties::where('properties.id', request()->property)->select('id', 'name')->get();
        } else {
            $data['properties'] = null;
        }
        if (isset(request()->customer)) {
            $data['customers'] = User::where('users.id', request()->customer)->select('id', 'first_name', 'last_name')->get();
        } else {
            $data['customers'] = null;
        }

        if (!empty(request()->btn) || !empty(request()->status) || !empty(request()->from) || !empty(request()->property) || !empty(request()->customer)) {

            $status = request()->status;
            $from = request()->from;
            $to = request()->to;
            if (isset(request()->property)) {
                $property = request()->property;
            } else {
                $property = null;
            }

            if (isset(request()->customer)) {
                $customer = request()->customer;
            } else {
                $customer = null;
            }
        } else {
            $status = null;
            $property = null;
            $customer = null;
            $from = null;
            $to = null;
        }

        if (isset(request()->reset_btn)) {
            $data['from'] = null;
            $data['to'] = null;
            $data['allstatus'] = null;
            $data['allproperties'] = null;
            $data['allcustomers'] = null;
            return $dataTable->render('admin.securities.index', $data);
        }
        isset(request()->property) ? $data['allproperties'] = request()->property : $data['allproperties'] = '';
        isset(request()->customer) ? $data['allcustomers'] = request()->customer : $data['allcustomers'] = '';
        isset(request()->status) ? $data['allstatus'] = request()->status : $data['allstatus'] = '';
        return $dataTable->render('admin.securities.index', $data);
    }
    public function refundForm($booking_id)
    {
        $booking = Bookings::findOrFail($booking_id);
        return view('admin.securities.refund-form', compact('booking'));
    }
    public function refund(SecurityRefundRequest $request)
    {
        try {
            DB::beginTransaction();

            $security_refund = Refund::create($request->all());
            $security_amount = 0;
            if ($security_refund) {
                $booking = Bookings::findOrFail($request->booking_id);

                $security_amount = ($booking->security_money) - ($request->security_refund_amount);
                Bookings::where('id', $request->booking_id)->update([
                    'is_security_refunded' => 1,
                    'security_money' => $security_amount,
                    'total' => ($booking->total) - ($request->security_refund_amount),
                ]);
            }

            DB::commit();

            return redirect()->route('securities.index')->with('success', 'Security refunded successfully.');
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Security Refund Error: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->with('error', 'An error occurred while processing the refund. Please try again.');
        }
    }

}
