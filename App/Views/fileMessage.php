<div class="cleaner h40"></div>
<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">Payments - preview importing data 
                <span class="right">
                    <?= $bankData['bank'] . ' (' . $bankData['currency'] . ')' ?>
                </span>
            </div>
            <div class="panel-body" style="min-height:300px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            Wrong type of choosen file for <?= $bankData['bank'] ?> bank. 
                            Choose <a href="index.php">another bank </a>or imported file.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>