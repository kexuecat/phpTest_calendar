<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        div {
            width: 602px;
            margin: 0 auto;
        }
        table {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        $year = date('Y'); 
        $month = date('m');
        $day = date('d');

        $ttd = date('t', $month);   //当前月天数
        $firstday = $year."-".$month."-01"; //本月第一天
        $firstday = date('w',strtotime($firstday))-1; //第一天星期几

        $lmsd = date('t', strtotime('-1 month'));//上个月最后一天

        $nmonth = date('m')+1;
        $nfirstday = $year."-".$nmonth."-01"; //下个月第一天
        $nfirstday = date('w',strtotime($nfirstday)); //下个月第一天星期几

        $sum = 42;  //日历一共6行，每行7天
        $count = 1; //计数器

    ?>
    <div>
        <table width="600px">
            <caption><?php echo "$year 年 $month 月 $day 日"; ?></caption>
            <tr>
                <td>一</td>
                <td>二</td>
                <td>三</td>
                <td>四</td>
                <td>五</td>
                <td>六</td>
                <td>日</td>
            </tr>
            <?php 
                //打印上一个月的最后几天
                for ($i=1; $i < $firstday; $i++) {
                    $lmsd--;
                }
                echo "<tr>";
                for ($i = 1; $i <= $firstday; $i++) {
                    echo "<td>".$lmsd++."</td>";
                    $sum --;
                };

                //打印日历
                for ($i = 1; $i <= $sum; $i++) {
                    //换行
                    if (($firstday + $i) % 7 == 1) {
                        $count++;
                        echo "</tr>";
                        if ($count == 7) {
                            echo "<tr>";
                        }
                    }

                    //今天加红色边框
                    if ($i == $day) {
                        echo "<td style='border:1px red solid;color: red;'>$i</td>";
                        continue;
                    }

                    //本月日历
                    if ($i <= $ttd) {
                        echo "<td>$i</td>";
                    }

                    //打印下一个月前几天
                    if ($i > $ttd) {
                        if (($ttd+$nfirstday)<=$sum+1) {
                            echo "<td>".$nfirstday++."</td>";
                        }
                    }
                };
                
                echo "</tr>";
             ?>
        </table>     
    </div>
</body>
</html>