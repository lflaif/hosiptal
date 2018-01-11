<?php  
	require_once ("jpgraph/jpgraph.php");  
	require_once ("jpgraph/jpgraph_line.php");  
	
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

	$data1  = array($var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8);
	$ydata = array("感冒灵","维C","维B","快克","维E","牛黄解毒片","吗丁啉","百多邦");  

	$graph = new Graph(500,300);   
	$graph->SetScale("textlin");  
	$graph->SetShadow();     
	$graph->img->SetMargin(60,30,30,70); //设置图像边距  
	
	$graph->graph_theme = null; //设置主题为null，否则value->Show(); 无效  
	
	$lineplot1=new LinePlot($data1); //创建设置两条曲线对象  
	$lineplot1->value->SetColor("red");  
	$lineplot1->value->Show();  
	$graph->Add($lineplot1);  //将曲线放置到图像上  
	
	$graph->title->Set("各类药品用量图");   
	$graph->xaxis->title->Set("药品"); //设置标题和X-Y轴标题  
	$graph->yaxis->title->Set("用 量(/盒)");                                                                        
	$graph->title->SetColor("red");  
	$graph->title->SetMargin(10);  
	$graph->xaxis->title->SetMargin(10);  
	$graph->xaxis->SetTickLabels($ydata);  
	
	$graph->title->SetFont(FF_SIMSUN,FS_BOLD);  //设置字体  
	$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);  
	$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD);  
	$graph->xaxis->SetFont(FF_SIMSUN,FS_BOLD); 
	
	$graph->Stroke();  //输出图像  
?>  