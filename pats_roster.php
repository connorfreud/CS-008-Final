<?php
include ('pats_top.php');

$roster = '';
if (isset($_GET['roster'])) {
    $roster = htmlentities($_GET[roster], ENT_QUOTES, "UTF-8");
}
// Open weather data csv
$debug = false;
if (isset($_GET["debug"])) {
    $debug = true;
}

$myFolder = 'data';

$myFileName = 'pats_roster';

$fileExt = '.csv';

$filename = $myFolder . $myFileName . $fileExt;

if ($debug)
    print '<p>filename is ' . $filename;

$file = fopen($filename, "r");

if ($debug) {
    if ($file) {
        print '<p>File Opened Succesful.</p>';
    } else {
        print '<p>File Open Failed.</p>';
    }
}
// End open csv
// Read Roster
if ($file) {
    if ($debug)
        print '<p>Begin reading data into an array.</p>';

    // read the header row, copy the line for each header row
    // you have.
    $headers[] = fgetcsv($file);

    if ($debug) {
        print '<p>Finished reading headers.</p>';
        print '<p>My header array</p><pre>';
        print_r($headers);
        print '</pre>';
    }

    // read all the data
    while (!feof($file)) {
        $roster[] = fgetcsv($file);
    }

    if ($debug) {
        print '<p>Finished reading data. File closed.</p>';
        print '<p>My data array<p><pre> ';
        print_r($roster);
        print '</pre></p>';
    }
}
// End read data
// close the file
fclose($file);
?>

<article id ="content">
    <h2>New England Patriots 2018 Roster</h2>
    <table>

        <?php
        foreach ($headers as $header) {
            print '<tr>';
            print '<th>' . $header[0] . '</th>';
            print '<th>' . $header[1] . '</th>';
            print '<th>' . $header[2] . '</th>';
            print '<th>' . $header[3] . '</th>';
            print '<th>' . $header[4] . '</th>';
            print '<th>' . $header[5] . '</th>';
            print '<th>' . $header[6] . '</th>';
            print '<th>' . $header[7] . '</th>';
            print '<th>' . $header[8] . '</th>';
            print '<th>' . $header[9] . '</th>';
            print '<th>' . $header[10] . '</th>';
            print '<th>' . $header[11] . '</th>';
            print '<th>' . $header[12] . '</th>';
            print '<th>' . $header[13] . '</th>';
            print '</tr>' . PHP_EOL;
        }
        $totalRoster = 0;
        
        foreach ($rosters as $roster) {
            if ($roster == $roster[1]) {
                $roster++;
                print '<tr>';
                print '<td>' . $roster[0] . '</td>';
                print '<td>' . $roster[1] . '</td>';
                print '<td>' . $roster[2] . '</td>';
                print '<td>' . $roster[3] . '</td>';
                print '<td>' . $roster[4] . '</td>';
                print '<td>' . $roster[5] . '</td>';
                print '<td>' . $roster[6] . '</td>';
                print '<td>' . $roster[7] . '</td>';
                print '<td>' . $roster[8] . '</td>';
                print '<td>' . $roster[9] . '</td>';
                print '<td>' . $roster[10] . '</td>';
                print '<td>' . $roster[11] . '</td>';
                print '<td>' . $roster[12] . '</td>';
                print '<td>' . $roster[13] . '</td>';
                print '</tr>' . PHP_EOL;
            }
        }
        ?>
    </table>

</article><!-- end content -->
</body>
</html>
