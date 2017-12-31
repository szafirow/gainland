<section id="top">
    <div class="container">

        <div class="row col-md-12">
            <?php
            if (($this->session->flashdata('item'))) {
                $message = $this->session->flashdata('item');
                ?>

                <div class="alert alert-<?php echo $message['class']; ?> alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"
                                                                                                      style="color: #000;">×</span>
                    </button>
                    <p class="alert-body"><?php echo $message['message']; ?></p>
                </div>';
                <?php
            }
            ?>

        </div>

        <h2 class="has-line-center headline text-center">Personalizacja postaci</h2>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <form class="form-horizontal well" role="form" action="<?php echo site_url("character/create"); ?>"
                      accept-charset="UTF-8" method="POST">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Nazwa postaci</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="character"
                                   placeholder="np. SirKaczka">
                        </div>
                        <p class="col-md-12">Zastanów się dobrze bowiem, ta nazwa zostanie z tobą już do końca rozgrywki
                            i to pod nią będziesz rozpoznawany.</p>

                    </div>


                    <div class="form-group">
                        <div class="row col-md-12">
                            <label class="col-md-2 control-label">Płeć</label>
                        </div>
                        <div class="row col-md-12 text-center">
                            <div class="col-md-6"><label><img
                                            src="<?php echo base_url(); ?>assets\img\gender\man.jpg"
                                            alt="..." class="img-thumbnail img-check-gender"><input type="radio"
                                                                                                    name="gender"
                                                                                                    value="M"
                                                                                                    class="hidden"></label>
                            </div>
                            <div class="col-md-6"><label><img
                                            src="<?php echo base_url(); ?>assets\img\gender\woman.jpg"
                                            alt="..." class="img-thumbnail img-check-gender"><input type="radio"
                                                                                                    name="gender"
                                                                                                    value="K"
                                                                                                    class="hidden"></label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row col-md-12">
                            <label class="col-md-2 control-label">Religia</label>
                            <p class="col-md-12">Wpłynie ona na miejsce w jakim zaczniesz grę, a także będzie decydować
                                o bonusach jakie będziesz pozyskiwać w czasie rozgrywki. Religie można zmienić w czasię
                                gry, jednak wymaga to wiele wysiłku.</p>
                        </div>
                        <div class="row col-md-12 text-center">

                            <div class="col-md-3"><label><img
                                            src="<?php echo base_url(); ?>assets\img\religions\katolicyzm.png"
                                            alt="..." class="img-thumbnail img-check-religions"><input type="radio"
                                                                                                       name="religions"
                                                                                                       value="1"
                                                                                                       class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="<?php echo base_url(); ?>assets\img\religions\prawosławie.png"
                                            alt="..." class="img-thumbnail img-check-religions"><input type="radio"
                                                                                                       name="religions"
                                                                                                       value="2"
                                                                                                       class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="<?php echo base_url(); ?>assets\img\religions\buddyzm.png"
                                            alt="..." class="img-thumbnail img-check-religions"><input type="radio"
                                                                                                       name="religions"
                                                                                                       value="3"
                                                                                                       class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="<?php echo base_url(); ?>assets\img\religions\islam.png"
                                            alt="..." class="img-thumbnail img-check-religions"><input type="radio"
                                                                                                       name="religions"
                                                                                                       value="4"
                                                                                                       class="hidden"></label>
                            </div>
                        </div>


                        <div class="row col-md-12 text-center">
                            <div class="col-md-3"><label><img
                                            src="<?php echo base_url(); ?>assets\img\religions\hinduizm.png"
                                            alt="..." class="img-thumbnail img-check-religions"><input type="radio"
                                                                                                       name="religions"
                                                                                                       value="5"
                                                                                                       class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="<?php echo base_url(); ?>assets\img\religions\judaizm.png"
                                            alt="..." class="img-thumbnail img-check-religions"><input type="radio"
                                                                                                       name="religions"
                                                                                                       value="6"
                                                                                                       class="hidden"></label>
                            </div>
                            <div class="col-md-3"><label><img
                                            src="<?php echo base_url(); ?>assets\img\religions\taoizm.png"
                                            alt="..." class="img-thumbnail img-check-religions"><input type="radio"
                                                                                                       name="religions"
                                                                                                       value="7"
                                                                                                       class="hidden"></label>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Avatar:</label>
                        <p class="col-md-12">Możesz uploadować obrazek wielkości max 250x250px.</p>
                        <div class="col-md-12">
                            <input id="upload-image" name="avatar" type="file" class="file-loading"
                                   data-upload-url="#" accept="image/*">
                            <input name="max_file_size" type="hidden" value="1048576"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="hidden" name="action" value="1"/>
                            <input type="submit" class="btn btn-danger-pro btn-block" value="ZAPISZ">
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>


</section>