<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo $page_title; ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" data-collapsed="0">

                <form id="form-upload-user"
                    action="<?php echo site_url('organization/import_csv/import'); ?>"
                    method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="sub-result"></div>
                    <div class="form-group">
                        <label class="control-label">Choose File <small class="text-danger">*</small></label>
                        <input type="file" class="form-control form-control-sm" id="file" name="file"
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                            required>
                        <small class="text-danger">Upload excel or csv file only.</small>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <div class="user-loader" style="display: none; ">
                                <i class="fa fa-spinner fa-spin"></i> <small>Please wait ...</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light"
                            id="btnUpload">Upload</button>
                    </div>
                </form>

            </div>
        </div>
    </div><!-- end col-->
</div>