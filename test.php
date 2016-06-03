<html>
<head>
<title>Bootstrap Grid</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="./jquery/1.12.4/jquery.min.js"></script>
  <script src="./bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified CSS -->

<!-- Optional theme -->
<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript">
$(document).ready(function($) {
    $(".table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>
<style type="text/css">
.table-row{
cursor:pointer;
}
</style>
</head>
<body>
<div class="container">
<table class='table table-bordered table-condensed table-striped table-hover'>
<tr><th>Name</th><th>Email</th><th>Country</th></tr>
 <tr class="table-row"data-href="http://tutorialsplane.com"><td>Jhohn</td><td>jhone@gmail.com</td><td>USA</td></tr>
 <tr class="table-row" data-href="http://tutorialsplane.com"><td>Kelly</td><td>kelly@gmail.com</td><td>USA</td></tr>
<tr class="table-row" data-href="http://tutorialsplane.com"><td>Kamana</td><td>kamna@gmail.com</td><td>India</td></tr>
<tr class="table-row" data-href="http://tutorialsplane.com"><td>Anay</td><td>anay@gmail.com</td><td>Canada</td></tr>
 </table>
</div>
</body>
</html>
