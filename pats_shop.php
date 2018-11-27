<?php
include ('pats_top.php');
?>
<!-- Pictures of stuff to buy -->
<figure>
    <img alt="Red Shirt" src="images/Red.jpg">
            <figcaption>source: https://d1wid1q8ctfefm.cloudfront.net/spree/images/attachments/000/005/218/original/FanaticsTBSlubLSTop.jpg?1536786193</figcaption>
</figure>
<figure>
    <img alt="Navy Blue T Shirt" src="images/NavyBlue.jpg">
            <figcaption>source: https://d1wid1q8ctfefm.cloudfront.net/spree/images/attachments/000/004/566/original/NikeCottonTeeNavy.jpg?1526653863</figcaption>
</figure>
<figure>
    <img alt="Grey T Shirt" src="images/Grey.jpg">
            <figcaption>source: https://d1wid1q8ctfefm.cloudfront.net/spree/images/attachments/000/004/722/original/NikeSlubTeeGray.jpg?1530886182</figcaption>
</figure>

<!-- Initialize variables -->
<?php
$size = 'small';
$color = '';
$quantity = '';
$email = '';

$sizeERROR = false;
$colorERROR = false;
$quantityERROR = false;
$emailERROR = false;

$errorMsg = array();
$mailed = false;
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

$size = htmlentities($_POST['lstSize'], ENT_QUOTES, 'UTF-8');
$color = htmlentities($_POST['radColor'], ENT_QUOTES, 'UTF-8');
$quantity = htmlentities($_POST['txtQuantity'], ENT_QUOTES, 'UTF-8');
?>


<!-- validate data -->
<?php
    if ($size == ''){
        $errorMsg[] = 'Please choose a size';
        $sizeERROR = true;
    }
    if ($color != 'Red' AND $color != 'Navy Blue' AND $color != 'Grey'){
        $errorMsg[] = 'Please select your color';
        $colorERROR = true;
    }
    
    if ($quantity== ''){
        $errorMsg[] = 'Please enter the quantity';
        $quantityERROR = true;
    } elseif (!is_int($quantity)) {
        $errorMsg[] = 'Enter a number';
        $quantityERROR = true;
    }    
    if ($email == ""){
        $errorMsg[] = 'Please enter your email address';
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = 'Your email address appears to be incorrect.';
        $emailERROR = true;
    }   
    
        ?>

<!-- if form is valid, save the data -->    
<?php
if (!$errorMsg){
        if ($debug) {
                print '<p>Form is valid.</p>';
        } 
    
    // array used to hold form values that will be saved to csv
    $dataRecord = array();
    
    // assign values to dataRecord array
    $dataRecord[] = $size;
    $dataRecord[] = $color;
    $dataRecord[] = $quantity;
    
    //  setup csv file
    $myFolder = 'data/';
    $myFileName = 'shop';
    $fileExt = '.csv';
    $filename = $myFolder . $myFileName . $fileExt;
    
    if ($debug) print PHP_EOL . '<p>filename is ' . $filename;
    
    // open file to append
    $file = fopen($filename, 'a');
    
    // write info from form
    fputcsv($file, $dataRecord);
    
    // close file
    fclose($file);

 // create order confirmation and mail to user -->   


$message = '<h2> Your order confirmation </h2>';
    
   foreach ($_POST as $htmlName => $value) {
    
        $message .= '<p>';
        $camelCase = preg_split('/(?=[A-Z])/', substr($htmlName, 3));
    
        foreach ($camelCase as $oneWord){
            $message .= $oneWord . ' ';
        }
    
        $message .= ' = ' . htmlentities($value, ENT_QUOTES, 'UTF-8') . '</p>';
    
    }
    $to = $email;
    $cc = '';
    $bcc = '';
    
    $from = '<PatriotsPlaceClub@Patriots.com>';
//    
//    
    $subject = 'Order Confirmation from Patriots Place';
//    
    $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);
}
//   ?>

<!-- Form to choose color(list), size(radio), quantity(Num input) -->

<main>
    <article>
                    <form action="<?php print $phpSelf; ?>"
                           id="frmOrder"
                           method="post">

                         <fieldset class='order'>
                             <legend>Order Information</legend>
                             <fieldset class="listbox <?php if ($sizeERROR) print 'mistake';?>">
                                 <p>
                                 <legend> Select a Size </legend>
                                 <select id="lstSize"
                                         name="lstSize"
                                         tabindex="100">
                                     <option <?php if ($size == 'Small') print 'selected'; ?>
                                         value ='Small'>Small</option>

                                     <option <?php if ($size == 'Medium') print 'selected'; ?>
                                         value ='Medium'>Medium</option>

                                     <option <?php if ($size == 'Large') print 'selected'; ?>
                                         value ='Large'>Large</option>

                                     <option <?php if ($size == 'X Large') print 'selected'; ?>
                                         value ='x Large'>X Large</option>
                                 </select>
                             </p>
                             </fieldset>
                         </fieldset>

                             <fieldset class="radio <?php if ($colorERROR) print 'mistake'; ?>">
                                 <legend> Select a color</legend>
                                 <p>
                                     <label class="radio-field"><input type="radio" id="radColorRed" name="radColor" value="Red" tabindex="200" 
                    <?php if ($color == "Red") echo ' checked="checked" '; ?>>
                                Red</label>
                                 </p>

                                 <p>
                                     <label class="radio-field"><input type="radio" id="radColorNavyBlue" name="radColor" value="Navy Blue" tabindex="201" 
                    <?php if ($color == "Navy Blue") echo ' checked="checked" '; ?>>
                                Navy Blue</label>
                                 </p>

                                 <p>
                                     <label class="radio-field"><input type="radio" id="radColorGrey" name="radColor" value="Grey" tabindex="202" 
                    <?php if ($color == "Grey") echo ' checked="checked" '; ?>>
                                Grey</label>
                                 </p>


                             </fieldset>

                             <p>
                                 <label class ='required' for='txtQuantity'>Quantity</label>
                                 <input autofocus
                                        <?php if ($quantityERROR) print 'class="mistake"'; ?>
                                        id="txtQuantity"
                                        maxlength="3"
                                        name="txtQuantity"
                                        onfocus="this.select()"
                                        placeholder="Enter the quantity"
                                        tabindex="300"
                                        type="text"
                                        value="<?php print $quantity; ?>"
                                        >
                             </p>

                             <p>
                                 <label class='required' for="txtEmail">Email</label>
                                 <input
                                     <?php if ($emailERROR) print 'class="mistake"'; ?>
                                     id="txtEmail"
                                     maxlength="50"
                                     name="txtEmail"
                                     onfocus="this.select()"
                                     placeholder="Enter your Email address"
                                     tabindex="400"
                                     type="text"
                                     value="<?php print $email; ?>"
                                   >
                             </p>
                             <fieldset class="buttons">
                             <input class="button" id="btnSubmit" name="btnSubmit" tabindex="500" type="submit" value="Submit Order" >
                         </fieldset>
                    </form>
         </article>   
</main>
</html>
