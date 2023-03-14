<?php
include_once "controller/order_controller.php";

$orders=new OrderController();
$results=$orders->getPhoneOrderinfo();
$items = $orders->getAccOrderinfo();

        if(isset($_POST['order_phone_excel'])){
            $output='';
            $output .=' 
                <table>
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

                $output .= "<tr>";

                
                

                
            }
            header('Content-Type:application/xls');
            header('Content-Disposition:attachment;filename=orderByPhone.xls');
            echo $output;
        }

        if(isset($_POST['order_acc_excel'])){
            $result='';
            $result .=' 
                <table>
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
            for($i=0;$i<count($items);$i++){
                $result.='
                        <tr>
                            <td>'.$i+1 .'</td>
                            <td>od-'.$items[$i]['id'].'</td>
                            <td>'.$items[$i]['cus_name'].'</td>';
                if($items[$i]['delivery_id']==1){

                    $result.= "<td>Pick Up</td>";
                }
                if($items[$i]['delivery_id']==2){
                    $result .= "<td>Delivery men</td>";

                }
                $result.= "<td>".explode("=",$items[$i]['paymentMode'])[1]."</td>";
                if($items[$i]['status']==1){
                    $result.= "<td>Order placed</td>";
                }
                else if($items[$i]['status']==2){
                    $result.= "<td>Order confirmed</td>";
                }
                else if($items[$i]['status']==3){
                    $result.= "<td>Preparing order</td>";
                }
                else if($items[$i]['status']==4){
                    $result.= "<td>Order on the way</td>";
                }
                else if($items[$i]['status']==5){
                    $result.= "<td>Order delivered</td>";
                }
                $result .= "<td>".explode(" ",$items[$i]['created_date'])[0]."</td>";

                $result .= "<tr>";

                
                

                
            }
            header('Content-Type:application/xls');
            header('Content-Disposition:attachment;filename=orderByAccount.xls');
            echo $result;
        }

?>