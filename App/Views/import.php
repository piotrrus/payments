<div class="cleaner h40"></div>
<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">Payments - choose the file to import data</div>
            <div class="panel-body" style="min-height:300px;">
                <form enctype="multipart/form-data" action="index.php?action=show" method="post">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="bankFileTypeId">
                                <?php
                                foreach ($bankList as $row) {
                                    echo '<option value=' . $row['bank_file_type_id'] . '>'
                                    . $row['bank'] . ' (' . $row['file_type'] . ')'
                                    . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="btn btn-default medium" for="file-selector">
                                <input id="file-selector" name="file" type="file" style="display: none">
                                Choose file
                            </label>
                        </div>

                        <div class="col-md-4">
                            <input class="btn btn-default medium" type="submit"  value="Upload the file">
                        </div>
                    </div>
                    <div class="cleaner h40"></div>

                </form>
            </div>
        </div>
    </div>
</div>
