<?php

session_start();
if(isset($_SESSION['user_acc'])){
    $results = $_SESSION['user_acc'];
}  
            $output =' 
                <table border="1">
                    <thead>
                        <tr>
                            <th>နံပါတ်</th>
                            <th>အမည်</th>
                            <th>အီးမေးလ်</th>
                            <th>ဖုန်းနံပါတ်</th>
                            <th>အကောင့်ဖွင့်သည့်ရက်</th>
                        </tr>
                    </thead>
                    <tbody>
            ';
            for($i=0;$i<count($results);$i++){
                $output.='<tr>
                <td>'.$i+1 .'</td>
                <td>'.$results[$i]["name"].'</td>
                <td>'.$results[$i]["email"].'</td>
                <td>'.$results[$i]["phone_number"].'</td>
                <td>'.explode(" ",$results[$i]['created_date'])[0].'</td>
                </tr>';
            }
            $output .= '</tbody></table>';
            header('Content-Type:application/xls');
            header('Content-Disposition:attachment;filename=Users.xls');
            echo $output    ;
            unset($_SESSION['user_acc']);
            exit();
?>