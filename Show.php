<?php

 function getRows($query, $params=array()){
               $pdo = new PDO("mysql:host=localhost" . ";dbname=train","root",
                 	"root",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
      	        $stmt =$pdo->prepare($query);
                $stmt->execute($params);
                return $stmt->fetchAll();
            }
if((isset($_POST)))
{
?>
   <html>
   <head>
    <link rel="stylesheet" href="style.css"/>
</head>
   <bode>
  <div align="center"class="contener">
      <h1 style="color=blue">Result</h1>
	<table border="3" width=90%  >
		<tr >
			<th>Code</th>
                        <th>Start station</th>
                        <th>Timeleave</th>
                        <th>End station</th>
                        <th>Timearrive</th>
                        <th>Type</th>
		</tr>

<?php
$s=$_POST['txt1'];
$e=$_POST['txt2'];
$t=$_POST['type'];
if($t=="All")
{
$rows=getRows("select t1.Station as startstation,t1.Time as timeleave,t2.Station as endstation,t2.Time as timearrive,
               t1.Train_Number as code,c.type as type
               from trainsandstations t1, trainsandstations t2,class c
                    where t1.Station='".$s."' and t2.Station='".$e."' and t1.Train_Number=t2.Train_Number
                    and t1.line_id=t2.line_id and t1.class_id=t2.class_id and c.id=t1.class_id and c.id=t2.class_id
                    and t1.Time<t2.Time ",array());
foreach ($rows as $row){
?>
                             <tr>
                                <td><?php echo $row['code'];?></td>
                                <td><?php echo $row['startstation'];?></td>
				<td><?php echo $row['timeleave'];?></td>
                                <td><?php echo $row['endstation'];?></td>
                                <td><?php echo $row['timearrive'];?></td>
                                <td><?php echo $row['type'];?></td>
                             </tr>
<?php
}
}
else{
$rows=getRows("select t1.Station as startstation,t1.Time as timeleave,t2.Station as endstation,t2.Time as timearrive,
               t1.Train_Number as code,c.type as type
               from trainsandstations t1, trainsandstations t2,class c
                    where t1.Station='".$s."' and t2.Station='".$e."' and t1.Train_Number=t2.Train_Number
                    and t1.line_id=t2.line_id and t1.class_id=t2.class_id and c.id=t1.class_id and c.id=t2.class_id
                    and t1.Time<t2.Time and c.type='".$t."'",array());
foreach ($rows as $row){
?>
                              <tr>
                                <td><?php echo $row['code'];?></td>
                                <td><?php echo $row['startstation'];?></td>
				<td><?php echo $row['timeleave'];?></td>
                                <td><?php echo $row['endstation'];?></td>
                                <td><?php echo $row['timearrive'];?></td>
                                <td><?php echo $row['type'];?></td>
                             </tr>
<?php
}
}
}
?>
</table>
<i><h1><a href="Home.html"> GO TO Home Page</a></h1></i>
</div>
  </bode>
  </html>
