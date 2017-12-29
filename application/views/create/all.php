<!doctype html>
<html lang="pl">
<head>
    <title>Gainland.pl</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Icon -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <!-- CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.css?ver=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/create.css?ver=<?php echo rand(); ?>">
</head>

<body>
<!-- Nav-->
<nav class="navbar navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> <img src="assets/img/logo.png" alt="img" class="logo img-responsive"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="container">
            <ul class="nav navbar-nav navbar-left">
                <li class="nohover"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> Online: 0</a></li>
                <li class="nohover"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Zarejestrowanych: 0</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>
                        Wyloguj się</a></li>
                <li></li>
            </ul>
        </div>
    </div>
</nav>
<!-- /nav -->

<section id="top">
    <div class="container">
        <h2 class="has-line-center headline text-center">Personalizacja postaci</h2>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <form class="form-horizontal well" role="form" method="GET">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Nazwa postaci</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="character"
                                   placeholder="np. SirKaczka">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row col-md-12">
                            <label class="col-md-2 control-label">Religia</label>
                        </div>
                        <div class="row col-md-12 text-center">

                            <div class="col-md-3"><label><img
                                            src="assets\img\religions\katolicyzm.png"
                                            alt="..." class="img-thumbnail img-check"><input type="radio"
                                                                                             name="religions"
                                                                                             value="val1"
                                                                                             class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="assets\img\religions\prawosławie.png"
                                            alt="..." class="img-thumbnail img-check"><input type="radio"
                                                                                             name="religions"
                                                                                             value="val2"
                                                                                             class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="assets\img\religions\buddyzm.png"
                                            alt="..." class="img-thumbnail img-check"><input type="radio"
                                                                                             name="religions"
                                                                                             value="val3"
                                                                                             class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="assets\img\religions\islam.png"
                                            alt="..." class="img-thumbnail img-check"><input type="radio"
                                                                                             name="religions"
                                                                                             value="val4"
                                                                                             class="hidden"></label>
                            </div>
                        </div>


                        <div class="row col-md-12 text-center">
                            <div class="col-md-3"><label><img
                                            src="assets\img\religions\hinduizm.png"
                                            alt="..." class="img-thumbnail img-check"><input type="radio"
                                                                                             name="religions"
                                                                                             value="val5"
                                                                                             class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="assets\img\religions\judaizm.png"
                                            alt="..." class="img-thumbnail img-check"><input type="radio"
                                                                                             name="religions"
                                                                                             value="val6"
                                                                                             class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="assets\img\religions\taoizm.png"
                                            alt="..." class="img-thumbnail img-check"><input type="radio"
                                                                                             name="religions"
                                                                                             value="val7"
                                                                                             class="hidden"></label>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Avatar:</label>
                        <div class="col-md-12">
                            <input id="upload-image" name="avatar" type="file" class="file-loading"
                                   data-upload-url="#" accept="image/*">
                            <input name="max_file_size" type="hidden" value="1048576"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="hidden" name="register" value="1"/>
                            <input type="submit" class="btn btn-danger-pro btn-block" value="ZAPISZ">
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>


</section>


</body>
</html>


<!-- JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/create.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script>
    $(document).ready(function () {

        $("#upload-image").fileinput({
            autoReplace: true,
            maxImageWidth: 250,
            maxImageHeight: 255,
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