@extends('admin.layouts.app')
@section('content')
    <!-- sweet-alert -->
    <link href="{{asset('plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" />

  <div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <!-- <li class="breadcrumb-item active"><a href="javascript:void(0)">Client CoverSheet</a></li> -->
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                  <div class="card">
                  <div class="card-title" style="margin-top: 2%; margin-left: 2%;">
                    <span>Notification List</span>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                            <table id="CoverSheetTable" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                      <th>Type</th>
                                      <th>Message</th>
                                      <th>Notify Date</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
  </div>
@stop
@section('page-js-script')
<script src="{{asset('plugins/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>


<script type="text/javascript">
var status = $("#filter_status").val();
  $(document).ready(function() {
      var table = $('#CoverSheetTable').DataTable({
        processing: true,
        serverSide: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "aaSorting": [],
        ajax: {
              'url': "{{ route('admin.notificationAll') }}",
              'type':'get',
              'headers': {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              'data' : function(filter){
                  filter.status = $("#filter_status option:selected").val();
              }
          },
        columns: [
              {data: 'type', width: "20%",class:"text-center"},
              {data: 'message', width: "20%",class:"text-center"},
              {data: 'notify_date', width: "20%",class:"text-center"},
              {data: 'action', width: "20%",class:"text-center"},
          ],
        "aoColumnDefs": [
          { "bSortable": false, "aTargets": [1,2] }, 
          { "bSearchable": false, "aTargets": [1,2] }
        ],
      });

  });

</script>
@stop
