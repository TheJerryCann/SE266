<?php include __DIR__ . '/../include/header.php'; ?>
<p>Alex Rea</p>
<ul>
    <li><a href="../W1/index.php">Week 1</li>
    <li><a href="../W2/index.php">Week 2</li>
    <li><a href="../W3/index.php">Week 3</li>
    <li><a href="../W4/viewPatients.php">Week 4</li>
    <li><a href="W5/index.php">Week 5</li>
    <li><a href="W6/index.php">Week 6</li>
    <li><a href="W7/index.php">Week 7</li>
    <li><a href="W8/index.php">Week 8</li>
    <li><a href="W9/index.php">Week 9</li>
    <li><a href="W10/index.php">Week 10</li>
</ul>
<?php
$file = basename($_SERVER['PHP_SELF']);
$mod_date=date("F d Y h:i:s A", filemtime($file));
echo "File last updated $mod_date ";
#cs.neit.edu/~amrea/SE266/site/
?>
