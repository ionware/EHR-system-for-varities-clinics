<?php
if (!$billings){
    echo "<br>";
    echo "<h5 style='text-align: center;'>Sadly! There's no billing data for {$patient_name} yet!</h4>"; ?>
<br>
<div class="new">
    <div class="row">
        <div class="small-10 small-offset-1 column">
            <div class="row">
                <div class="small-9 column partial-header">
                    <h6>Create new Bill for <?= $patient_name; ?></h6>
</div>
</div><br>


<form method="post" action="/home/ajax/billing">
    <div class="row pad-tb-md">
        <div class="small-9 column">
            <label><b>Reason for Billing:</b></label>
            <input type="text" name="reason" placeholder="Reason for Payment" class="field" required>
        </div>
    </div>

    <div class="row pad-tb-md">
        <div class="small-9 column">
            <label><b>Payment By:</b></label>
            <input type="text" name="payer_name" placeholder="Paid by who?" class="field" required>
        </div>
    </div>

    <div class="row pad-tb-md">
        <div class="small-5 column">
            <label><b>Date of Payment:</b></label>
            <input type="text" name="date" placeholder="DD-MM-YYYY" class="field" required>
        </div>
    </div>

    <div class="row pad-tb-md">
        <div class="small-5 column">
            <select name="status" class="field">
                <option value="Paid">Paid</option>
                <option value="Unpaid">Not Paid</option>
            </select>
        </div>
    </div>

    <div class="row pad-tb-sm">
        <div class="small-3 column">
            <button type="submit" class="btn-block btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Bill Patient</button>
        </div>
    </div>
</form>
</div>
</div>
</div>
<?php
    exit();
}
?>

<!--Navigation for partials-->
<div class="row">
    <a href="#" id="list"><div class="small-6 column text-center bg-cloud pad-sm"><i class="fa fa-folder-o"></i> <b>Billing List</b></div> </a>
    <a href="#" id="new"><div class="small-6 column text-center bg-primary pad-sm"><i class="fa fa-plus"></i> <b>New Billing Data</b></div> </a>
</div>
<br>
<!--Partial Navigation ends-->
<div class="list">
<div class="row">
    <div class="small-9 column partial-header">
        <h6>Billing Data for <?= $patient_name; ?></h6>
    </div>
</div><br>
<table>
    <thead>
    <tr>
        <td>Serial Number</td>
        <td>Reason</td>
        <td>Payer Name</td>
        <td>Status</td>
        <td>Date</td>
    </tr>
    </thead>

    <tbody>
    <?php
        foreach($billings as $bill): ?>
    <tr>
        <td><?= $bill['serial'] ?></td>
        <td><?= $bill['reason'] ?></td>
        <td><?= $bill['payer_name'] ?></td>
        <td><?= $bill['status'] ?></td>
        <td><?= $bill['date'] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

<div class="new" style="display: none">
    <div class="row">
        <div class="small-10 small-offset-1 column">
            <div class="row">
                <div class="small-9 column partial-header">
                    <h6>Billing Data for <?= $patient_name; ?></h6>
                </div>
            </div><br>


            <form method="post" action="/home/ajax/billing">
                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Reason for Billing:</b></label>
                        <input type="text" name="reason" placeholder="Reason for Payment" class="field" required>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Payment By:</b></label>
                        <input type="text" name="payer_name" placeholder="Paid by who?" class="field" required>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-5 column">
                        <label><b>Date of Payment:</b></label>
                        <input type="text" name="date" placeholder="DD-MM-YYYY" class="field" required>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-5 column">
                        <select name="status" class="field">
                            <option value="Paid">Paid</option>
                            <option value="Unpaid">Not Paid</option>
                        </select>
                    </div>
                </div>

                <div class="row pad-tb-sm">
                    <div class="small-3 column">
                        <button type="submit" class="btn-block btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Bill Patient</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/partials.js"></script>