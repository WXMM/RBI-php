<?php
namespace Home\Controller;
use Think\Controller;
class ExcelController extends Controller{
	//导出单台数据
	public function create_xlsx(){

		vendor("PHPExcel.PHPExcel");
		vendor("PHPExcel.PHPExcel.IOFactory");
		vendor("PHPExcel.PHPExcel.Writer.Excel07");
		
		// $date = date("Y_m_d", time ());
		// $fileName = "_{$date}.xls";
		
		$objPHPExcel = new \PHPExcel();

		$objPHPExcel
			->getProperties()    //获得文件属性
			->setCreator("zff")    //设置文件的创建者
			->setLastModifiedBy("zff")    //设置最后修改者
			->setTitle("Office 2007 xlsx Test Document")    //设置标题
			->setSubject("Office 2007 xlsx Test Document")    //设置主题
			->setDescription("Test document for Office 2007 xlsx, generated using PHP classes.")//设置备注
			->setKeywords( "office 2007 openxml php")        //设置标记
			->setCategory( "Test result file");                //设置类别

			  

		//相关属性
		$objWorksheet = $objPHPExcel->getActiveSheet();
		$objPHPExcel->getActiveSheet()
					// ->setTitle('zff')//得到当前活动的表并设置表名
					->mergeCells('B2:G2')//合并单元格
					->mergeCells('F33:G33')
					->getStyle('A1:U100')->getAlignment()->setVertical(\PHPExcel_Style_alignment::VERTICAL_CENTER)
												->setHorizontal(\PHPExcel_Style_alignment::HORIZONTAL_CENTER);
		  
		   
		//基本信息
		$id = I('get.id','');
		$plantinfo = D('Plantinfo');
		$list1 = $plantinfo->where("id=$id")->field('plantNO,D,useDate,plantName,fillH,operateTemp')->find();
		// var_dump($list1);

		$plantNO = $list1['plantNO'];
		$D = $list1['D'];
		$useDate = $list1['useDate'];
		$plantName = $list1['plantName'];
		$fillH = $list1['fillH'];
		$operateTemp = $list1['operateTemp'];
		// var_dump($list1);

		
		
		

		$riskcalpara = D('riskcalpara');
		$riskcalparaneeded = $riskcalpara->where("pid=$id");
		$SCCisHeatTracing = $riskcalparaneeded->getField('SCCisHeatTracing');


        //风险计算记录列表
        $risklist =  D('Risklist');
		$list2    =  $risklist->where("pid = $id")->field('id,wallRiskLevel,floorRiskLevel,wallConsequenceLevel,floorConsequenceLevel,wallFailPro,floorFailPro,wallDamageFactor,wallDamageFactor_trend,floorDamageFactor_trend,wallDamageFactor_trendYear,wallNextCheckDate,floorNextCheckDate,wallRisk,floorRisk')->order("countDate desc,id desc")->limit(1)->select();
        //风险计算结果  
        // var_dump($list2);
        
        foreach ($list2 as $value) {
        	// var_dump($value);
        	// $list5 = $value;
        	// var_dump($list5);
        }
        // foreach ($list5 as $value) {
        // 	var_dump($value);
        // }
        $riskdetailPid = $value ['id'];
        $wallRiskLevel = $value['wallRiskLevel'];
        $floorRiskLevel = $value['floorRiskLevel'];
        $wallConsequenceLevel = $value['wallConsequenceLevel'];
        $floorRiskLevel = $value['floorConsequenceLevel'];
        $wallFailPro = $value['wallFailPro'];
        
        $floorFailPro = $value['floorFailPro'];
        $wallDamageFactor = $value['wallDamageFactor'];
        $wallDamageFactor_trend = $value['wallDamageFactor_trend'];
        $floorDamageFactor_trend = $value['floorDamageFactor_trend'];
        $wallDamageFactor_trendYear = $value['wallDamageFactor_trendYear'];
        $wallNextCheckDate = $value['wallNextCheckDate'];
        $floorNextCheckDate = $value['floorNextCheckDate'];
        // var_dump($floorNextCheckDate);
        $wallRisk = $value['wallRisk'];
        $floorRisk = $value['floorRisk'];
        // var_dump($wallRisk);
        $arr1 = explode(",",$wallDamageFactor_trend);
	    $arr2 = explode(",",$floorDamageFactor_trend);
	    $arr3 = explode(",",$wallDamageFactor_trendYear);
	    $wallDamageFactorLast = end($arr1);
	    // var_dump($wallDamageFactorLast);


        //风险计算结果
        $riskDetail = D('Riskdetail');
        $riskDetailNeeded = $riskDetail->where("pid = $riskdetailPid");
        $maxLayerNO = $riskDetailNeeded->max("layerNO");
        $maxLayerNO = intval($maxLayerNO);
        // var_dump($maxLayerNO);

        $n = $maxLayerNO;
        

        for ($i=10; $i < ($n+10) ; $i++) { 
        	$objPHPExcel->setActiveSheetIndex(0)
	                    ->setCellValue('D'.$i,"$wallNextCheckDate");
        }
        for ($i=10; $i < ($n+10) ; $i++) { 
        	$objPHPExcel->setActiveSheetIndex(0)
	                    ->setCellValue('F'.$i,"$wallDamageFactorLast");
        }

      
        $array01 = array();
        $array02 = array();
        for($i=1; $i < $maxLayerNO+1; $i++) { 
        	$whatINeed = $riskDetailNeeded ->where(
                array(
                      "layerNO" => $i,
                      "pid"     => $riskdetailPid
                	)
        		)->order('damageFactor desc')->limit(1)->find();
        // var_dump($whatINeed);
        $damageFactor = $whatINeed['damageFactor'];
        
        $corrosionSpeed = $whatINeed['corrosionSpeed'];

        array_push($array01, "$damageFactor");
        array_push($array02, "$corrosionSpeed");

    }
        

        $i = 10;
       foreach ($array01 as $value) {
    	    $objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$value);
            $i++;
    }
        $i = 10;
        foreach ($array02 as $value) {
        	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$value);
        	$i++;
        }


	    //字体和样式
	    $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(11);
	    $objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(14);
	    $objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
	    $objPHPExcel->getActiveSheet()->getStyle('B41')->getFont()->setBold(true);
	    $objPHPExcel->getActiveSheet()->getStyle('B58')->getFont()->setBold(true);
	    //行高和行宽
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
	    $objPHPExcel->getActiveSheet()->getRowDimension('9')->setRowHeight(40);//第二行行高
	    $objPHPExcel->getActiveSheet()->getstyle('A3:G39')->getAlignment()->setWrapText(true);//自动换行
	    $objPHPExcel->getActiveSheet()->getStyle('A3:G39')->getAlignment()->setShrinkToFit(true);//缩小字体填充






	    //设置单元格边框  
	    $styleThinBlackBorderOutline = array(
	        'borders' => array(
	            'outline' => array (
	                'style' => \PHPExcel_Style_Border::BORDER_THIN,
	                'color' => array ('argb' => 'FF000000'),
	            ),
	        ),
	     );
	    //循环输出边框
	    for ($i=9; $i <25; $i++) { 
	        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        
	    }


	    for ($i=26; $i <36 ; $i++) { 
	        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray($styleThinBlackBorderOutline);
	    }


	    for ($i=37; $i<40 ; $i++) { 
	        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray($styleThinBlackBorderOutline);
	    }


	    for ($i=33; $i <38 ; $i++) { 
	        $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('G'.$i)->applyFromArray($styleThinBlackBorderOutline);
	    }


	    for ($i=3; $i <5 ; $i++) { 
	        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->applyFromArray($styleThinBlackBorderOutline);
	        $objPHPExcel->getActiveSheet()->getStyle('G'.$i)->applyFromArray($styleThinBlackBorderOutline);
	    }
	    //零散输出边框,可以自定义数组输出，后期修改
	    $objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($styleThinBlackBorderOutline);

	    $objPHPExcel->getActiveSheet()->getStyle('B7')->applyFromArray($styleThinBlackBorderOutline);

	    $objPHPExcel->getActiveSheet()->getStyle('C7')->applyFromArray($styleThinBlackBorderOutline);

	    $objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($styleThinBlackBorderOutline);

	    $objPHPExcel->getActiveSheet()->getStyle('D7')->applyFromArray($styleThinBlackBorderOutline);

	    $objPHPExcel->getActiveSheet()->getStyle('E7')->applyFromArray($styleThinBlackBorderOutline);

	    $objPHPExcel->getActiveSheet()->getStyle('F7')->applyFromArray($styleThinBlackBorderOutline);

	    $objPHPExcel->getActiveSheet()->getStyle('G7')->applyFromArray($styleThinBlackBorderOutline);

		
	    //设置单元格内容
	    $objPHPExcel->setActiveSheetIndex(0)
	                ->setCellValue('B2','储罐基本信息')
	                ->setCellValue('B3','储罐位号')
	                ->setCellValue('B4','直径')
	                ->setCellValue('B5','是否安装伴热')
	                ->setCellValue('D3','储罐名称')
	                ->setCellValue('D4','填充高度')
	                ->setCellValue('F3','投用日期')
	                ->setCellValue('F4','操作温度')
	                ->setCellValue('B7','壁板内腐蚀类型')
	                ->setCellValue('C7','均匀腐蚀')
	                ->setCellValue('E7','均匀腐蚀')
	                ->setCellValue('G7','局部腐蚀')
	                ->setCellValue('D7','壁板外壁腐蚀类型')
	                ->setCellValue('F7','底板腐蚀类型')
	                ->setCellValue('B9','设备项')	                
	                ->setCellValue('C9','总腐蚀速率(mm/yr)')
	                ->setCellValue('C23',"$corrosionSpeed")
	                ->setCellValue('F23',"$wallDamageFactorLast")
	                ->setCellValue('D9','下次检验时间')
	                ->setCellValue('D23',"$wallNextCheckDate")
	                ->setCellValue('D24',"$floorNextCheckDate")
	                ->setCellValue('E9','当前损伤因子')
	                ->setCellValue('F9','未来损伤因子')
	                ->setCellValue('B10','1层圈板')
	                ->setCellValue('B11','2层圈板')
	                ->setCellValue('B12','3层圈板')
	                ->setCellValue('B13','4层圈板')
	                ->setCellValue('B14','5层圈板')
	                ->setCellValue('B15','6层圈板')
	                ->setCellValue('B16','7层圈板')
	                ->setCellValue('B17','8层圈板')
	                ->setCellValue('B18','9层圈板')
	                ->setCellValue('B19','10层圈板')
	                ->setCellValue('B20','11层圈板')
	                ->setCellValue('B21','12层圈板')
	                ->setCellValue('B22','13层圈板')
	                ->setCellValue('B23','壁板')
	                ->setCellValue('B24','底板')
	                ->setCellValue('B27','失效后果(元)')
	                ->setCellValue('B28','当前失效概率(事件/年)')
	                ->setCellValue('B29','当前失效可能性')
	                ->setCellValue('B30','当前风险(元)')
	                ->setCellValue('B31','当前风险等级')
	                ->setCellValue('B32','未来失效概率(事件/年)')
	                ->setCellValue('B33','未来失效可能性')
	                ->setCellValue('B34','未来风险(元)')
	                ->setCellValue('B35','未来风险等级')
	                ->setCellValue('B37','检验设备项')
	                ->setCellValue('B38','壁板')
	                ->setCellValue('B39','底板')
	                ->setCellValue('C26','壁板')
	                ->setCellValue('C37','建议检验时间')
	                ->setCellValue('D26','底板')
	                ->setCellValue('D37','建议检验有效性')
	                ->setCellValue('F33','检维修策略')
	                ->setCellValue('F34','检验类型')
	                ->setCellValue('F35','外壁检验策略')
	                ->setCellValue('F36','内壁检验策略')
	                ->setCellValue('F37','底板检验策略')
	                ->setCellValue("C3","$plantNO")
	                ->setCellValue('C4',"$D")
	                ->setCellValue('C5',"$SCCisHeatTracing")
	                ->setCellValue('E3',"$plantName")
	                ->setCellValue('E4',"$fillH")
	                ->setCellValue('G3',"$useDate")
	                ->setCellValue('G4',"$operateTemp")
	                ->setCellValue('C31',"$wallRiskLevel")
	                ->setCellValue('D31',"$floorRiskLevel")
	                ->setCellValue('C27',"$wallConsequenceLevel")
	                ->setCellValue('D27',"$floorConsequenceLevel")
	                ->setCellValue('C28',"$wallFailPro")
	                ->setCellValue('D28',"$floorFailPro")
	                // ->setCellValue('B41','壁板损伤因子趋势图')
                    ->setCellValue('C30',"$wallRisk")
                    ->setCellValue('D30',"$floorRisk") ;
                    
	            
        


        
	    // var_dump($arr1);
	    // var_dump($arr3);



	    
$objWorksheet->fromArray(
            array(
        array('',   "损伤因子"),
        $arr1,//损伤因子
        $arr3//年份
    ),
    null,
    "B42"
        );

//	Set the Labels for each data series we want to plot


      $dataseriesLabels = array(
    new \PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$C$42', NULL, 1)  //  2010
);
//  Set the X-Axis Labels

$xAxisTickValues = array(
    new \PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$44:$F$44', NULL, 4)   //  Q1 to Q4
);
//  Set the Data values for each data series we want to plot

$dataSeriesValues = array(
    new \PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$43:$F$43', NULL, 4)

);

//	Build the dataseries
        $series = new \PHPExcel_Chart_DataSeries(
            \PHPExcel_Chart_DataSeries::TYPE_LINECHART,		// plotType
            \PHPExcel_Chart_DataSeries::GROUPING_STACKED,	// plotGrouping
            range(0, count($dataSeriesValues)-1),			// plotOrder
            $dataseriesLabels,								// plotLabel
            $xAxisTickValues,								// plotCategory
            $dataSeriesValues								// plotValues
        );

//	作图区域
        $plotarea = new \PHPExcel_Chart_PlotArea(NULL, array($series));
//	Set the chart legend
        $legend = new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_TOPRIGHT, NULL, false);

        $title = new \PHPExcel_Chart_Title('壁板损伤因子变化趋势图');
        $xAxisLabel = new \PHPExcel_Chart_Title('年份');
        $yAxisLabel = new \PHPExcel_Chart_Title('损伤因子');


//	Create the chart
        $chart = new \PHPExcel_Chart(
            'chart1',		// name
            $title,			// title
            $legend,		// legend
            $plotarea,		// plotArea
            true,			// plotVisibleOnly
            true,				// displayBlanksAs
            $xAxisLabel	,		// xAxisLabel
            $yAxisLabel		// yAxisLabel
        );
//        echo $chart;
//	Set the position where the chart should appear in the worksheet
        $chart->setTopLeftPosition('B42');
        $chart->setBottomRightPosition('G57');

//	Add the chart to the worksheet
        $objWorksheet->addChart($chart);
        $objWorksheet->fromArray(
            array(
        array('',   "损伤因子"),
        $arr2,//损伤因子
        $arr3//年份
    ),
    null,
    "B45"
        );

//	Set the Labels for each data series we want to plot


      $dataseriesLabels = array(
    new \PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$C$45', NULL, 1)  //  2010
);
//  Set the X-Axis Labels

$xAxisTickValues = array(
    new \PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$47:$F$47', NULL, 4)   //  Q1 to Q4
);
//  Set the Data values for each data series we want to plot

$dataSeriesValues = array(
    new \PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$46:$F$46', NULL, 4)

);

//	Build the dataseries
        $series = new \PHPExcel_Chart_DataSeries(
            \PHPExcel_Chart_DataSeries::TYPE_LINECHART,		// plotType
            \PHPExcel_Chart_DataSeries::GROUPING_STACKED,	// plotGrouping
            range(0, count($dataSeriesValues)-1),			// plotOrder
            $dataseriesLabels,								// plotLabel
            $xAxisTickValues,								// plotCategory
            $dataSeriesValues								// plotValues
        );

//	作图区域
        $plotarea = new \PHPExcel_Chart_PlotArea(NULL, array($series));
//	Set the chart legend
        $legend = new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_TOPRIGHT, NULL, false);

        $title = new \PHPExcel_Chart_Title('底板损伤因子变化趋势图');
        $xAxisLabel = new \PHPExcel_Chart_Title('年份');
        $yAxisLabel = new \PHPExcel_Chart_Title('损伤因子');


//	Create the chart
        $chart = new \PHPExcel_Chart(
            'chart1',		// name
            $title,			// title
            $legend,		// legend
            $plotarea,		// plotArea
            true,			// plotVisibleOnly
            true,				// displayBlanksAs
            $xAxisLabel	,		// xAxisLabel
            $yAxisLabel		// yAxisLabel
        );
//        echo $chart;
//	Set the position where the chart should appear in the worksheet
        $chart->setTopLeftPosition('B58');
        $chart->setBottomRightPosition('G73');

//	Add the chart to the worksheet
        $objWorksheet->addChart($chart);



// Save Excel 2007 file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename= "'.$plantNO.'.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');  // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');  // always modified
        header ('Cache-Control: cache, must-revalidate');  // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        
        $objWriter->setIncludeCharts(true);
        $objWriter->save( 'php://output');
        exit;
	    
}




		//导出完整数据
		public function create_xlsx_full(){
			vendor("PHPExcel.PHPExcel");
			vendor("PHPExcel.PHPExcel.IOFactory");
			vendor("PHPExcel.PHPExcel.Writer.Excel07");

			$objPHPExcel = new \PHPExcel();
			$objPHPExcel
				->getProperties()    //获得文件属性
				->setCreator("zff")    //设置文件的创建者
				->setLastModifiedBy("zff")    //设置最后修改者
				->setTitle("Office 2007 xlsx Test Document")    //设置标题
				->setSubject("Office 2007 xlsx Test Document")    //设置主题
				->setDescription("Test document for Office 2007 xlsx, generated using PHP classes.")//设置备注
				->setKeywords( "office 2007 openxml php")        //设置标记
				->setCategory( "Test result file");                //设置类别

        //接收前端传递过来的id值
        $index=I("get.index","");
        // var_dump($index);
        $multiId = explode("-",$index);
        // var_dump($multiId);

 
        // $data1 = array();
        
        $data = D('plantinfo');
        for ($i=0; $i < count($multiId) ; $i++) { 
        	$result = $data ->where("id=$multiId[$i]")->select();

            $objPHPExcel->getActiveSheet()->setCellValue('A'.($i+4),$result[0]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.($i+4),$result[0]['plantNO']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.($i+4),$result[0]['plantName']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.($i+4),$result[0]['areaId']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.($i+4),$result[0]['useDate']);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.($i+4),$result[0]['operateTemp']);
            $objPHPExcel->getActiveSheet()->setCellValue('H'.($i+4),$result[0]['operatePresure']);
            $objPHPExcel->getActiveSheet()->setCellValue('I'.($i+4),$result[0]['useDate']);
            $objPHPExcel->getActiveSheet()->setCellValue('J'.($i+4),$result[0]['V']);
        }


        $data1 = D('Risklist');

        for ($i=0; $i < count($multiId) ; $i++) { 
        	$result = $data1 ->where("pid=$multiId[$i]")->select();

            $objPHPExcel->getActiveSheet()->setCellValue('N'.($i+4),$result[0]['wallRiskLevel']);
            $objPHPExcel->getActiveSheet()->setCellValue('O'.($i+4),$result[0]['floorRiskLevel']);
            $objPHPExcel->getActiveSheet()->setCellValue('K'.($i+4),$result[0]['wallConsequence']);
            $objPHPExcel->getActiveSheet()->setCellValue('L'.($i+4),$result[0]['wallFailProLevel']);
            $objPHPExcel->getActiveSheet()->setCellValue('L'.($i+4),$result[0]['wallFailProLevel']);
            
            $objPHPExcel->getActiveSheet()->setCellValue('M'.($i+4),$result[0]['floorFailProLevel']);
            
            $objPHPExcel->getActiveSheet()->setCellValue('L'.($i+4),$result[0]['wallFailProLevel']);
            

            





            
        }

        	
				//单元格属性
				$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
				$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
				$objPHPExcel->getActiveSheet()
							->mergeCells('A2:A3')//合并单元格
							->mergeCells('B2:B3')//合并单元格
							->mergeCells('C2:C3')//合并单元格
							->mergeCells('D2:D3')//合并单元格
							->mergeCells('E2:E3')//合并单元格
							->mergeCells('F2:F3')//合并单元格
							->mergeCells('G2:G3')//合并单元格
							->mergeCells('H2:H3')//合并单元格
							->mergeCells('I2:I3')//合并单元格
							->mergeCells('J2:J3')//合并单元格
							->mergeCells('K2:K3')//合并单元格
							->mergeCells('L2:L3')//合并单元格
							->mergeCells('M2:M3')//合并单元格
							->mergeCells('N2:N3')//合并单元格
							->mergeCells('O2:O3')//合并单元格
							->mergeCells('P2:P3')//合并单元格
							->mergeCells('Q2:Q3')//合并单元格
							->mergeCells('R2:R3')//合并单元格
							->mergeCells('S2:S3')//合并单元格
							->mergeCells('T2:T3')//合并单元格
							->mergeCells('U2:U3')//合并单元格
							->mergeCells('V2:V3')//合并单元格
							->mergeCells('A1:V1')//合并单元格
							->getStyle('A1:V55')->getAlignment()->setVertical(\PHPExcel_Style_alignment::VERTICAL_CENTER)
														->setHorizontal(\PHPExcel_Style_alignment::HORIZONTAL_CENTER);


				$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(11);
				$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
				$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getstyle('A2:V2')->getAlignment()->setWrapText(true);//自动换行
				//缩小字体填充
				$objPHPExcel->getActiveSheet()->getStyle('A2:V2')->getAlignment()->setShrinkToFit(true);
				$objPHPExcel->getActiveSheet()->getStyle('F4:F15')->getAlignment()->setShrinkToFit(true);



				$styleThickBlackBorderOutline = array(
				   'borders' => array(
					   'outline' => array (
						   'style' => \PHPExcel_Style_Border::BORDER_THICK,
						   'color' => array ('argb' => 'FF000000'),
					   ),
				   ),
				);
				//循环输出边框
				$Arr1 = Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V');
				for ($i=0; $i <22 ; $i++) { 
					$objPHPExcel->getActiveSheet()->getStyle($Arr1[$i].'2' )->applyFromArray($styleThickBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle($Arr1[$i].'3' )->applyFromArray($styleThickBlackBorderOutline);
				}

				// $objPHPExcel->getActiveSheet()->getStyle('A2:V3')->applyFromArray($styleThickBlackBorderOutline);


				$styleThinBlackBorderOutline = array(
				   'borders' => array(
					   'outline' => array (
						   'style' => \PHPExcel_Style_Border::BORDER_THIN,
						   'color' => array ('argb' => 'FF000000'),
					   ),
				   ),
				);
				for ($i=4; $i < 31 ; $i++) { 
					$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('H'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('I'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('J'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('K'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('L'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('M'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('N'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('O'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('P'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('Q'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('R'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('S'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('T'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('U'.$i)->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('V'.$i)->applyFromArray($styleThinBlackBorderOutline);
				}
				







				//单元格内容
				// arr1 = ('A',)
				$objPHPExcel->getActiveSheet()->setCellValue('A1','储罐完整性评价信息')
											  ->setCellValue('A2','序号')
											  ->setCellValue('B2','工艺位号')
											  ->setCellValue('C2','装置')
											  ->setCellValue('D2','罐区')
											  ->setCellValue('E2','规格型号(mm)')
											  ->setCellValue('F2','启用日期')
											  ->setCellValue('G2','操作温度(℃)')
											  ->setCellValue('H2','操作压力(MPa)')
											  ->setCellValue('I2','介质')
											  ->setCellValue('J2','容积(m3)')
											  ->setCellValue('K2','失效后果(壁板/底板)')
											  ->setCellValue('L2','当前壁板失效可能性等级')
											  ->setCellValue('M2','当前底板失效可能性等级')
											  ->setCellValue('N2','当前壁板风险等级')
											  ->setCellValue('O2','当前底板风险等级')
											  ->setCellValue('P2','未来壁板失效可能性等级')
											  ->setCellValue('Q2','未来底板失效可能性等级')
											  ->setCellValue('R2','未来壁板风险等级')
											  ->setCellValue('S2','未来底板风险等级')
											  ->setCellValue('T2','辅助设备评价等级')
											  ->setCellValue('U2','建议实施在线检验时间（壁板/底板达到预定临界失效级别）')
											  ->setCellValue('V2','建议实施开罐检验计划（以底板达到预定风险值）');

				
				


				
				// 设置表名
				$objPHPExcel->getActiveSheet()
							->setTitle('zff');//得到当前活动的表并设置表名
				$objPHPExcel->getActiveSheetIndex(0);//设置当前活动表格为第一张表
				//清除缓存
				ob_end_clean();
				ob_start();


				// 头文件，设置文件属性
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="储罐完整性管理结果.xlsx"');
				header('Cache-Control: max-age=0');
				header('Cache-Control: max-age=1');
				header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
				header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				header ('Pragma: public'); // HTTP/1.0                


				//使文件能显示数据
				$objWriter = \PHPExcel_IOFactory:: createWriter($objPHPExcel, 'Excel2007');
				$objWriter->save( 'php://output');
				exit;          
		}

}


	
			

?>
