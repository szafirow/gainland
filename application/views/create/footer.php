<!-- JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/create.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script>
    $(document).ready(function () {

        $("#upload-image").fileinput({
            autoReplace: true,
            maxImageWidth: 280,
            maxImageHeight: 280,
            maxFileCount: 1,
            allowedFileExtensions: ["jpeg", "jpg", "png", "gif"],
            showUpload: false,
            browseOnZoneClick: true,
            dropZoneTitle: 'Przeciągnij i upuść zdjęcie ',
            dropZoneClickTitle: 'lub kliknij i wybierz plik.',
            layoutTemplates:
                {
                    actions: '<div class="file-actions">\n' +
                    '    <div class="file-footer-buttons">\n' +
                    '       {delete} {zoom} ' +
                    '    </div>\n' +
                    '    {drag}\n' +
                    '    <div class="file-upload-indicator" title="{indicatorTitle}">{indicator}</div>\n' +
                    '    <div class="clearfix"></div>\n' +
                    '</div>',
                    btnDefault: '<button type="{type}" tabindex="500" title="{title}" class="{css}"{status}>{icon}{label}</button>',
                    btnLink: '<a href="{href}" tabindex="500" title="{title}" class="{css}"{status}>{icon}{label}</a>',
                    btnBrowse: '<div tabindex="500" class="{css}"{status}>{icon}{label}</div>',
                }
        });

    });

</script>

</body>
</html>