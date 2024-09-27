<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="margin-left:470px"> Codeignitor Project</h1><br>
    <h2 style="margin-left:450px; color:green">Your Form Submitted Successfully</h2>
    <div>
        <button style="margin-left:450px;"  onclick="redirectToRoute();">Click Here </button>
    </div>
    <div>
        <button style="margin-left:450px;"  onclick="indexpage();">Click Here go listing page </button>
    </div>
</body>
<script>
  function redirectToRoute() {
    window.location.href = '/test';
  }
  function indexpage() {
    window.location.href = '/list'
  }
</script>
</html>