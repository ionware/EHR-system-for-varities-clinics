<?php
if (!$medications){
    echo "<br>";
    echo "<h5 style='text-align: center;'>Sorry. There's no Medication for {$patient_name} yet.</h4>"; ?>
    <br>
    <div class="new">
        <div class="row">
            <div class="small-10 small-offset-1 column">
                <div class="row">
                    <div class="small-9 column partial-header">
                        <h6>Fill new Medication for <?= $patient_name; ?></h6>
                    </div>
                </div><br>


                <form method="post" action="/home/ajax/medication">
                    <div class="row pad-tb-md">
                        <div class="small-9 column">
                            <label><b>Medication:</b></label>
                            <input type="text" name="medication" placeholder="Medication." class="field" required>
                            <small>Please be very descriptive on the medication. More details as possible.</small>
                        </div>
                    </div>

                    <div class="row pad-tb-md">
                        <div class="small-9 column">
                            <label><b>Reason:</b></label>
                            <input type="text" name="reason" placeholder="Why this Medication?" class="field" required>
                            <small>Reason why this patient is been put on this medication.</small>
                        </div>
                    </div>

                    <div class="row pad-tb-md">
                        <div class="small-5 column">
                            <label><b>Administer:</b></label>
                            <input type="text" name="administer" value="<?= $_SESSION['fullname']; ?>" class="field" required>
                            <small>The Doctor or Clinician that prescribe this medication.</small>
                        </div>
                    </div>

                    <div class="row pad-tb-sm">
                        <div class="small-3 column">
                            <button type="submit" class="btn-block btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Submit</button>
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
    <a href="#" id="list"><div class="small-6 column text-center bg-cloud pad-sm"><i class="fa fa-folder-o"></i> <b>Medications List</b></div> </a>
    <a href="#" id="new"><div class="small-6 column text-center bg-primary pad-sm"><i class="fa fa-plus"></i> <b>Create new Medication</b></div> </a>
</div>
<br>
<!--Partial Navigation ends-->
<div class="list">
    <div class="row">
        <div class="small-9 column partial-header">
            <h6>Medication Data for <?= $patient_name; ?></h6>
        </div>
    </div><br>
    <table>
        <thead>
        <tr>
            <td>Medication</td>
            <td>Reason</td>
            <td>Administer</td>
            <td>Date</td>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($medications as $medication): ?>
            <tr>
                <td><?= $medication['medication'] ?></td>
                <td><?= $medication['reason'] ?></td>
                <td><?= $medication['administer'] ?></td>
                <td><?= \Carbon\Carbon::parse($medication['created_at'])->diffForHumans() ?></td>
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
                    <h6>Medication Data for <?= $patient_name; ?></h6>
                </div>
            </div><br>


            <form method="post" action="/home/ajax/medication">
                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Medication:</b></label>
                        <input type="text" name="medication" placeholder="Medication." class="field" required>
                        <small>Please be very descriptive on the medication. More details as possible.</small>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Reason:</b></label>
                        <input type="text" name="reason" placeholder="Why this Medication?" class="field" required>
                        <small>Reason why this patient is been put on this medication.</small>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-5 column">
                        <label><b>Administer:</b></label>
                        <input type="text" name="administer" value="<?= $_SESSION['fullname']; ?>" class="field" required>
                        <small>The Doctor or Clinician that prescribe this medication.</small>
                    </div>
                </div>

                <div class="row pad-tb-sm">
                    <div class="small-3 column">
                        <button type="submit" class="btn-block btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/partials.js"></script>