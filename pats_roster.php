<?php
include ('pats_top.php');
$roster = '';
if (isset($_GET['roster'])) {
    $roster = htmlentities($_GET[roster], ENT_QUOTES, "UTF-8");
}

?>
<main>
        <article>
            <h2>Roster</h2>
<?php
// Open roster csv
$debug = false;
if (isset($_GET["debug"])) {
    $debug = true;
}
echo "<table>\n\n";
$file = fopen("data/roster.csv", "r");
while (($line = fgetcsv($file)) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
}
fclose($f);
echo "\n</table></article></main></body></html>";
fclose($file);
?>
