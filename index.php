<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
</head>
<body>

<form action="" method="post">
    <p>Сумма покупки (число)</p>
    <input type="text" name="sum_bay" value="<?= $_POST['sum_bay'] ?>"/><br>
    <p>Первоначальный взнос в процентах от 0 до 100</p>
    <input type="text" name="first_ins" value="<?= $_POST['first_ins'] ?>"/><br>
    <p>Срок кредитования (от 1  до 7) лет сделать проверку</p>
    <input type="text" name="credit_period" value="<?= $_POST['credit_period'] ?>"/><br><br>

    <input type="submit" value="Посчитать">
</form>


<table>
<?php


if(!empty($_POST)){

    $sum_bay = (int)$_POST['sum_bay'];
    $first_ins= (int)$_POST['first_ins'];
    $credit_period  = (int)$_POST['credit_period'];

    if(101 <= $first_ins ||  0 > $first_ins){
        die('Введите пожалуйста первоначальный взнос от 0 до 100');
    }
    if(8 <= $credit_period ||  0 >= $credit_period){
        die('Введите пожалуйста cрок кредитования от 1  до 7');
    }

    switch ($credit_period) {
        case 1:
            $per_annum = 9;
            break;
        case 2:
            $per_annum = 11;
            break;
        case 3:
            $per_annum = 13;
            break;
        case 4:
            $per_annum = 15;
            break;
        case 5:
            $per_annum = 17;
            break;
        case 6:
            $per_annum = 19;
            break;
        case 7:
            $per_annum = 21;
            break;
    }

    $sum_rest = $sum_bay - (($sum_bay * $first_ins)/100);
    $sum_percent = (($sum_rest * $per_annum) /100) * $credit_period ;
    $total = $sum_rest + $sum_percent;

    $sum_month = $total / ($credit_period * 12);
    $sum_month = (int)$sum_month;

    $month = 0;

    while($sum_month < $total){

        $month++ ;
        $total = $total - $sum_month;

        ?>

        <tr>
            <td><?=$month?> месяц </td> <td><?=$sum_month?>грн </td> <td><?=$total?>грн</td>
        </tr>


    <?php } ?>
<?php
}else{
    $sum_bay = null;
    $first_ins = null;
    $credit_period = null;
}

?>
</table>
</body>
</html>