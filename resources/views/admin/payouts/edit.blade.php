@extends('admin.template')
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Payouts
      <small>Edit Payout</small>
    </h1>
    @include('admin.common.breadcrumb')
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box">
          <form class="form-horizontal" action="{{ url('admin/payouts/edit/' . $withDrawal->id) }}" id="edit_payout" method="post" accept-charset='UTF-8'>
            {{ csrf_field() }}
            
            <div class="box-body">

            <input type="hidden" name="payout_id" value="{{ $withDrawal->id }}">
            <input type="hidden" name="user_id" value="{{ $withDrawal->user_id }}">

              <!-- Account Number -->
              <div class="form-group row mt-3">
                <label class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Account Number :</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control" name="account_number" value="{{ $withDrawal->account_number }}">
                </div>
              </div>

              <!-- Payment Method -->
              <div class="form-group row mt-3">
                <label class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Payment Method :</label>
                <div class="col-sm-4">
                  <select name="payment_method_id" class="form-control">
                    @foreach ($pMethod as $list)
                      <option value="{{ $list->id }}" {{ $list->id === $withDrawal->payment_method_id ? 'selected' : '' }}>
                        {{ $list->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <!-- Currency -->
              <div class="form-group row mt-3">
                <label class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Currency :</label>
                <div class="col-sm-4">
                  <select name="currency_id" class="form-control">
                    @foreach ($currencies as $list)
                      <option value="{{ $list->id }}" {{ $list->id === $withDrawal->currency_id ? 'selected' : '' }}>
                        {{ $list->name }} {!! $list->symbol !!}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <!-- Amount -->
              <div class="form-group row mt-3">
                <label class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Amount :</label>
                <div class="col-sm-4">
                  @if($withDrawal->status === 'success')
                    
                    @php
                       $amount = $withDrawal->amount;
                    @endphp
                    @else

                    @php
                       $amount = $withDrawal->subtotal;
                    @endphp


                  @endif

                  <input type="number" class="form-control" name="amount" value="{{ $amount }}">

                </div>
              </div>

              <!-- Status -->
              <div class="form-group row mt-3">
                <label class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Status :</label>
                <div class="col-sm-4">
                @if($withDrawal->status === 'Success')
                <select class="form-control f-14" disabled>
                <option value="Success" {{ $withDrawal->status == 'Success' ? 'selected' : '' }}>Success</option>
                </select>
                @else
                <select class="form-control f-14" name="status">
                    <option value="Pending" {{ $withDrawal->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Success" {{ $withDrawal->status == 'Success' ? 'selected' : '' }}>Success</option>
                  </select>
                @endif
                  @if ($errors->has('status'))
                    <p class="error-tag">{{ $errors->first('status') }}</p>
                  @endif
                </div>
              </div>
              
              <!-- Submit Button -->
              <div class="form-group row mt-3 pb-2">
                <label class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0"></label>
                <div class="col-sm-8">
                  <button type="submit" class="btn btn-info text-white f-14" id="submitBtn">Submit</button>&nbsp;&nbsp;
                  <a href="{{ url('admin/payouts') }}" class="btn btn-danger f-14">Cancel</a>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!--/.col (right) -->
  </section>
</div>
<!-- /.content-wrapper -->
@endsection