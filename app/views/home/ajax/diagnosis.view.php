<?php
if (!$diagnosis){
    echo "<br>";
    echo "<h5 style='text-align: center;'>Sorry. Patient {$patient_name} has no Diagnosis data.</h4>"; ?>
    <br>
    <div class="new">
        <div class="row">
            <div class="small-10 small-offset-1 column">
                <div class="row">
                    <div class="small-9 column partial-header">
                        <h6>Add new Diagnosis for <?= $patient_name; ?></h6>
                    </div>
                </div><br>


                <form method="post" action="/home/ajax/diagnosis">
                    <div class="row pad-tb-md">
                        <div class="small-9 column">
                            <label><b>Diagnosis:</b></label>
                            <input type="text" name="diagnosis" placeholder="Diagnosis" class="field" required>
                            <small>Describe your diagnosis in good details.</small>
                        </div>
                    </div>

                    <div class="row pad-tb-md">
                        <div class="small-9 column">
                            <label><b>Symptoms:</b></label>
                            <input type="text" name="symptoms" placeholder="Shown Symptoms" class="field" required>
                            <small>Multiple symptoms should be sepereated by commas.</small>
                        </div>
                    </div>

                    <div class="row pad-tb-md">
                        <div class="small-5 column">
                            <label><b>Administer:</b></label>
                            <input type="text" name="administer" value="<?= $_SESSION['fullname']; ?>" class="field" required>
                            <small>The Doctor or Clinician that made this Diagnosis.</small>
                        </div>
                    </div>

                    <div class="row pad-tb-sm">
                        <div class="small-3 column">
                            <button type="submit" class="btn-block btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Create</button>
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
    <a href="#" id="list"><div class="small-6 column text-center bg-cloud pad-sm"><i class="fa fa-folder-o"></i> <b>Diagnosis List</b></div> </a>
    <a href="#" id="new"><div class="small-6 column text-center bg-primary pad-sm"><i class="fa fa-plus"></i> <b>New Diagnosis</b></div> </a>
</div>
<br>
<!--Partial Navigation ends-->
<div class="list">
    <div class="row">
        <div class="small-9 column partial-header">
            <h6>Diagnosis Data for <?= $patient_name; ?></h6>
        </div>
    </div><br>
    <table>
        <thead>
        <tr>
            <td>Diagnosis</td>
            <td>Symptoms</td>
            <td>Administer</td>
            <td>Date</td>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($diagnosis as $diagnose): ?>
            <tr>
                <td><?= $diagnose['diagnosis'] ?></td>
                <td><?= $diagnose['symptoms'] ?></td>
                <td><?= $diagnose['administer'] ?></td>
                <td><?= \Carbon\Carbon::parse($diagnose['created_at'])->diffForHumans() ?></td>
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
                    <h6>Diagnosis Data for <?= $patient_name; ?></h6>
                </div>
            </div><br>


            <form method="post" action="/home/ajax/diagnosis">
                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Diagnosis:</b></label>
                        <input type="text" name="diagnosis" placeholder="Diagnosis" class="field" required>
                        <small>Describe your diagnosis in good details.</small>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Symptoms:</b></label>
                        <input type="text" name="symptoms" placeholder="Shown Symptoms" class="field" required>
                        <small>Multiple symptoms should be sepereated by commas.</small>
                    </div>
                </div>

                <div class="row pad-tb-md">
                    <div class="small-5 column">
                        <label><b>Administer:</b></label>
                        <input type="text" name="administer" value="<?= $_SESSION['fullname']; ?>" class="field" required>
                        <small>The Doctor or Clinician that made this Diagnosis.</small>
                    </div>
                </div>

                <div class="row pad-tb-sm">
                    <div class="small-3 column">
                        <button type="submit" class="btn-block btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/partials.js"></script>