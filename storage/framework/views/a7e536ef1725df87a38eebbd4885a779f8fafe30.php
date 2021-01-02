
<?php $__env->startSection('content'); ?>
  <div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog</a></li>
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
                      <a href="<?php echo e(route('blog.create')); ?>" class="btn btn-primary">Add Blog</a>
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
                            <table id="blogTable" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Link</th>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js-script'); ?>
<script type="text/javascript">
var status = $("#filter_status").val();
  $(document).ready(function() {
      var table = $('#blogTable').DataTable({
        processing: true,
        serverSide: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "aaSorting": [],
        ajax: {
              'url': "<?php echo e(route('blog.getblog')); ?>",
              'type':'post',
              'headers': {
                  'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
              },
              'data' : function(filter){
                  filter.status = $("#filter_status option:selected").val();
              }
          },
        columns: [
              {data: 'name', width: "25%",class:"text-center"},
              {data: 'link', width: "25%",class:"text-center"},
              {data: 'status', width: "25%",class:"text-center"},
              {data: 'action', width: "25%",class:"text-center"},
          ],
        "aoColumnDefs": [
          { "bSortable": false, "aTargets": [1,2] }, 
          { "bSearchable": false, "aTargets": [1,2] }
        ],
      });


      $('body').on('change','#filter_status', function(){
        table.ajax.reload();
      });

  });

  function deleteblog(id){
    swal({
        title: "Are you sure to delete ?",
        text: "You will not be able to recover this Blog !!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it !!",
        closeOnConfirm: !1
    }, function() {

             $.ajax({
               url:'<?php echo e(route("blog.delete")); ?>',
               type: "post",
               headers: {
                  'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
              },
               data:'id='+id,
               success:function(data) {
                $('#blogTable').DataTable().ajax.reload();

                swal("Deleted !!", "Hey, Blog has been deleted !!", "success")
               }
            });


    });
  }

  function blog_status_change(id){
    var status ="";
    var chkPassport = document.getElementById("chk_"+id);
        if (chkPassport.checked) {
            status =1;
        } else {
            status =0;
        }
        $.ajax({
               url:'<?php echo e(route("blog.status")); ?>',
               type: "post",
               headers: {
                  'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
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

  function fil_status(id){
    if(id != ""){
        $('#blogTable').DataTable().ajax.reload();
    }
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>