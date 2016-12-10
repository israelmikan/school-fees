<?php
//print_r($this->param);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>
        <link rel="stylesheet" href="<?php echo URL_css . '/invoice.css' ?>">
        <script src="script.js"></script>
    </head>
    <body background="/student/views/logo.png" style="background-repeat:no-repeat; background-size:cover;">
    
        <header>
        <h1>Grace High School Accounts Department</h1>
            <h2 align="center">School Copy</h2>
            <address>
                <p><?php echo $this->param[0]['firstName'] . ' ' . $this->param[0]['lastName']; ?></p>
                <p><strong>Enrollment No: </strong><?php echo $this->param[0]['enrollNo']; ?></p>
                <p><?php echo $this->param[0]['p1']; ?></p>
                <?php 
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "student";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die(mysql_error());

  $whois=$this->param[0]['enrollNo'];
     	
		$getclass=mysql_query("SELECT name from tblcourse WHERE id='$whois'");
		if(!$getclass){ echo mysql_error();}
		while($getthem=mysql_fetch_array($getclass)){
			$what=$gethem['image'];
		echo $getthem['name'];
		
  } ?>
                
            </address>
    </header>
        <article>
            <h1>Recipient</h1>
            <address>
                <span>Grace High School Gayaza</span>
            </address>
            <table class="meta">
                <tr>
                    <th><span>Invoice #</span></th>
                    <td><span><?php echo $this->param[0]['eid']; ?></span></td>
                </tr>
                <tr>
                    <th><span>Date</span></th>
                    <td><span><?php echo model::mDisplayDate($this->param[0]['fdate']); ?></span></td>
                </tr>
            </table>
            <table class="inventory">
                <thead>
                    <tr>
                        <th width="70%"><span>Fees</span></th>
                        <th width="30%"><span>Amount</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>Fees paid by <?php echo $this->param[0]['firstName'] . ' ' . $this->param[0]['lastName']; ?></span></td>
                        <td><span data-prefix>&#8377; </span><span><?php echo $this->param[0]['amount']; ?></span></td>
                    </tr>
                </tbody>
            </table>
            <table class="balance">
                <tr>
                    <th><span>Total Fees</span></th>
                    <td><span data-prefix>&#8377; </span><span><?php echo $this->param[0]['fees']; ?></span></td>
                </tr>
                <tr>
                    <th><span>Total Amount Paid</span></th>
                    <td><span data-prefix>&#8377; </span><span ><?php echo $this->param[0]['totalFees']; ?></span></td>
                </tr>
                <tr>
                    <th><span>Balance Due</span></th>
                    <td><span data-prefix>&#8377; </span><span><?php echo $this->param[0]['fees'] - $this->param[0]['totalFees']; ?></span></td>
                </tr>
            </table>
        </article>
        <img src="../../maka.jpg">.....................................
           <header>
      <h1>Grace High School Accounts</h1>
            <h2 align="center">Student's Copy</h2>
            
            <address>
                <p><?php echo $this->param[0]['firstName'] . ' ' . $this->param[0]['lastName']; ?></p>
                <p><strong>Enrollment No: </strong><?php echo $this->param[0]['enrollNo']; ?></p>
                <p><?php echo $this->param[0]['p1']; ?></p>
                
                <?php 
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "student";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die(mysql_error());

  $whois=$this->param[0]['enrollNo'];
     	
		$getclass=mysql_query("SELECT name from tblcourse WHERE id='$whois'");
		if(!$getclass){ echo mysql_error();}
		while($getthem=mysql_fetch_array($getclass)){
			$what=$gethem['image'];
		echo $getthem['name'];
		
  } ?>
            </address>
        </header>
        <article>
            <h1>Recipient</h1>
            <address>
                <span>Grace High School Gayaza</span><br>
                <span>P.O Box Gayaza</span>
            </address>
           
            <table class="meta">
                <tr>
                    <th><span>Invoice #</span></th>
                    <td><span><?php echo $this->param[0]['eid']; ?></span></td>
                </tr>
                <tr>
                    <th><span>Date</span></th>
                    <td><span><?php echo model::mDisplayDate($this->param[0]['fdate']); ?></span></td>
                </tr>
            </table>
            <table class="inventory">
                <thead>
                    <tr>
                        <th width="70%"><span>Fees</span></th>
                        <th width="30%"><span>Amount</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>Fees paid by <?php echo $this->param[0]['firstName'] . ' ' . $this->param[0]['lastName']; ?></span></td>
                        <td><span data-prefix>&#8377; </span><span><?php echo $this->param[0]['amount']; ?></span></td>
                    </tr>
                </tbody>
            </table>
            <table class="balance">
                <tr>
                    <th><span>Total Fees</span></th>
                    <td><span data-prefix>&#8377; </span><span><?php echo $this->param[0]['fees']; ?></span></td>
                </tr>
                <tr>
                    <th><span>Total Amount Paid</span></th>
                    <td><span data-prefix>&#8377; </span><span ><?php echo $this->param[0]['totalFees']; ?></span></td>
                </tr>
                <tr>
                    <th><span>Balance Due</span></th>
                    <td><span data-prefix>&#8377; </span><span><?php echo $this->param[0]['fees'] - $this->param[0]['totalFees']; ?></span></td>
                </tr>
            </table>
        </article>
        <p align="right"><input name="" type="button" value="Print" onclick="javascript:window.print()" style="cursor:pointer; float:left;">
    </p>
    </body>
</html>