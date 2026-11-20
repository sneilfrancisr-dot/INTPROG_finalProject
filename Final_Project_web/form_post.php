<?php
$name   = htmlspecialchars($_POST['name']   ?? '');
$course = htmlspecialchars($_POST['course'] ?? '');
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>POST Result</title><link rel="stylesheet" href="style.css"></head>
<body><div class="wrap"><section>
<div class="card">
<h2>POST Method Result</h2>
<p class="d">Method used: <b><?= htmlspecialchars($_SERVER['REQUEST_METHOD']) ?></b></p>
<?php if ($name !== '' || $course !== ''): ?>
  <p><b>Name:</b> <?= $name ?></p>
  <p><b>Course:</b> <?= $course ?></p>
<?php else: ?>
  <p>No data received. Submit the form from the home page.</p>
<?php endif; ?>
<a class="btn" href="index.php#demos">← Back</a>
</div></section></div></body></html>
