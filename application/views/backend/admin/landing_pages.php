<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body py-2">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('landing_pages'); ?>
                    <a href="<?php echo site_url('admin/add_landing_page'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_landing_page'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('landing_pages'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('title'); ?></th>
                                <th><?php echo get_phrase('header'); ?></th>
                                <th><?php echo get_phrase('duration'); ?></th>
                                <th><?php echo get_phrase('course_code'); ?></th>
                                <th><?php echo get_phrase('course_credits'); ?></th>
                                <th><?php echo get_phrase('level'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($blogs->result_array() as $key => $blog) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $blog['title']; ?></td>
                                    <td><?php echo $blog['header']; ?></td>
                                    <td><?php echo $blog['duration']; ?></td>
                                    <td><?php echo $blog['course_code']; ?></td>
                                    <td><?php echo $blog['course_credits']; ?></td>
                                    <td><?php echo $blog['level']; ?></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('/home/courses/' . $blog['slug']) ?>"><?php echo get_phrase('view'); ?></a></li>
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/edit_landing_page/' . $blog['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/landing_pages/delete/' . $blog['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>