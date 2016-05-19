<?php
/* @var $this yii\web\View */

use miloschuman\highcharts\Highcharts;

$this->title = 'My Yii Application';

Yii::$app->db->open();
$this->registerJsFile('./js/chart_dial.js');
?>
<div class="site-index">
    
    <div style="display: none">
        <?php
        echo Highcharts::widget([
            'scripts' => [
                'highcharts-more',
                'modules/exporting',
            ]
        ]);
        ?>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <?php
            $target = 20;
            $result = 10;
            
            $persent = 0.00;
            if ($target > 0) {
                $persent = $result / $target * 100;
                $persent = number_format($persent, 2);
            }
            $base = 90;
            $this->registerJs("
                        var obj_div=$('#ch1');
                        gen_dial(obj_div,$base,$persent);
                    ");
            ?>
            <center><h4>ร้อยละ</h4></center>
            <div id="ch1"></div>
        </div>
    </div>
</div>

