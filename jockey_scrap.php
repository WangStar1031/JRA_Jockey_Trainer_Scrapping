<?php
header('content-type: text/html; charset=shift-jis');

set_time_limit(-1);
require_once("simple_html_dom.php");

function getPostDataFromUrl($_url, $_cname){
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $_url, 	CURLOPT_RETURNTRANSFER => true, 	CURLOPT_ENCODING => "", 	CURLOPT_MAXREDIRS => 10, 	CURLOPT_TIMEOUT => 30, 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 	CURLOPT_CUSTOMREQUEST => "POST", 	CURLOPT_POSTFIELDS => "cname=" . $_cname, 	CURLOPT_HTTPHEADER => array(
		"Cache-Control: no-cache", 	"Content-Type: application/x-www-form-urlencoded", 	"Postman-Token: 61b2cb3c-8052-4ee8-a425-06ae4c5dcf4a"
		), ));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		return "";
	} else {
		return $response;
	}
}

$arrCNames = ["pw04kmk005339/DD", "pw04kmk005212/E9", "pw04kmk005386/50", "pw04kmk001088/E6", "pw04kmk001014/C9", "pw04kmk001075/D7", "pw04kmk005203/0A", "pw04kmk001126/96", "pw04kmk001102/90", "pw04kmk001093/95", "pw04kmk000422/1B", "pw04kmk000666/8B", "pw04kmk001018/F9", "pw04kmk001077/EF", "pw04kmk001122/66", "pw04kmk001032/87", "pw04kmk001096/39", "pw04kmk001127/22", "pw04kmk001043/7E", "pw04kmk001154/BF", "pw04kmk000732/64", "pw04kmk001116/2B", "pw04kmk001115/9F", "pw04kmk000660/43", "pw04kmk001169/E6", "pw04kmk001092/09", "pw04kmk001095/AD", "pw04kmk001166/42", "pw04kmk001157/63", "pw04kmk001085/42", "pw04kmk000663/E7", "pw04kmk001170/65", "pw04kmk001152/A7", "pw04kmk001168/5A", "pw04kmk001015/55", "pw04kmk001009/1A", "pw04kmk001019/85", "pw04kmk001034/9F", "pw04kmk000684/49", "pw04kmk001144/54", "pw04kmk001025/C0", "pw04kmk001124/7E", "pw04kmk001160/FA", "pw04kmk001037/43", "pw04kmk001165/B6", "pw04kmk005243/B6", "pw04kmk001156/D7", "pw04kmk000700/0B", "pw04kmk001164/2A", "pw04kmk001117/B7", "pw04kmk001147/F8", "pw04kmk001162/12", "pw04kmk001150/8F", "pw04kmk001146/6C", "pw04kmk000689/05", "pw04kmk001128/AE", "pw04kmk001038/CF", "pw04kmk001167/CE", "pw04kmk001163/9E", "pw04kmk001109/64", "pw04kmk001161/86", "pw04kmk000655/94", "pw04kmk001067/84", "pw04kmk001125/0A", "pw04kmk001069/9C", "pw04kmk001051/D1", "pw04kmk005429/BC", "pw04kmk001135/75", "pw04kmk001099/DD", "pw04kmk005509/30", "pw04kmk001140/24", "pw04kmk001091/7D", "pw04kmk001130/B9", "pw04kmk001029/F0", "pw04kmk001114/13", "pw04kmk001119/CF", "pw04kmk001118/43", "pw04kmk000726/29", "pw04kmk000894/48", "pw04kmk000641/F9", "pw04kmk001171/F1", "pw04kmk001153/33", "pw04kmk001141/B0", "pw04kmk001062/C8", "pw04kmk000727/B5", "pw04kmk001008/8E", "pw04kmk001059/31", "pw04kmk001138/19", "pw04kmk001173/09", "pw04kmk001151/1B", "pw04kmk001030/6F", "pw04kmk001052/5D", "pw04kmk001063/54", "pw04kmk001101/04", "pw04kmk001046/22", "pw04kmk000691/10", "pw04kmk001035/2B", "pw04kmk001112/FB", "pw04kmk001004/5E", "pw04kmk001134/E9", "pw04kmk001066/F8", "pw04kmk001159/7B", "pw04kmk001005/EA", "pw04kmk001139/A5", "pw04kmk001129/3A", "pw04kmk001087/5A", "pw04kmk000722/F9", "pw04kmk001080/86", "pw04kmk001123/F2", "pw04kmk001068/10", "pw04kmk001036/B7", "pw04kmk001155/4B", "pw04kmk001133/5D", "pw04kmk001113/87", "pw04kmk000695/40", "pw04kmk001031/FB", "pw04kmk001158/EF", "pw04kmk001143/C8", "pw04kmk000629/83", "pw04kmk001082/9E", "pw04kmk001049/C6", "pw04kmk000652/F0", "pw04kmk001023/A8", "pw04kmk001120/4E", "pw04kmk001061/3C", "pw04kmk001131/45", "pw04kmk001089/72", "pw04kmk001142/3C", "pw04kmk001172/7D", "pw04kmk001105/34", "pw04kmk001108/D8", "pw04kmk001149/10", "pw04kmk001010/99", "pw04kmk001057/19", "pw04kmk001097/C5", "pw04kmk001072/33", "pw04kmk000733/F0", "pw04kmk001111/6F", ];
$arrEngName = ["Christophe Lemaire", "Mirco Demuro", "Keita Tosaki", "Yuga Kawada", "Yuichi Fukunaga", "Hironobu Tanabe", "Yasunari Iwata", "Kohei Matsuyama", "Yuichi Kitamura", "Yusuke Fujioka", "Hiroyuki Uchida", "Yutaka Take", "Ryuji Wada", "Shu Ishibashi", "Kosei Miura", "Kenichi Ikezoe", "Takuya Ono", "Genki Maruyama", "Hiroshi Kitamura", "Fuma Matsuwaka", "Hideaki Miyuki", "Kota Fujioka", "Suguru Hamanaka", "Norihiro Yokoyama", "Miyabi Muto", "Akihide Tsumura", "Hayato Yoshida", "Kenji Kawamata", "Katsuma Sameshima", "Masami Matsuoka", "Masayoshi Ebina", "Takeshi Yokoyama", "Ryoya Kozaki", "Akatsuki Tomita", "Yoshihiro Furukawa", "Daichi Shibata", "Shinichiro Akiyama", "Manabu Sakai", "Katsuharu Tanaka", "Yuji Hishida", "Masaki Katsuura", "Kyosuke Kokubun", "Kiwamu Ogino", "Keisuke Dazai", "Yutaro Mori", "Yuichi Shibayama", "Shota Kato", "Hirofumi Shii", "Nanako Fujita", "Kyosuke Maruta", "Yoshimasa Kido", "Takuya Kowata", "Yukito Ishikawa", "Tsubasa Iwasaki", "Teruo Eda", "Haruhiko Kawasu", "Yuta Nakatani", "Ikuya Kowata", "Ryusei Sakai", "Hiroto Mayuzumi", "Kazuki Kikuzawa", "Mitsuaki Hayashi", "Kenji Hirasawa", "Yusaku Kokubun", "Yusuke Igarashi", "Takayuki Kato", "Yoshitsugu Okada", "Makoto Sugihara", "Ryota Sameshima", "Joao Moreira", "Kazuo Yokoyama", "Yuji Tannai", "Ryo Takakura", "Tomoharu Bushizawa", "Ken Tanaka", "Takuma Ito", "Hokuto Miyazaki", "Junji Iwabe", "Futoshi Komaki", "Yoshitomi Shibata", "Atsuya Nishimura", "Hatsuya Kowata", "Yuji Nakai", "Shinji Kawashima", "Takaya Ueno", "Koshi Yamamoto", "Shinichi Ishigami", "Takashi Fujikake", "Keishi Yamada", "Toshiki Inoue", "Daisaku Matsuda", "Mitsuki Kaneko", "Tadashi Kosaka", "Masayuki Nakamura", "Jun Takada", "Shinya Kitazawa", "Yuzo Shirahama", "Takuma Ogino", "Yuichiro Nishida", "Junji Shimada", "Yoshiyasu Namba", "Hayato Mitsuya", "Makoto Nishitani", "Kazuma Mori", "Ryuichi Sugahara", "Sho Ueno", "Tetsuya Kobayashi", "Hiroshi Sakuma", "Yuta Onodera", "Yasunori Minoshima", "Tomoaki Takenoshita", "Eishin Yoshi", "Yuya Mizuguchi", "Taro Kusano", "Norihisa Hamanoya", "Issei Murata", "Yutaro Nonaka", "Kazuma Harada", "Hatsuhiro Kowata", "Keita Suzuki", "So Nihonyanagi", "Shigefumi Kumazawa", "Yusuke Eda", "Kei Oehara", "Taichi Nishimura", "Kazuya Oba", "Kazuma Takano", "Yoshihito Nagaoka", "Toshiki Hattori", "Taiga Tamura", "Hayato Matoba", "Keita Ban", "Misaki Shibata", "Shogo Hatabata", "Taichi Kojima", "Sho Kakihara", "Yu Kuroiwa", "Satoshi Oshita",];
for( $i = 0; $i < count($arrCNames); $i++){
	$cname = $arrCNames[$i];
	$rawContents = getPostDataFromUrl("http://www.jra.go.jp/JRADB/accessK.html", $cname);
	// echo $rawContents;
	$html = str_get_html($rawContents);
	// echo $html;
	$records = $html->find(".header3 strong");
	foreach ($records as $record) {
		echo($record . ", " . $arrEngName[$i]);
		echo "<br/>";
	}
}
?>
