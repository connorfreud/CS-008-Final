<?php
include ('pats_top.php');
?>
<!-- Pictures of stuff to buy -->
<figure>
    <img alt="Custom Jersey" src="images/customjersey.jpeg" class="CustomJersey">
            <figcaption>source: https://www.nflshop.com/new-england-patriots/nike-mens-new-england-patriots-customized-game-away-jersey/t-70821474+p-247892674844+z-8-1351497844</figcaption>
</figure>

<!-- Initialize variables -->
<?php
$Name = '';
$Number = '';
$nameERROR = false;
$numberERROR = false;
$errorMsg = array();
?>


<!-- Security Check -->

<?php
if(isset($_POST["btnSubmit"])) {
    // url for this form
    $thisURL = $domain . $phpSelf;
    
    if(!securityCheck($thisURL)){
        $msg = '<p>Sorry, you cannot access this page.</p>';
        $msg.= '<p>Security breach reported.</p>';
        die($msg);
    }
}
// <!-- Sanitize data --> //
$Name = htmlentities($_POST['txtName'], ENT_QUOTES, 'UTF-8');
$Number = htmlentities($_POST['txtNumber'], ENT_QUOTES, 'UTF-8');
?>


<!-- validate data -->
<?php
    if ($Name == "") {
        $errorMsg[] = "Please enter the name on your jersey";
        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($Name)) {
        $errorMsg[] = "Your jersey name may not contain special characters";
        $nameERROR = true;
    }
    
    if ($Number == "") {
        $errorMsg[] = "Please enter your jersey number";
        $numberERROR = true;
    } elseif (!is_int($Number)) {
        $errorMsg[] = "Pleas enter your jersey number";
        $numberERROR = true;
    }
    
        ?>

<!-- if form is valid, save the data -->    
<?php
if (!$errorMsg){
        if ($debug) {
                print '<p>Form is valid.</p>';
        } 
}
    
    // array used to hold form values that will be saved to csv
    $dataRecord = array();
    
    // assign values to dataRecord array
    $dataRecord[] = $Name;
    $dataRecord[] = $Number;
    
    
    //  setup csv file
    $myFolder = 'data/';
    $myFileName = 'custom';
    $fileExt = '.csv';
    $filename = $myFolder . $myFileName . $fileExt;
    
    if ($debug) print PHP_EOL . '<p>filename is ' . $filename;
    
    // open file to append
    $file = fopen($filename, 'a');
    
    // write info from form
    fputcsv($file, $dataRecord);
    
    // close file
    fclose($file);
   ?>

<!-- Input custom name and number -->

<main>
    <article>
                    <form action="<?php print $phpSelf;?>"
                           id="frmOrder"
                           method="post">

                        <fieldset class = text-field>
                             <p>
                                 <label class='required' for="txtName">Name</label>
                                 <input
                                     <?php if ($Name) print 'class="mistake"'; ?>
                                     id="txtName"
                                     maxlength="50"
                                     name="txtName"
                                     onfocus="this.select()"
                                     placeholder="Enter the name on your jersey"
                                     tabindex="100"
                                     type="text"
                                     value="<?php print $Name; ?>"
                                   >
                             </p>
                        </fieldset>
                        
                        <fieldset class = text-field>
                             <p>
                                 <label class='required' for="txtNumber">Number</label>
                                 <input
                                     <?php if ($numberERROR) print 'class="mistake"'; ?>
                                     id="txtNumber"
                                     maxlength="2"
                                     name="txtNumber"
                                     onfocus="this.select()"
                                     placeholder="Enter a 2 digit number"
                                     tabindex="101"
                                     type="text"
                                     value="<?php print $Number; ?>"
                                   >
                             </p>
                        </fieldset>
                        
                   <fieldset class="buttons">
                             <input class="button" id="btnSubmit" name="btnSubmit" tabindex="500" type="submit" value="Submit Order" >
                         </fieldset>
                    </form>
         </article>   
</main>
</html>
