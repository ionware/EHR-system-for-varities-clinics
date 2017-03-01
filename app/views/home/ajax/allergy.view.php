<?php
if (!$allergies){
    echo "<br>";
    echo "<h5 style='text-align: center;'>Sorry. Patient {$patient_name} has no Allergy Data.</h4>"; ?>
    <br>
    <div class="new">
        <div class="row">
            <div class="small-10 small-offset-1 column">
                <div class="row">
                    <div class="small-9 column partial-header">
                        <h6>Add new Allergy for <?= $patient_name; ?></h6>
                    </div>
                </div><br>


                <form method="post" action="/home/ajax/allergy">
                    <div class="row pad-tb-md">
                        <div class="small-9 column">
                            <label><b>Allergy:</b></label>
                            <input type="text" name="allergy" placeholder="Allergy" class="field" required>
                            <small>Substances or what causes this allergy you're adding.</small>
                        </div>
                    </div>

                    <div class="row pad-tb-md">
                        <div class="small-9 column">
                            <label><b>Symptoms:</b></label>
                            <input type="text" name="symptoms" placeholder="Shown Symptoms" class="field" required>
                            <small>Multiple symptoms should be sepereated by commas</small>
                        </div>
                    </div>

                    <div class="row pad-tb-md">
                        <div class="small-5 column">
                            <label><b>Cure:</b></label>
                            <input type="text" name="cure" placeholder="Proven Cure" class="field" required>
                            <small>Enter <b>NIL</b> if there's no proven cure for this allergy.</small>
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
    <a href="#" id="list"><div class="small-6 column text-center bg-cloud pad-sm"><i class="fa fa-folder-o"></i> <b>Allergy List</b></div> </a>
    <a href="#" id="new"><div class="small-6 column text-center bg-primary pad-sm"><i class="fa fa-plus"></i> <b>New Allergy Data</b></div> </a>
</div>
<br>
<!--Partial Navigation ends-->
<div class="list">
    <div class="row">
        <div class="small-9 column partial-header">
            <h6>Allergy Data for <?= $patient_name; ?></h6>
        </div>
    </div><br>
    <table>
        <thead>
        <tr>
            <td>Allergy</td>
            <td>Symptoms</td>
            <td>Cure</td>
            <td>Date</td>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($allergies as $allergy): ?>
            <tr>
                <td><?= $allergy['allergy'] ?></td>
                <td><?= $allergy['symptoms'] ?></td>
                <td><?= $allergy['cure'] ?></td>
                <td><?= \Carbon\Carbon::parse($allergy['created_at'])->diffForHumans() ?></td>
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
                    <h6>Allergy Data for <?= $patient_name; ?></h6>
                </div>
            </div><br>


            <form method="post" action="/home/ajax/allergy">
                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Allergy:</b></label>
                        <input type="text" name="allergy" placeholder="Allergy" class="field" required>
                        <small>Substances or what causes this allergy you're adding.</small>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Symptoms:</b></label>
                        <input type="text" name="symptoms" placeholder="Shown Symptoms" class="field" required>
                        <small>Multiple symptoms should be sepereated by commas</small>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-5 column">
                        <label><b>Cure:</b></label>
                        <input type="text" name="cure" placeholder="Proven Cure" class="field" required>
                        <small>Enter <b>NIL</b> if there's no proven cure for this allergy.</small>
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