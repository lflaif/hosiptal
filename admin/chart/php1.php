<?php  
	require_once ("jpgraph/jpgraph.php");  
	require_once ("jpgraph/jpgraph_bar.php");  

	$db = new mysqli('127.0.0.1:3307','root','','simplevote');
	$result = mysqli_query($db,"select * from medicine where yaoid=206001;");
			$row = mysqli_fetch_assoc($result);
	$var1=$row['yongliang'];
	//$var2=$row['yaoname'];

	$result = mysqli_query($db,"select * from medicine where yaoid=206002;");
			$row = mysqli_fetch_assoc($result);
	$var2=$row['yongliang'];

	$result = mysqli_query($db,"select * from medicine where yaoid=206003;");
			$row = mysqli_fetch_assoc($result);
	$var3=$row['yongliang'];

	$result = mysqli_query($db,"select * from medicine where yaoid=206004;");
			$row = mysqli_fetch_assoc($result);
	$var4=$row['yongliang'];

	$result = mysqli_query($db,"select * from medicine where yaoid=206005;");
			$row = mysqli_fetch_assoc($result);
	$var5=$row['yongliang'];

	$result = mysqli_query($db,"select * from medicine where yaoid=206006;");
			$row = mysqli_fetch_assoc($result);
	$var6=$row['yongliang'];

	$result = mysqli_query($db,"select * from medicine where yaoid=206007;");
			$row = mysqli_fetch_assoc($result);
	$var7=$row['yongliang'];

	$result = mysqli_query($db,"select * from medicine where yaoid=206008;");
			$row = mysqli_fetch_assoc($result);
	$var8=$row['yongliang'];

	$data  = array($var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8);           
	$ydata = array("感冒灵","维C","维B","快克","维E","牛黄解毒片","吗丁啉","百多邦");  
	
	$graph = new Graph(500,300);  //创建新的Graph对象  
	$graph->SetScale("textlin");  //刻度样式  
	$graph->SetShadow();          //设置阴影  
	$graph->img->SetMargin(40,30,40,50); //设置边距  
	
	$graph->graph_theme = null; //设置主题为null，否则value->Show(); 无效  
	
	$barplot = new BarPlot($data);  //创建BarPlot对象  
	$barplot->SetFillColor('blue'); //设置颜色  
	$barplot->value->Show(); //设置显示数字  
	$graph->Add($barplot);  //将柱形图添加到图像中  
	
	$graph->title->Set("各类药品用量图");   
	$graph->xaxis->title->Set("药品"); //设置标题和X-Y轴标题  
	$graph->yaxis->title->Set("用 量(/盒)");                                                                        
	$graph->title->SetColor("red");  
	$graph->title->SetMargin(10);  
	$graph->xaxis->title->SetMargin(5);  
	$graph->xaxis->SetTickLabels($ydata);  
	
	$graph->title->SetFont(FF_SIMSUN,FS_BOLD);  //设置字体  
	$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);  
	$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD);  
	$graph->xaxis->SetFont(FF_SIMSUN,FS_BOLD);  
	
	$graph->Stroke();  
?>  