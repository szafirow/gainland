<!-- W pliku nav-left jest poczaek diva -->
            <!-- Prawa strona-->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Osiągnięcia
                            </div>
                            <div class="panel-body">

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>LP</th>
                                        <th>Login</th>
                                        <th>Nazwa</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $i = 0;
                                    foreach ($players as $player ) {
                                        echo   "<tr>";
                                        echo   "<td>".$i."</td>";
                                        echo   "<td>".$player->login."</td>";
                                        echo   "<td>".$player->name."</td>";
                                    $i++;
                                        echo   "</tr>";
                                    }
                                    ?>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
</section>