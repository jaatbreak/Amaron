@extends('admin.include.include')
@section('content')

  <div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-6">
              <h3>GST </h3>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">GST </li>
              </ol>
            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </div>
      </div>
        <div class="container-fluid">
        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex  justify-content-between align-items-center" >
                        <h5>GST</h5> <h3 class=" m-0 f-16 txt-primary">{{ $data['lgnm'] }}</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table id="data_table_vendor" class="display nowrap data_table_user_page" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Company Name</th>
                                    <th>GST No.</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td>{{ $data['lgnm'] }}</td>
                                    <td>{{ $data['gstin'] }}</td>
                                    <td>{{ $data['pradr']['adr'] }}</td>
                                    <td>{{ $data['adhrVdt'] }}</td>
                                    <td class="text-center" >
                                        <p class="span badge rounded-pill pill-badge-danger text-white " > {{ $data['sts'] }}  </p>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>

@endsection
