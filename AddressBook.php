<?php

mysql_connect("10.192.1.89","Admin","CNLinkCRM8501");
mysql_select_db("db_CRM");
$sql_query="SELECT Contact_DepartmentName,Contact_NameEnglish,Contact_NameChinese,Contact_Email,Contact_ExtNum1,Contact_Softphone1 FROM tbl_AddressBook";

//$sql_query="SELECT * FROM tbl_AddressBook";

$result_set=mysql_query($sql_query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CNLink Address Book</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
	<div id="content">
    <label>CNLink Address Book</label>
    </div>
</div>
<div id="body">
	<div id="content">
    <table align="center" width="100%">
    <tr>
    <th>#</th>
    <th>部門名稱</th>
    <th>英文姓名</th>
    <th>中文姓名</th>
    <th>E-Mail</th>
    <th>類比分機(白)</th>
    <th>IP-Phone(黑)</th>
    <th></th>
    </tr>
    <?php
	if(mysql_num_rows($result_set)>0)
	{
        $order=0;
		while($row=mysql_fetch_row($result_set))
		{
            
			?>
            
            <tr>
            <td><?php echo $order++;?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td align="center"><a href="edit_data.php?edit_id=<?php echo $row[0]; ?>"><img src="b_edit.png" alt="Edit" /></a></td>
            </tr>
            <?php
		}
	}
	else
	{
		?>
        <tr>
        <th colspan="3">There's No data found !!!</th>
        </tr>
        <?php
	}
	?>
    </table>
    </div>
</div>

<div id="footer">
	<div id="content">
    <hr /><br/>
    <label>If you have any questions please contact CNLink IT & Service Department </a></label>
    </div>
</div>

</center>
</body>
</html>