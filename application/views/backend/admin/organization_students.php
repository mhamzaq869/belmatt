<div class="row "> 
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
  <div class="col-lg-12">
      <div class="card">
        <div class="card-body" data-collapsed="0">
          <h4 class="mb-3 header-title"><?php echo get_phrase('organization_students'); ?></h4>
          <table class="table table-striped table-centered w-100 display nowrap" id="server_side_users_data">
            <thead>
              <tr>
                <th>#</th>
                <th><?php echo get_phrase('photo'); ?></th>
                <th><?php echo get_phrase('name'); ?></th>
                <th><?php echo get_phrase('email'); ?></th>
                <th><?php echo get_phrase('phone'); ?></th> 
                <th><?php echo get_phrase('date'); ?></th> 
                <th><?php echo get_phrase('progress'); ?></th> 
                <th><?php echo get_phrase('actions'); ?></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
      </div>
    </div>
  </div><!-- end col-->
</div>

<script>
  $(document).ready(function () {
  var table = $('#server_side_users_data').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax:{
        url: "<?php echo base_url('admin/server_side_organizations_students_data/').$organization_id; ?>",
        dataType: "json",
        type: "POST",
        data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
      },
      "columns": [
        { "data": "key" },
        { "data": "photo" },
        { "data": "name" },
        { "data": "email" },
        { "data": "phone" }, 
        { "data": "date" }, 
        { "data": "progress" }, 
        { "data": "action" }
      ]   
    });
  });

  function refreshServersideTable(tableId){
    $('#'+tableId).DataTable().ajax.reload();
  }
</script>