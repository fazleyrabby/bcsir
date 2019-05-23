<?php

include 'header.php';

include 'sidebar.php';


if($level==1 || $level == 7)
{

include 'dash.php';
}
else
{
include 'dash_user.php';	
}
include 'footer.php';


?> 