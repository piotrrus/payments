<div class="cleaner h40"></div>
<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">Payments - preview importing data 
                <span class="right"><?= $bankData['bank'] . ' (' . $bankData['currency'] . ')'?></span>
            </div>
            <div class="panel-body" style="min-height:300px;">
                <form enctype="multipart/form-data" action="index.php?action=show" method="post">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

                    <div class="row">
                        <div class="col-md-8">
                            <?php 
                                  var_dump($fileExtension);
                            ?>
                        </div>

                        <div class="col-md-8">
                            <table class="listax">
                                <?php
                                for ($k = 1; $k <= count($importedData); $k++) {
                                    echo "<tr>";
                                    echo '<td class="listax">' . $k . '</td>';
                                    echo '<td class="listax">' . $importedData[$k]['date'] . '</td>';
                                    echo '<td class="listax">' . $importedData[$k]['client'] . '</td>';
                                    echo '<td class="listax td-right">' . $importedData[$k]['value'] . '</td>';
                                    echo '<td class="listax">' . $importedData[$k]['account'] . '</td>';
                                    echo '<td class="listax">' . '<span class="not-exist">NOT EXIST</span>' . '</td>';
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>

                    </div>
                    <div class="cleaner h40"></div>

                </form>
            </div>
        </div>
    </div>
</div>
