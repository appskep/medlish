<?php

use yii\helpers\Url;
use yii\web\JsExpression;
use miloschuman\highcharts\Highcharts;
use backend\models\Project;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Project Assessment';
$reports = Project::find()->all();
?>

<div class="site-index">    

<?php if (!$reports) { ?>
    <div class="detail-view-container" style="background:none; padding:100px 10px">
        <center><b class="text-muted"><big><big>No project found</big></big></b></center>
        <center><small class="text-muted">To start, set up categories then add some projects</small></center>
    </div>
<?php } else { ?>

    <div id="chart">
    <br>
    <br>

        <?php 
        $label = [];
        $score = [];
        foreach ($reports as $report) {
            $label[] = $report->name;
            // $score[] = $report->satisfaction;
            $score[] = [
                'y' => $report->score,
                'url' => Url::to([
                    'project/resume',
                    'id' => $report->id,
                ])
            ];
        }
        ?>
        <?= Highcharts::widget([
            'options' => [
                'credits' => ['enabled' => false],
                'tooltip' => ['enabled' => false],
                'chart' => [
                    'backgroundColor' => null,
                    'type' => 'column',
                    'style' => [
                        'fontFamily' => 'Segoe UI, Helvetica, Arial, sans-serif',
                    ],
                ],
                // 'title' => ['text' => 'Hasil Penilaian'],
                'title' => ['text' => ''],
                'xAxis' => [
                    'categories' => $label
                ],
                'yAxis' => [
                    'title' => ['text' => 'Y'],
                    'min' => 0,
                    'max' => 100,
                ],
                'series' => [
                    [
                        'name' => 'series name', 
                        'data' => $score,
                        'dataLabels' => [
                            'enabled' => true,
                            'format' => '{point.y:.2f} %',
                        ],
                    ],
                ],
                'legend' => false,
                'plotOptions' => [
                    'series' => [
                        'cursor' => 'pointer',
                        'point' => [
                            'events' => [
                                'click' => new JsExpression('function() { window.location=this.options.url; }')
                            ]
                        ],
                    ],
                ],
            ]
        ]); ?>
    </div>

<?php } ?>
</div>
    

<?php
$this->registerJs(' 
        initializeClock();

        function initializeClock() {

            function updateClock() {
                $(Highcharts.charts).each(function(i,chart){
                    chart.reflow(); 
                });
                $(window).resize();
                console.log("window resized");
                clearInterval(timeinterval);
            }

            updateClock();
            var timeinterval = setInterval(updateClock, 1000);
        }
        ', \yii\web\VIEW::POS_READY);
?>