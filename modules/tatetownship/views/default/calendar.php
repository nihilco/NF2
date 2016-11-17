<?php
/* Set the default timezone */
date_default_timezone_set("America/New_York");

/* Set the date */
$date = strtotime(date("Y-m-d"));

$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
$firstDay = mktime(0,0,0,$month, 1, $year);
$t = strftime('%B', $firstDay);
$dayOfWeek = date('D', $firstDay);
$daysInMonth = cal_days_in_month(0, $month, $year);
/* Get the name of the week days */
$timestamp = strtotime('next Sunday');
$weekDays = array();
for ($i = 0; $i < 7; $i++) {
    $weekDays[] = strftime('%a', $timestamp);
    $timestamp = strtotime('+1 day', $timestamp);
}
$blank = date('w', strtotime("{$year}-{$month}-01"));
?>
<div id="calendar">
  <div class="container">
    
<div class="row">
  <div class="col-sm-12">

<table class='table table-bordered' style="table-layout: fixed;">
    <tr>
    <th colspan="7" class="text-center"> <?php echo $t ?> <?php echo $year ?> </th>
    </tr>
    <tr>
<?php foreach($weekDays as $key => $weekDay) : ?>
    <td class="text-center"><?php echo $weekDay ?></td>
    <?php endforeach ?>
    </tr>
    <tr>
<?php for($i = 0; $i < $blank; $i++): ?>
    <td style="height:120px;"></td>
<?php endfor; ?>
<?php for($i = 1; $i <= $daysInMonth; $i++): ?>
<?php if($day == $i): ?>
    <td style="height:120px;"><strong><?php echo $i ?></strong></td>
<?php else: ?>
    <td style="height:120px;"><?php echo $i ?></td>
<?php endif; ?>
<?php if(($i + $blank) % 7 == 0): ?>
    </tr><tr>
<?php endif; ?>
<?php endfor; ?>
<?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>
    <td style="height:120px;"></td>
<?php endfor; ?>
    </tr>
</table>

    </div>
    </div>

    </div>
    </div>