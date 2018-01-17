<form class="form-horizontal" role="form" action="<?php echo site_url("admin/settings/save"); ?>" accept-charset="UTF-8"
      method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label class="col-md-1 control-label">Logo: </label>
        <!--<span>Możesz uploadować obrazek wielkości max 250x250px.</span>
-->
        <div class="col-md-11">
            <input id="upload-image" name="logo" type="file" class="file-loading"
                   data-upload-url="#" accept="image/*">
            <input name="max_file_size" type="hidden" value="1048576"/>
        </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-1 control-label" for="title">Nazwa strony</label>
        <div class="col-md-11">
            <input id="title" name="title" type="text" placeholder="" class="form-control" required="">
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-1 control-label" for="description">Krótki opis</label>
        <div class="col-md-11">
            <textarea class="form-control" id="description" rows="5" name="description"></textarea>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-1 control-label" for="tags">Słowa kluczowe (po przecinku)</label>
        <div class="col-md-11">
            <textarea class="form-control" id="tags" rows="5" name="tags"></textarea>
        </div>
    </div>


    <!-- Button -->
    <div class="form-group">
        <label class="col-md-1 control-label"></label>
        <div class="col-md-11">
            <input type="hidden" name="action" value="1"/>
            <input type="submit" class="btn btn-primary btn-block" value="ZAPISZ">
        </div>
    </div>


</form>
