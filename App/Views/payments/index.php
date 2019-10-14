<div class="cleaner h40"></div>
<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">Payments list
            </div>
            <div class="panel-body" style="min-height:300px;">
                <div class="row">
                    <div class="col-md-12">
                        <table class="listax">
                            <?php
                            echo "<tr>"
                            . "<td>date</td>"
                            . "<td>client</td>"
                            . "<td>amount</td>"
                            . "<td>account</td>"
                            . "<td>purpose</td>"
                            . "<tr>";

                            foreach ($payments as $data) {
                                echo "<tr>";
                                echo '<td class="listax">' . $data['payment_date'] . "</td>";
                                echo '<td class="listax">' . $data['name'] . ' ' . $data['surname'] . "</td>";
                                echo '<td class="listax">' . $data['amount'] . "</td>";
                                echo '<td class="listax">' . $data['account'] . "</td>";
                                echo '<td class="listax">' . $data['payment_purpose'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="cleaner h40"></div>
            </div>
        </div>
    </div>
</div>
