<!DOCTYPE html>
<html lang="en">
    <title>
<?php

/* Radio Button */
//intiialize variables

$year = '2017';

$yearERROR = false;

//sanitize data
if(isset($_POST['radYear'])) {
    $year = htmlentities($_POST['radYear'], ENT_QUOTES,'UTF-8');
} else {
    $year = '';
}


//validate data

if($year != '2002' AND $year != '2004' AND $year != '2005' AND $year != '2015' AND $year != '2017' ){
    $errorMsg[]='Please choose a year';
    $yearERROR = true;
}

// prepare to save data
$yearRecord[]= $year;
?>


<fieldset class="year">
    <legend>Which was your favorite SuperBowl team to watch?</legend>
<p>
    <label class="radio-field">
        <input type="radio"
               id="radYear2002"
        name ="radYear"
        value ='2002'
        tabindex="100"
        <?php if ($year == '2002')echo '
            checked = "checked" '; ?>
        >2002</label>
</p>
<p>
    <label class="radio-field">
        <input type="radio"
               id="radYear2004"
        name ="radYear"
        value ='2004'
        tabindex="101"
        <?php if ($year == '2004')echo '
            checked = "checked" '; ?>
        >2004</label>
</p>
<p>
    <label class="radio-field">
        <input type="radio"
               id="radYear2005"
        name ="radYear"
        value ='2005'
        tabindex="102"
        <?php if ($year == '2005')echo '
            checked = "checked" '; ?>
        >2005</label>
</p>
<p>
    <label class="radio-field">
        <input type="radio"
               id="radYear2015"
        name ="radYear"
        value ='2015'
        tabindex="103"
        <?php if ($year == '2015')echo '
            checked = "checked" '; ?>
        >2015</label>
</p>
<p>
    <label class="radio-field">
        <input type="radio"
               id="radYear2004"
        name ="radYear"
        value ='2017'
        tabindex="104"
        <?php if ($year == '2017')echo '
            checked = "checked" '; ?>
        >2017</label>
</p>
</fieldset>

    
   <?php
    $game = '0';
    $gameError = FALSE;
    
    $game = htmlentities($_POST['0'],ENT_QUOTES,'UTF-8');
    
    $gameRecord[] = $game;
    ?>
    
    <fieldset class='listbox <?php if ($gameError) print '
        mistake'; ?>'>
        <p>
        <legend>How many Patriots games have you been to?</legend>
        <select id='gamesgone'
                name ='gamesgone'
                tabindex="200">
            <option <?php if ($game=='0')
                print ' selected '; ?>
                value="0">0</option>
            <option <?php if ($game=='1-3')
                print ' selected '; ?>
                value="1-3">1-3</option>
            <option <?php if ($game=='4-7')
                print ' selected '; ?>
                value="4-7">4-7</option>
            <option <?php if ($game=='8-10')
                print ' selected '; ?>
                value="8-10">8-10</option>
            <option <?php if ($game=='11+')
                print ' selected '; ?>
                value="11+">11 or more</option>
        </select>
        </p>
</fieldset>
    </title>
