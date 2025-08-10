<?php 
$sql = $con->query("select * from option_status where user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$Marketing =$row['mar_type']; 
$ServChrg =$row['sev_charg']; 
$Quot =$row['quot_type']; 
$Exp =$row['exp_type']; 
$Task =$row['daily_task']; 
$CashRpt =$row['daily_cash']; 
$InvCol =$row['inv_color']; 
$HrAcc =$row['hr_acc']; 
$AdvSal =$row['adv_salary']; 
$Curier =$row['courier_service']; 
$Prjct =$row['project']; 
$Bnk =$row['bank']; 
$Agent =$row['agent_b']; 
$InvDetail =$row['inv_detail']; 
$QR =$row['inv_qr_code']; 
?>