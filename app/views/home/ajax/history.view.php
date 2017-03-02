<?php
if (!$histories){
    echo "<br>";
    echo "<h5 style='text-align: center;'>Sorry. Patient {$patient_name} has no Medical History.</h4>"; ?>
    <br>
    <div class="new">
        <div class="row">
            <div class="small-10 small-offset-1 column">
                <div class="row">
                    <div class="small-9 column partial-header">
                        <h6>Create new Medical History.</h6>
                    </div>
                </div><br>


                <form method="post" action="/home/ajax/history">
                    <div class="row pad-tb-md">
                        <div class="small-9 column">
                            <label><b>Report Summery:</b></label>
                            <textarea class="field" name="report" placeholder="Report Summery" rows="9"></textarea>
                            <small>Please, add as much description as possible for this Medical History.</small>
                        </div>
                    </div>

                    <div class="row pad-tb-sm">
                        <div class="small-3 column">
                            <button type="submit" class="btn-block btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Create History</button>
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
    <a href="#" id="list"><div class="small-6 column text-center bg-cloud pad-sm"><i class="fa fa-folder-o"></i> <b>Medical History</b></div> </a>
    <a href="#" id="new"><div class="small-6 column text-center bg-primary pad-sm"><i class="fa fa-plus"></i> <b>New History</b></div> </a>
</div>
<br>
<!--Partial Navigation ends-->
<div class="list">
    <div class="row">
        <div class="small-9 column partial-header">
            <h6>Medical History for <?= $patient_name; ?></h6>
        </div>
    </div><br>
        <?php
        foreach($diagnosis as $diagnose): ?>
            <tr>
                <td><?= $diagnose['diagnosis'] ?></td>
                <td><?= $diagnose['symptoms'] ?></td>
                <td><?= $diagnose['administer'] ?></td>
                <td><?= \Carbon\Carbon::parse($diagnose['created_at'])->diffForHumans() ?></td>
            </tr>
        <?php endforeach; ?>
</div>

<div class="new" style="display: none">
    <div class="row">
        <div class="small-10 small-offset-1 column">
            <div class="row">
                <div class="small-9 column partial-header">
                    <h6>Medical History for <?= $patient_name; ?></h6>
                </div>
            </div><br>


            <form method="post" action="/home/ajax/history">
                <div class="row pad-tb-md">
                    <div class="small-9 column">
                        <label><b>Report Summery:</b></label>
                        <textarea class="field" name="report" placeholder="Report Summery" rows="9"></textarea>
                        <small>Please, add as much description as possible for this Medical History.</small>
                    </div>
                </div>

                <div class="row pad-tb-sm">
                    <div class="small-3 column">
                        <button type="submit" class="btn-block btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Create History</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/partials.js"></script>