<?php
session_start();
$user = $_SESSION['username'];
echo $username;
if ($user!=''){
	echo '<div style="font-size:1.25em;font-weight:normal;">Пользователь авторизован: <span style="font-size:1.25em;font-weight:bold;">'.$user.'</span></div>';
}
if ($user=='')
    echo('Пользователь не авторизован');
else
{
    print_r($username);
}


function draw_calendar($month, $year) {
	$calendar = '<table border="3" cellpadding="0" cellspacing="5" class="b-calendar__tb">';
	// вывод дней недели
	$headings = array('Пн','Вт','Ср','Чт','Пт','Сб','Вс');
	$calendar.= '<tr class="b-calendar__row">';
	for($head_day = 0; $head_day <= 6; $head_day++) {
		$calendar.= '<th>';
		$calendar.= '<div>'.$headings[$head_day].'</div>';
		$calendar.= '</th>';
	}
	$calendar.= '</tr>';
	// выставляем начало недели на понедельник
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$running_day = $running_day - 1;
	if ($running_day == -1) {
		$running_day = 6;
	}
	
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$day_counter = 0;
	$days_in_this_week = 1;
	$dates_array = array();
	
	// первая строка календаря
	$calendar.= '<tr class="b-calendar__row">';
	
	// вывод пустых ячеек
	for ($x = 0; $x < $running_day; $x++) {
		$calendar.= '<td class="b-calendar__np"></td>';
		$days_in_this_week++;
	}

	// дошли до чисел, будем их писать в первую строку
	for($list_day = 1; $list_day <= $days_in_month; $list_day++) {
		$calendar.= '<td class="b-calendar__day';
	 	$calendar .= '">';
		// пишем номер в ячейку
		$calendar.= '<div>'.$list_day."

<form action='organizer.php' method='POST' id='form-{$list_day}'>
    <input type='text' name='number' value='{$list_day}' style='display: none'>
    <button type='submit'>Заметка</button>
</form>";
		$calendar.= '</td>';
		// дошли до последнего дня недели
		if ($running_day == 6) {
			// закрываем строку
			$calendar.= '</tr>';
			// если день не последний в месяце, начинаем следующую строку
			if (($day_counter + 1) != $days_in_month) {
				$calendar.= '<tr>';
			}
			// сбрасываем счетчики 
			$running_day = -1;
			$days_in_this_week = 0;
		}
		$days_in_this_week++; 
		$running_day++; 
		$day_counter++;
	}
	$calendar.= '</tr>';
	$calendar.= '</table>';
	return $calendar;
}
?>
<form action="login.html" method= "get"><button type ="submit"; style="font-size: 20px;width: 260px; height: 30px"> Регистрация </button> </form>

<!DOCTYPE html>
<html>
<head>
	<title>Органайзер на текущий месяц</title>
	<meta charset="utf-8">
	<style type="text/css">		
		.b-calendar--along {
			width: 700px;
		}
		.b-calendar__title {
			text-align: center;
			margin: 0 0 20px;
		}
		.b-calendar__tb {
			width: 100%;
		}
        .b-calendar__day {
            font: 30px Helvetica;
            padding: auto;
            vertical-align: middle;
            text-align: center;
        }
	</style>
</head>
<body>


<h2>Календарь на месяц: Июнь</h2>

<div class="b-calendar b-calendar--along">
	<?php
		echo draw_calendar(6,2019);
	?>
</div>

<hr>