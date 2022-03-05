<!DOCTYPE html>
<html>
<head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
	<script type="text/javascript">
    $(function() {
        $('.attribute').click(function() {
            alert($(this).val() + ' ' + (this.checked ? 'checked' : 'unchecked'));
        });
    });
</script>
    <input type="checkbox" name="attribute" class="attribute" value="ONE"> ONE
    <input type="checkbox" name="attribute" class="attribute" value="TWO"> TWO
    <input type="checkbox" name="attribute" class="attribute" value="THREE"> THREE
    <input type="checkbox" name="attribute" class="attribute" value="FOUR"> FOUR</script>
</body>
</html>