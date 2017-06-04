<div class="box-body">
    <div class="col-lg-3 form-group">
        <label for="brand_model">Name:</label>
        <input type="text" class="form-control" value="{{ $supplier->name }}" disabled >
    </div>
    <div class="col-lg-3 form-group">
        <label for="brand_model">Phone:</label>
        <input type="text" class="form-control" value="{{ $supplier->phone }}" disabled >
    </div>
    <div class="col-lg-3 form-group">
        <label for="brand_model">Email:</label>
        <input type="text" class="form-control" value="{{ $supplier->email }}" disabled >
    </div>
    <div class="col-lg-3 form-group">
        <label for="brand_model">Address:</label>
        <input type="text" class="form-control" value="{{ $supplier->address }}" disabled >
    </div>                        <div class="col-lg-3 form-group">
        <label for="brand_model">Contact:</label>
        <input type="text" class="form-control" value="{{ $supplier->contact }}" disabled >
    </div>
    <div class="col-lg-3 form-group">
        <label for="brand_model">Website:</label>
        <input type="text" class="form-control" value="{{ $supplier->website }}" disabled >
    </div>
    <div class="col-lg-3 form-group">
        <label for="brand_model">Bank Account:</label>
        <input type="text" class="form-control" value="{{ $supplier->bank_account }}" disabled >
    </div>
    <div class="col-lg-3 form-group">
        <label for="brand">Currency:</label>
        <input type="text" class="form-control" value="{{ $supplier->currency }}" disabled >
    </div>
    <div class="col-lg-3 form-group">
        <label for="brand">Payment Terms:</label>
        <input type="text" class="form-control" value="{{ $supplier->payment_terms }}" disabled >
    </div>
    <div class="col-lg-3 form-group">
        <label for="brand">Tax Included:</label>
        <input type="text" class="form-control" value="{{ $supplier->tax_included }}" disabled >
    </div>
    <div class="col-lg-3 form-group">
        <label for="brand"> Current Balance:</label>
        <input type="text" class="form-control" value="{{ $supplier->BalanceRecharge->sum('amount') . ' $' }}" disabled >
    </div>
</div>
<hr>
<div class="box-body">
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-calendar-times-o"></div> Add Date</label>
        <input type="text" class="form-control" value="{{ $supplier->created_at->format('(D g:i A)    d-n-Y') }}" disabled >
    </div>
    <div  class="col-lg-3 form-group">
        <label><div class="fa  fa-user-secret"></div> Add by</label>
        <input type="text" class="form-control" value="{{ $supplier->userCreated->name}}" disabled >
    </div>
    @if ($supplier->updated_at != $supplier->created_at)
        <div  class="col-lg-3 form-group">
            <label><div class="fa fa-calendar-times-o"></div> Last Update at</label>
            <input type="text" class="form-control" value="{{ $supplier->updated_at->format('(D g:i A)    d-n-Y') }}" disabled >
        </div>
    @endif
    @if ($supplier->updated_by)
        <div  class="col-lg-3 form-group">
            <label><div class="fa  fa-user-secret"></div> Last Update by</label>
            <input type="text" class="form-control" value="{{ $supplier->userUpdated->name}}" disabled >
        </div>
    @endif
</div>
<hr>
