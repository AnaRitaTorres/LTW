<?php
include_once ('/controllers/validation.php');
include('templates/header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Reviews</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href=" https://fonts.googleapis.com/css?family=Rock+Salt">
</head>
<body>
<div id="content">
	<div class="review">
		<?//TODO?>
		<form action="" method="post">
			<label>
                Title:<input type="text" name="title" required>
			</label>
            <br>
			<label>
                Rating:<input type="number" name="rating" required>/10
			</label>
            <br>
			<label>
                Body:<textarea rows="10" cols="80" name="body" required></textarea>
			</label>
            <br>
			<input type="submit" value="Save">
		</form>
	</div>
</div>
</body>
</html>

<?php
include('templates/footer.php');
?>