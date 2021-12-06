<!DOCTYPE html>
<html lang="ko" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>버스 가이드</title>
  <style media="screen">
    #thisSt {
      font-size: 30px;
    }

    #next {
      font-size: 30px;
    }

    #bottom {
      margin-top: 10%;
    }
  </style>
  <script>
    $(document).ready(function() {
       
        $.ajax({
          url:'api.php',
          success: function(data) {
            $("#thisSt").val(data);
          },
          error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
          }
        });
      
        $.ajax({
          url:'next.php',
          success: function(data) {
            $("#next").val(data);
          },
          error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
          }
        });
        $('#downbtn').click(function(){
        $.ajax({
          url:'down.php',
          success: function(data) {
            
          },
          error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
          }
        });
      });
      
      $('#upbtn').click(function(){
        $.ajax({
          url:'up.php',
          success: function(data) {
            
          },
          error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
          }
        });
      });
      
      $('#stop_b').click(function(){
        $.ajax({
          url:'bell.php',
          success: function(data) {
            
          },
          error: function(request, status, error) {
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
          }
        });
      });
      
      })
      
  </script>

</head>

<body oncontextmenu='return false' ondragstart='return false' onselectstart='return false'>
  <div data-role="page" id="page1">
    <header id="page_header" style="width:70%; margin:auto; text-align:center; margin-top:9%;">
      <div name="button1" id="logo"><img src="logo.png" width="100%" height="100%"></div>
    </header>
    <div data-role="content" id="page_content" style="width:70%; margin:auto; margin-top:5%;">
      <div id="map_api">
        <label>이번정류소</label>
        <input type="text" name="thisSt" id="thisSt" value="" class="ui-disabled">
        <label>다음정류소</label>
        <input type="text" name="next" id="next" value="" class="ui-disabled">
      </div>
      <div id="bottom">
        <section id="stop" style="width:60%; float:left;">
          <div href="#" name="button1" id="stop"><button type="button" id="stop_b" name="stop_b"><img src="벨.png" width="100%" height="100%"></button></div>
        </section>
        <aside id="weather" style="width:30%; float:right;">
          <form method="post" name="form1" action="">
            <div href="#" name="button2" id="weather_up" ><button type="button" id="upbtn" name="upbtn" ><img src="up.png" width="100%" height="100%"></button></div>
            <div href="#" name="button3" id="weather_down"><button type="button" name="downbtn" id="downbtn"><img src="down.png" width="100%" height="100%"></button></a></div>
          </form>  
        </aside>
      </div>
    </div>
  </div>
</body>

</html>
on
