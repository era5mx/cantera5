<?php
/*
 * ------------------------------------------------------------------------
 * CanteRa5 (OWSA-INV V2.1)
 * ------------------------------------------------------------------------
 * Author: David Rengifo
 * Author page: http://david.rengifo.mx/
 * 
 * Basado en: OSWA-INV (https://github.com/siamon123/warehouse-inventory-system)
 */
require_once('includes/load.php');
if (isset($_SESSION['lang']) && $_SESSION['lang'] != ' ') {
    include(!file_exists('includes/lang/lang_' . $_SESSION['lang'] . '.php') ? 'includes/lang/lang_en.php' : 'includes/lang/lang_' . $_SESSION['lang'] . '.php' );
}
$page_title = getPageTitle(ALL_IMAGE_TITLE);

// Checkin What level user has permission to view this page
page_require_level(2);
?>
<?php $media_files = find_all('media'); ?>
<?php
if (isset($_POST['submit'])) {
    $photo = new Media();
    $photo->upload($_FILES['file_upload']);
    if ($photo->process_media()) {
        $session->msg('s', PHOTO.UPLOADED_SUCCESSFULLY);
        redirect('media.php');
    } else {
        $session->msg('d', join($photo->errors));
        redirect('media.php');
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-6">
<?php echo display_msg($msg); ?>
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <span class="glyphicon glyphicon-camera"></span>
                <span><?php echo ALL_IMAGE_TITLE; ?></span>
                <div class="pull-right">
                    <form class="form-inline" action="media.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label for="file-upload" class="btn btn-default btn-file"><? echo CHOOSE_FILE_TO_UPLOAD ?></label>
                                    <input type="file" id="file-upload" name="file_upload" multiple="multiple" accept="image/png, .jpeg, .jpg, image/gif"/>
                                </span>

                                <button type="submit" name="submit" class="btn btn-default"><?php echo UPLOAD; ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th class="text-center"><? echo PHOTO ?></th>
                            <th class="text-center"><? echo PHOTO_NAME ?></th>
                            <th class="text-center" style="width: 20%;"><? echo PHOTO_TYPE ?></th>
                            <th class="text-center" style="width: 50px;"><? echo ACTIONS ?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($media_files as $media_file): ?>
                            <tr class="list-inline">
                                <td class="text-center"><?php echo count_id(); ?></td>
                                <td class="text-center">
                                    <img src="uploads/products/<?php echo $media_file['file_name']; ?>" class="img-thumbnail" />
                                </td>
                                <td class="text-center">
    <?php echo $media_file['file_name']; ?>
                                </td>
                                <td class="text-center">
    <?php echo $media_file['file_type']; ?>
                                </td>
                                <td class="text-center">
                                    <a href="delete_media.php?id=<?php echo (int) $media_file['id']; ?>" class="btn btn-danger btn-xs"  title="<? echo REMOVE ?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
<?php endforeach; ?>
                    </tbody>
            </div>
        </div>
    </div>
</div>


<?php include_once('layouts/footer.php'); ?>
