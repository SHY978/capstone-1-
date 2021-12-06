<?php
/* PHP 샘플 코드 */


$ch = curl_init();
$url = 'http://ws.bus.go.kr/api/rest/buspos/getBusPosByRtid'; /*URL*/
$queryParams = '?' . urlencode('ServiceKey') . '=Ox8rkDH%2BMyXHP0p80T9N6JVQ0xkvgH4vGf9lgu5tXAk6CNXZfOMwtddTWYzCBB6mW8rtmcTwPdp7TsozykSLUg%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('busRouteId') . '=' . urlencode('100100118'); /**/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);

curl_close($ch);
$nextStId = "";
//var_dump($response);

$object = simplexml_load_string($response);

  $itemList = $object->msgBody->itemList;



  //var_dump($itemList);

  foreach ($itemList as $item) {
    if(($item->plainNo)=="서울74사7236"){
      $nextStId = $item->nextStId;
      //echo($nextStId)."<br>";
      //echo($item->plainNo)."<br>"."<br>";
      /*
      if(strcmp(($item->isrunyn),"0") == 0 ){
        echo("해당 차량은 운행을 종료 하였습니다.");
      }
      */
    }
  }
?>
<?
$ch = curl_init();
$url = 'http://ws.bus.go.kr/api/rest/busRouteInfo/getStaionByRoute'; /*URL*/
$queryParams = '?' . urlencode('ServiceKey') . '=Ox8rkDH%2BMyXHP0p80T9N6JVQ0xkvgH4vGf9lgu5tXAk6CNXZfOMwtddTWYzCBB6mW8rtmcTwPdp7TsozykSLUg%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('busRouteId') . '=' . urlencode('100100118'); /**/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);

curl_close($ch);
$stationNm = "";
$seq = "";
//var_dump($response);

$object = simplexml_load_string($response);
$itemList = $object->msgBody->itemList;

//var_dump($object);

foreach ($itemList as $item) {
  if(strcmp(($item->station),$nextStId)==0){
    $stationNm = $item->stationNm;
    $seq = $item->seq+1;
    //echo($stationNm);
    //echo($nextStId)."<br>";
  }
  if(strcmp(($item->seq),$seq)==0){
    $next_stationNm = $item->stationNm;
    echo($next_stationNm);
  }
}
//echo($stationNm);
  if($nextStId == null){
    echo("해당 차량은 운행을 종료 하였습니다.");
  }
?>
