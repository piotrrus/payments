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
                <form enctype="multipart/form-data" action="index.php?action=save" method="post" name ="import" id="import">
                    <div class="row">
                        <div class="col-md-10">
                            <table class="listax">
                                <?php for ($k = 1; $k <= count($importedData); $k++) : ?>
                                    <?php $data = $importedData[$k] ?>
                                    <tr>
                                        <td class="exist">
                                            <?=
                                            ($data['exist'] > 0 ?
                                                    'EXIST' : 'NOT EXIST')
                                            ?>
                                        </td>
                                        <td>
                                            <input type='text' name='payment_date[]' 
                                                   value='<?= $data['date'] ?>'>
                                        </td>
                                        <td>
                                            <input type='text' name='name[]'
                                                   value='<?= $data['name'] ?>'>
                                        </td>
                                        <td>
                                            <input type='text' name='surname[]'
                                                   value='<?= $data['surname'] ?>'>
                                        </td>
                                        <td>
                                            <input type='text' name='amount[]' 
                                                   value='<?= $data['amount'] ?>'>
                                        </td>
                                        <td>
                                            <input type='text' name='account[]' 
                                                   value='<?= $data['account'] ?>'>
                                        </td>
                                        <td class="exist">
                                            <?=
                                            (!$data['exist'] > 0 ?
                                                    "<input type='checkbox' name='checked[]' value=$k>" : "")
                                            ?>      
                                        </td>
                                        <td>
                                            <input type='text' hidden name='payment_purpose[]' 
                                                   value='<?= $data['payment_purpose'] ?>'>
                                        </td>

                                    </tr>
                                <?php endfor ?>
                                    <tr>
                                        <td colspan="6" class="btn-row">
                                            <input class="btn btn-default medium" type="submit"  value="Save data">
                                        </td>
                                        <td class="exist"><input  id='checkAll' type='checkbox'></td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="cleaner h40"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
