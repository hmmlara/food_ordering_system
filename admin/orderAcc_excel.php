<?php

session_start();
if(isset($_SESSION['order_by_acc'])){
    $results = $_SESSION['order_by_acc'];
}  
            $data = [];
            $output =' 
                <table border="1">
                    <thead>
                        <tr>
                            <th>နံပါတ်</th>
                            <th>အော်ဒါနံပါတ်</th>
                            <th>စားသုံးသူအမည်</th>
                            <th>အော်ဒါအမျိုးအစား</th>
                            <th>ငွေပေးချေမှု</th>
                            <th>အော်ဒါအဆင့်</th>
                            <th>အော်ဒါရက်စွဲ</th>
                        </tr>
                    </thead>
                    <tbody>
            ';
            for($i=0;$i<count($results);$i++){
                $output.='
                        <tr>
                            <td>'.$i+1 .'</td>
                            <td>od-'.$results[$i]['id'].'</td>
                            <td>'.$results[$i]['cus_name'].'</td>';
                if($results[$i]['delivery_id']==1){

                    $output.= "<td>Pick Up</td>";
                }
                if($results[$i]['delivery_id']==2){
                    $output .= "<td>Delivery men</td>";

                }
                $output.= "<td>".explode("=",$results[$i]['paymentMode'])[1]."</td>";
                if($results[$i]['status']==1){
                    $output.= "<td>Order placed</td>";
                }
                else if($results[$i]['status']==2){
                    $output.= "<td>Order confirmed</td>";
                }
                else if($results[$i]['status']==3){
                    $output.= "<td>Preparing order</td>";
                }
                else if($results[$i]['status']==4){
                    $output.= "<td>Order on the way</td>";
                }
                else if($results[$i]['status']==5){
                    $output.= "<td>Order delivered</td>";
                }
                $output .= "<td>".explode(" ",$results[$i]['created_date'])[0]."</td>";

                $output .= "</tr>";
            }
            $output .= '</tbody></table>';
            header('Content-Type:application/xls');
            header('Content-Disposition:attachment;filename=orderByAccount.xls');
            echo $output    ;
            unset($_SESSION['order_by_acc']);
            exit();
?>