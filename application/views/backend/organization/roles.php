<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('Roles'); ?>
                    <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i> Add New Role</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-3 header-title">
                            <?php echo get_phrase('Roles'); ?>
                        </h4>
                    </div>
                    <div class="col-md-6 text-right"> 
                    </div>
                </div>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($roles->result_array()) > 0): ?>
                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('Id'); ?>
                                </th>
                                <th><?php echo get_phrase('Role'); ?>
                                </th>
                                <th><?php echo get_phrase('actions'); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($roles->result_array() as $role):?>
                            <tr class="gradeU">
                                <td> <?php echo $role['id']; ?></td>
                                <td> <?php echo $role['name']; ?> </td>
                                <td>
                                    <div class="dropright dropright">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo site_url('organization/permissions?permission_assing_to=' . $role['id']) ?>"><?php echo get_phrase('assign_permission'); ?></a></li>
                                            <li><a class="dropdown-item" href="#" onclick="edit_modal('<?php echo site_url('organization/roles/get/'.$role['id']); ?>', <?php echo $role['id']; ?>);">edit</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('organization/roles/delete/'.$role['id']); ?>');">delete</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($roles->result_array()) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;"
                            src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>



<!-- Bootstrap Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Role</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body with Form -->
            <div class="modal-body">
                <form class="required-form"
                    action="<?php echo site_url('organization/roles/add'); ?>"
                    method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Name:</label>
                        <input type="text" class="form-control" name="name" id="roleName" placeholder="Enter role name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function update_date_range() {
        var x = $("#selectedValue").html();
        $("#date_range").val(x);
    }

    function edit_modal(url, id) {
        // Send an AJAX POST request.
        $.ajax({
            type: "GET",
            url: url, // Replace 'process.php' with the URL of your server-side script.
            success: function(response) {
                if(response.length > 0){
                    var data = $.parseJSON(response);
                    $("#myModal").modal('show');
                    $("#myModal form").attr('action',`<?php echo site_url('organization/roles/edit'); ?>/${data[0].id}`)
                    $("#roleName").val(data[0].name);
                }
            },
            error: function(xhr, status, error) {
                // Handle errors here.
                console.error(xhr.responseText);
            }
        });
    }
</script>