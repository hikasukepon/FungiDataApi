<?php
function hl($code) {
	echo "<hr><pre>";
	$hl = highlight_string("<?php\n".$code."\n?>" , TRUE);
	echo $hl;
	echo "</pre>";
}
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">

	<title>KCP API</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="//lib.hikaru.red/jquery.js"></script>
	<script type="text/javascript" src="http://2inc.org/wp-content/uploads/2012/02/smoothscroll/js/jquery.smoothScroll.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="octicons/octicons.css">
	<style>
	body ,html {
		background: #eee;
		font-family:'ヒラギノ角ゴ Pro W3','Hiragino Kaku Gothic Pro','メイリオ',Meiryo,'ＭＳ Ｐゴシック',sans-serif;
	}
	h2,h3,h4 {
		cursor: pointer;
	}
	h2:after, h3:after, h4:after {
		content: "▼";
		color:#999;
	}
	pre {
		display: block;
		padding: 9.5px;
		margin: 0 0 10px;
		font-size: 13px;
		line-height: 1.42857143;
		color: #333;
		word-break: break-all;
		word-wrap: break-word;
		background-color: #f5f5f5;
		border: 1px solid #ccc;
		border-radius: 4px;
		padding: 9px 14px;
		margin-bottom: 14px;
		background-color: #f7f7f9;
		border: 1px solid #e1e1e8;
		border-radius: 4px;
		white-space: -moz-pre-wrap; /* Mozilla */
		white-space: -pre-wrap;     /* Opera 4-6 */
		white-space: -o-pre-wrap;   /* Opera 7 */
		white-space: pre-wrap;      /* CSS3 */
		word-wrap: break-word;      /* IE 5.5+ */
		font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
		max-height: 500px;
		overflow: auto;
	}
	hr {
		border-color: rgba(255,255,255,0.5);
	}

	code {
		padding: 0;
		padding-top: 0.2em;
		padding-bottom: 0.2em;
		margin: 0;
		font-size: 85%;
		background-color: rgba(0,0,0,0.04);
		border-radius: 3px;
		font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
	}
	pre > code {
		padding: initial;
		padding-top: initial;
		padding-bottom: initial;
		margin: initial;
		font-size: inherit;
		background-color: initial;
		border-radius: initial;
	}

	h1,h2,h3,h4,h5,h6 {
		font-weight: 100;
	}
	a {
		-moz-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
		-webkit-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
		-o-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
		-ms-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
		transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
		color: #999;
		text-decoration: none;
		border-bottom: dotted 1.4px;
	}
	a:hover {
		border-bottom-color: transparent;
	}
	a.none {
		border: none;
		font-family: inherit;
		font-size: 0.7em;
		color: inherit;
		background: none;
		cursor: pointer;
		padding: 10px;
		display: inline-block;
		letter-spacing: 1px;
		outline: none;
		position: relative;
		-webkit-transition: all 0.3s;
		-moz-transition: all 0.3s;
		transition: all 0.3s;
		background: #cb4e4e;
		color: #fff;
		box-shadow: 0 6px #ab3c3c;
		-webkit-transition: none;
		-moz-transition: none;
		transition: none;
		transition: none;
		-webkit-transition:none;
		-moz-transition:none;
		-o-transition:none;
		-ms-transition:none;
		color:#FFF;
		border: none;
		border-radius: 5px;
	}
	a.none:after {
		content: '';
		position: absolute;
		z-index: -1;
		-webkit-transition: all 0.3s;
		-moz-transition: all 0.3s;
		transition: all 0.3s;
	}
	a.none:hover {
		box-shadow: 0 4px #ab3c3c;
		top: 2px;
	}
	a > :before {
		font-size: 1.5em;
	}
	h2:target {
		color:red;
	}
	h3:target {
		color:blue;
	}
	h4:target {
		color:green;
	}
	h2:target:before, h3:target:before, h4:target:before { 
		content: "▶";
	}
	h2 + div {
		margin-left: 2em;
		display:none;
	
	}
	h3 + div {
		margin-left: 4em;
		display:none;
	
	}
	h4 + div {
		margin-left: 6em;
		display:none;

	}
	/*ul ul, ul ul ul {
		display: none;
	}*/
	ul > li {
		cursor: pointer;
	}
	li.none {
		cursor: auto;
	}
	table.none {
		display:none;
	}
	.alert {
		background: #fff6bf; /* 画像 */
		text-align: left;
		padding: 5px 20px 5px 45px;
		border-top: 2px solid #ffd324;
		border-bottom: 2px solid #ffd324;
	}/*
	._head {
		position: fixed;
		height:500px;
		overflow: hidden;
	}
	._main {
		padding-top:500px;
	}*/
	</style>
	<script>
	$(function(){
		$("ul > li").click(function(){
			var next = $(this).next().prop("tagName");
			if(next == 'UL') {
				$(this).next().slideToggle();
			}
		});
		$("h2,h3,h4").click(function(){
			var next = $(this).next().prop("tagName");
			if(next == 'DIV') {
				$(this).next().slideToggle();
			}
		});
		$(".hiraku").click(function(){
			var next = $(this).next().prop("tagName");
			if(next == 'TABLE') {
				$(this).next().fadeIn();
			}
		});
		$("a[href^=#]").click(function(){
			var attr = $(this).attr("href");
			$(attr).click();
		});
	});
	</script>
</head>
<body>
<header class="_head">
	<h1>きのこ調査プロジェクトAPI リファレンス
		<a href="//github.com/hikasukepon/FungiDataAPI" class="none">View On <span class="octicon octicon-logo-github"></span></a>
		<a href="//github.com/hikasukepon/FungiDataApi/zipball/master" class="none">Download Zip<span class="octicon octicon-file-zip"></span></a>
		<a href="//github.com/hikasukepon/FungiDataApi/tarball/master" class="none">Download tar.gz<span class="octicon octicon-file-zip"></span></a>
	</h1>
	きのこ調査プロジェクトこと「KCP」(「きの調」とも言う)のAPIです．<br>
	本体は<a href="//hkcp.ga">ここ</a>．<br>
	まだ作成中です.<br>
	質問などは<a href="//twitter.com/hikasukepon">@hikasukepon</a>へお願いします．<br>
	<p class="alert"><b>注意</b>：過度にサーバーに負荷をかけるようなことはしないでください．された場合は，そのIPアドレスからのアクセスをブロックします．ご了承ください．</p>  
</header>
<section class="_main">
<h2 id="0"><a href="#0">#0</a> 返されるデータの解説</h2>
	<div>
	返されるデータは，関数やクラスによって多種多様ですが，ここでは主にget_dataクラス，search_dataクラスの返り値を解説しています．

	<table border="1" cellspacing="0" cellpadding="5">
		<tr>
			<th width="150">文字列</th>
			<th>説明</th>
			<th width="150">入っている値の例</th>
		</tr>
		<tr>
			<td>date</td>
			<td width="150">採取された日付．これは，<code><mark>D M d H:i:s O Y</mark></code>の形式です．</td>
			<td>Thu Mar 05 14:44:13 +0900 2015</td>
		</tr>
		<tr>
			<td>name</td>
			<td width="150">標準和名</td>
			<td>シイタケ</td>
		</tr>
		<tr>
			<td>basho</td>
			<td width="150">採取された場所</td>
			<td>入生田</td>
		</tr>
		<tr>
			<td>dis</td>
			<td width="150">キノコの説明</td>
			<td>カサ縁部は繊維状。</td>
		</tr>
		<tr>
			<td>gak</td>
			<td width="150">データベースに登録されていない場合や，仮称種などに付けられる学名</td>
			<td></td>
		</tr>
		<tr>
			<td>gakmei</td>
			<td width="150">一般的に知られていて，学名がある種類の学名</td>
			<td>Lentinula edodes (Berk.) Pegler</td>
		</tr>
		<tr>
			<td>bunrui</td>
			<td width="150">分類(亜門名〜属名まで)</td>
			<td>ハラタケ亜門ハラタケ綱ハラタケ亜綱ハラタケ目ツキヨタケ科シイタケ属</td>
		</tr>
		<tr>
			<td>bet</td>
			<td width="150">別名</td>
			<td>シヒタケ，</td>
		</tr>
		<tr>
			<td>num</td>
			<td width="150">分類番号．きのこの属の学名のアルファベット順ごとにふられています．</td>
			<td>F124</td>
		</tr>
		<tr>
			<td>keisai</td>
			<td width="150">掲載文献の1件目．</td>
			<td>根田仁. 2014. きのこミュージアム p. 133. 八坂書房. （シイタケ/Lentinula edodes = Collybia shiitake = Agaricus (Armillaria) edodes）.， 池田良幸. 2013. 新版 北陸のきのこ図鑑 No. 171. 橋本確文堂. （シイタケ/Lentinula edodes）.， 今関六也・大谷吉雄・本郷次雄編. 2011. 増補改訂新版 山渓カラー名鑑 日本のきのこ p. 29. 山と渓谷社. （シイタケ/Lentinula edodes）.， 大作晃一・吹春俊光. 2010. おいしいきのこ毒きのこ p. 34. 主婦の友社. （シイタケ/Lentinula edodes）.， 勝本謙. 2010. 日本産菌類集覧 p. 752. 日本菌学会関東支部. （-/Pleurotus russaticeps）.， 勝本謙. 2010. 日本産菌類集覧 p. 493. 日本菌学会関東支部. （シイタケ/Lentinula edodes）.， 工藤伸一. 2009. 東北きのこ図鑑 p. 61. 家の光協会. （シイタケ/Lentinula edodes）.， 青木実・日本きのこ同好会（名部みち代編）. 2008. 日本きのこ図版 1:34-40. 日本きのこ同好会 2. （シイタケ(1334)/Lentinula edodes, シイタケ[(145)石川]/-, シイタケ[(484)富士]/Lentinus edodes）.， 高橋郁雄. 2007. 新版 北海道きのこ図鑑 [増補版] p. 108. 亜璃西社. （シイタケ/Lentinus edodes）.， 五十嵐恒夫. 2006. 北海道のキノコ p. 86. 北海道新聞社. （シイタケ/Lentinula edodes）.， 青木実. 2006. 日本きのこ検索図版 (1997) p. 4. 日本きのこ同好会 2. (シイタケ(1334)[(145)石川][(484)富士]/Lentinus edodes).， 池田良幸. 2005. 北陸のきのこ図鑑 No. 171. 橋本確文堂. （シイタケ/Lentinula edodes）.， 下田道夫・塩津孝博. 2001. 九州で見られるきのこ なば p. 55. 環境調査研究所. （（シイタケ/Lentinus edodes）.， 日本菌学会東北支部編. 2001. 東北のキノコ p. 62. 無明舎出版. （シイタケ/Lentinula edodes）.， 幼菌の会編. 2001. カラー版 きのこ図鑑 p. 28. 家の光協会. （シイタケ/Lentinula edodes）.， 工藤伸一・手塚豊・米内山宏. 1998. 青森のきのこ p. 62. グラフ青森. （シイタケ/Lentinula edodes）.， 池田良幸. 1996. 石川のきのこ図鑑 No. 101. 北國新聞社出版局. （シイタケ/Lentinula edodes）.， 本郷次雄監修. 1994. 山渓フィールドブックス10 きのこ p. 51. 山と渓谷社. （シイタケ/Lentinula edodes）.， 今関六也・大谷吉雄・本郷次雄編. 1988. 山渓カラー名鑑 日本のきのこ p. 29. 山と渓谷社. （シイタケ/Lentinus edodes）.， 今関六也・本郷次雄編. 1987. 原色日本新菌類図鑑 (Ⅰ) No. 12. (シイタケ/Lentinus edodes).， Pegler. 1983. Kavaka 3:30. （/Lentinula edodes = Pleurotus russaticeps）.，  →</td>
		</tr>
		<tr>
			<td>keisai_2</td>
			<td width="150">掲載文献の2件目．</td>
			<td>← 吉見昭一・高山栄. 1986. 京都のキノコ図鑑 No. 250. 京都新聞社. （Lentinula edodes）.， Nagasawa, E. 1982. Rept. Tottori Mycol. Inst. 20:78. （シイタケ/Cortinellus berkeleyanus, Cortinellus edodes）.，  富士尭. 1970. 日本きのこ図版 No. 484. 日本きのこ同好会. (シイタケ/Lentinus edodes).， 石川喜三郎. 1967. 日本きのこ図版 No. 145. 日本きのこ同好会. (シイタケ/-).， 伊藤誠哉. 1959. 日本菌類誌 2(5):170. 養賢堂. （？-/Pleurotus russaticeps）.， 伊藤誠哉. 1959. 日本菌類誌 2(5):176. 養賢堂. (シイタケ/Lentinus edodes).， 今関六也・本郷次雄編. 1957. 原色日本菌類図鑑 No. 68. 保育社. (シイタケ/Lentinus edodes).， 今関六也・土岐晴一. 1954. 林業試験場研究報告 67:37. （シイタケ/Cortinellus edodes）.， 川村清一. 1954. 原色日本菌類図鑑 4:465. 風間書房. （シヒタケ/Armillaria edodes）.， 小林義雄. 1951. 植物研究雑誌 26:29. （シイタケ/Lentinus edodes）.， Iwade. 1944. Bull. Tokyo Univ. For. 33:56. （/Cortinellus edodes f. sterilis = Armillaria edodes f. sterilis）.，  今関六也. 1942. 原色きのこ p. 9. 三省堂. （シヒタケ/Cortinellus edodes）.， 今井三子. 1941. 植物及動物 9(9):231. （シヒタケ/Cortinellus shiitake）.， 朝比奈泰彦監修. 1939. 日本隠花植物図鑑 p. 559. 三省堂. （シヒタケ/Cortinellus shiitake）.， Imai, S. 1938. Jour. Fac. Agr. Hokkaido Imp. Univ. 43:55. （シイタケ/Cortinellus edodes）.， Matsuura, I. & Kanada, Y. 1931. Trans. Tottori Soc. Agr. Sci. 3:118. （シイタケ/Cortinellus shiitake）.， 川村清一. 1929. 原色版 日本菌類図説 No. 40. 大地書院. （シヒタケ/Cortinellus shiitake）.， Ito, S. & Imai, S. 1925. Bot. Mag. Tokyo 39:326. （シイタケ/Cortinellus berkeleyanus）.， 伊藤誠哉&今井三子. 1925. Jour. Soc. Agr. For. Sapporo. 17:161.， 1917. 白井・三宅, 目録 33. （/Agaricus russaticeps）.， 川村清一. 1914. Illus. Jap. Fungi. pl.10.， 梅村. 1912. 植物学雑誌 26:152.， 1905. 白井・目録 70. （/Pleurotus russaticeps）.， 白井. 1905. 目録 24. （/）.， 草野. 1900. 植物学雑誌 14:225.， 田中延次郎. 1889. 植物学雑誌 3:157. （シイタケ/Lepiota shiitake）.，</td>
		</tr>
		<tr>
			<td>img_num</td>
			<td width="150">画像の添付枚数</td>
			<td>2</td>
		</tr>
		<tr>
			<td>img_<mark>数値(連番)</mark></td>
			<td width="150">画像のURL．これは，何個も続く可能性があります．</td>
			<td>http://img.hkcp.cf/path.jpg</td>
		</tr>
		<tr>
			<td>id</td>
			<td width="150">データID．ひとつひとつのデータに個別にふられています．データを引用するときは，このIDを参照します．</td>
			<td>22</td>
		</tr>
	</table>
	</div>
	<hr>
<h2 id="1"><a href="#1">#1</a> はじめる前に</h2>
	<div>
	<h3 id="1-1"><a href="#1-1">#1-1</a>ダウンロード</h3>
		<div>
		このAPIはオープンソースです．<a href="//github.com/hikasukepon/FungiDataAPI">Github</a>からダウンロードしてください．<br>
		ライセンスはMIT LICENSEです．自由に変えたり，ダウンロードしたりしてください．<br>
		また，コマンドラインからのインストールもできます．その場合は次のコードをコマンドとして入力してください．
		<pre><span style="color: #999;">$ </span>git clone <span style="color: #666">https://github.com/hikasukepon/FungiDataAPI.git</span></pre>
		</div>
	<h3 id="1-2"><a href="#1-2">#1-2</a> インクルード</h3>
		<div>
		<a href="#1-1">#1-1</a>でダウンロードしてきたファイル一群を，使いたいファイルと同じディレクトリに設置してください．<br>
		そして，使いたいファイルの先頭に，以下のコードをコピーしてください．
<?php
/* --include-- */

include("lib/api.php");

/* sorce code */
$code = <<<EOT
include("FungiDataAPI/lib/api.php");
EOT;
hl($code);

/* --/include-- */


echo "</div>";

?>
	<h3 id="1-3"><a href="#1-3">#1-3</a> ファイル構造</h3>
		<div>
		エラーが出るときは，ファイルがちゃんと存在するかどうか確かめてください．フォルダ名は赤字になっています．
		<ul>
			<li>
				<span style="color:red;">FungiDataAPI/</span>
				<ul>
					<li>index.php　（このページ）</li>
					<li>
						<span style="color:red;">lib/　（API本体）</span>
						<ul>
							<li>api.php　（API）</li>
							<li>classes.php　（クラス・関数）</li>
						</ul>
					</li>
					<li>
						<span style="color:red;">examples/　（ソースコードのサンプル）</span>
						<ul>
							<li>index.html　（サンプルファイルリスト）</li>
						</ul>
					</li>
					<li>
						<span style="color:red;">octicons/　（アイコンフォント）</span>
						<ul>
							<li>フォントファイル・CSSファイル一群</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
		</div>
</div><hr>
<h2 id="2"><a href="#2">#2</a> クラス</h2>
	<div>
		本APIの機能は，基本的に，クラス・関数で実装されています．
	<h3 id="2-1"><a href="#2-1">#2-1</a> get_dataクラス</h3>
		<div>
		データを取得するクラスです．使用するときは，次のように書いてください．<br>
		(<code>$variable</code>は変数名を変更しても構いません．)
		<?php
		$variable = new get_data();
		$code = <<<EOT
\$variable = new get_data();
EOT;
		hl($code);
		?>
		<Br>
		オプションとして，データのリミットを指定することができます．<br>
		<?php
		$code = <<<EOT
// 普通に全データを取得する
\$variable -> 関数名();

// リミットを指定する．このときの数値は，データIDを指定する．この場合は「データID 10まで」
\$variable -> 関数名( '10' );

// 範囲を指定する．この場合は「データID 10から20まで」
\$variable -> 関数名( '10', '20' );
EOT;
		hl($code);
		?>
		<h4 id="2-1-1"><a href="#2-1-1">#2-1-1</a> debug_array関数</h4>
			<div>
				デバッグ用の関数です．取得したjsonの中身をArrayにして出力します．
				<br>
				<code>print_r()</code>で出力しています．
				<br>
				出力するときに，<code>&lt;pre&gt;</code>タグが一緒に入っているので，別途<code>&lt;pre&gt;</code>タグを書かなくても大丈夫です．
				<?php
				$code = <<<EOT
\$variable -> debug_array();
EOT;
				hl($code);
				?>
				実行結果
				<?php
				$variable -> debug_array(1);
				?>
			</div>
		<h4 id="2-1-2"><a href="#2-1-2">#2-1-2</a> debug_object関数</h4>
			<div>
				上記の<code>debug_array</code>関数とほとんど同じですが，この関数はArrayではなくObjectで出力します．
				<?php
				$code = <<<EOT
\$variable -> debug_object();
EOT;
				hl($code);
				?>
				実行結果
				<?php
				$variable -> debug_object();
				?>
			</div>
		<h4 id="2-1-3"><a href="#2-1-3">#2-1-3</a> return_array関数</h4>
			<div>
				debug_array関数とほぼ同じですが，この関数は，文字列を出力しません．代わりに，返り値を持ちます．
				<?php
				$code = <<<EOT
print_r( \$variable -> return_array() );
// -------
// もしくは
// -------
\$return = \$variable -> return_array();
print_r( \$return );
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				print_r( $variable -> return_array() );
				?></pre>
			</div>
		<h4 id="2-1-4"><a href="#2-1-4">#2-1-4</a> return_object関数</h4>
			<div>
				この関数は上記とほとんど同じです．ですが，Arrayを返すのではなく，Objectを返します．
				<?php
				$code = <<<EOT
print_r( \$variable -> return_object() );
// -------
// もしくは
// -------
\$return = \$variable -> return_object();
print_r( \$return );
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				print_r( $variable -> return_object() );
				?></pre>
			</div>
		<h4 id="2-1-5"><a href="#2-1-5">#2-1-5</a> post_id関数</h4>
			<div>
				特定のIDの情報を取得することができます．引数にIDを指定する必要があります．
				<?php
				$code = <<<EOT
print_r( \$variable -> post_id('34') );
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				print_r( $variable -> post_id('34') );
				?></pre>
			</div>
		<h4 id="2-1-5"><a href="#2-1-5">#2-1-5</a> get_imgurl関数</h4>
			<div>
				指定したIDの画像URLを取得することができます．なお，IDは複数指定が可能です．
				<?php
				$code = <<<EOT
// IDをひとつだけ指定する場合
print_r( \$variable -> get_imgurl( '34' ) );

echo "\\n\\n";

// IDを複数指定する場合
print_r( \$variable -> get_imgurl( array( '34', '55', '89', '92' ) ) );
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				// IDをひとつだけ指定する場合
				print_r( $variable -> get_imgurl( '34' ) );

				echo "\n\n";

				// IDを複数指定する場合
				print_r( $variable -> get_imgurl( array( '34', '55', '89', '92' ) ) );
				?></pre>
			</div>
		</div>
	<h3 id="2-2"><a href="#2-2">#2-2</a> search_dataクラス</h3>
		<div>
		データを検索することができるクラスです．使用するときは，次のように書いてください．<br>
		(<code>$variable</code>は変数名を変更しても構いません．)<br>
		<?php
		$variable = new search_data();
		$code = <<<EOT
\$variable = new search_data();
EOT;
		hl($code);
		?>
		<h4 id="2-2-1"><a href="#2-2-1">#2-2-1</a> 検索する(日時・文献・学名以外)</h4>
			<div>
				データを検索することができます．<br>
				まずは，変数<code>$s_query</code>と<code>$s_where</code>に文字列をセットしましょう．
				<?php
				$variable -> s_query = 'アミガサタケ';
				$variable -> s_where = 'name';
				$code = <<<EOT
\$variable -> s_query = 'アミガサタケ';
\$variable -> s_where = 'name';
EOT;
				hl($code);
				?>
				<code>s_query</code>には検索させたい文字列を，<code>s_where</code>には検索する場所を指定します．<br>
				<code>s_where</code>には，<code>日付</code>　<code>学名</code>　<code>掲載文献1</code>　<code>掲載文献2</code>では検索できないので注意してください．<br>
				<code>s_where</code>に格納することができる文字列は，<a href="#0">#0 返されるデータの説明</a>を参照してください．
				上記のサンプルコードの場合は，<mark>和名検索</mark>で<mark>「アミガサタケ」</mark>という文字列を含むキノコを検索していますね．<br>
				それでは，検索してみましょう．
				<?php
				$variable -> s_query = 'アミガサタケ';
				$variable -> s_where = 'name';
				$arr = $variable -> search();
				$code = <<<EOT
\$variable -> s_query = 'アミガサタケ';
\$variable -> s_where = 'name';
\$arr = \$variable -> search();
print_r(\$arr);
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				print_r($arr);
				?></pre>
				<hr>
				この実行結果を，ループで回して整形すると次のようになります．
				<?php
				$code = <<<EOT
echo "<ul>";
foreach (\$arr as \$key => \$value) {
	echo "<li>" . \$value['name'] . "が" . \$value['basho'] . "で採取されました．</li>";
}
echo "</ul>";
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				echo "<ul>";
				foreach ($arr as $key => $value) {
					echo "<li class='none'>" . $value['name'] . "が" . $value['basho'] . "で採取されました．</li>";
				}
				echo "</ul>";
				?></pre>
				このように，簡単にデータを抽出して表示することができます．
				<hr>
				<small>※完全一致検索や日付検索，学名検索，掲載文献検索もすることができますが，引数が必要だったり，処理が複雑になるので，それらは別の関数で実装されています．<br>
				詳しくは下記の関数をご覧ください．</small>
			</div>
		<h4 id="2-2-2"><a href="#2-2-2">#2-2-2</a> 完全一致検索をする</h4>
			<div>
				基本的には<a href="#2-2-1">#2-2-1 データを検索する</a>と同じコードですが，完全一致検索は，引数を指定することで実現することができます．
				<?php
				$variable -> s_query = 'トガリアミガサタケ';
				$variable -> s_where = 'name';
				$arr = $variable -> search('true');
				$code = <<<EOT
\$variable -> s_query = 'トガリアミガサタケ';
\$variable -> s_where = 'name';
\$arr = \$variable -> search('true');
echo "<ul>";
foreach (\$arr as \$key => \$value) {
	echo "<li>" . \$value['name'] . "が" . \$value['basho'] . "で採取されました．</li>";
}
echo "</ul>";
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				echo "<ul>";
				foreach ($arr as $key => $value) {
					echo "<li class='none'>" . $value['name'] . "が" . $value['basho'] . "で採取されました．</li>";
				}
				echo "</ul>";
				?></pre>
				<hr>
				つまり，<code>search('true')</code>にすると，完全一致検索になります．<br>
				<mark>注意:引数は，必ず小文字の半角英数字で指定してください．</mark>
			</div>
		<h4 id="2-2-3"><a href="#2-2-3">#2-2-3</a> 全項目検索をする</h4>
			<div>
				基本的には<a href="#2-2-1">#2-2-1 データを検索する</a>と同じコードですが，完全一致検索は，引数を指定することで実現することができます．
				<?php
				$variable -> s_query = 'タケ';
				$variable -> s_where = 'name';
				$arr = $variable -> search('all');
				$code = <<<EOT
\$variable -> s_query = 'キノコ';
\$variable -> s_where = 'name';
\$arr = \$variable -> search('all');
echo "<ul>";
foreach (\$arr as \$key => \$value) {
	echo "<li>" . \$value['name'] . "が" . \$value['basho'] . "で採取されました．</li>";
}
echo "</ul>";
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				echo "<ul>";
				foreach ($arr as $key => $value) {
					echo "<li class='none'>" . $value['name'] . "が" . $value['basho'] . "で採取されました．</li>";
				}
				echo "</ul>";
				?></pre>
				<hr>
				つまり，<code>search('all')</code>にすると，全項目対象検索になります．<br>
				<mark>注意:引数は，必ず小文字の半角英数字で指定してください．</mark>
			</div>
		<h4 id="2-2-4"><a href="#2-2-4">#2-2-4</a> 日時検索をする</h4>
			<div>
				日時で検索することができます．<br>
				この検索方法は，<code>date_search</code>関数を使って実現することができます．<br>
				引数に<code>date</code>関数のフォーマットを使用することで，好きな日付で検索することが可能となります．<br>
				まずは，クエリーをセットします．s_whereは必要ありません．
				<?php
				$variable -> s_query = '4月10日';
				$code = <<<EOT
\$variable -> s_query = '4月10日';
EOT;
				hl($code);
				?>
				次に，dateのフォーマットを指定して，date_search() します．
				<?php
				$arr = $variable -> date_search('n月j日');
				$code = <<<EOT
\$arr = \$variable -> date_search('n月j日');
print_r(\$arr);
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				print_r($arr);
				?></pre>
				このように，4月10日に採れたきのこだけが抽出できているのが分かります．
			</div>
		<h4 id="2-2-5"><a href="#2-2-5">#2-2-5</a> 学名検索・文献検索をする</h4>
			<div>
				学名で検索することができます．<br>
				この検索方法は，<code>o_search</code>関数を使って実現することができます．<br>
				また，この関数を使えば文献検索もすることができます．<br>
				まずは，学名検索を試してみましょう．<br>
				クエリーをセットします．s_whereは必要ありません．
				<?php
				$variable -> s_query = 'Lentinula edodes';
				$code = <<<EOT
\$variable -> s_query = 'Lentinula edodes';
EOT;
				hl($code);
				?>
				次に，o_search() します．
				<?php
				$arr = $variable -> o_search();
				$code = <<<EOT
\$arr = \$variable -> o_search();
print_r(\$arr);
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				print_r($arr);
				?></pre>
				このように，Lentinula edodesという学名(シイタケのこと)のものを取得できているのが分かります．
				<hr>
				次に，文献検索をしてみましょう．これは，引数に<code>'true'</code>を加えるだけで実現できます．<br>
				<?php
				$variable -> s_query = '検索図版';
				$code = <<<EOT
\$variable -> s_query = '検索図版';
EOT;
				hl($code);
				?>
				次に，o_search('true') します．
				<?php
				$arr = $variable -> o_search('true');
				$code = <<<EOT
\$arr = \$variable -> o_search();
print_r(\$arr);
EOT;
				hl($code);
				?>
				実行結果
				<pre><?php
				print_r($arr);
				?></pre>

				このように，文献情報に「検索図版」が含まれているきのこが抽出できました．
			</div>
		</div>
	<h3 id="2-3"><a href="#2-3">#2-3</a> listsクラス</h3>
		<div>
		データのリストを取得するクラスです．
		<h4 id="2-3-1"><a href="#2-3-1">#2-3-1</a> データのリストを取得する</h4>
			<div>
				重複を削除した，特定の項目だけを抽出したデータを取得することができます．<br>
				なお，取得したデータは昇順にソートされています．<br>
				例を見てみましょう．
				<?php
				$code = <<<EOT
\$variable = new lists();
\$variable -> l_where = 'name';
\$arr = \$variable -> output();
print_r(\$arr);
EOT;
		hl($code);

		echo "実行結果<pre>";
		$variable = new lists();
		$variable -> l_where = 'name';
		$arr = $variable -> output();
		print_r($arr);
		echo "</pre>";
		?>
				和名の一覧が取得できているのが分かります．
				ちなみに，<code>l_where</code>に格納する文字列は，<a href="#0">#0 返されるデータの解説</a>にある，項目の一覧表から選んでください．
			</div>
		<h4 id="2-3-1"><a href="#2-3-2">#2-3-2</a> データの種類数を取得する</h4>
			<div>
				上記のデータの，種数を取得できます．
				例を見てみましょう．
				<?php
				$code = <<<EOT
\$variable = new lists();
\$variable -> l_where = 'name';
echo "現在，" . \$variable -> num() . "種類です．";
EOT;
				hl($code);

				echo "<pre>";
				$variable = new lists();
				$variable -> l_where = 'name';
				echo "現在，" . $variable -> num() . "種類です．";
				echo "</pre>";
		?>
				種数が取得できているのが分かります．<br>
				変数の説明などについては，<a href="#2-3-1">#2-3-1 データのリストを取得する</a>を見てください．
			</div>
		</div>
	</div>
		<hr>

<h2 id="3"><a href="#3">#3</a> 統計</h2>
<div>
	データを素にして，統計します．統計用の関数があるので，それを使いましょう．<br>
	この賞では，クラス<code>statistics</code>を使います．以下のように書いてください．
	<?php
	$variable = new statistics();
	$code = <<<EOT
\$variable = new statistics();
EOT;
	hl($code);
	?>
				<hr>
				<h3 id="3-1"><a href="#3-1">#3-1</a> いつなにがとれたか</h3>
				<div>
					それでは，「いつなにがとれたか」を集計してみましょう．単位を設定できます．
					<?php
					$code = <<<EOT
\$arr = \$variable -> when('日');
print_r(\$arr);
EOT;
					hl($code);
					?>
					実行結果
					<pre><?php
					$arr = $variable -> when('日');
					print_r($arr);
					?></pre>
				</div>
</div>