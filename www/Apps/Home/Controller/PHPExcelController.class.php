<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/8
 * Time: 15:58
 */
namespace Home\Controller;
use Think\Controller;
class PHPExcelController extends Controller
{

    public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $_SESSION['loginAccount'].date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        import("Org.Excel.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle);
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$j]);
            }
        }
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    /**
    +----------------------------------------------------------
     * Import Excel | 2013.08.23
     * Author:HongPing <hongping626@qq.com>
    +----------------------------------------------------------
     * @param  $file   upload file $_FILES
    +----------------------------------------------------------
     * @return array   array("error","message")
    +----------------------------------------------------------
     */
    public function importExcel($file){
        if(!file_exists($file)){
            return array("error"=>0,'message'=>'file not found!');
        }
        import("Org.Excel.PHPExcel");
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        try{
            $PHPReader = $objReader->load($file);
        }catch(Exception $e){}
        if(!isset($PHPReader)) return array("error"=>0,'message'=>'read error!');
        $allWorksheets = $PHPReader->getAllSheets();
        $i = 0;
        foreach($allWorksheets as $objWorksheet){
            $sheetname=$objWorksheet->getTitle();
            $allRow = $objWorksheet->getHighestRow();//how many rows
            $highestColumn = $objWorksheet->getHighestColumn();//how many columns
            $allColumn = \PHPExcel_Cell::columnIndexFromString($highestColumn);
            $array[$i]["Title"] = $sheetname;
            $array[$i]["Cols"] = $allColumn;
            $array[$i]["Rows"] = $allRow;
            $arr = array();
            $isMergeCell = array();
            foreach ($objWorksheet->getMergeCells() as $cells) {//merge cells
                foreach (\PHPExcel_Cell::extractAllCellReferencesInRange($cells) as $cellReference) {
                    $isMergeCell[$cellReference] = true;
                }
            }
            for($currentRow = 1 ;$currentRow<=$allRow;$currentRow++){
                $row = array();
                for($currentColumn=0;$currentColumn<$allColumn;$currentColumn++){;
                    $cell =$objWorksheet->getCellByColumnAndRow($currentColumn, $currentRow);
                    $afCol = \PHPExcel_Cell::stringFromColumnIndex($currentColumn+1);
                    $bfCol = \PHPExcel_Cell::stringFromColumnIndex($currentColumn-1);
                    $col = \PHPExcel_Cell::stringFromColumnIndex($currentColumn);
                    $address = $col.$currentRow;
                    $value = $objWorksheet->getCell($address)->getValue();
                    if(substr($value,0,1)=='='){
                        return array("error"=>0,'message'=>'can not use the formula!');
                        exit;
                    }
                    if($cell->getDataType()== \PHPExcel_Cell_DataType::TYPE_NUMERIC){
                        $cellstyleformat=$cell->getParent()->getStyle( $cell->getCoordinate() )->getNumberFormat();
                        $formatcode=$cellstyleformat->getFormatCode();
                        if (preg_match('/^([$[A-Z]*-[0-9A-F]*])*[hmsdy]/i', $formatcode)) {
                            $value=gmdate("Y-m-d", \PHPExcel_Shared_Date::ExcelToPHP($value));
                        }else{
                            $value= \PHPExcel_Style_NumberFormat::toFormattedString($value,$formatcode);
                        }
                    }
                    if($isMergeCell[$col.$currentRow]&&$isMergeCell[$afCol.$currentRow]&&!empty($value)){
                        $temp = $value;
                    }elseif($isMergeCell[$col.$currentRow]&&$isMergeCell[$col.($currentRow-1)]&&empty($value)){
                        $value=$arr[$currentRow-1][$currentColumn];
                    }elseif($isMergeCell[$col.$currentRow]&&$isMergeCell[$bfCol.$currentRow]&&empty($value)){
                        $value=$temp;
                    }
                    $row[$currentColumn] = $value;
                }
                $arr[$currentRow] = $row;
            }
            $array[$i]["Content"] = $arr;
            $i++;
        }
        spl_autoload_register(array('Think','autoload'));//must, resolve ThinkPHP and PHPExcel conflicts
        unset($objWorksheet);
        unset($PHPReader);
        unset($PHPExcel);
        unlink($file);
        return array("error"=>1,"data"=>$array);
    }

    function impUser(){
        if(isset($_FILES["import"]) && ($_FILES["import"]["error"] == 0)){
            $result = $this->importExecl($_FILES["import"]["tmp_name"]);
            if($result["error"] == 1){
                $execl_data = $result["data"][0]["Content"];
                foreach($execl_data as $k=>$v){
//                    ..这里写你的业务代码..
                      }
             }
        }
    }
    function test(){
       $id = I('get.id','');
        // $img = D('plantinfo')->where("id = $id")->field('thumb')->find();
        // //图片生成
        // $objDrawing = new \PHPExcel_Worksheet_Drawing();
        // $objDrawing->setPath()
        $plantinfo = D('Plantinfo');
        $plantinfoneeded = $plantinfo->where("id = $id");
        $plantNO = $plantinfoneeded->getField('plantNO');
        $Diameter = $plantinfoneeded->getField('D');
        $useDate = $plantinfoneeded->getField('useDate');
        $plantName = $plantinfoneeded->getField('plantName');
        $fillH = $plantinfoneeded->getField('fillH');
        $operateTemp = $plantinfoneeded->getField('operateTemp');



        $riskcalpara = D('riskcalpara');
        $riskcalparaneeded = $riskcalpara->where("id=$id");
        $SCCisHeatTracing = $riskcalparaneeded->getField('SCCisHeatTracing');


        $risklist = D('Risklist');
        $risklistneeded = $risklist->where("id = $id");
        $wallRiskLevel = $risklistneeded->getField('wallRiskLevel');
        $floorRiskLevel = $risklistneeded->getField('floorRiskLevel');
        $wallConsequenceLevel = $risklistneeded->getField('wallConsequenceLevel');
        $floorConsequenceLevel = $risklistneeded->getField('floorConsequenceLevel');
        $wallFailPro = $risklistneeded->getField('wallFailPro');
        $floorFailPro = $risklistneeded->getField('floorFailPro');
        $wallDamageFactor = $risklistneeded->getField('wallDamageFactor');
        $wallDamageFactor_trend = $risklistneeded->getField('wallDamageFactor_trend');
        $floorDamageFactor_trend = $risklistneeded->getField('floorDamageFactor_trend');
        $wallDamageFactor_trendYear = $risklistneeded->getField('wallDamageFactor_trendYear');
        $arr1 = explode(",",$wallDamageFactor_trend);
        $arr2 = explode(",",$$floorDamageFactor_trend);
        $arr3 = explode(",",$wallDamageFactor_trendYear);

        array_unshift($arr3, "");   //年分
        array_unshift($arr1, "q1"); //损伤因子
         for ($i=0; $i <count($arr3) ; $i++) {
              $data123[$i][0]=$arr3[$i];
              $data123[$i][1]=floatval($arr1[$i]);
             # code...
         }




        vendor("PHPExcel.PHPExcel");
        vendor("PHPExcel.PHPExcel.IOFactory");
        vendor("PHPExcel.PHPExcel.Writer.Excel07");
        $objPHPExcel = new \PHPExcel();

        $objWorksheet = $objPHPExcel->getActiveSheet();
        $objWorksheet->fromArray(
            array(
                array('',   "损伤因子"),
                array('2010',   12),
                array('2011',   56),
                array('2012',   52),
                array('2014',   30)
            ),
            null,
            "I42"
        );
        $objPHPExcel->getActiveSheet()

            ->mergeCells('B2:G2');//合并单元格;



        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('I1',$data123[0][0])
                    ->setCellValue('I2',$data123[1][0])
                    ->setCellValue('I3',$data123[2][0])
                    ->setCellValue('I4',$data123[3][0])
                    ->setCellValue('I5',$data123[0][1])
                    ->setCellValue('J6',$data123[1][1])
                    ->setCellValue('J7',$data123[2][1]);




        $objWorksheet->fromArray(
            array(
        array('',   "损伤因子"),
        array('2010',   12),
        array('2011',   56),
        array('2012',   52),
        array('2014',   30)
    ),
    null,
    "I42"
        );

//	Set the Labels for each data series we want to plot
//		Datatype
//		Cell reference for data
//		Format Code
//		Number of datapoints in series
//		Data values
//		Data Marker

      $dataseriesLabels = array(
    new \PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$J$42', NULL, 1)  //  2010
);
//  Set the X-Axis Labels
//      Datatype
//      Cell reference for data
//      Format Code
//      Number of datapoints in series
//      Data values
//      Data Marker
$xAxisTickValues = array(
    new \PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$I$43:$A$46', NULL, 4)   //  Q1 to Q4
);
//  Set the Data values for each data series we want to plot
//      Datatype
//      Cell reference for data
//      Format Code
//      Number of datapoints in series
//      Data values
//      Data Marker
$dataSeriesValues = array(
    new \PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$J$43:$J$46', NULL, 4)

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

        $title = new \PHPExcel_Chart_Title('Test Stacked Line Chart');
        $yAxisLabel = new \PHPExcel_Chart_Title('损伤因子');


//	Create the chart
        $chart = new \PHPExcel_Chart(
            'chart1',		// name
            $title,			// title
            $legend,		// legend
            $plotarea,		// plotArea
            true,			// plotVisibleOnly
            0,				// displayBlanksAs
            NULL,			// xAxisLabel
            $yAxisLabel		// yAxisLabel
        );
//        echo $chart;
//	Set the position where the chart should appear in the worksheet
        $chart->setTopLeftPosition('A7');
        $chart->setBottomRightPosition('H20');

//	Add the chart to the worksheet
        $objWorksheet->addChart($chart);


// Save Excel 2007 file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=测试数据.xlsx');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');  // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');  // always modified
        header ('Cache-Control: cache, must-revalidate');  // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->setIncludeCharts(TRUE);
        $objWriter->save( 'php://output');
        exit;
    }

    public function upload($fileid){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            return array(status=>0,msg=>$upload->getError());
        }else{// 上传成功
            return array(status=>1,msg=>'上传成功',filepath=>$info[$fileid]['savepath'].$info[$fileid]['savename']);
        }
    }
}