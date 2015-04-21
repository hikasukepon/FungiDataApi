<?php include('head.php') ?>
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

        <?php 
	include("../lib/api.php");

	$variable = new search_data();
		$list = array();
	for ($i=1; $i <= 12; $i++) { 
		$arr = '';
		$variable -> s_query = $i."月";
		$arr = $variable -> date_search('n月');
		foreach ($arr as $key => $value) {
			$list[$value['basho']][$i][] = $value['name'];
		}
	}
         ?>

        ]
    });
});</script>

<div id="container" style="min-width: 310px; margin: 0 auto"></div>
<?php

$variable = new search_data();
for ($i=1; $i <= 12; $i++) { 
	$arr = '';
	$list = array();
	$variable -> s_query = $i."月";
	$arr = $variable -> date_search('n月');
	echo "<h2>".$i."月にとれたきのこ</h2>";
	echo "<ol class='task-list'>";
	foreach ($arr as $key => $value) {
		$list[] = $value['name'];
	}
	$list = array_unique($list);
	$m = 0;
	foreach ($list as $key2 => $value2) {
		echo "<li>".$value2."</li>";
		$m++;
	}
	if($m == 0) {
		echo "<li>該当なし</li>";
	}
	echo "</ol>";
	echo "<hr></hr>";
}
?>
</article>
</div>