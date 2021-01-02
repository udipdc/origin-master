@extends('admin.layouts.app')

@section('content')
  <div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Role & Permission</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form role="form" method="post" action="{{route('permission.store')}}" enctype="multipart/form-data" id="rolePermissionForm">
                  @csrf
                  <div class="card">
                    <div class="card-header">
                      <div class="form-group">
                          <label>Role <span class="text-danger">*</span></label>
                          <select class="form-control" name="role" id="role">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                              <option value="{{$role->id}}"> {{$role->name}} </option>
                            @endforeach
                          </select>
                          @error('role')
                              <label id="role-error" class="text-danger" for="role"> {{ $message }}</label>
                          @enderror
                      </div>
                      <div class="form-group">
                        <div class="float-right">
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" value="" id="selectAll" value="selectAll">Select All / Deselect All
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="permissionTable" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                      <th>Module</th>
                                      <th>Create</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                      <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @can('create_Role-Permission')
                    <div class="card-footer float-right">
                      <button type="submit" class="btn btn-primary  float-right">@if(!isset($data)) Submit  @else Update @endif </button>
                    </div>
                    @endcan
                </div>
              </form>
            </div>
        </div>
    </div>
    <!-- #/ container -->
  </div>  
@stop
@section('page-js-script') 
<script type="text/javascript">
  $(document).ready(function() {
      $("#rolePermissionForm").validate({
          ignore: ":hidden:not(textarea)",
          errorClass:"invalid-feedback animated fadeInDown",
          errorElement:"div",    
          rules: {
              role: "required",
          },
          messages: {
              role: "Please select role name",
          },
          errorPlacement:function(e,a){
              $(a).parents(".form-group").append(e)
          },
          highlight:function(e){
              $(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
          },
          success:function(e){
              $(e).closest(".form-group").removeClass("is-invalid"),$(e).remove()
          }
      });
      var table = $('#permissionTable').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "aoColumnDefs": [
            { "bSortable": false, "aTargets": [0,1,2,3,4] }, 
            { "bSearchable": false, "aTargets": [ 0,1,2,3,4 ] }
          ],
          // "order": [[0, 'desc' ]],
          "ajax": {
              'url': "{{url('permission/getPermissonData')}}",
              'type': 'POST',
              'headers': {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              'data' : function(filter){
                  filter.role = $("#role option:selected").val();
              }
          },
          columns: [
              {data: 'name', width: "20%",class:"text-center"},
              {data: 'create', width: "20%",class:"text-center"},
              {data: 'edit', width: "20%",class:"text-center"},
              {data: 'delete', width: "20%",class:"text-center"},
              {data: 'view', width: "20%",class:"text-center"},
          ]
      });
      /*on change filter status value*/
      $('body').on('change','#role', function(){
        table.ajax.reload();
        $("#selectAll").prop('checked', false);
      });

      $(document).on('click','#selectAll',function() {
         if (this.checked) {
             $(':checkbox').each(function() {
                 this.checked = true;                        
             });
         } else {
            $(':checkbox').each(function() {
                 this.checked = false;                        
             });
         } 
      });
  });
</script>
@stop
