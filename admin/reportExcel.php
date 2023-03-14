<?php

session_start();
if(isset($_SESSION['reportExcel'])){
    $results = $_SESSION['reportExcel'];
}  
            $data = [];
            $output =' 
                <table border="1">
                    <thead>
                        <tr>
                            <th>နံပါတ်</th>
                            <th>အော်ဒါရက်စွဲ</th></th>
                            <th>စားသောက်ကုန်အမည်</th>
                            <th>အရေအတွက်</th>
                            <th>တန်ဖိုး</th>
                            <th>စူစုပေါင်းတန်ဖိုး</th>
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
            header('Content-Disposition:attachment;filename=report.xls');
            echo $output    ;
            unset($_SESSION['reportExcel']);
            exit();
?>