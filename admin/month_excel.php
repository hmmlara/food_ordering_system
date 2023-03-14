<?php

session_start();
if(isset($_SESSION['month_excel'])){
    $results = $_SESSION['month_excel'];
}  
            $data = [];
            $output =' 
                <table border="1">
                    <thead>
                        <tr>
                            <th>နံပါတ်</th>
                            <th>အော်ဒါရက်စွဲ</th>
                            <th>အမျိုးအစား</th>
                            <th>အရေအတွက်</th>
                            <th>စျေးနှုန်း</th>
                            <th>စုစုပေါင်းစျေးနှုန်း</th>
                        </tr>
                    </thead>
                    <tbody>
            ';
            $total_price = 0;
            $total_qty = 0;
            for($i=0;$i<count($results);$i++){
                $total_price += $results[$i]['price'] * $results[$i]['total_qty'];
                $total_qty += $results[$i]['total_qty'];

                $output.='<tr>
                <td>'.$i+1 .'</td>
                <td>'.$results[$i]["created_date"].'</td>
                <td>'.$results[$i]["name"].'</td>
                <td>'.$results[$i]["total_qty"].'</td>
                <td>'.$results[$i]["price"].'</td>
                <td>'.$results[$i]["price"]*$results[$i]["total_qty"].'</td>
                </tr>';
            }
            $output .= '</tbody></table>';
            header('Content-Type:application/xls');
            header('Content-Disposition:attachment;filename=Monthreport.xls');
            echo $output    ;
            unset($_SESSION['month_excel']);
            exit();
?>