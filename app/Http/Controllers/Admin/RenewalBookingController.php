<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Bookings;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\RenewalBookingDataTable;

class RenewalBookingController extends Controller
{
    public function index(RenewalBookingDataTable $dataTable)
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
            return $dataTable->render('admin.renewal-bookings.index', $data);
        }
        isset(request()->property) ? $data['allproperties'] = request()->property : $data['allproperties'] = '';
        isset(request()->customer) ? $data['allcustomers'] = request()->customer : $data['allcustomers'] = '';
        isset(request()->status) ? $data['allstatus'] = request()->status : $data['allstatus'] = '';
        return $dataTable->render('admin.renewal-bookings.index', $data);
    }
    public function cancelRenewalBooking(Request $request)
    {
        Bookings::where('id', $request->booking_id)->update([
            'is_booking_renewed' => -1,
            'renewal_booking_cancel_date' => Carbon::now()->toDateString(),
            'renewal_booking_cancel_by' => Auth::guard('admin')->id(),
            'renewal_type' => 'no'
        ]);
        return response()->json([
            'success' => true,
        ]);
    }
}
