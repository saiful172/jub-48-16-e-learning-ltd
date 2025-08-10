<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}

include_once('User.php');

$user = new User();

//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Learning & Earning Ltd.</title>
 
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<div class="container" style="width:80%;margin:auto;">

<br><br>
	<center> <img src="../assets/img/logo.png" width="25%" /></center><hr>

<p> Login Name: <?php echo $row['fname']; ?> 
		<!--	Username: <?php echo $row['username']; ?>
			<p>Password: <?php echo $row['password']; ?> -->
<a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
</p> 

<h3 style="text-align: center;"><span style="text-decoration: underline; color: #000000;">IT Support Service Batch-01</span></h3>
<table width="731">
<tbody>
<tr>
<td style="text-align: left;" width="132"><span style="color: #000000;"><strong>SL</strong></span></td>
<td style="text-align: left;" width="361"><span style="color: #000000;"><strong>Name</strong></span></td>
<td style="text-align: left;" width="238"><span style="color: #000000;"><strong>Designation</strong></span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">1.    </span></td>
<td width="361"><span style="color: #000000;">Tonmoy Sadhin</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">2.    </span></td>
<td width="361"><span style="color: #000000;">Sojib</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">3.    </span></td>
<td width="361"><span style="color: #000000;">Tarek</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">4.    </span></td>
<td width="361"><span style="color: #000000;">Rony</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">5.    </span></td>
<td width="361"><span style="color: #000000;">Sakib</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">6.    </span></td>
<td width="361"><span style="color: #000000;">Sahadat</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">7.    </span></td>
<td width="361"><span style="color: #000000;">Nazmul</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">8.    </span></td>
<td width="361"><span style="color: #000000;">Masum</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">9.    </span></td>
<td width="361"><span style="color: #000000;">Mamun</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">10.                   </span></td>
<td width="361"><span style="color: #000000;">Masud</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">11.                   </span></td>
<td width="361"><span style="color: #000000;">Miraz</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">12.                   </span></td>
<td width="361"><span style="color: #000000;">Manik</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">13.                   </span></td>
<td width="361"><span style="color: #000000;">Badhon</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">14.                   </span></td>
<td width="361"><span style="color: #000000;">Sohel</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">15.                   </span></td>
<td width="361"><span style="color: #000000;">Sarmin</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">16.                   </span></td>
<td width="361"><span style="color: #000000;">Yeasmin</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">17.                   </span></td>
<td width="361"><span style="color: #000000;">Sahajadi</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">18.                   </span></td>
<td width="361"><span style="color: #000000;">Amena</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">19.                   </span></td>
<td width="361"><span style="color: #000000;">Jhuma</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">20.                   </span></td>
<td width="361"><span style="color: #000000;">Rubina</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">21.                   </span></td>
<td width="361"><span style="color: #000000;">Selina</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">22.                   </span></td>
<td width="361"><span style="color: #000000;">Rina</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
<tr>
<td width="132"><span style="color: #000000;">23.     </span></td>
<td width="361"><span style="color: #000000;">Sumi</span></td>
<td width="238"><span style="color: #000000;">IT-SUPPORT</span></td>
</tr>
</tbody>
</table>
<h3 style="text-align: center;"><span style="text-decoration: underline; color: #000000;">Graphic Design Batch-01 </span></h3>
<table width="506">
<tbody>
<tr>
<td style="text-align: left;" width="64"><span style="color: #000000;"><strong>SL</strong></span></td>
<td width="314"><span style="color: #000000;"><strong>Name</strong></span></td>
<td width="128"><span style="color: #000000;"><strong>Designation</strong></span></td>
</tr>
<tr>
<td><span style="color: #000000;">1</span></td>
<td width="314"><span style="color: #000000;">Alina Aktar</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">2</span></td>
<td width="314"><span style="color: #000000;">Najmul Hossain</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">3</span></td>
<td width="314"><span style="color: #000000;">Md.Alauddin</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">4</span></td>
<td width="314"><span style="color: #000000;">SHEIKH FORID JUNAED</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">5</span></td>
<td width="314"><span style="color: #000000;">SHARMIN AKTER</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">6</span></td>
<td width="314"><span style="color: #000000;">MD. WASIB UL HAQUE</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">7</span></td>
<td width="314"><span style="color: #000000;">Md. Ashrafuzzaman</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">8</span></td>
<td width="314"><span style="color: #000000;">Md. Sohel Rana</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">9</span></td>
<td width="314"><span style="color: #000000;">TANDRA KARMOKAR</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">10</span></td>
<td width="314"><span style="color: #000000;">KHADIZA TUL KOBRA</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">11</span></td>
<td width="314"><span style="color: #000000;">Md. Zahid Hasan</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">12</span></td>
<td width="314"><span style="color: #000000;">MD. ARIFUZZAMAN</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">13</span></td>
<td width="314"><span style="color: #000000;">Md. Sabbir Hossain Joarder</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">14</span></td>
<td width="314"><span style="color: #000000;">dippol Biswas</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">15</span></td>
<td width="314"><span style="color: #000000;">Shamina Haque Shomy</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">16</span></td>
<td width="314"><span style="color: #000000;">Umme Ismotara</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">17</span></td>
<td width="314"><span style="color: #000000;">MD. ABDULLA AL MAMUN</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">18</span></td>
<td width="314"><span style="color: #000000;">Md. Ahad Ali</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">19</span></td>
<td width="314"><span style="color: #000000;">Mostafijur Rahman Rasel</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">20</span></td>
<td width="314"><span style="color: #000000;">MD. ZAFOR TIYER</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">21</span></td>
<td width="314"><span style="color: #000000;">Musfiqur Rahman Biswas</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">22</span></td>
<td width="314"><span style="color: #000000;">MD JAHID HOSSAIN</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">23</span></td>
<td width="314"><span style="color: #000000;">Md Lelin Hossain</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
</tbody>
</table>
<h3 style="text-align: center;"><span style="color: #000000;"><span style="text-decoration: underline;">Graphic Design </span><span style="text-decoration: underline;">Batch-02 </span></span></h3>
<table width="506">
<tbody>
<tr>
<td style="text-align: left;" width="64"><span style="color: #000000;"><strong>SL</strong></span></td>
<td width="314"><span style="color: #000000;"><strong>Name</strong></span></td>
<td width="128"><span style="color: #000000;"><strong>Designation</strong></span></td>
</tr>
<tr>
<td><span style="color: #000000;">1</span></td>
<td width="314"><span style="color: #000000;">Md. Al Amin</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">2</span></td>
<td width="314"><span style="color: #000000;">Md. Al Amin Uddin Biswas</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">3</span></td>
<td width="314"><span style="color: #000000;">MD. EMDADUL HAQUE</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">4</span></td>
<td width="314"><span style="color: #000000;">MD. SUMSUL ARIFEN AIDID</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">5</span></td>
<td width="314"><span style="color: #000000;">Md.Asaduzzaman</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">6</span></td>
<td width="314"><span style="color: #000000;">Md. Anwar Zahid</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">7</span></td>
<td width="314"><span style="color: #000000;">Md. Tipu Sultan</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">8</span></td>
<td width="314"><span style="color: #000000;">Md. Abu Talha</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">9</span></td>
<td width="314"><span style="color: #000000;">Md. Khairul Kabir</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">10</span></td>
<td width="314"><span style="color: #000000;">Alamgir Hossain</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">11</span></td>
<td width="314"><span style="color: #000000;">Md.Helal Uddin</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">12</span></td>
<td width="314"><span style="color: #000000;">Md. Nurul Islam</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">13</span></td>
<td width="314"><span style="color: #000000;">MD. MOSHIUR RAHAMAN</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">14</span></td>
<td width="314"><span style="color: #000000;">Dill Eshrat Jahan</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">15</span></td>
<td width="314"><span style="color: #000000;">Mst. Nasrin Akter</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">16</span></td>
<td width="314"><span style="color: #000000;">Mst. Tohomina Khatun</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">17</span></td>
<td width="314"><span style="color: #000000;">Nazib Shiariar</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">18</span></td>
<td width="314"><span style="color: #000000;">SALAHUDDIN HOSSAIN</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">19</span></td>
<td width="314"><span style="color: #000000;">Nasim Ahmed</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">20</span></td>
<td width="314"><span style="color: #000000;">Mst Lamiya Tasnim</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">21</span></td>
<td width="314"><span style="color: #000000;">Md Nazmul Hasan</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">22</span></td>
<td width="314"><span style="color: #000000;">MD. MASUM BILLAH</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">23</span></td>
<td width="314"><span style="color: #000000;">Md.Khairul Islam</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">24</span></td>
<td width="314"><span style="color: #000000;">MST EASMIN AKTAR</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">25</span></td>
<td width="314"><span style="color: #000000;">MD. TOWFIQ HASAN</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">26</span></td>
<td width="314"><span style="color: #000000;">Md. Tajkeratul Anam</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
<tr>
<td><span style="color: #000000;">27</span></td>
<td width="314"><span style="color: #000000;">Md. Saifullah</span></td>
<td><span style="color: #000000;">Graphic Designer</span></td>
</tr>
</tbody>
</table>
<h3 style="text-align: center;"><span style="color: #000000;"><span style="text-decoration: underline;">Graphic Design </span><span style="text-decoration: underline;">Batch-03</span></span></h3>
<table width="444">
<tbody>
<tr>
<td width="64"><span style="color: #000000;"><strong>SL</strong></span></td>
<td width="216"><span style="color: #000000;"><strong>Name</strong></span></td>
<td width="164"><span style="color: #000000;"><strong>Designation</strong></span></td>
</tr>
<tr>
<td><span style="color: #000000;">1</span></td>
<td><span style="color: #000000;">Md Forhad</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">2</span></td>
<td><span style="color: #000000;">Mehedhi</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">3</span></td>
<td><span style="color: #000000;">Khorshed</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">4</span></td>
<td><span style="color: #000000;">Nirob</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">5</span></td>
<td><span style="color: #000000;">Nazrul</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">6</span></td>
<td><span style="color: #000000;">Salauddin</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">7</span></td>
<td><span style="color: #000000;">Md Nur Allam</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">8</span></td>
<td><span style="color: #000000;">Mohsin</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">9</span></td>
<td><span style="color: #000000;">Sumona</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">10</span></td>
<td><span style="color: #000000;">Jannatun Nesa</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">11</span></td>
<td><span style="color: #000000;">Mahadhi</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">12</span></td>
<td><span style="color: #000000;">Sagor</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">13</span></td>
<td><span style="color: #000000;">Rakib</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">14</span></td>
<td><span style="color: #000000;">Md Roman</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">15</span></td>
<td><span style="color: #000000;">Jahid</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">16</span></td>
<td><span style="color: #000000;">Sakir</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">17</span></td>
<td><span style="color: #000000;">Shawon</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">18</span></td>
<td><span style="color: #000000;">Lutfor</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">19</span></td>
<td><span style="color: #000000;">Mafuj Molla</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">20</span></td>
<td><span style="color: #000000;">Saidur</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
</tbody>
</table>
<h3 style="text-align: center;"><span style="color: #000000;"><span style="text-decoration: underline;">Graphic Design </span><span style="text-decoration: underline;">Batch-04</span></span></h3>
<table width="444">
<tbody>
<tr>
<td width="64"><strong><span style="color: #000000;">SL</span></strong></td>
<td width="216"><strong><span style="color: #000000;">Name</span></strong></td>
<td width="164"><strong><span style="color: #000000;">Designation</span></strong></td>
</tr>
<tr>
<td><span style="color: #000000;">1</span></td>
<td width="216"><span style="color: #000000;">Md. Tohid Hossen</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">2</span></td>
<td width="216"><span style="color: #000000;">Md. Rafeur Rahman</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">3</span></td>
<td width="216"><span style="color: #000000;">MD. BIPLOB HOSSAIN</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">4</span></td>
<td width="216"><span style="color: #000000;">MD. AZMUL HOQUE</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">5</span></td>
<td width="216"><span style="color: #000000;">Kaizer Bin Ashab</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">6</span></td>
<td width="216"><span style="color: #000000;">MD. REJAUL ISLAM</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">7</span></td>
<td width="216"><span style="color: #000000;">MD.AMDADUL HAQUE</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">8</span></td>
<td width="216"><span style="color: #000000;">MST. SHAKILA JABBAR</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">9</span></td>
<td width="216"><span style="color: #000000;">MD. ABDUL BATEN BIN MANSUR</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">10</span></td>
<td width="216"><span style="color: #000000;">Md.Iqbal Hussain</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">11</span></td>
<td width="216"><span style="color: #000000;">MD SHAFAYET HOSSAIN</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">12</span></td>
<td width="216"><span style="color: #000000;">ABDUR GAFUR</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">13</span></td>
<td width="216"><span style="color: #000000;">MST RABEA KHATUN</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">14</span></td>
<td width="216"><span style="color: #000000;">BAPPARAJ</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">15</span></td>
<td width="216"><span style="color: #000000;">Md.Ashiqul Haque</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">16</span></td>
<td width="216"><span style="color: #000000;">MD.MOHASIN MOLLA</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">17</span></td>
<td width="216"><span style="color: #000000;">madhabi lata bala</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">18</span></td>
<td width="216"><span style="color: #000000;">MD.MAMUNUR RASHID</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">19</span></td>
<td width="216"><span style="color: #000000;">shourav kumer modok</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">20</span></td>
<td width="216"><span style="color: #000000;">SUMAYA ISLAM</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">21</span></td>
<td width="216"><span style="color: #000000;">Ahsan maharab</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">22</span></td>
<td width="216"><span style="color: #000000;">MD.PERVEZ</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">23</span></td>
<td width="216"><span style="color: #000000;">ANTARA FAHMIDA ( NISHAT)</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">24</span></td>
<td width="216"><span style="color: #000000;">ASHIKUR RAHMAN</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
<tr>
<td><span style="color: #000000;">25</span></td>
<td width="216"><span style="color: #000000;">MD. NAHID HASAN</span></td>
<td width="164"><span style="color: #000000;">Graphic Design</span></td>
</tr>
</tbody>
</table>
<h3 style="text-align: center;"><span style="color: #000000;"><span style="text-decoration: underline;">Digital Marketing </span><span style="text-decoration: underline;">Batch-01</span></span></h3>
<table width="444">
<tbody>
<tr>
<td width="64"><span style="color: #000000;"><strong>SL</strong></span></td>
<td width="216"><span style="color: #000000;"><strong>Name</strong></span></td>
<td width="164"><span style="color: #000000;"><strong>Designation</strong></span></td>
</tr>
<tr>
<td><span style="color: #000000;">1</span></td>
<td width="216"><span style="color: #000000;">S.M. RAHAT ALAM ADNAN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">2</span></td>
<td width="216"><span style="color: #000000;">MD. MONIRUZZAMAN REMON</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">3</span></td>
<td width="216"><span style="color: #000000;">Mst. Airin Parvin</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">4</span></td>
<td width="216"><span style="color: #000000;">MD. MONIR HOSSAIN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">5</span></td>
<td width="216"><span style="color: #000000;">Kaesh Mahmud</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">6</span></td>
<td width="216"><span style="color: #000000;">Md:Arjulla hossain</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">7</span></td>
<td width="216"><span style="color: #000000;">Abdul karim</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">8</span></td>
<td width="216"><span style="color: #000000;">Md.Rakibul Islam</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">9</span></td>
<td width="216"><span style="color: #000000;">Gautam Kumar Sarker</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">10</span></td>
<td width="216"><span style="color: #000000;">MST. ANOWARA KHATUN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">11</span></td>
<td width="216"><span style="color: #000000;">Md.Mizanur Rahman</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">12</span></td>
<td width="216"><span style="color: #000000;">Md ashraful islam</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">13</span></td>
<td width="216"><span style="color: #000000;">ABU SHAKIL JOARDER</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">14</span></td>
<td width="216"><span style="color: #000000;">MD. TARIQ AZIZ</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">15</span></td>
<td width="216"><span style="color: #000000;">Istiak Abir</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">16</span></td>
<td width="216"><span style="color: #000000;">TABRIN SULTANA</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">17</span></td>
<td width="216"><span style="color: #000000;">Mohammad Ali</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">18</span></td>
<td width="216"><span style="color: #000000;">MD. SAKIBUL ISLAM</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">19</span></td>
<td width="216"><span style="color: #000000;">Sumiya Afrin</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">20</span></td>
<td width="216"><span style="color: #000000;">Md. Ahsanul kobir</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">21</span></td>
<td width="216"><span style="color: #000000;">Most. Juthi Khatun</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">22</span></td>
<td width="216"><span style="color: #000000;">MST. FATEMA KHATUN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">23</span></td>
<td width="216"><span style="color: #000000;">Mst.Bulbuli Khatun</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">24</span></td>
<td width="216"><span style="color: #000000;">Keya Akter</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">25</span></td>
<td width="216"><span style="color: #000000;">MD.ARIFUL ISLAM</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
</tbody>
</table>
<h3 style="text-align: center;"><span style="color: #000000;"><span style="text-decoration: underline;">Digital Marketing </span><span style="text-decoration: underline;">Batch-02</span></span></h3>
<table width="444">
<tbody>
<tr>
<td width="64"><span style="color: #000000;"><strong>SL</strong></span></td>
<td width="216"><span style="color: #000000;"><strong>Name</strong></span></td>
<td width="164"><span style="color: #000000;"><strong>Designation</strong></span></td>
</tr>
<tr>
<td><span style="color: #000000;">1</span></td>
<td width="216"><span style="color: #000000;">MD.MAHAFUZUR RAHMAN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">2</span></td>
<td width="216"><span style="color: #000000;">MD. OBIDUR RAHMAN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">3</span></td>
<td width="216"><span style="color: #000000;">Md. Abu Hanjala</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">4</span></td>
<td width="216"><span style="color: #000000;">MD. SHAMIM REZA</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">5</span></td>
<td width="216"><span style="color: #000000;">Sree Antu Adhikari</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">6</span></td>
<td width="216"><span style="color: #000000;">Md. Nazmul Haque</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">7</span></td>
<td width="216"><span style="color: #000000;">Abdul Hamid</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">8</span></td>
<td width="216"><span style="color: #000000;">Md. Sohel Parvez</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">9</span></td>
<td width="216"><span style="color: #000000;">Md. Aminur Rahman</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">10</span></td>
<td width="216"><span style="color: #000000;">Jannatul ferdows</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">11</span></td>
<td width="216"><span style="color: #000000;">Remi saha</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">12</span></td>
<td width="216"><span style="color: #000000;">Md Mamun Ur Rashid</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">13</span></td>
<td width="216"><span style="color: #000000;">Md.Tamim Hassan</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">14</span></td>
<td width="216"><span style="color: #000000;">Md.Kamrul Hasan</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">15</span></td>
<td width="216"><span style="color: #000000;">M A MATIN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">16</span></td>
<td width="216"><span style="color: #000000;">MD FARID HOSSAIN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">17</span></td>
<td width="216"><span style="color: #000000;">MD. JUBAER HOSSAIN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">18</span></td>
<td width="216"><span style="color: #000000;">SAMINA SAHRMIN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">19</span></td>
<td width="216"><span style="color: #000000;">K.M.RIFAT FARUKIE</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">20</span></td>
<td width="216"><span style="color: #000000;">MST.SUMSUN NAHAR</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">21</span></td>
<td width="216"><span style="color: #000000;">Md. Raju Ahammed</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">22</span></td>
<td width="216"><span style="color: #000000;">SHARIN MAHABUBA</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">23</span></td>
<td width="216"><span style="color: #000000;">md.tanvir hasan joj</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">24</span></td>
<td width="216"><span style="color: #000000;">JULIA PARVIN</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
<tr>
<td><span style="color: #000000;">25</span></td>
<td width="216"><span style="color: #000000;">MD ABDULLAH AL JAMIE</span></td>
<td width="164"><span style="color: #000000;">Digital Marketing</span></td>
</tr>
</tbody>
</table>
<h3 style="text-align: center;"><span style="color: #000000;"><span style="text-decoration: underline;">Web Design &amp; Development </span><span style="text-decoration: underline;">Batch-01</span></span></h3>
<table width="421">
<tbody>
<tr>
<td width="64"><span style="color: #000000;"><strong>SL</strong></span></td>
<td width="193"><span style="color: #000000;"><strong>Name</strong></span></td>
<td width="164"><span style="color: #000000;"><strong>Designation</strong></span></td>
</tr>
<tr>
<td><span style="color: #000000;">1</span></td>
<td width="193"><span style="color: #000000;">Md. Shoriful Islam</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">2</span></td>
<td width="193"><span style="color: #000000;">Md. Aqib Javed</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">3</span></td>
<td width="193"><span style="color: #000000;">Ahmed Sadid Reza</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">4</span></td>
<td width="193"><span style="color: #000000;">Md.Mahmudul Hasan</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">5</span></td>
<td width="193"><span style="color: #000000;">Md.Tarik Ali</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">6</span></td>
<td width="193"><span style="color: #000000;">Md.Romiz Raja</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">7</span></td>
<td width="193"><span style="color: #000000;">Md. Gaffarul Islam</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">8</span></td>
<td width="193"><span style="color: #000000;">Md Siful Islam</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">9</span></td>
<td width="193"><span style="color: #000000;">MD.ANWAR HOSSEN</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">10</span></td>
<td width="193"><span style="color: #000000;">Ani Shek</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">11</span></td>
<td width="193"><span style="color: #000000;">Raju Ahammod</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">12</span></td>
<td width="193"><span style="color: #000000;">MD. MAHARUL KAYES ZORDER</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">13</span></td>
<td width="193"><span style="color: #000000;">M.A. MOKKI</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">14</span></td>
<td width="193"><span style="color: #000000;">MD. HARUN OR RASHID</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">15</span></td>
<td width="193"><span style="color: #000000;">MD. SHIHAB UDDIN</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">16</span></td>
<td width="193"><span style="color: #000000;">farhana Khanam</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">17</span></td>
<td width="193"><span style="color: #000000;">Md. Masud Parvej</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">18</span></td>
<td width="193"><span style="color: #000000;">Farzana Khanam</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">19</span></td>
<td width="193"><span style="color: #000000;">Taslim Arif Symoom</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">20</span></td>
<td width="193"><span style="color: #000000;">MD. MOMINUL ISLAM</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">21</span></td>
<td width="193"><span style="color: #000000;">Md. Rasheduzzahan Munshi</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">22</span></td>
<td width="193"><span style="color: #000000;">MD.RAFIQUL ISLAM</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
<tr>
<td><span style="color: #000000;">23</span></td>
<td width="193"><span style="color: #000000;">Oni Rahman</span></td>
<td width="164"><span style="color: #000000;">Web Design &amp; Development</span></td>
</tr>
</tbody>
</table>

</div>