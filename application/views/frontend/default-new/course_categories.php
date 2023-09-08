<!---------- Bread Crumb Area Start ---------->
<?php include "breadcrumb.php"; ?>
<!---------- Bread Crumb Area End ---------->
<style>
    .subCatMaxHeight{
        max-height: 220px;
        overflow-y: scroll;
    }

    /* ===== Scrollbar CSS ===== */
    /* Firefox */
    .subCatMaxHeight {
        scrollbar-width: auto;
        scrollbar-color: #d9d9d9 #ffffff;
    }

    /* Chrome, Edge, and Safari */
    .subCatMaxHeight::-webkit-scrollbar {
        width: 12px;
    }

    .subCatMaxHeight::-webkit-scrollbar-track {
        background: #ffffff;
    }

    .subCatMaxHeight::-webkit-scrollbar-thumb {
        background-color: #d9d9d9;
        border-radius: 10px;
        border: 3px solid #ffffff;
    }
</style>
<!-- Start Course Calendar list -->
<section class="pt-50 pb-120">
    <div class="container">

        <div class="row">
            <?php foreach ($categories as $category) :

                if ($category['parent'] > 0)
                    continue;
                $sub_categories = $this->crud_model->get_sub_categories($category['id']); ?>
                <div class="col-md-6 col-lg-6 col-xl-4 on-hover-action mb-3" id="<?php echo $category['id']; ?>">
                    <div class="card d-block">
                        <a href="<?php echo base_url('home/courses?category=' . $category['slug']); ?>">
                            <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category['thumbnail']); ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <a class="text-dark" href="<?php echo base_url('home/courses?category=' . $category['slug']); ?>">
                                <h4 class="card-title mb-0"><i class="<?php echo $category['font_awesome_class']; ?>"></i> <?php echo $category['name']; ?></h4>
                            </a>
                            <small style="font-style: italic;">
                                <p class="card-text"><?php echo count($sub_categories) . ' ' . get_phrase('sub_categories'); ?></p>
                            </small>
                        </div>

                        <ul class="list-group list-group-flush subCatMaxHeight">
                            <?php foreach ($sub_categories as $i => $sub_category) : ?>
                                <?php if ($i < 5) : ?>
                                    <li class="list-group-item on-hover-action" id="<?php echo $sub_category['id']; ?>">
                                        <a class="text-dark" style="font-size: 14px;" href="<?php echo base_url('home/courses?category=' . $sub_category['slug']); ?>"><span><i class="<?php echo $sub_category['font_awesome_class']; ?>"></i> <?php echo $sub_category['name']; ?></span></a>
                                    </li>
                                <?php else : ?>
                                    <span class="showMoreSubCat" style="display: none;">
                                        <li class="list-group-item on-hover-action" id="<?php echo $sub_category['id']; ?>">
                                            <a class="text-dark" style="font-size: 14px;" href="<?php echo base_url('home/courses?category=' . $sub_category['slug']); ?>"><span><i class="<?php echo $sub_category['font_awesome_class']; ?>"></i> <?php echo $sub_category['name']; ?></span></a>
                                        </li>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>

                        <?php if (count($sub_categories) > 4) : ?>
                            <ul class="list-group list-group-flush" style="border-top: 0 !important; border-bottom: 0 !important;">
                                <li class="list-group-item on-hover-action" id="category_show_more_<?php echo $category['id']; ?>">
                                    <a class="text-dark font-italic text-decoration-underline" style="font-size: 14px;" href="#">Show More Sub Categories</a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div> <!-- end card-->
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<!-- End Tutor list -->


<script type="text/javascript">
    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#category-delete-btn-' + id).show();
        $('#category-edit-btn-' + id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#category-delete-btn-' + id).hide();
        $('#category-edit-btn-' + id).hide();
    });
</script>

<?php foreach ($categories as $category) :?>
<script>
    $("#category_show_more_<?php echo $category['id']; ?>").on('click', function() {
        $('.showMoreSubCat').toggle()
        if($("#category_show_more_<?php echo $category['id']; ?> a").text() == 'Show More Sub Categories'){
            $("#category_show_more_<?php echo $category['id']; ?> a").text('Hide Sub Categories')
        }else{
            $("#category_show_more_<?php echo $category['id']; ?> a").text('Show More Sub Categories')
        }
    });
</script>
<?php endforeach; ?>