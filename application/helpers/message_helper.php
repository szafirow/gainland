<?php
function msg_danger($txt)
{
    echo '
<div class="alert alert-danger alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: white;">×</span></button>
            <p class="alert-title">Uwaga!</p>
            <p class="alert-body">' . $txt . '</p>
</div>';
}

function msg_success($txt)
{
    echo '
<div class="alert alert-success alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: white;">×</span></button>
            <p class="alert-title">Sukces!</p>
            <p class="alert-body">' . $txt . '</p>
</div>';
}

function msg_info($txt)
{
    echo '
<div class="alert alert-info alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: white;">×</span></button>
            <p class="alert-title">Informacja!</p>
            <p class="alert-body">' . $txt . '</p>
</div>';
}

function msg_warning($txt)
{
    echo '
<div class="alert alert-warning alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: white;">×</span></button>
            <p class="alert-title">Ostrzeżenie!</p>
            <p class="alert-body">' . $txt . '</p>
</div>';
}