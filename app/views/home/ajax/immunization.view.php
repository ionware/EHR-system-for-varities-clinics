<?php
if (!$immunizations){
    echo "<br>";
    echo "<h5 style='text-align: center;'>Sorry. There's no Immunization Entry for {$patient_name} yet.</h4>"; ?>
    <br>
    <div class="new">
        <div class="row">
            <div class="small-10 small-offset-1 column">
                <div class="row">
                    <div class="small-9 column partial-header">
                        <h6>Fill new Immunization Record for <?= $patient_name; ?></h6>
                    </div>
                </div><br>


                <form method="post" action="/home/ajax/immunization">
                    <div class="row pad-tb-md">
                        <div class="small-9 column">
                            <label><b>Vaccine:</b></label>
                            <input type="text" name="vaccine" placeholder="Vaccine name." class="field" required>
                            <small>The name of the vaccine adminstered.</small>
                        </div>
                    </div>

                    <div class="row pad-tb-md">
                        <div class="small-9 column">
                            <label><b>Type:</b></label>
                            <input type="text" name="type" placeholder="Immunization type" class="field" required>
                        </div>
                    </div>

                    <div class="row pad-tb-md">
                        <div class="small-5 column">
                            <label><b>Administer:</b></label>
                            <input type="text" name="administer" value="<?= $_SESSION['fullname']; ?>" class="field" required>
                            <small>The Doctor or Clinician that gave this immunization</small>
                        </div>
                    </div>

                    <div class="row pad-tb-md">
                        <div class="small-5 column">
                            <label><b>Next Dose:</b></label>
                            <input type="text" name="next_dose" placeholder="DD-MM-YYYY" class="field" required>
                            <small>Date of next dosage. If not next dose, please specifiy as <b>NIL</b></small>
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
    <a href="#" id="list"><div class="small-6 column text-center bg-cloud pad-sm"><i class="fa fa-folder-o"></i> <b>Immunization List</b></div> </a>
    <a href="#" id="new"><div class="small-6 column text-center bg-primary pad-sm"><i class="fa fa-plus"></i> <b>New Entry</b></div> </a>
</div>
<br>
<!--Partial Navigation ends-->
<div class="list">
    <div class="row">
        <div class="small-9 column partial-header">
            <h6>Immunization Data for <?= $patient_name; ?></h6>
        </div>
    </div><br>
    <table>
        <thead>
        <tr>
            <td>Vaccine</td>
            <td>Type</td>
            <td>Administer</td>
            <td>Next Dose</td>
            <td>Date</td>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($immunizations as $immunization): ?>
            <tr>
                <td><?= $immunization['vaccine'] ?></td>
                <td><?= $immunization['type'] ?></td>
                <td><?= $immunization['administer'] ?></td>
                <td><?= $immunization['next_dose'] ?></td>
                <td><?= \Carbon\Carbon::parse($immunization['created_at'])->diffForHumans() ?></td>
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
                    <h6>Immunization Data for <?= $patient_name; ?></h6>
                </div>
            </div><br>


            <form method="post" action="/home/ajax/immunization">
                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Vaccine:</b></label>
                        <input type="text" name="vaccine" placeholder="Vaccine name." class="field" required>
                        <small>The name of the vaccine adminstered.</small>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Type:</b></label>
                        <input type="text" name="type" placeholder="Immunization type" class="field" required>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-5 column">
                        <label><b>Administer:</b></label>
                        <input type="text" name="administer" value="<?= $_SESSION['fullname']; ?>" class="field" required>
                        <small>The Doctor or Clinician that gave this immunization</small>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-5 column">
                        <label><b>Next Dose:</b></label>
                        <input type="text" name="next_dose" placeholder="DD-MM-YYYY" class="field" required>
                        <small>Date of next dosage. If not next dose, please specifiy as <b>NIL</b></small>
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