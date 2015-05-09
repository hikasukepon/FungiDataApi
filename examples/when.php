<?php include('head.php'); include('../lib/api.php'); ?>
<div id="readme" class="boxed-group flush clearfix announce instapaper_body md">
    <h3>
      <span class="octicon octicon-book"></span>
      いつなにがとれた？  -きのこ調査プロジェクト集計
      <title>いつなにがとれた？</title>
    </h3>

    <article class="markdown-body entry-content" itemprop="mainContentOfPage">
    	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">$(function () {
    $('#container').highcharts({
        title: {
            text: '何月にどれだけ種類があるか？',
            x: -20 //center
        },
        subtitle: {
            text: 'きのこ調査プロジェクト',
            x: -20
        },
        xAxis: {
            categories: ['1月', '2月', '3月', '4月', '5月', '6月',
                '7月', '8月', '9月', '10月', '11月', '12月']
        },
        yAxis: {
            title: {
                text: '種数'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '種'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [

        ]
    });
});</script>

<div id="container" style="min-width: 310px; margin: 0 auto"></div>
<?php

$variable = new statistics();
$arr = $variable -> when('月');
var_dump($arr);
?>
</article>
</div>