<?

$fileHandler = fopen('C:\addresses.csv', 'r');

$csv = fgetcsv($fileHandler);
?>

<!doctype html>
<html lang="he">
<head>
	<meta charset="UTF-8">
	<title>Stickers</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?

$rows = 0;

while($csv = fgetcsv($fileHandler)) {

	if(! $rows)
		echo '<div class="page">';

	?>
	<div class="sticker">
		<div class="sticker-content">
			<div class="for">לכבוד</div>
			<div class="name"><?= implode(' ', [$csv[0], $csv[1], $csv[2], $csv[3]]) ?></div>
			<div class="address"><?

				$address = implode(' ', [$csv[4], $csv[5]]);

				if($csv[6])
					$address .= '/' . $csv[6];

				echo $address;
				?></div>
			<div class="city"><?= $csv[7]  ?></div>
		</div>

	</div>
	<?
	if($rows >= 23) {

		$rows = 0;

		echo '</div>';
	}
	else
		$rows++;
} ?>
</body>
</html>