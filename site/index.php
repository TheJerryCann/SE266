
<p>Alex Rea</p>
<ul>
    <li><a href="../W1/index.php">Week 1</li>
    <li><a href="../W2/index.php">Week 2</li>
    <li><a href="../W3/atm_starter.php">Week 3</li>
    <li><a href="../W4/viewPatients.php">Week 4</li>
    <li><a href="../W5/viewPatients.php">Week 5</li>
    <li><a href="../W6/login.php">Week 6</li>
</ul>
<?php
$file = basename($_SERVER['PHP_SELF']);
$mod_date=date("F d Y h:i:s A", filemtime($file));
echo "File last updated $mod_date ";
#cs.neit.edu/~amrea/SE266/site/
?>
