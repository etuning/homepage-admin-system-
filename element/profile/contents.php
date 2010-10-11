<?php
$db_host = "localhost";
$db_user = "yukihiro";
$db_passwd = "javano1";

$db = mysql_connect($db_host,$db_user,$db_passwd);
$db_name = "tomwebpj";
mysql_select_db($db_name,$db);
$sqlstr = "select * From t_schedule_contents Where schedule_page_id = $no order by schedule_contents_id desc";
$res = mysql_query($sqlstr,$db);
while($arr_item = mysql_fetch_assoc($res))
{
    print "<div style='text-align:left;font-size:12px;'>";
    foreach($arr_item as $key => $value)
    {
?>
        
<?php if($key == "concert_date"){ ?>
            <span id='schdl_date'><b> 
            <?php echo $value; ?>
            </b></span><br>
<?php } ?>
<?php  if($key == "concert_title"){ ?>
            <span id='schdl_title'><b>
            <?php echo $value; ?>
            </b></span><br>
<?php } ?>
<?php  if($key == "concert_desc"){ 
        $replace_str = str_replace('\n','<br/>',$value); ?>
        <span id='schdl_desc'>
        <?php echo $replace_str; ?>
        </span><br>
<?php }
    }
    print "</div><br>\n";
}
?>