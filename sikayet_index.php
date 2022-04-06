<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
 
<script>
 
$(document).ready(function(){
$('.para').mask('000.000.000.000.000,00', {reverse: true});
});
 
</script>
</head>
<body>
 
<input type="text" class="para">
 
</body>
</html>