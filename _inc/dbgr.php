<?php
function func_dbgr() { ?>
    <div class="dbgrContainer">
        <button type="button" class="btn btn-default btn-small" data-toggle="collapse" data-target="#showDbgr"><i
                class="fas fa-code"></i></button>

        <div id="showDbgr" class="collapse dbgr">
            <h1>Session Data</h1>
            <div class="dbgrTable">
                <table>

                    <tr>
                        <td colspan="2"><?php func_alert(); ?></td>
                        <td>

                            <?php foreach($_SESSION as $key => $val) { 
                        echo '<tr><td><strong>'.$key.'</strong> : </td><td>'.$val.'</td></tr>';
                    } ?>

                </table>
            </div>
        </div>
    </div>
<?php } ?>
