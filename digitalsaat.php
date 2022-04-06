<html>
<h2 id="tarih"></h2>
<h2 id="saat"></h2><!--Dijital Saat Gösterimi -->


<!-- Dijital Saat Kodları -->
<script type="text/javascript">
window.onload = startTime;
function startTime()
{
 var today=new Date();

 var D=today.getDate();
 var M=today.getMonth()+1;
 var Y=today.getFullYear();

 var h=today.getHours();
 var m=today.getMinutes();
 var s=today.getSeconds();


 D=checkTime(D);
 M=checkTime(M);
 Y=checkTime(Y);
 h=checkTime(h);
 m=checkTime(m);
 s=checkTime(s);
 document.getElementById("tarih").innerHTML =D+"-"+M+"-"+Y;
 document.getElementById('saat').innerHTML=h+":"+m+":"+s;
 t=setTimeout('startTime()',1000);


}

function checkTime(i)
{
if (i<10)
 {
  i="0" + i;
 }
return i;
}
</script>

<style type="text/css">

/* #sayfa-baslik{
   font-size: 24px;
   color: #333;
   border-bottom: 1px solid #333;
}
#sayfa-baslik{
   font-size: 20px;
   color: #f40;
   border-bottom: 1px solid #f40;
} */
#saat{
   color: red;
   /* position: fixed; */
      top: 112px;
      left: 380px;
   /* background: #ccc; */
   /* text-align: center; */
   /* border-bottom: 1px solid #f40; */
}
#tarih{
   color: blue;
   /* position: fixed; */
      top: 90px;
      left: 370px;
   /* background: #ccc; */
   /* text-align: center; */
   /* border-bottom: 1px solid #f40; */
}
</style>





</html>
