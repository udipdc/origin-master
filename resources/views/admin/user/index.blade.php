@extends('admin.layouts.app')
@section('content')
  <div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                  <div class="card">
                  <div class="card-header">
                    <div class="card-title">
                      @if(Auth::guard('admin')->user()->can('create_User'))
                        <a href="{{route('user.create')}}" class="btn btn-primary">Add User</a>
                      @endif
                      <div style="float: right;" class="form-group">
                          <select name="filter_status" id="filter_status" class="form-control">
                          <option value="">Select Status</option>
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                      <th>Firstname</th>
                                      <th>Lastname</th>
                                      <th>Email</th>
                                      <th>Username</th>
                                      <th>Status</th>
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
<script type="text/javascript">
var status = $("#filter_status").val();
  $(document).ready(function() {
      var table = $('#userTable').DataTable({
        processing: true,
        serverSide: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "aaSorting": [],
        ajax: {
              'url': "{{ route('user.getuser') }}",
              'type':'post',
              'headers': {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              'data' : function(filter){
                  filter.status = $("#filter_status option:selected").val();
              }
          },
        columns: [
              {data: 'firstname', width: "20%",class:"text-center"},
              {data: 'lastname', width: "20%",class:"text-center"},
              {data: 'email', width: "15%",class:"text-center"},
              {data: 'username', width: "20%",class:"text-center"},
              {data: 'status', width: "5%",class:"text-center"},
              {data: 'action', width: "40%",class:"text-center"},
          ],
        "aoColumnDefs": [
          { "bSortable": false, "aTargets": [4,5] },
          { "bSearchable": false, "aTargets": [4,5] }
        ],
      });


      $('body').on('change','#filter_status', function(){
        table.ajax.reload();
      });

  });

  function deleteuser(id)
  {
    swal({
        title: "Are you sure to delete ?",
        text: "You will not be able to recover this User !!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it !!",
        closeOnConfirm: !1
    }, function() {
             $.ajax({
               url:'{{ route("user.delete") }}',
               type: "post",
               headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
               data:'id='+id,
               success:function(data) {
                $('#userTable').DataTable().ajax.reload();

                swal("Deleted !!", "Hey, User has been deleted !!", "success")
               }
            });
    });
  }

  function statuschange(id){
    var status ="";
    var chkPassport = document.getElementById("chk_"+id);
        if (chkPassport.checked) {
            status =1;
        } else {
            status =0;
        }
        $.ajax({
               url:'{{ route("user.status") }}',
               type: "post",
               headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
               data:'id='+id+'&status='+status,
               success:function(data) {
                if(status == 1){
                    swal("Updated!", "status is activated", "success")
                }else{
                    swal("Updated!", "status is deactivated", "success")
                }
               }
            });
  }

</script>
@stop
