<?php 

include("contentdb.php"); 
$display = mysql_query("SELECT * FROM $table ORDER BY id",$db);    

if (!$_POST['submit']) { 

 echo "<form method=post action=$PHP_SELF>";    
 echo "<table border=0>";     

while ($row = mysql_fetch_array($display)) {     
  
$id = $row["id"];    
$question = $row["question"];    
$opt1 = $row["opt1"];    
$opt2 = $row["opt2"];    
$opt3 = $row["opt3"];    
$answer = $row["answer"];   
  
echo "<tr><td colspan=3><br><b>$question</b></td></tr>";    

echo "<tr><td>$opt1 <input type=radio name='q$id' value=\"$opt1\"></td>
          <td>$opt2 <input type=radio name='q$id' value=\"$opt2\"></td>
          <td>$opt3 <input type=radio name='q$id' value=\"$opt3\"></td></tr>";

     }     

echo "</table>";    

echo "<input type='submit' value='See how you did' name='submit'>";    
echo "</form>"; 

} elseif ($_POST['submit']) {      

$score = 0;    
$total = mysql_num_rows($display);        

while ($result = mysql_fetch_array($display)) {                            

$answer = $result[answer];            
$q = "q$result[id]";                    
$q = trim($q);
if ($_POST[$q] == $answer) {                
$score++;                 
}        
}        

echo "<p align=center><b>You scored $score out of $total</b></p>";    
echo "<p>";        
}  