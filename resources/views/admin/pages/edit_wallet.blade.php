@extends('admin.include.include')
@section('content')

<style>
    .image_upload img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    border: 1px solid #dfdfdf;
    border-radius: 12px;
    overflow: hidden;
}
    </style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="">
                <div class="card-header d-flex justify-content-between pb-0">
                    <div class="card-title mb-0">
                    <h4 class="mb-0">Edit Wallet</h4>
                    <small class="text-muted">Edit Wallet</small>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
            <div class="card">
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $edit_wallet->id }}"?>
                            
                            <div class="mb-3">
                                <label class="form-label">User</label> 
                                <select class="form-control" name="user">
                                    <option value="">Select</option>
                                    @foreach ($users as $val)
                                        <option value="{{ $val->id }}"
                                             {{  ($val->id == $edit_wallet->user_id)  ? 'selected' : '' }} >
                                            {{ $val->email }}</option>
                                    @endforeach
                                </select>
                                @error('user')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input name="amount" class="form-control" type="number" placeholder="amount"
                                    value="{{ old('amount') ?? ($edit_wallet->trans_type == '+') ? $edit_wallet->credit:$edit_wallet->debit  }}">
                                @error('amount')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Reference</label>
                                <textarea name="reference" class="form-control" placeholder="Reference..." rows="5">{{ old('reference') ?? $edit_wallet->reference }}</textarea>
                                @error('reference')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Transaction Type</label>
                                <select class="form-control" name="trans_type">
                                    <option value="">Select</option>
                                    <option value="+" @if (old('trans_type') || ($edit_wallet->trans_type == '+')) {{ ((old('trans_type', '+') == '+') ||  ($edit_wallet->trans_type == '+')) ? 'selected' : '' }} @endif>Credit</option>
                                    <option value="-" @if (old('trans_type') || ($edit_wallet->trans_type == '-')) {{ ((old('trans_type', '-') == '-') ||  ($edit_wallet->trans_type == '-')) ? 'selected' : '' }} @endif>Debit</option>
                                    {{-- <option value="-" @if (old('trans_type')) {{ old('trans_type', '-') == '-' ? 'selected' : '' }} @endif>Debit</option> --}}
                                </select>
                                @error('trans_type')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>

                            


                            <div class="row">
                                <div class="col-sm-3 ">
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary d-block w-100">Save</button>
                                    </div>
                                </div>
                                <div class="col-sm-3 ">
                                    <div class="form-footer">
                                        <a href="{{ URL::previous() }}" class="btn btn-dark d-block w-100">Cancel</a>
                                    </div>
                                </div>        
                            </div>
                    </form>
                </div>
            </div>                                
        </div>                                
    </div>                                
</div>                                 


@endsection
