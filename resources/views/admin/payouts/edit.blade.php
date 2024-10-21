@extends('admin.template')

@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Payouts
      <small>Edit Payout</small>
    </h1>
    @include('admin.common.breadcrumb')
  </section>

  <section class="content">
    @if(Session::has('success'))
    <div class="alert alert-warning">
      {{ Session::get('success') }}
    </div>
  @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow-sm mt-2">
          <div class="card-header border-0 bg-white">
            <b> Payment Details </b>
            <div class="d-flex align-items-center mb-3">
              <hr style="flex-grow: 1; border-color: #28a745;">
              <h7 class="border border-1 border-success text-success px-3 mb-0">RECEIPENT NUMBER :
                {{ $withDrawal->invoice_id }}
              </h7>
            </div>
          </div>

          <div class="card-body pt-0 ps-4 pr-4 pb-0">
            <form method="post" action="{{ route('payouts.update', $withDrawal->id) }}" id="myForm">
              @csrf
              <div class="row">
                <div class="col-3">
                  <label for="" class="mb-1">
                    <span class="text-danger">*</span> Customer
                  </label>
                  <select id="SelectBooking" class="form-control">
                    <option value="{{ $withDrawal->user_id }}">{{ $withDrawal->user->first_name }}
                      {{ $withDrawal->user->last_name }}
                    </option>
                  </select>
                </div>

                <input type="hidden" name="amount_due" id="amount_due">

                <div class="col-3">
                  <label for="" class="mb-1">
                    <span class="text-danger">*</span> Owner
                  </label>
                  <select name="admin_id" id="admin_id" class="select2-ajax form-control">
                    @foreach ($admin as $list)
            <option value="{{ $list->id }}">{{ $list->username }}</option>
          @endforeach
                  </select>

                  @error('admin_id')
            <p class="text-danger">This Field is required .</p>
          @enderror
                </div>

                <div class="col-3">
                  <label for="" class="mb-1">
                    <span class="text-danger">*</span> Date
                  </label>
                  <input type="date" class="form-control" id="date" name="date"
                    value="{{ $withDrawal->created_at->format('Y-m-d') }}">
                  @error('date')
            <p class="text-danger">This Field is required .</p>
          @enderror
                </div>

                <div class="col-3">
                  <label for="" class="mb-1">
                    <span class="text-danger">*</span> Amount
                  </label>
                  <input type="text" readonly name="payment" class="form-control" id="Tamount">
                  @error('payment')
            <p class="text-danger">This Field is required .</p>
          @enderror
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-3 mt-3">
                  <label for="" class="mb-1">Slip No</label>
                  <input type="number" class="form-control">
                </div>

                <div class="col-3 mt-3">
                  <label for="" class="mb-1">Type</label>
                  <select name="payment_method_id" id="pID" class="form-control">
                    @foreach ($pMethods as $list)
            <option value="{{ $list->id }}" {{ $withDrawal->payment_method_id === $list->id ? 'Selected' : '' }}>
              {{ $list->name }}
            </option>
          @endforeach

                  </select>
                  @error('payment_method_id')
            <p class="text-danger">This Field is required .</p>
          @enderror
                </div>

                <div class="col-3 mt-3">
                  <label for="" class="mb-1">Currency</label>
                  <select name="currency_id" id="cID" class="form-control">
                    <option value="">--Select--</option>
                    @foreach ($currency as $list)
            <option value="{{ $list->id }}" {{ $list->id === $withDrawal->currency_id ? 'Selected' : '' }}>
              {{ $list->name }} {!! $list->symbol !!}
            </option>
          @endforeach
                  </select>
                  @error('payment_method_id')
            <p class="text-danger">This Field is requied .</p>
          @enderror
                </div>

                <div class="col-3 mt-3">
                  <label for="" class="mb-1">Deposit Verified</label>
                  <select id="" class="form-control">
                    <option value="">--Select--</option>
                  </select>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-4 mt-3">
                  <label for="" class="mb-1">Note</label>
                  <textarea id="" class="form-control"></textarea>
                </div>

                <div class="col-6 mt-5">
                  <input type="checkbox"> Adjustment <br>
                  <input type="checkbox"> Out of Book <br>
                  <input type="checkbox"> Bad Debts <br>
                </div>
              </div>
          </div>
        </div>

        </form>


        <div class="card border-0 shadow-sm mt-4">
          <div class="card-header bg-white">
            <h6 class="fw-bold mt-2">Receipent Details</h6>
          </div>

          <div class="card-body border-0 shadow-sm">
            <table class="table table-striped table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th></th>
                  <th>Date</th>
                  <th>Invoice Number</th>
                  <th>Property</th>
                  <th>Amount Due</th>
                  <th>Payment</th>
                </tr>
              </thead>
              <tbody id="pData">
                <tr>
                  <td></td>
                  <td>{{ $withDrawal->created_at->format('y-m-d') }}</td>
                  <td>{{ $withDrawal->invoice_id }}</td>
                  <td>{{ $propertyName }}</td>
                  <td><input type="text" name="amount_due" min="1" id="due_amount" value="{{ $withDrawal->amount_due }}"
                      class="form-control" readonly style="width:30%"></td>
                  <td><input type="number" id="payment" min="1" class="form-control" style="width:30%;"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer bg-white border-0">
            <button class="btn btn-sm btn-primary float-end" id="payoutbtn">Payout</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('validate_script')
<script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  let payoutID = {{ $withDrawal->id }};
  let csrfToken = "{{ csrf_token() }}";
  let payoutUrl = "{{ url('admin/payouts/update') }}";

  $(document).ready(function () {
    $('#payment').on('input', function () {
      let payment = parseFloat($(this).val()) || 0;
      let dueAmount = parseFloat($('#due_amount').val()) || 0;
      $('#Tamount').val(payment);

      if (payment > dueAmount) {
        alert('Payment cannot exceed the Amount Due');
        $('#Tamount').val(dueAmount);
        $('#payment').val(dueAmount);
      }
    });



    $('#payoutbtn').on('click', function () {
      $('#myForm').submit();
    });
  });
</script>