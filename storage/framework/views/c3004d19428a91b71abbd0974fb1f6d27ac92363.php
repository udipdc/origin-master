

<?php $__env->startSection('content'); ?>
  <div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Role & Permission</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form role="form" method="post" action="<?php echo e(route('permission.store')); ?>" enctype="multipart/form-data" id="rolePermissionForm">
                  <?php echo csrf_field(); ?>
                  <div class="card">
                    <div class="card-header">
                      <div class="form-group">
                          <label>Role <span class="text-danger">*</span></label>
                          <select class="form-control" name="role" id="role">
                            <option value="">Select Role</option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($role->id); ?>"> <?php echo e($role->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                          <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <label id="role-error" class="text-danger" for="role"> <?php echo e($message); ?></label>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_Role-Permission')): ?>
                    <div class="card-footer float-right">
                      <button type="submit" class="btn btn-primary  float-right"><?php if(!isset($data)): ?> Submit  <?php else: ?> Update <?php endif; ?> </button>
                    </div>
                    <?php endif; ?>
                </div>
              </form>
            </div>
        </div>
    </div>
    <!-- #/ container -->
  </div>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js-script'); ?> 
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
              'url': "<?php echo e(url('permission/getPermissonData')); ?>",
              'type': 'POST',
              'headers': {
                  'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MedicalStore\resources\views/admin/permissions/index.blade.php ENDPATH**/ ?>