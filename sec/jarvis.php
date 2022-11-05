<!DOCTYPE html>
<html>
<head>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    });
});
</script>
</head>
<body>

<p>If you click on the "Hide" button, I will disappear.</p>

<button id="hide">Hide</button>
<button id="show">Show</button>

</body>

<!-- Mirrored from www.w3schools.com/jquery/tryit.asp?filename=tryjquery_hide_show by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:03:04 GMT -->
</html>
