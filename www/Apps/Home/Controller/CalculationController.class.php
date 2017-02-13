<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/14
 * Time: 9:43
 */
//计算风险等级函数
namespace Home\Controller;
use Think\Controller;

class CalculationController extends Controller
{
    //计算风险等级
    function riskRate()
    {
        header("Content-type: text/html; charset=utf-8");
        $webservice_url = "http://localhost:8080/axis2/services/Calculate?wsdl";//webservice地址
        $client = new \SoapClient($webservice_url);

        //       这里存放全部的上传数据
        $id = I("post.id", '');
        $re = $client->__soapCall('riskRate', array(
            array(
                "PlantId"                      =>    (int)$id
            )
        ))->return;
        if($re[1]==1){
            $re['msg'] = $re[0];
        }else{
            $re['msg'] = "计算出错";
        }

        $this->AjaxReturn($re);

    }
    function riskRate1()
    {
    header("Content-type: text/html; charset=utf-8");
    $webservice_url = "http://localhost:8080/axis2/services/Calculate?wsdl";//webservice地址
    $client = new \SoapClient($webservice_url);

        //       这里存放全部的上传数据
        $id             =   I("post.id",'');
        $PlantInfo      =   $this->getPlantInfo($id);
        $Corrosion      =   $this->getPlantCorrosion($id);
        $riskCalPara    =   $PlantInfo['mechanism'];




//   风险矩阵图  1 代表失效可能性等级 A代表失效后果等级
        $riskMatrixTable[1]["A"]="低风险";
        $riskMatrixTable[1]["B"]="低风险";
        $riskMatrixTable[1]["C"]="中风险";
        $riskMatrixTable[1]["D"]="中风险";
        $riskMatrixTable[1]["E"]="中高风险";
        $riskMatrixTable[2]["A"]="低风险";
        $riskMatrixTable[2]["B"]="低风险";
        $riskMatrixTable[2]["C"]="中风险";
        $riskMatrixTable[2]["D"]="中风险";
        $riskMatrixTable[2]["E"]="中高风险";
        $riskMatrixTable[3]["A"]="低风险";
        $riskMatrixTable[3]["B"]="低风险";
        $riskMatrixTable[3]["C"]="中风险";
        $riskMatrixTable[3]["D"]="中高风险";
        $riskMatrixTable[3]["E"]="高风险";
        $riskMatrixTable[4]["A"]="中风险";
        $riskMatrixTable[4]["B"]="中风险";
        $riskMatrixTable[4]["C"]="中高风险";
        $riskMatrixTable[4]["D"]="中高风险";
        $riskMatrixTable[4]["E"]="高风险";
        $riskMatrixTable[5]["A"]="中高风险";
        $riskMatrixTable[5]["B"]="中高风险";
        $riskMatrixTable[5]["C"]="中高风险";
        $riskMatrixTable[5]["D"]="高风险";
        $riskMatrixTable[5]["E"]="高风险";

//-----------------------------------------计算当前风险---------------------------------------

// ------------------------------------------壁板风险----------------------------------------

        $measureThicknessWall     =    $Corrosion["measurethicknessWall"];
        if(count($measureThicknessWall) == 0){
            $this->AjaxReturn(
                array(
                    "msg" => "该设备没有添加壁板，请前往基本信息管理添加壁板"
                )
                ,"JSON");
            exit;
        }
        if(count($PlantInfo['mechanism'])==0 ){
            $this->AjaxReturn(
                array(
                    "msg" => "该设备没有进行损伤机理筛选，请先进行损伤机理筛选"
                )
                ,"JSON");
            exit;
        }

        for ($i = 0; $i < count($measureThicknessWall); $i++) {

            $risk['wall'][$i]['layerNO']           =   $measureThicknessWall[$i]['layerNO'];
            $risk['wall'][$i]['layerId']           =   $measureThicknessWall[$i]['layerId'];
            $risk['wall'][$i]['corrosionSpeed']    =   $measureThicknessWall[$i]['long_termCorrosion'];//计算壁板腐蚀速率

//-------------------------------------计算壁板损伤因子----------------------------------------

//        1、壁板板减薄次因子

            $wallReductionDamageFactor[$i] = $client->__soapCall('getReductionDamageFactor', array(
                array(
                    "part"                      =>    (int)1,                                                             //代表壁板
                    "corrosionSpeed"            =>    (double)$measureThicknessWall[$i]['long_termCorrosion'],            //该层壁板腐蚀速率
                    "useDate"                   =>    (double)$PlantInfo["useDate"],                                      //使用时间(储罐使用时间)
                    "thickness"                 =>    (double)$measureThicknessWall[$i]["namelyThickness"],               //壁板初始厚度(目前是名义厚度)

                    "checkTime"                 =>    (int)$PlantInfo["wallCheckTime"],                                   //检验次数
                    "checkValidity"             =>    (string)$PlantInfo["wallCheckValidity"],                            //检验有效性
                    "linkType"                  =>    (string)$PlantInfo['wallboardLinkType'],                            //壁板连接形式
                    "isMaintenanceAsRequired"   =>    (int)$PlantInfo['isMaintainAsRequired'],                            //是否按规定维护
                    "tankFoundationSettlement"  =>    (int)$PlantInfo['tankFoundationSettlement']                         //基础沉降评价
                )
            ))->return;
            $risk['wall'][$i]['wallReductionDamageFactor'] = $wallReductionDamageFactor[$i];

//        2、壁板外部损伤因子
            $wallOutDamageFactor[$i]=$client->__soapCall('getOutDamageFactor', array(
                array(
                    'operatingTemp'                    =>    (double)$PlantInfo['operateTemp'],                               //操作温度
                    'designTemp'                       =>    (double)$PlantInfo['designTemp'],                                //设计温度
                    'part'                             =>    (int)1,                       //代表壁板
                    'thickness'                        =>    (double)$measureThicknessWall[$i]["namelyThickness"],            //壁板初始厚度(目前是名义厚度)

                    'pipeComplexity'                   =>    (int)$riskCalPara['pipeComplexity'],                          //管道复杂度
                    'isKeepWarmHasCL'                  =>    (int)$riskCalPara['isKeepWarmHasCL'],                         //是否保温层含氯
                    'isPipeSupport'                    =>    (int)$riskCalPara['outDamageisPipeSupport'],                  //是否管支架补偿
                    'isInterfaceCompensation'          =>    (int)$riskCalPara['outDamageisInterfaceCompensation'],        //是否界面补偿

                    'outDamageMechanismId'             =>    (int)$riskCalPara['wallOutDamageMechanismId'],     //外部损伤机理
                    'useDate'                          =>    (double)$PlantInfo["useDate"],                                //使用时间(储罐使用时间)
                    'isKeepWarm'                       =>    (int)$PlantInfo["isKeepWarm"],                                //是否有保温层
                    'KeepWarmStatus'                   =>    (int)$PlantInfo["KeepWarmStatus"],                            //保温层质量
                    'coatingStatus'                    =>    (int)$PlantInfo["coatingStatus"],                             //涂层质量

                    'coatingUseDate'                   =>    (double)$PlantInfo["coatingUseDate"],                         //涂层使用时间
                    'linkType'                         =>    (string)$PlantInfo["wallboardLinkType"],                      //连接形式
                    'SCCMechanismId'                   =>    (int)$riskCalPara["wallSCCMechanismId"],           //SCC损伤机理
                    'checkTime'                        =>    (int)$PlantInfo["wallCheckTime"],                             //检验次数
                    'checkValidity'                    =>    (string)$PlantInfo["wallCheckValidity"],                      //检验有效性

                    'geographyEnvironment'             =>    (int)$PlantInfo['geographyEnvironment'],                      //设备环境
                    'isMaintenanceAsRequired'          =>    (int)$PlantInfo['isMaintainAsRequired'],                      //是否按规定维护
                    'tankFoundationSettlement'         =>    (int)$PlantInfo['tankFoundationSettlement'],                  //基础沉降评价
                    'isMediumWater'                    =>    (int)$riskCalPara["isMediumWater"],                           //是否介质含水
                    'SCCWaterH2S'                      =>    (double)$riskCalPara["SCCWaterH2S"],                          //水中的H2S值
                    'SCCWaterpH'                       =>    (double)$riskCalPara["SCCWaterpH"],                           //水中PH值
                    'isHeatTreatAfterWeld'             =>    (int)$riskCalPara["isHeatTreatAfterWeld"],                    //是否焊后热处理
                    'SCCBHardness'                     =>    (double)$riskCalPara["SCCBHardness"],                         //最大布氏硬度
                    'clConcentration'                  =>    (double)$riskCalPara["ClConcentration"],                      //水中cl离子含量

                    'isHeatTreacing'                   =>    (int)$riskCalPara["isHeatTracing"],                           //是否伴热
                    'NaOHConcentration'                =>    (double)$riskCalPara["SCCNaOHConcentration"],                 //NAOH浓度
                    'isSteamBlowing'                   =>    (int)$riskCalPara["isSteamBlowing"],                          //是否蒸汽吹扫
                    'isStressRelief'                   =>    (int)$riskCalPara["isStressRelief"],                          //是否进行应力消除
                    'SCCHeatHistory'                   =>    (int)$riskCalPara["SCCHeatHistory"],                          //热历史
                    'SCCisShutdownProtect'             =>    (int)$riskCalPara["SCCisShutdownProtect"],                    //是否有停机保护
                    'surrounding'                      =>    (string)$riskCalPara["SCCSurroundingsMedium"],                //环境含有物
                    'SCCSteelSulfur'                   =>    (double)$riskCalPara["SCCSteelSulfur"],                       //钢板中硫含量
                    'SCCWaterCarbonateConcentration'   =>    (double)$riskCalPara["SCCWaterCarbonateConcentration"]        //碳酸盐浓度
                )
            ))->return;
            $risk['wall'][$i]['wallOutDamageFactor']=$wallOutDamageFactor[$i];
//        3、壁板SCC损伤因子

            $wallSCCDamageFactor[$i] = $client->__soapCall('getSCCDamageFactor', array(
                array(
                    'operatingTemp'         =>     (double)$PlantInfo['operateTemp'],                   //操作温度
                    'designTemp'            =>     (double)$PlantInfo['designTemp'],                    //设计温度
                    'SCCMechId'             =>     (int)$PlantInfo['mechanism']["wallSCCMechanismId"],  //SCC损伤机理
                    'checkTime'             =>     (int)$PlantInfo["wallCheckTime"],                    //检验次数
                    'checkValidity'         =>     (String)$PlantInfo["wallCheckValidity"],             //检验有效性
                    'severityPara'          =>     (int)0,                                              //计算外部损伤因子的时候不需要计算敏感性高低，直接输入严重程度指数
                    'isMediumWater'         =>     (int)$riskCalPara["isMediumWater"],                  //是否介质含水
                    'SCCWaterH2S'           =>     (double)$riskCalPara["SCCWaterH2S"],                 //水中的硫化氢含量
                    'SCCWaterpH'            =>     (double)$riskCalPara["SCCWaterpH"],                  //水中pH值
                    'isHeatTreatAfterWeld'  =>     (int)$riskCalPara["isHeatTreatAfterWeld"],           //是否焊后热处理
                    'SCCBHardness'          =>     (double)$riskCalPara["SCCBHardness"],                //最大布氏硬度
                    'clConcentration'       =>     (double)$riskCalPara["ClConcentration"],             //水中的氯离子含量

                    'isHeatTreacing'        =>     (int)$riskCalPara["isHeatTracing"],                  //是否伴热
                    'NaOHConcentration'     =>     (double)$riskCalPara["SCCNaOHConcentration"],        //NaOH浓度
                    'isSteamBlowing'        =>     (int)$riskCalPara["isSteamBlowing"],                 //是否蒸汽吹扫
                    'isStressRelief'        =>     (int)$riskCalPara["isStressRelief"],                 //是否进行应力消除
                    'SCCHeatHistory'        =>     (int)$riskCalPara["SCCHeatHistory"],                 //热历史
                    'SCCisShutdownProtect'  =>     (int)$riskCalPara["SCCisShutdownProtect"],           //是否停机保护
                    'surrounding'           =>     (string)$riskCalPara["SCCSurroundingsMedium"],       //环境含有物
                    'SCCSteelSulfur'        =>     (double)$riskCalPara["SCCSteelSulfur"],              //钢板中硫含量
                    'SCCWaterCarbonateConcentration'  =>   (double)$riskCalPara["SCCSteelSulfur"]       //碳酸盐浓度
                )
            ))->return;
            $risk['wall'][$i]['wallSCCDamageFactor'] = $wallSCCDamageFactor[$i];

//        4、壁板脆性断裂因子
            $wallBrittleFactor[$i]=0;
            $risk['wall'][$i]['wallBrittleFactor']=0;

//------------------------------------计算损伤因子-----------------------------------------------------------

//        计算得到损伤因子的值
            $risk['wall'][$i]['wallDamageFactor'] = $client->__soapCall('getDamageFaction', array(
                array(
                    'corrosionType'               =>     (int)0,                                     //腐蚀类型，壁板为均匀腐蚀，底板为局部腐蚀 0代表均匀腐蚀 1代表局部腐蚀
                    'reductionDamageFactor'       =>     (double)$wallReductionDamageFactor[$i],     //减薄损伤因子
                    'outDamageFactor'             =>     (double)$wallOutDamageFactor[$i],           //外部损伤因子
                    'SCCFactor'                   =>     (double)$wallSCCDamageFactor[$i],           //应力腐蚀开裂损伤因子
                    'brittleFractureFactor'       =>     (double)$wallBrittleFactor[$i]             //脆性断裂损伤因子
                )
            ))->return;
            $maxWallDamageFactor[$i] = $risk['wall'][$i]['wallDamageFactor'];


//        壁板失效后果
            $wallFailConsequence[$i] = $client->__soapCall('getFailureWallConsequence', array(
                array(
                    'fTankDiameter_'               =>     (double) $PlantInfo['D'],                            //罐直径
                    'fCHT_'                        =>     (double)$measureThicknessWall[$i]["height"],         //储罐单层壁板高度
                    'iFloor_'                      =>     (int)$measureThicknessWall[$i]["layerNO"],           //第几层壁板
                    'iEnvSensitibility_'           =>     (int)$PlantInfo['sensitiveEnvironment'],             //失效后果可接受的基准 单位：万元
                    'fHliq_'                       =>     (double)$PlantInfo['fillH'],                         //泄露孔上方的液体高度
                    'fMatCost_'                    =>     (double)$PlantInfo['fMatCost_'],                     //材料价格系数
                    'fProd_'                       =>     (double)$PlantInfo['stopLoss'],                      //停产造成的损失
                    'fPlvdike_'                    =>     (double)$PlantInfo['overflowPercentage'],            //溢出围堰的流体百分比
                    'fPonsite_'                    =>     (double)$PlantInfo['overflowPercentageIn'],          //溢出围堪但仍在罐区内，地表土壤中的流体百分比
                    'fPoffsite_'                   =>     (double)$PlantInfo['overflowPercentageOut']          //溢出围堪且已流到罐区外，地表土壤中的流体百分比
                )
            ))->return;
        }

  //-----------------------------壁板损伤因子---------------------------------------------------------
//      找出壁板板最大损伤因子，按照最大损伤因子计算风险等级
        $Index = array_search(max($maxWallDamageFactor), $maxWallDamageFactor);    //找出损伤因子最大的索引

        $wallMajorRisk = $measureThicknessWall[$Index]['layerId'];                 //损伤因子最大的测点号

        $wallDamageFactor = $risk['wall'][$Index]['wallDamageFactor'];             //损伤因子最大的值

        $maxWallFailConsequence    =    max($wallFailConsequence);                 //按壁板后果最大计算

        $fAcceptBaseQ_             =    $PlantInfo['failConseqenceAccept'];        //失效后果可接受基准

        //计算失效后果等级
        switch($maxWallFailConsequence){
            case $wallFailConsequence  <=  $fAcceptBaseQ_;
                $wallFailConsequenceLevel="A";
                break;
            case $wallFailConsequence>$fAcceptBaseQ_ && $wallFailConsequence<=$fAcceptBaseQ_*10:
                $wallFailConsequenceLevel="B";
                break;
            case $wallFailConsequence>$fAcceptBaseQ_*10 && $wallFailConsequence<=$fAcceptBaseQ_*100:
                $wallFailConsequenceLevel="C";
                break;
            case $wallFailConsequence>$fAcceptBaseQ_*100 && $wallFailConsequence<=$fAcceptBaseQ_*1000:
                $wallFailConsequenceLevel="D";
                break;
            case $wallFailConsequence>$fAcceptBaseQ_ *1000:
                $wallFailConsequenceLevel="E";
                break;
        }

//       壁板失效可能性
        $wallAverageFailurePro = $this->getAverageFailurePro(0,  $PlantInfo['breakSize']);          //壁板平均失效可能性
        $wallFailurePro = $this->failureProbability($wallDamageFactor, $wallAverageFailurePro, 0.1);  //壁板失效可能性

//       计算壁板失效可能性等级
        switch($wallFailurePro){
            case $wallFailurePro>0 && $wallFailurePro<=0.00001:
                $wallFailureProLevel=1;
                break;
            case $wallFailurePro>0.00001 && $wallFailurePro<=0.00010:
                $wallFailureProLevel=2;
                break;
            case $wallFailurePro>0.00010 && $wallFailurePro<=0.00100:
                $wallFailureProLevel=3;
                break;
            case $wallFailurePro>0.00100 && $wallFailurePro<=0.01000:
                $wallFailureProLevel=4;
                break;
            case $wallFailurePro>0.01000 && $wallFailurePro<=1.0000:
                $wallFailureProLevel=5;
                break;
            case $wallFailurePro > 1.0000:
                $wallFailureProLevel=5;
                break;
        }

//-----------------------------------------计算壁板风险等级--------------------------------------

        $wallRisk      = $maxWallFailConsequence*$wallFailurePro;
        $wallRiskLevel = $riskMatrixTable[$wallFailureProLevel][$wallFailConsequenceLevel];
        $risk['test']['wallFailureProLevel']=$wallFailureProLevel;
        $risk['test']['wallFailConsequenceLevel']=$wallFailConsequenceLevel;
        $risk['test']['wallRiskLevel']=$wallRiskLevel;


//--------------------------------边缘板风险--------------------------------------------

        $measurethicknessEdge       =    $Corrosion["measurethicknessEdge"];
        for ($i = 0; $i < count($measurethicknessEdge); $i++) {
//            腐蚀速率的计算需要再做调整
            $floorEdgeCorrosionSpeed[$i] = $this->$measurethicknessEdge[$i]['long_termCorrosion'];

//----------------------------- 计算边缘板损伤因子----------------------------------
//        1、边缘板减薄次因子
            $floorReductionDamageFactor[$i] = $client->__soapCall('getReductionDamageFactor', array(
                array(
                    "part"                      =>    (int)0,                                                             //代表底板
                    "corrosionSpeed"            =>    (double)$floorEdgeCorrosionSpeed[$i],                               //该层壁板腐蚀速率
                    "useDate"                   =>    (double)$PlantInfo["useDate"],                                      //使用时间(储罐使用时间)
                    "thickness"                 =>    (double)$PlantInfo["bottomEdgeNamelyThickness"],                    //边缘板初始厚度(目前是名义厚度)

                    "checkTime"                 =>    (int)$PlantInfo["bottomCheckTime"],                                 //检验次数
                    "checkValidity"             =>    (string)$PlantInfo["bottomCheckValidity"],                          //检验有效性
                    "linkType"                  =>    (string)$PlantInfo['bottomLinkType'],                               //壁板连接形式
                    "isMaintenanceAsRequired"   =>    (int)$PlantInfo['isMaintainAsRequired'],                            //是否按规定维护
                    "tankFoundationSettlement"  =>    (int)$PlantInfo['tankFoundationSettlement']                         //基础沉降评价
                )
            ))->return;

//        2、边缘板外部损伤因子
            $floorOutDamageFactor[$i] = $client->__soapCall('getOutDamageFactor', array(
                array(
                    'operatingTemp'                    =>    (double)$PlantInfo['operateTemp'],                               //操作温度
                    'designTemp'                       =>    (double)$PlantInfo['designTemp'],                                //设计温度
                    'part'                             =>    (int)0,                                                          //代表壁板
                    'thickness'                        =>    (double)$PlantInfo["bottomEdgeNamelyThickness"],                 //边缘板初始厚度(目前是名义厚度)

                    'pipeComplexity'                   =>    (int)$riskCalPara['pipeComplexity'],                          //管道复杂度
                    'isKeepWarmHasCL'                  =>    (int)$riskCalPara['isKeepWarmHasCL'],                         //是否保温层含氯
                    'isPipeSupport'                    =>    (int)$riskCalPara['outDamageisPipeSupport'],                  //是否管支架补偿
                    'isInterfaceCompensation'          =>    (int)$riskCalPara['outDamageisInterfaceCompensation'],        //是否界面补偿

                    'outDamageMechanismId'             =>    (int)$PlantInfo['mechanism']['floorOutDamageMechanismId'],    //外部损伤机理
                    'useDate'                          =>    (double)$PlantInfo["useDate"],                                //使用时间(储罐使用时间)
                    'isKeepWarm'                       =>    (int)$PlantInfo["isKeepWarm"],                                //是否有保温层
                    'KeepWarmStatus'                   =>    (int)$PlantInfo["KeepWarmStatus"],                            //保温层质量
                    'coatingStatus'                    =>    (int)$PlantInfo["coatingStatus"],                             //涂层质量

                    'coatingUseDate'                   =>    (double)$PlantInfo["coatingUseDate"],                         //涂层使用时间
                    'linkType'                         =>    (string)$PlantInfo["bottomLinkType"],                         //底板连接形式
                    'SCCMechanismId'                   =>    (int)$PlantInfo['mechanism']["floorSCCMechanismId"],          //SCC损伤机理
                    'checkTime'                        =>    (int)$PlantInfo["bottomCheckTime"],                           //检验次数
                    'checkValidity'                    =>    (string)$PlantInfo["bottomCheckValidity"],                    //检验有效性

                    'geographyEnvironment'             =>    (int)$PlantInfo['geographyEnvironment'],                      //设备环境
                    'isMaintenanceAsRequired'          =>    (int)$PlantInfo['isMaintainAsRequired'],                      //是否按规定维护
                    'tankFoundationSettlement'         =>    (int)$PlantInfo['tankFoundationSettlement'],                  //基础沉降评价
                    'isMediumWater'                    =>    (int)$riskCalPara["isMediumWater"],                           //是否介质含水
                    'SCCWaterH2S'                      =>    (double)$riskCalPara["SCCWaterH2S"],                          //水中的H2S值
                    'SCCWaterpH'                       =>    (double)$riskCalPara["SCCWaterpH"],                           //水中PH值
                    'isHeatTreatAfterWeld'             =>    (int)$riskCalPara["isHeatTreatAfterWeld"],                    //是否焊后热处理
                    'SCCBHardness'                     =>    (double)$riskCalPara["SCCBHardness"],                         //最大布氏硬度
                    'clConcentration'                  =>    (double)$riskCalPara["ClConcentration"],                      //水中cl离子含量

                    'isHeatTreacing'                   =>    (int)$riskCalPara["isHeatTracing"],                           //是否伴热
                    'NaOHConcentration'                =>    (double)$riskCalPara["SCCNaOHConcentration"],                 //NAOH浓度
                    'isSteamBlowing'                   =>    (int)$riskCalPara["isSteamBlowing"],                          //是否蒸汽吹扫
                    'isStressRelief'                   =>    (int)$riskCalPara["isStressRelief"],                          //是否进行应力消除
                    'SCCHeatHistory'                   =>    (int)$riskCalPara["SCCHeatHistory"],                          //热历史
                    'SCCisShutdownProtect'             =>    (int)$riskCalPara["SCCisShutdownProtect"],                    //是否有停机保护
                    'surrounding'                      =>    (string)$riskCalPara["SCCSurroundingsMedium"],                //环境含有物
                    'SCCSteelSulfur'                   =>    (double)$riskCalPara["SCCSteelSulfur"],                       //钢板中硫含量
                    'SCCWaterCarbonateConcentration'   =>    (double)$riskCalPara["SCCWaterCarbonateConcentration"]        //碳酸盐浓度
                )
            ))->return;
//        3、边缘板SCC损伤因子
            $floorSCCDamageFactor[$i] = $client->__soapCall('getSCCDamageFactor', array(
                array(
                    'operatingTemp'         =>     (double)$PlantInfo['operateTemp'],                   //操作温度
                    'designTemp'            =>     (double)$PlantInfo['designTemp'],                    //设计温度
                    'SCCMechId'             =>     (int)$PlantInfo['mechanism']["floorSCCMechanismId"], //底板SCC损伤机理
                    'checkTime'             =>     (int)$PlantInfo['bottomCheckTime'],                  //底板检验次数
                    'checkValidity'         =>     (String)$PlantInfo['bottomCheckValidity'],           //底板检验有效性
                    'severityPara'          =>     (int)0,                                              //计算外部损伤因子的时候不需要计算敏感性高低，直接输入严重程度指数
                    'isMediumWater'         =>     (int)$riskCalPara["isMediumWater"],                  //是否介质含水
                    'SCCWaterH2S'           =>     (double)$riskCalPara["SCCWaterH2S"],                 //水中的硫化氢含量
                    'SCCWaterpH'            =>     (double)$riskCalPara["SCCWaterpH"],                  //水中pH值
                    'isHeatTreatAfterWeld'  =>     (int)$riskCalPara["isHeatTreatAfterWeld"],           //是否焊后热处理
                    'SCCBHardness'          =>     (double)$riskCalPara["SCCBHardness"],                //最大布氏硬度
                    'clConcentration'       =>     (double)$riskCalPara["ClConcentration"],             //水中的氯离子含量

                    'isHeatTreacing'        =>     (int)$riskCalPara["isHeatTracing"],                  //是否伴热
                    'NaOHConcentration'     =>     (double)$riskCalPara["SCCNaOHConcentration"],        //NaOH浓度
                    'isSteamBlowing'        =>     (int)$riskCalPara["isSteamBlowing"],                 //是否蒸汽吹扫
                    'isStressRelief'        =>     (int)$riskCalPara["isStressRelief"],                 //是否进行应力消除
                    'SCCHeatHistory'        =>     (int)$riskCalPara["SCCHeatHistory"],                 //热历史
                    'SCCisShutdownProtect'  =>     (int)$riskCalPara["SCCisShutdownProtect"],           //是否停机保护
                    'surrounding'           =>     (string)$riskCalPara["SCCSurroundingsMedium"],       //环境含有物
                    'SCCSteelSulfur'        =>     (double)$riskCalPara["SCCSteelSulfur"],              //钢板中硫含量
                    'SCCWaterCarbonateConcentration'  =>   (double)$riskCalPara["SCCSteelSulfur"]       //碳酸盐浓度
                )
            ))->return;
//        4、边缘板脆性断裂因子
            $floorBrittleFactor[$i]=0;
//——————————————————————————————————边缘板损伤因子------------------------------------------------------------
            $maxFloorEdgeDamageFactor[$i] = $client->__soapCall('getDamageFaction', array(
                array(
                    'corrosionType'               =>     (int)1,                                      //腐蚀类型，壁板为均匀腐蚀，底板为局部腐蚀 0代表均匀腐蚀 1代表局部腐蚀
                    'reductionDamageFactor'       =>     (double)$floorReductionDamageFactor[$i],     //减薄损伤因子
                    'outDamageFactor'             =>     (double)$floorOutDamageFactor[$i],           //外部损伤因子
                    'SCCFactor'                   =>     (double)$floorSCCDamageFactor[$i],           //应力腐蚀开裂损伤因子
                    'brittleFractureFactor'       =>     (double)$floorBrittleFactor[$i]              //脆性断裂损伤因子
                )
            ))->return;
        }

        //-----------------------------边缘板损伤因子---------------------------------------------------------
//      找出边缘板最大损伤因子，按照最大损伤因子计算风险等级
        $Index = array_search(max($maxFloorEdgeDamageFactor), $maxFloorEdgeDamageFactor);   //边缘板损伤因子最大索引

        $floorEdgeMajorRisk = $measurethicknessEdge[$Index]['layerId'];                     //边缘板损伤因子最大测点编号
        $floorEdgeCorrosionSpeed = $measurethicknessEdge[$Index]["long_termCorrosion"];     //损伤因子最大对应的腐蚀速率
        $floorEdgeDamageFactor = max($maxFloorEdgeDamageFactor);                            //损伤因子最大值




//--------------------------------中间板风险--------------------------------------------
        $measurethicknessMiddle      =    $Corrosion["measurethicknessMiddle"];
        for ($i = 0; $i < count($measurethicknessMiddle); $i++) {
            $floorMiddleCorrosionSpeed[$i] = $this->$measurethicknessMiddle[$i]['long_termCorrosion'];
//            计算底板损伤因子
//        1、中间板减薄次因子
            $floorReductionDamageFactor[$i] = $client->__soapCall('getReductionDamageFactor', array(
                array(
                    "part"                      =>    (int)0,                                                             //代表底板
                    "corrosionSpeed"            =>    (double)$floorMiddleCorrosionSpeed[$i],                               //该层壁板腐蚀速率
                    "useDate"                   =>    (double)$PlantInfo["useDate"],                                      //使用时间(储罐使用时间)
                    "thickness"                 =>    (double)$PlantInfo["bottomMiddleNamelyThickness"],                    //边缘板初始厚度(目前是名义厚度)

                    "checkTime"                 =>    (int)$PlantInfo["bottomCheckTime"],                                 //检验次数
                    "checkValidity"             =>    (string)$PlantInfo["bottomCheckValidity"],                          //检验有效性
                    "linkType"                  =>    (string)$PlantInfo['bottomLinkType'],                               //壁板连接形式
                    "isMaintenanceAsRequired"   =>    (int)$PlantInfo['isMaintainAsRequired'],                            //是否按规定维护
                    "tankFoundationSettlement"  =>    (int)$PlantInfo['tankFoundationSettlement']                         //基础沉降评价
                )
            ))->return;
//        2、中间板外部损伤因子
            $floorOutDamageFactor[$i] = $client->__soapCall('getOutDamageFactor', array(
                array(
                    'operatingTemp'                    =>    (double)$PlantInfo['operateTemp'],                            //操作温度
                    'designTemp'                       =>    (double)$PlantInfo['designTemp'],                             //设计温度
                    'part'                             =>    (int)0,                                                       //代表壁板
                    'thickness'                        =>    (double)$PlantInfo["bottomMiddleNamelyThickness"],            //中间板初始厚度(目前是名义厚度)

                    'pipeComplexity'                   =>    (int)$riskCalPara['pipeComplexity'],                          //管道复杂度
                    'isKeepWarmHasCL'                  =>    (int)$riskCalPara['isKeepWarmHasCL'],                         //是否保温层含氯
                    'isPipeSupport'                    =>    (int)$riskCalPara['outDamageisPipeSupport'],                  //是否管支架补偿
                    'isInterfaceCompensation'          =>    (int)$riskCalPara['outDamageisInterfaceCompensation'],        //是否界面补偿

                    'outDamageMechanismId'             =>    (int)$PlantInfo['mechanism']['floorOutDamageMechanismId'],    //外部损伤机理
                    'useDate'                          =>    (double)$PlantInfo["useDate"],                                //使用时间(储罐使用时间)
                    'isKeepWarm'                       =>    (int)$PlantInfo["isKeepWarm"],                                //是否有保温层
                    'KeepWarmStatus'                   =>    (int)$PlantInfo["KeepWarmStatus"],                            //保温层质量
                    'coatingStatus'                    =>    (int)$PlantInfo["coatingStatus"],                             //涂层质量

                    'coatingUseDate'                   =>    (double)$PlantInfo["coatingUseDate"],                         //涂层使用时间
                    'linkType'                         =>    (string)$PlantInfo["bottomLinkType"],                         //底板连接形式
                    'SCCMechanismId'                   =>    (int)$PlantInfo['mechanism']["floorSCCMechanismId"],          //SCC损伤机理
                    'checkTime'                        =>    (int)$PlantInfo["bottomCheckTime"],                           //检验次数
                    'checkValidity'                    =>    (string)$PlantInfo["bottomCheckValidity"],                    //检验有效性

                    'geographyEnvironment'             =>    (int)$PlantInfo['geographyEnvironment'],                      //设备环境
                    'isMaintenanceAsRequired'          =>    (int)$PlantInfo['isMaintainAsRequired'],                      //是否按规定维护
                    'tankFoundationSettlement'         =>    (int)$PlantInfo['tankFoundationSettlement'],                  //基础沉降评价
                    'isMediumWater'                    =>    (int)$riskCalPara["isMediumWater"],                           //是否介质含水
                    'SCCWaterH2S'                      =>    (double)$riskCalPara["SCCWaterH2S"],                          //水中的H2S值
                    'SCCWaterpH'                       =>    (double)$riskCalPara["SCCWaterpH"],                           //水中PH值
                    'isHeatTreatAfterWeld'             =>    (int)$riskCalPara["isHeatTreatAfterWeld"],                    //是否焊后热处理
                    'SCCBHardness'                     =>    (double)$riskCalPara["SCCBHardness"],                         //最大布氏硬度
                    'clConcentration'                  =>    (double)$riskCalPara["ClConcentration"],                      //水中cl离子含量

                    'isHeatTreacing'                   =>    (int)$riskCalPara["isHeatTracing"],                           //是否伴热
                    'NaOHConcentration'                =>    (double)$riskCalPara["SCCNaOHConcentration"],                 //NAOH浓度
                    'isSteamBlowing'                   =>    (int)$riskCalPara["isSteamBlowing"],                          //是否蒸汽吹扫
                    'isStressRelief'                   =>    (int)$riskCalPara["isStressRelief"],                          //是否进行应力消除
                    'SCCHeatHistory'                   =>    (int)$riskCalPara["SCCHeatHistory"],                          //热历史
                    'SCCisShutdownProtect'             =>    (int)$riskCalPara["SCCisShutdownProtect"],                    //是否有停机保护
                    'surrounding'                      =>    (string)$riskCalPara["SCCSurroundingsMedium"],                //环境含有物
                    'SCCSteelSulfur'                   =>    (double)$riskCalPara["SCCSteelSulfur"],                       //钢板中硫含量
                    'SCCWaterCarbonateConcentration'   =>    (double)$riskCalPara["SCCWaterCarbonateConcentration"]        //碳酸盐浓度
                )
            ))->return;
//        3、中间板SCC损伤因子
            $floorSCCDamageFactor[$i] = $client->__soapCall('getSCCDamageFactor', array(
                array(
                    'operatingTemp'         =>     (double)$PlantInfo['operateTemp'],                   //操作温度
                    'designTemp'            =>     (double)$PlantInfo['designTemp'],                    //设计温度
                    'SCCMechId'             =>     (int)$PlantInfo['mechanism']["floorSCCMechanismId"], //底板SCC损伤机理
                    'checkTime'             =>     (int)$PlantInfo['bottomCheckTime'],                  //底板检验次数
                    'checkValidity'         =>     (String)$PlantInfo['bottomCheckValidity'],           //底板检验有效性
                    'severityPara'          =>     (int)0,                                              //计算外部损伤因子的时候不需要计算敏感性高低，直接输入严重程度指数
                    'isMediumWater'         =>     (int)$riskCalPara["isMediumWater"],                  //是否介质含水
                    'SCCWaterH2S'           =>     (double)$riskCalPara["SCCWaterH2S"],                 //水中的硫化氢含量
                    'SCCWaterpH'            =>     (double)$riskCalPara["SCCWaterpH"],                  //水中pH值
                    'isHeatTreatAfterWeld'  =>     (int)$riskCalPara["isHeatTreatAfterWeld"],           //是否焊后热处理
                    'SCCBHardness'          =>     (double)$riskCalPara["SCCBHardness"],                //最大布氏硬度
                    'clConcentration'       =>     (double)$riskCalPara["ClConcentration"],             //水中的氯离子含量

                    'isHeatTreacing'        =>     (int)$riskCalPara["isHeatTracing"],                  //是否伴热
                    'NaOHConcentration'     =>     (double)$riskCalPara["SCCNaOHConcentration"],        //NaOH浓度
                    'isSteamBlowing'        =>     (int)$riskCalPara["isSteamBlowing"],                 //是否蒸汽吹扫
                    'isStressRelief'        =>     (int)$riskCalPara["isStressRelief"],                 //是否进行应力消除
                    'SCCHeatHistory'        =>     (int)$riskCalPara["SCCHeatHistory"],                 //热历史
                    'SCCisShutdownProtect'  =>     (int)$riskCalPara["SCCisShutdownProtect"],           //是否停机保护
                    'surrounding'           =>     (string)$riskCalPara["SCCSurroundingsMedium"],       //环境含有物
                    'SCCSteelSulfur'        =>     (double)$riskCalPara["SCCSteelSulfur"],              //钢板中硫含量
                    'SCCWaterCarbonateConcentration'  =>   (double)$riskCalPara["SCCSteelSulfur"]       //碳酸盐浓度
                )
            ))->return;
//        4、中间板脆性断裂因子
            $floorBrittleFactor[$i]=0;

            $maxFloorMiddleDamageFactor[$i] = $client->__soapCall('getDamageFaction', array(
                    array(
                        'corrosionType'               =>     (int)1,                                      //腐蚀类型，壁板为均匀腐蚀，底板为局部腐蚀 0代表均匀腐蚀 1代表局部腐蚀
                        'reductionDamageFactor'       =>     (double)$floorReductionDamageFactor[$i],     //减薄损伤因子
                        'outDamageFactor'             =>     (double)$floorOutDamageFactor[$i],           //外部损伤因子
                        'SCCFactor'                   =>     (double)$floorSCCDamageFactor[$i],           //应力腐蚀开裂损伤因子
                        'brittleFractureFactor'       =>     (double)$floorBrittleFactor[$i]              //脆性断裂损伤因子
                    )
                ))->return;

        }
//-----------------------------中间板损伤因子---------------------------------------------------------
//      找出边缘板最大损伤因子，按照最大损伤因子计算风险等级
        $Index = array_search(max($maxFloorMiddleDamageFactor), $maxFloorMiddleDamageFactor); //中间板损伤因子最大值索引
        $floorMiddleMajorRisk = $measurethicknessMiddle[$Index]['layerId'];                   //中间板损伤因子最大的测点编号
        $floorMiddleCorrosionSpeed = $measurethicknessMiddle[$Index]["long_termCorrosion"];   //中间板损伤因子最大对应的腐蚀速率
        $floorMiddleDamageFactor = max($maxFloorMiddleDamageFactor);                          //中间板最大损伤因子

//----------------------------底板损伤因子------------------------------------------------------
         if($floorEdgeDamageFactor>=$floorMiddleDamageFactor){
             $floorMajorRisk=$floorEdgeMajorRisk;
             $floorDamageFactor=$floorEdgeDamageFactor;
         }else{
             $floorMajorRisk=$floorMiddleMajorRisk;
             $floorDamageFactor=$floorMiddleDamageFactor;
         }



//--------------------------------底板平均失效可能性----------------------------------
        $floorAverageFailurePro = $this->getAverageFailurePro(1, $PlantInfo['breakSize']);

//---------------------------------底板失效后果--------------------------------------

        $floorFailConsequence = $client->__soapCall('getFailurefloorConsequence', array(
            array(
                'fTankDiameter_'               =>     (double) $PlantInfo['D'],                          //储罐直径
                'fHliq_'                       =>     (double) $PlantInfo['fillH'],                      //储罐液面高度
                'iEnvSensitibility_'           =>     (int)$PlantInfo['sensitiveEnvironment'],       //环境敏感度
                'fMatCost_'                    =>     (double)$PlantInfo['fMatCost_'],                  //材料价格系数
                'fProd_'                       =>     (double)$PlantInfo['stopLoss'],                   //停产造成的损失
                'fPlvdike_'                    =>     (double)$PlantInfo['overflowPercentage'],         //溢出围堪的流体百分比
                'fPonsite_'                    =>     (double)$PlantInfo['overflowPercentageIn'],       //溢出围堪但仍在罐区内，地表土壤中的流体百分比
                'fPoffsite_'                   =>     (double)$PlantInfo['overflowPercentageOut'],      //溢出围堪且已流到罐区外，地表土壤中的流体百分比
                'fSgw_'                        =>     (double)$PlantInfo['bottomToWaterDistance'],      //罐底到地下水的距离
                'fMedium_p_'                   =>     (double)$PlantInfo['mediumPercentage'],           //介质密度
                'fMedium_DynVisc_'             =>     (double)$PlantInfo['mediumDyViscosity'],          //介质动力粘度
                'iTankBaseType_'               =>     (int)$PlantInfo['bottomGasket'],               //储罐基础形式。0---基础为水泥或沥青  1——基础设有RPB，2——基础没有RPB
                'eTankSubsoilType_'            =>     (int)$PlantInfo['bottomGasketSoild']           //储罐基础下面土壤类型
            )
        ))->return;

        switch($floorFailConsequence){
            case $floorFailConsequence<=$fAcceptBaseQ_;
                $floorFailConsequenceLevel="A";
                break;
            case $floorFailConsequence>$fAcceptBaseQ_ && $floorFailConsequence<=$fAcceptBaseQ_*10:
                $floorFailConsequenceLevel="B";
                break;
            case $floorFailConsequence>$fAcceptBaseQ_*10 && $floorFailConsequence<=$fAcceptBaseQ_*100:
                $floorFailConsequenceLevel="C";
                break;
            case $floorFailConsequence>$fAcceptBaseQ_*100 && $floorFailConsequence<=$fAcceptBaseQ_*1000:
                $floorFailConsequenceLevel="D";
                break;
            case $floorFailConsequence>$fAcceptBaseQ_ *1000:
                $floorFailConsequenceLevel="E";
                break;
        }

//---------------------------------底板失效可能性等级----------------------------------------------

        $floorFailurePro = $this->failureProbability($floorDamageFactor, $floorAverageFailurePro, 0.1);   //底板失效可能性

//       底板失效可能性等级
        switch($floorFailurePro){
            case $floorFailurePro<=0.00001 :
                $floorFailureProLevel=1;
                break;
            case $floorFailurePro >= 0.00001 && $floorFailurePro < 0.00010 :
                $floorFailureProLevel=2;
                break;
            case $floorFailurePro > 0.00010 && $floorFailurePro  < 0.00100 :
                $floorFailureProLevel=3;
                break;
            case $floorFailurePro >= 0.00100 && $floorFailurePro < 0.01000 :
                $floorFailureProLevel=4;
                break;
            case $floorFailurePro >= 0.01000 && $floorFailurePro < 1 :
                $floorFailureProLevel=5;
                break;
            default:
                $wallFailureProLevel=1;
                break;
        }

//------------------------------------------------底板风险等级---------------------------------------------------------

        $floorRisk      = $floorFailConsequence*$floorFailurePro;
        $floorRiskLevel = $riskMatrixTable[$floorFailureProLevel][$floorFailConsequenceLevel];



        //-------计算风险的结果------------------------------------------------
        $risk['wallMajorRisk']               =    $wallMajorRisk;                //壁板风险最大测点
        $risk['floorMajorRisk']              =    $floorMajorRisk;               //底板风险最大测点
        $risk['wallDamageFactor']            =    $wallDamageFactor;             //壁板损伤因子最大值
        $risk['floorDamageFactor']           =    $floorDamageFactor;            //底板损伤因子最大值
        $risk['floorEdgeDamageFactor']       =    $floorEdgeDamageFactor;        //底板边缘板损伤因子最大值
        $risk['floorEdgeCorrosionSpeed']     =    $floorEdgeCorrosionSpeed;      //底板边缘板损伤因子最大值对应的腐蚀速率
        $risk['floorMiddleDamageFactor']     =    $floorMiddleDamageFactor;      //底板中间板损伤因子最大值
        $risk['floorMiddleCorrosionSpeed']   =    $floorMiddleCorrosionSpeed;    //底板中间板损伤因子最大值对应的腐蚀速率
        $risk['wallRisk']                    =    $wallRisk;                     //壁板风险
        $risk['wallRiskLevel']               =    $wallRiskLevel;                //壁板风险等级
        $risk['floorRisk']                   =    $floorRisk;                    //底板风险
        $risk['floorRiskLevel']              =    $floorRiskLevel;               //底板风险等级
        $risk['wallFailPro']                 =    $wallFailurePro;               //壁板失效可能性
        $risk['wallFailProLevel']            =    $wallFailureProLevel;          //壁板失效可能性等级
        $risk['floorFailPro']                =    $floorFailurePro;              //底板失效可能性
        $risk['floorFailProLevel']           =    $floorFailureProLevel;         //底板失效可能性等级
        $risk['wallConsequence']             =    $maxWallFailConsequence;       //壁板失效后果
        $risk['wallConsequenceLevel']        =    $wallFailConsequenceLevel;     //壁板失效后果等级
        $risk['floorConsequence']            =    $floorFailConsequence;        //底板失效后果
        $risk['floorConsequenceLevel']       =    $floorFailConsequenceLevel;    //底板失效后果等级


//---------------------------------------------计算未来风险和损伤因子---------------------------------------------------
        for($j=0;$j<5;$j++){

            (double)$PlantInfo["useDate"]=(double)$PlantInfo["useDate"]*1+1+$j;
// ------------------------------------------壁板风险----------------------------------------

            $measureThicknessWall     =    $Corrosion["measurethicknessWall"];

            for ($i = 0; $i < count($measureThicknessWall); $i++) {

                $fu[$j]['risk']['wall'][$i]['layerNO']           =   $measureThicknessWall[$i]['layerNO'];
                $fu[$j]['risk']['wall'][$i]['layerId']           =   $measureThicknessWall[$i]['layerId'];
                $fu[$j]['risk']['wall'][$i]['corrosionSpeed']    =   $measureThicknessWall[$i]['long_termCorrosion'];//计算壁板腐蚀速率

//-------------------------------------计算壁板损伤因子----------------------------------------

//        1、壁板板减薄次因子
                $wallReductionDamageFactor[$i] = $client->__soapCall('getReductionDamageFactor', array(
                    array(
                        "part"                      =>    (int)1,                                                             //代表壁板
                        "corrosionSpeed"            =>    (double)$measureThicknessWall[$i]['long_termCorrosion'],            //该层壁板腐蚀速率
                        "useDate"                   =>    (double)$PlantInfo["useDate"],                                      //使用时间(储罐使用时间)
                        "thickness"                 =>    (double)$measureThicknessWall[$i]["namelyThickness"],               //壁板初始厚度(目前是名义厚度)

                        "checkTime"                 =>    (int)$PlantInfo["wallCheckTime"],                                   //检验次数
                        "checkValidity"             =>    (string)$PlantInfo["wallCheckValidity"],                            //检验有效性
                        "linkType"                  =>    (string)$PlantInfo['wallboardLinkType'],                            //壁板连接形式
                        "isMaintenanceAsRequired"   =>    (int)$PlantInfo['isMaintainAsRequired'],                            //是否按规定维护
                        "tankFoundationSettlement"  =>    (int)$PlantInfo['tankFoundationSettlement']                         //基础沉降评价
                    )
                ))->return;
                $fu[$j]['risk']['wall'][$i]['wallReductionDamageFactor'] = $wallReductionDamageFactor[$i];
//        2、壁板外部损伤因子
                $wallOutDamageFactor[$i] = $client->__soapCall('getOutDamageFactor', array(
                    array(
                        'operatingTemp'                    =>    (double)$PlantInfo['operateTemp'],                               //操作温度
                        'designTemp'                       =>    (double)$PlantInfo['designTemp'],                                //设计温度
                        'part'                             =>    (int)1,                       //代表壁板
                        'thickness'                        =>    (double)$measureThicknessWall[$i]["namelyThickness"],            //壁板初始厚度(目前是名义厚度)

                        'pipeComplexity'                   =>    (int)$riskCalPara['pipeComplexity'],                          //管道复杂度
                        'isKeepWarmHasCL'                  =>    (int)$riskCalPara['isKeepWarmHasCL'],                         //是否保温层含氯
                        'isPipeSupport'                    =>    (int)$riskCalPara['outDamageisPipeSupport'],                  //是否管支架补偿
                        'isInterfaceCompensation'          =>    (int)$riskCalPara['outDamageisInterfaceCompensation'],        //是否界面补偿

                        'outDamageMechanismId'             =>    (int)$PlantInfo['mechanism']['wallOutDamageMechanismId'],     //外部损伤机理
                        'useDate'                          =>    (double)$PlantInfo["useDate"],                                //使用时间(储罐使用时间)
                        'isKeepWarm'                       =>    (int)$PlantInfo["isKeepWarm"],                                //是否有保温层
                        'KeepWarmStatus'                   =>    (int)$PlantInfo["KeepWarmStatus"],                            //保温层质量
                        'coatingStatus'                    =>    (int)$PlantInfo["coatingStatus"],                             //涂层质量

                        'coatingUseDate'                   =>    (double)$PlantInfo["coatingUseDate"],                         //涂层使用时间
                        'linkType'                         =>    (string)$PlantInfo["wallboardLinkType"],                      //连接形式
                        'SCCMechanismId'                   =>    (int)$PlantInfo['mechanism']["wallSCCMechanismId"],           //SCC损伤机理
                        'checkTime'                        =>    (int)$PlantInfo["wallCheckTime"],                             //检验次数
                        'checkValidity'                    =>    (string)$PlantInfo["wallCheckValidity"],                      //检验有效性

                        'geographyEnvironment'             =>    (int)$PlantInfo['geographyEnvironment'],                      //设备环境
                        'isMaintenanceAsRequired'          =>    (int)$PlantInfo['isMaintainAsRequired'],                      //是否按规定维护
                        'tankFoundationSettlement'         =>    (int)$PlantInfo['tankFoundationSettlement'],                  //基础沉降评价
                        'isMediumWater'                    =>    (int)$riskCalPara["isMediumWater"],                           //是否介质含水
                        'SCCWaterH2S'                      =>    (double)$riskCalPara["SCCWaterH2S"],                          //水中的H2S值
                        'SCCWaterpH'                       =>    (double)$riskCalPara["SCCWaterpH"],                           //水中PH值
                        'isHeatTreatAfterWeld'             =>    (int)$riskCalPara["isHeatTreatAfterWeld"],                    //是否焊后热处理
                        'SCCBHardness'                     =>    (double)$riskCalPara["SCCBHardness"],                         //最大布氏硬度
                        'clConcentration'                  =>    (double)$riskCalPara["ClConcentration"],                      //水中cl离子含量

                        'isHeatTreacing'                   =>    (int)$riskCalPara["isHeatTracing"],                           //是否伴热
                        'NaOHConcentration'                =>    (double)$riskCalPara["SCCNaOHConcentration"],                 //NAOH浓度
                        'isSteamBlowing'                   =>    (int)$riskCalPara["isSteamBlowing"],                          //是否蒸汽吹扫
                        'isStressRelief'                   =>    (int)$riskCalPara["isStressRelief"],                          //是否进行应力消除
                        'SCCHeatHistory'                   =>    (int)$riskCalPara["SCCHeatHistory"],                          //热历史
                        'SCCisShutdownProtect'             =>    (int)$riskCalPara["SCCisShutdownProtect"],                    //是否有停机保护
                        'surrounding'                      =>    (string)$riskCalPara["SCCSurroundingsMedium"],                //环境含有物
                        'SCCSteelSulfur'                   =>    (double)$riskCalPara["SCCSteelSulfur"],                       //钢板中硫含量
                        'SCCWaterCarbonateConcentration'   =>    (double)$riskCalPara["SCCWaterCarbonateConcentration"]        //碳酸盐浓度
                    )
                ))->return;
                $fu[$j]['risk']['wall'][$i]['wallOutDamageFactor']=$wallOutDamageFactor[$i];
//        3、壁板SCC损伤因子

                $wallSCCDamageFactor[$i] = $client->__soapCall('getSCCDamageFactor', array(
                    array(
                        'operatingTemp'         =>     (double)$PlantInfo['operateTemp'],                   //操作温度
                        'designTemp'            =>     (double)$PlantInfo['designTemp'],                    //设计温度
                        'SCCMechId'             =>     (int)$PlantInfo['mechanism']["wallSCCMechanismId"],  //SCC损伤机理
                        'checkTime'             =>     (int)$PlantInfo["wallCheckTime"],                    //检验次数
                        'checkValidity'         =>     (String)$PlantInfo["wallCheckValidity"],             //检验有效性
                        'severityPara'          =>     (int)0,                                              //计算外部损伤因子的时候不需要计算敏感性高低，直接输入严重程度指数
                        'isMediumWater'         =>     (int)$riskCalPara["isMediumWater"],                  //是否介质含水
                        'SCCWaterH2S'           =>     (double)$riskCalPara["SCCWaterH2S"],                 //水中的硫化氢含量
                        'SCCWaterpH'            =>     (double)$riskCalPara["SCCWaterpH"],                  //水中pH值
                        'isHeatTreatAfterWeld'  =>     (int)$riskCalPara["isHeatTreatAfterWeld"],           //是否焊后热处理
                        'SCCBHardness'          =>     (double)$riskCalPara["SCCBHardness"],                //最大布氏硬度
                        'clConcentration'       =>     (double)$riskCalPara["ClConcentration"],             //水中的氯离子含量

                        'isHeatTreacing'        =>     (int)$riskCalPara["isHeatTracing"],                  //是否伴热
                        'NaOHConcentration'     =>     (double)$riskCalPara["SCCNaOHConcentration"],        //NaOH浓度
                        'isSteamBlowing'        =>     (int)$riskCalPara["isSteamBlowing"],                 //是否蒸汽吹扫
                        'isStressRelief'        =>     (int)$riskCalPara["isStressRelief"],                 //是否进行应力消除
                        'SCCHeatHistory'        =>     (int)$riskCalPara["SCCHeatHistory"],                 //热历史
                        'SCCisShutdownProtect'  =>     (int)$riskCalPara["SCCisShutdownProtect"],           //是否停机保护
                        'surrounding'           =>     (string)$riskCalPara["SCCSurroundingsMedium"],       //环境含有物
                        'SCCSteelSulfur'        =>     (double)$riskCalPara["SCCSteelSulfur"],              //钢板中硫含量
                        'SCCWaterCarbonateConcentration'  =>   (double)$riskCalPara["SCCSteelSulfur"]       //碳酸盐浓度
                    )
                ))->return;
                $fu[$j]['risk']['wall'][$i]['wallSCCDamageFactor']=$wallSCCDamageFactor[$i];

//        4、壁板脆性断裂因子
                $wallBrittleFactor[$i]=0;
                $fu[$j]['risk']['wall'][$i]['wallBrittleFactor']=0;

//------------------------------------计算损伤因子-----------------------------------------------------------

//        计算得到损伤因子的值
                $fu[$j]['risk']['wall'][$i]['wallDamageFactor'] = $client->__soapCall('getDamageFaction', array(
                    array(
                        'corrosionType'               =>     (int)0,                                     //腐蚀类型，壁板为均匀腐蚀，底板为局部腐蚀 0代表均匀腐蚀 1代表局部腐蚀
                        'reductionDamageFactor'       =>     (double)$wallReductionDamageFactor[$i],     //减薄损伤因子
                        'outDamageFactor'             =>     (double)$wallOutDamageFactor[$i],           //外部损伤因子
                        'SCCFactor'                   =>     (double)$wallSCCDamageFactor[$i],           //应力腐蚀开裂损伤因子
                        'brittleFractureFactor'       =>     (double)$wallBrittleFactor[$i]              //脆性断裂损伤因子
                    )
                ))->return;

                $maxWallDamageFactor[$i] = $fu[$j]['risk']['wall'][$i]['wallDamageFactor'];


//        壁板失效后果
                $wallFailConsequence[$i] = $client->__soapCall('getFailureWallConsequence', array(
                    array(
                        'fTankDiameter_'               =>     (double) $PlantInfo['D'],                            //罐直径
                        'fCHT_'                        =>     (double)$measureThicknessWall[$i]["height"],         //储罐单层壁板高度
                        'iFloor_'                      =>     (int)$measureThicknessWall[$i]["layerNO"],           //第几层壁板
                        'iEnvSensitibility_'           =>     (int)$PlantInfo['sensitiveEnvironment'],             //失效后果可接受的基准 单位：万元
                        'fHliq_'                       =>     (double)$PlantInfo['fillH'],                         //泄露孔上方的液体高度
                        'fMatCost_'                    =>     (double)$PlantInfo['fMatCost_'],                     //材料价格系数
                        'fProd_'                       =>     (double)$PlantInfo['stopLoss'],                      //停产造成的损失
                        'fPlvdike_'                    =>     (double)$PlantInfo['overflowPercentage'],            //溢出围堰的流体百分比
                        'fPonsite_'                    =>     (double)$PlantInfo['overflowPercentageIn'],          //溢出围堪但仍在罐区内，地表土壤中的流体百分比
                        'fPoffsite_'                   =>     (double)$PlantInfo['overflowPercentageOut']          //溢出围堪且已流到罐区外，地表土壤中的流体百分比
                    )
                ))->return;
            }

            //-----------------------------壁板损伤因子---------------------------------------------------------
//      找出壁板板最大损伤因子，按照最大损伤因子计算风险等级
            $Index = array_search(max($maxWallDamageFactor), $maxWallDamageFactor);   //找出损伤因子最大的索引

            $wallMajorRisk = $measureThicknessWall[$Index]['layerId'];                //损伤因子最大的测点号

            $wallDamageFactor = $fu[$j]['risk']['wall'][$Index]['wallDamageFactor'];                    //损伤因子最大的值



            $maxWallFailConsequence    =    max($wallFailConsequence);                 //按壁板后果最大计算

            $fAcceptBaseQ_             =    $PlantInfo['failConseqenceAccept'];        //失效后果可接受基准

            //计算失效后果等级
            switch($maxWallFailConsequence){
                case $wallFailConsequence  <=  $fAcceptBaseQ_;
                    $wallFailConsequenceLevel="A";
                    break;
                case $wallFailConsequence>$fAcceptBaseQ_ && $wallFailConsequence<=$fAcceptBaseQ_*10:
                    $wallFailConsequenceLevel="B";
                    break;
                case $wallFailConsequence>$fAcceptBaseQ_*10 && $wallFailConsequence<=$fAcceptBaseQ_*100:
                    $wallFailConsequenceLevel="C";
                    break;
                case $wallFailConsequence>$fAcceptBaseQ_*100 && $wallFailConsequence<=$fAcceptBaseQ_*1000:
                    $wallFailConsequenceLevel="D";
                    break;
                case $wallFailConsequence>$fAcceptBaseQ_ *1000:
                    $wallFailConsequenceLevel="E";
                    break;
            }

//       壁板失效可能性
            $wallAverageFailurePro = $this->getAverageFailurePro(0,  $PlantInfo['breakSize']);          //壁板平均失效可能性
            $wallFailurePro = $this->failureProbability($wallDamageFactor, $wallAverageFailurePro, 0.1);  //壁板失效可能性
//       计算壁板失效可能性等级
            switch($wallFailurePro){
                case $wallFailurePro>0 && $wallFailurePro<=0.00001:
                    $wallFailureProLevel=1;
                    break;
                case $wallFailurePro>0.00001 && $wallFailurePro<=0.00010:
                    $wallFailureProLevel=2;
                    break;
                case $wallFailurePro>0.00010 && $wallFailurePro<=0.00100:
                    $wallFailureProLevel=3;
                    break;
                case $wallFailurePro>0.00100 && $wallFailurePro<=0.01000:
                    $wallFailureProLevel=4;
                    break;
                case $wallFailurePro>0.01000 && $wallFailurePro<=1.0000:
                    $wallFailureProLevel=5;
                    break;
                case $wallFailurePro > 1.0000:
                    $wallFailureProLevel=5;
                    break;
            }

//-----------------------------------------计算壁板风险等级--------------------------------------

            $wallRisk      = $maxWallFailConsequence*$wallFailurePro;
            $wallRiskLevel = $riskMatrixTable[$wallFailureProLevel][$wallFailConsequenceLevel*1-1];



//--------------------------------边缘板风险--------------------------------------------

            $measurethicknessEdge      =    $Corrosion["measurethicknessEdge"];
            for ($i = 0; $i < count($measurethicknessEdge); $i++) {
//            腐蚀速率的计算需要再做调整
                $floorEdgeCorrosionSpeed[$i] = $this->$measurethicknessEdge[$i]['long_termCorrosion'];

//----------------------------- 计算边缘板损伤因子----------------------------------
//        1、边缘板减薄次因子
                $floorReductionDamageFactor[$i] = $client->__soapCall('getReductionDamageFactor', array(
                    array(
                        "part"                      =>    (int)0,                                                             //代表底板
                        "corrosionSpeed"            =>    (double)$floorEdgeCorrosionSpeed[$i],                               //该层壁板腐蚀速率
                        "useDate"                   =>    (double)$PlantInfo["useDate"],                                      //使用时间(储罐使用时间)
                        "thickness"                 =>    (double)$PlantInfo["bottomEdgeNamelyThickness"],                    //边缘板初始厚度(目前是名义厚度)

                        "checkTime"                 =>    (int)$PlantInfo["bottomCheckTime"],                                 //检验次数
                        "checkValidity"             =>    (string)$PlantInfo["bottomCheckValidity"],                          //检验有效性
                        "linkType"                  =>    (string)$PlantInfo['bottomLinkType'],                               //壁板连接形式
                        "isMaintenanceAsRequired"   =>    (int)$PlantInfo['isMaintainAsRequired'],                            //是否按规定维护
                        "tankFoundationSettlement"  =>    (int)$PlantInfo['tankFoundationSettlement']                         //基础沉降评价
                    )
                ))->return;
//        2、边缘板外部损伤因子
                $floorOutDamageFactor[$i] = $client->__soapCall('getOutDamageFactor', array(
                    array(
                        'operatingTemp'                    =>    (double)$PlantInfo['operateTemp'],                               //操作温度
                        'designTemp'                       =>    (double)$PlantInfo['designTemp'],                                //设计温度
                        'part'                             =>    (int)0,                                                          //代表壁板
                        'thickness'                        =>    (double)$PlantInfo["bottomEdgeNamelyThickness"],                 //边缘板初始厚度(目前是名义厚度)

                        'pipeComplexity'                   =>    (int)$riskCalPara['pipeComplexity'],                          //管道复杂度
                        'isKeepWarmHasCL'                  =>    (int)$riskCalPara['isKeepWarmHasCL'],                         //是否保温层含氯
                        'isPipeSupport'                    =>    (int)$riskCalPara['outDamageisPipeSupport'],                  //是否管支架补偿
                        'isInterfaceCompensation'          =>    (int)$riskCalPara['outDamageisInterfaceCompensation'],        //是否界面补偿

                        'outDamageMechanismId'             =>    (int)$PlantInfo['mechanism']['floorOutDamageMechanismId'],    //外部损伤机理
                        'useDate'                          =>    (double)$PlantInfo["useDate"],                                //使用时间(储罐使用时间)
                        'isKeepWarm'                       =>    (int)$PlantInfo["isKeepWarm"],                                //是否有保温层
                        'KeepWarmStatus'                   =>    (int)$PlantInfo["KeepWarmStatus"],                            //保温层质量
                        'coatingStatus'                    =>    (int)$PlantInfo["coatingStatus"],                             //涂层质量

                        'coatingUseDate'                   =>    (double)$PlantInfo["coatingUseDate"],                         //涂层使用时间
                        'linkType'                         =>    (string)$PlantInfo["bottomLinkType"],                         //底板连接形式
                        'SCCMechanismId'                   =>    (int)$PlantInfo['mechanism']["floorSCCMechanismId"],          //SCC损伤机理
                        'checkTime'                        =>    (int)$PlantInfo["bottomCheckTime"],                           //检验次数
                        'checkValidity'                    =>    (string)$PlantInfo["bottomCheckValidity"],                    //检验有效性

                        'geographyEnvironment'             =>    (int)$PlantInfo['geographyEnvironment'],                      //设备环境
                        'isMaintenanceAsRequired'          =>    (int)$PlantInfo['isMaintainAsRequired'],                      //是否按规定维护
                        'tankFoundationSettlement'         =>    (int)$PlantInfo['tankFoundationSettlement'],                  //基础沉降评价
                        'isMediumWater'                    =>    (int)$riskCalPara["isMediumWater"],                           //是否介质含水
                        'SCCWaterH2S'                      =>    (double)$riskCalPara["SCCWaterH2S"],                          //水中的H2S值
                        'SCCWaterpH'                       =>    (double)$riskCalPara["SCCWaterpH"],                           //水中PH值
                        'isHeatTreatAfterWeld'             =>    (int)$riskCalPara["isHeatTreatAfterWeld"],                    //是否焊后热处理
                        'SCCBHardness'                     =>    (double)$riskCalPara["SCCBHardness"],                         //最大布氏硬度
                        'clConcentration'                  =>    (double)$riskCalPara["ClConcentration"],                      //水中cl离子含量

                        'isHeatTreacing'                   =>    (int)$riskCalPara["isHeatTracing"],                           //是否伴热
                        'NaOHConcentration'                =>    (double)$riskCalPara["SCCNaOHConcentration"],                 //NAOH浓度
                        'isSteamBlowing'                   =>    (int)$riskCalPara["isSteamBlowing"],                          //是否蒸汽吹扫
                        'isStressRelief'                   =>    (int)$riskCalPara["isStressRelief"],                          //是否进行应力消除
                        'SCCHeatHistory'                   =>    (int)$riskCalPara["SCCHeatHistory"],                          //热历史
                        'SCCisShutdownProtect'             =>    (int)$riskCalPara["SCCisShutdownProtect"],                    //是否有停机保护
                        'surrounding'                      =>    (string)$riskCalPara["SCCSurroundingsMedium"],                //环境含有物
                        'SCCSteelSulfur'                   =>    (double)$riskCalPara["SCCSteelSulfur"],                       //钢板中硫含量
                        'SCCWaterCarbonateConcentration'   =>    (double)$riskCalPara["SCCWaterCarbonateConcentration"]        //碳酸盐浓度
                    )
                ))->return;
//        3、边缘板SCC损伤因子
                $floorSCCDamageFactor[$i] = $client->__soapCall('getSCCDamageFactor', array(
                    array(
                        'operatingTemp'         =>     (double)$PlantInfo['operateTemp'],                   //操作温度
                        'designTemp'            =>     (double)$PlantInfo['designTemp'],                    //设计温度
                        'SCCMechId'             =>     (int)$PlantInfo['mechanism']["floorSCCMechanismId"], //底板SCC损伤机理
                        'checkTime'             =>     (int)$PlantInfo['bottomCheckTime'],                  //底板检验次数
                        'checkValidity'         =>     (String)$PlantInfo['bottomCheckValidity'],           //底板检验有效性
                        'severityPara'          =>     (int)0,                                              //计算外部损伤因子的时候不需要计算敏感性高低，直接输入严重程度指数
                        'isMediumWater'         =>     (int)$riskCalPara["isMediumWater"],                  //是否介质含水
                        'SCCWaterH2S'           =>     (double)$riskCalPara["SCCWaterH2S"],                 //水中的硫化氢含量
                        'SCCWaterpH'            =>     (double)$riskCalPara["SCCWaterpH"],                  //水中pH值
                        'isHeatTreatAfterWeld'  =>     (int)$riskCalPara["isHeatTreatAfterWeld"],           //是否焊后热处理
                        'SCCBHardness'          =>     (double)$riskCalPara["SCCBHardness"],                //最大布氏硬度
                        'clConcentration'       =>     (double)$riskCalPara["ClConcentration"],             //水中的氯离子含量

                        'isHeatTreacing'        =>     (int)$riskCalPara["isHeatTracing"],                  //是否伴热
                        'NaOHConcentration'     =>     (double)$riskCalPara["SCCNaOHConcentration"],        //NaOH浓度
                        'isSteamBlowing'        =>     (int)$riskCalPara["isSteamBlowing"],                 //是否蒸汽吹扫
                        'isStressRelief'        =>     (int)$riskCalPara["isStressRelief"],                 //是否进行应力消除
                        'SCCHeatHistory'        =>     (int)$riskCalPara["SCCHeatHistory"],                 //热历史
                        'SCCisShutdownProtect'  =>     (int)$riskCalPara["SCCisShutdownProtect"],           //是否停机保护
                        'surrounding'           =>     (string)$riskCalPara["SCCSurroundingsMedium"],       //环境含有物
                        'SCCSteelSulfur'        =>     (double)$riskCalPara["SCCSteelSulfur"],              //钢板中硫含量
                        'SCCWaterCarbonateConcentration'  =>   (double)$riskCalPara["SCCSteelSulfur"]       //碳酸盐浓度
                    )
                ))->return;
//        4、边缘板脆性断裂因子
                $floorBrittleFactor[$i]=0;
//——————————————————————————————————边缘板损伤因子------------------------------------------------------------
                $maxFloorEdgeDamageFactor[$i] = $client->__soapCall('getDamageFaction', array(
                    array(
                        'corrosionType'               =>     (int)1,                                      //腐蚀类型，壁板为均匀腐蚀，底板为局部腐蚀 0代表均匀腐蚀 1代表局部腐蚀
                        'reductionDamageFactor'       =>     (double)$floorReductionDamageFactor[$i],     //减薄损伤因子
                        'outDamageFactor'             =>     (double)$floorOutDamageFactor[$i],           //外部损伤因子
                        'SCCFactor'                   =>     (double)$floorSCCDamageFactor[$i],           //应力腐蚀开裂损伤因子
                        'brittleFractureFactor'       =>     (double)$floorBrittleFactor[$i]              //脆性断裂损伤因子
                    )
                ))->return;
            }

            //-----------------------------边缘板损伤因子---------------------------------------------------------
//      找出边缘板最大损伤因子，按照最大损伤因子计算风险等级
            $Index = array_search(max($maxFloorEdgeDamageFactor), $maxFloorEdgeDamageFactor);   //边缘板损伤因子最大索引

            $floorEdgeMajorRisk = $measurethicknessEdge[$Index]['layerId'];                     //边缘板损伤因子最大测点编号
            $floorEdgeCorrosionSpeed = $measurethicknessEdge[$Index]["long_termCorrosion"];     //损伤因子最大对应的腐蚀速率
            $floorEdgeDamageFactor = max($maxFloorEdgeDamageFactor);                            //损伤因子最大值




//--------------------------------中间板风险--------------------------------------------
            $measurethicknessMiddle      =    $Corrosion["measurethicknessMiddle"];
            for ($i = 0; $i < count($measurethicknessMiddle); $i++) {
                $floorMiddleCorrosionSpeed[$i] = $this->$measurethicknessMiddle[$i]['long_termCorrosion'];
//            计算底板损伤因子
//        1、中间板减薄次因子
                $floorReductionDamageFactor[$i] = $client->__soapCall('getReductionDamageFactor', array(
                    array(
                        "part"                      =>    (int)0,                                                             //代表底板
                        "corrosionSpeed"            =>    (double)$floorMiddleCorrosionSpeed[$i],                               //该层壁板腐蚀速率
                        "useDate"                   =>    (double)$PlantInfo["useDate"],                                      //使用时间(储罐使用时间)
                        "thickness"                 =>    (double)$PlantInfo["bottomEdgeNamelyThickness"],                    //中间板初始厚度(目前是名义厚度)

                        "checkTime"                 =>    (int)$PlantInfo["bottomCheckTime"],                                 //检验次数
                        "checkValidity"             =>    (string)$PlantInfo["bottomCheckValidity"],                          //检验有效性
                        "linkType"                  =>    (string)$PlantInfo['bottomLinkType'],                               //壁板连接形式
                        "isMaintenanceAsRequired"   =>    (int)$PlantInfo['isMaintainAsRequired'],                            //是否按规定维护
                        "tankFoundationSettlement"  =>    (int)$PlantInfo['tankFoundationSettlement']                         //基础沉降评价
                    )
                ))->return;


//        2、中间板外部损伤因子
                $floorOutDamageFactor[$i] = $client->__soapCall('getOutDamageFactor', array(
                    array(
                        'operatingTemp'                    =>    (double)$PlantInfo['operateTemp'],                            //操作温度
                        'designTemp'                       =>    (double)$PlantInfo['designTemp'],                             //设计温度
                        'part'                             =>    (int)0,                                                       //代表壁板
                        'thickness'                        =>    (double)$PlantInfo["bottomMiddleNamelyThickness"],            //中间板初始厚度(目前是名义厚度)

                        'pipeComplexity'                   =>    (int)$riskCalPara['pipeComplexity'],                          //管道复杂度
                        'isKeepWarmHasCL'                  =>    (int)$riskCalPara['isKeepWarmHasCL'],                         //是否保温层含氯
                        'isPipeSupport'                    =>    (int)$riskCalPara['outDamageisPipeSupport'],                  //是否管支架补偿
                        'isInterfaceCompensation'          =>    (int)$riskCalPara['outDamageisInterfaceCompensation'],        //是否界面补偿

                        'outDamageMechanismId'             =>    (int)$PlantInfo['mechanism']['floorOutDamageMechanismId'],    //外部损伤机理
                        'useDate'                          =>    (double)$PlantInfo["useDate"],                                //使用时间(储罐使用时间)
                        'isKeepWarm'                       =>    (int)$PlantInfo["isKeepWarm"],                                //是否有保温层
                        'KeepWarmStatus'                   =>    (int)$PlantInfo["KeepWarmStatus"],                            //保温层质量
                        'coatingStatus'                    =>    (int)$PlantInfo["coatingStatus"],                             //涂层质量

                        'coatingUseDate'                   =>    (double)$PlantInfo["coatingUseDate"],                         //涂层使用时间
                        'linkType'                         =>    (string)$PlantInfo["bottomLinkType"],                         //底板连接形式
                        'SCCMechanismId'                   =>    (int)$PlantInfo['mechanism']["floorSCCMechanismId"],          //SCC损伤机理
                        'checkTime'                        =>    (int)$PlantInfo["bottomCheckTime"],                           //检验次数
                        'checkValidity'                    =>    (string)$PlantInfo["bottomCheckValidity"],                    //检验有效性

                        'geographyEnvironment'             =>    (int)$PlantInfo['geographyEnvironment'],                      //设备环境
                        'isMaintenanceAsRequired'          =>    (int)$PlantInfo['isMaintainAsRequired'],                      //是否按规定维护
                        'tankFoundationSettlement'         =>    (int)$PlantInfo['tankFoundationSettlement'],                  //基础沉降评价
                        'isMediumWater'                    =>    (int)$riskCalPara["isMediumWater"],                           //是否介质含水
                        'SCCWaterH2S'                      =>    (double)$riskCalPara["SCCWaterH2S"],                          //水中的H2S值
                        'SCCWaterpH'                       =>    (double)$riskCalPara["SCCWaterpH"],                           //水中PH值
                        'isHeatTreatAfterWeld'             =>    (int)$riskCalPara["isHeatTreatAfterWeld"],                    //是否焊后热处理
                        'SCCBHardness'                     =>    (double)$riskCalPara["SCCBHardness"],                         //最大布氏硬度
                        'clConcentration'                  =>    (double)$riskCalPara["ClConcentration"],                      //水中cl离子含量

                        'isHeatTreacing'                   =>    (int)$riskCalPara["isHeatTracing"],                           //是否伴热
                        'NaOHConcentration'                =>    (double)$riskCalPara["SCCNaOHConcentration"],                 //NAOH浓度
                        'isSteamBlowing'                   =>    (int)$riskCalPara["isSteamBlowing"],                          //是否蒸汽吹扫
                        'isStressRelief'                   =>    (int)$riskCalPara["isStressRelief"],                          //是否进行应力消除
                        'SCCHeatHistory'                   =>    (int)$riskCalPara["SCCHeatHistory"],                          //热历史
                        'SCCisShutdownProtect'             =>    (int)$riskCalPara["SCCisShutdownProtect"],                    //是否有停机保护
                        'surrounding'                      =>    (string)$riskCalPara["SCCSurroundingsMedium"],                //环境含有物
                        'SCCSteelSulfur'                   =>    (double)$riskCalPara["SCCSteelSulfur"],                       //钢板中硫含量
                        'SCCWaterCarbonateConcentration'   =>    (double)$riskCalPara["SCCWaterCarbonateConcentration"]        //碳酸盐浓度
                    )
                ))->return;


//        3、中间板SCC损伤因子
                $floorSCCDamageFactor[$i] = $client->__soapCall('getSCCDamageFactor', array(
                    array(
                        'operatingTemp'         =>     (double)$PlantInfo['operateTemp'],                   //操作温度
                        'designTemp'            =>     (double)$PlantInfo['designTemp'],                    //设计温度
                        'SCCMechId'             =>     (int)$PlantInfo['mechanism']["floorSCCMechanismId"], //底板SCC损伤机理
                        'checkTime'             =>     (int)$PlantInfo['bottomCheckTime'],                  //底板检验次数
                        'checkValidity'         =>     (String)$PlantInfo['bottomCheckValidity'],           //底板检验有效性
                        'severityPara'          =>     (int)0,                                              //计算外部损伤因子的时候不需要计算敏感性高低，直接输入严重程度指数
                        'isMediumWater'         =>     (int)$riskCalPara["isMediumWater"],                  //是否介质含水
                        'SCCWaterH2S'           =>     (double)$riskCalPara["SCCWaterH2S"],                 //水中的硫化氢含量
                        'SCCWaterpH'            =>     (double)$riskCalPara["SCCWaterpH"],                  //水中pH值
                        'isHeatTreatAfterWeld'  =>     (int)$riskCalPara["isHeatTreatAfterWeld"],           //是否焊后热处理
                        'SCCBHardness'          =>     (double)$riskCalPara["SCCBHardness"],                //最大布氏硬度
                        'clConcentration'       =>     (double)$riskCalPara["ClConcentration"],             //水中的氯离子含量

                        'isHeatTreacing'        =>     (int)$riskCalPara["isHeatTracing"],                  //是否伴热
                        'NaOHConcentration'     =>     (double)$riskCalPara["SCCNaOHConcentration"],        //NaOH浓度
                        'isSteamBlowing'        =>     (int)$riskCalPara["isSteamBlowing"],                 //是否蒸汽吹扫
                        'isStressRelief'        =>     (int)$riskCalPara["isStressRelief"],                 //是否进行应力消除
                        'SCCHeatHistory'        =>     (int)$riskCalPara["SCCHeatHistory"],                 //热历史
                        'SCCisShutdownProtect'  =>     (int)$riskCalPara["SCCisShutdownProtect"],           //是否停机保护
                        'surrounding'           =>     (string)$riskCalPara["SCCSurroundingsMedium"],       //环境含有物
                        'SCCSteelSulfur'        =>     (double)$riskCalPara["SCCSteelSulfur"],              //钢板中硫含量
                        'SCCWaterCarbonateConcentration'  =>   (double)$riskCalPara["SCCSteelSulfur"]       //碳酸盐浓度
                    )
                ))->return;


//        4、中间板脆性断裂因子
                $floorBrittleFactor[$i]=0;

                $maxFloorMiddleDamageFactor[$i] = $client->__soapCall('getDamageFaction', array(
                    array(
                        'corrosionType'               =>     (int)1,                                      //腐蚀类型，壁板为均匀腐蚀，底板为局部腐蚀 0代表均匀腐蚀 1代表局部腐蚀
                        'reductionDamageFactor'       =>     (double)$floorReductionDamageFactor[$i],     //减薄损伤因子
                        'outDamageFactor'             =>     (double)$floorOutDamageFactor[$i],           //外部损伤因子
                        'SCCFactor'                   =>     (double)$floorSCCDamageFactor[$i],           //应力腐蚀开裂损伤因子
                        'brittleFractureFactor'       =>     (double)$floorBrittleFactor[$i]              //脆性断裂损伤因子
                    )
                ))->return;
            }
//-----------------------------中间板损伤因子---------------------------------------------------------
//      找出边缘板最大损伤因子，按照最大损伤因子计算风险等级
            $Index = array_search(max($maxFloorMiddleDamageFactor), $maxFloorMiddleDamageFactor); //中间板损伤因子最大值索引
            $floorMiddleMajorRisk = $measurethicknessMiddle[$Index]['layerId'];                   //中间板损伤因子最大的测点编号
            $floorMiddleCorrosionSpeed = $measurethicknessMiddle[$Index]["long_termCorrosion"];   //中间板损伤因子最大对应的腐蚀速率
            $floorMiddleDamageFactor = max($maxFloorMiddleDamageFactor);                          //中间板最大损伤因子
//----------------------------底板损伤因子------------------------------------------------------
            if($floorEdgeDamageFactor>=$floorMiddleDamageFactor){
                $floorMajorRisk=$floorEdgeMajorRisk;
                $floorDamageFactor=$floorEdgeDamageFactor;
            }else{
                $floorMajorRisk=$floorMiddleMajorRisk;
                $floorDamageFactor=$floorMiddleDamageFactor;
            }



//       --------------------------------底板平均失效可能性----------------------------------
            $floorAverageFailurePro = $this->getAverageFailurePro(1, $PlantInfo['breakSize']);
            $floorFailurePro = $this->failureProbability($floorDamageFactor, $floorAverageFailurePro, 0.1);   //底板失效可能性

//        ---------------------------------底板失效后果--------------------------------------

            $floorFailConsequence = $client->__soapCall('getFailurefloorConsequence', array(
                array(
                    'fTankDiameter_'               =>     (double) $PlantInfo['D'],                          //储罐直径
                    'fHliq_'                       =>     (double) $PlantInfo['fillH'],                      //储罐液面高度
                    'iEnvSensitibility_'           =>     (int)$PlantInfo['sensitiveEnvironment'],       //环境敏感度
                    'fMatCost_'                    =>     (double)$PlantInfo['fMatCost_'],                  //材料价格系数
                    'fProd_'                       =>     (double)$PlantInfo['stopLoss'],                   //停产造成的损失
                    'fPlvdike_'                    =>     (double)$PlantInfo['overflowPercentage'],         //溢出围堪的流体百分比
                    'fPonsite_'                    =>     (double)$PlantInfo['overflowPercentageIn'],       //溢出围堪但仍在罐区内，地表土壤中的流体百分比
                    'fPoffsite_'                   =>     (double)$PlantInfo['overflowPercentageOut'],      //溢出围堪且已流到罐区外，地表土壤中的流体百分比
                    'fSgw_'                        =>     (double)$PlantInfo['bottomToWaterDistance'],      //罐底到地下水的距离
                    'fMedium_p_'                   =>     (double)$PlantInfo['mediumPercentage'],           //介质密度
                    'fMedium_DynVisc_'             =>     (double)$PlantInfo['mediumDyViscosity'],          //介质动力粘度
                    'iTankBaseType_'               =>     (int)$PlantInfo['bottomGasket'],               //储罐基础形式。0---基础为水泥或沥青  1——基础设有RPB，2——基础没有RPB
                    'eTankSubsoilType_'            =>     (int)$PlantInfo['bottomGasketSoild']           //储罐基础下面土壤类型
                )
            ))->return;

            switch($floorFailConsequence){
                case $floorFailConsequence<=$fAcceptBaseQ_;
                    $floorFailConsequenceLevel="A";
                    break;
                case $floorFailConsequence>$fAcceptBaseQ_ && $floorFailConsequence<=$fAcceptBaseQ_*10:
                    $floorFailConsequenceLevel="B";
                    break;
                case $floorFailConsequence>$fAcceptBaseQ_*10 && $floorFailConsequence<=$fAcceptBaseQ_*100:
                    $floorFailConsequenceLevel="C";
                    break;
                case $floorFailConsequence>$fAcceptBaseQ_*100 && $floorFailConsequence<=$fAcceptBaseQ_*1000:
                    $floorFailConsequenceLevel="D";
                    break;
                case $floorFailConsequence>$fAcceptBaseQ_ *1000:
                    $floorFailConsequenceLevel="E";
                    break;
            }

//       ---------------------------------底板失效可能性等级----------------------------------------------


//       底板失效可能性等级
            switch($floorFailurePro){
                case $floorFailurePro<=0.00001 :
                    $floorFailureProLevel=1;
                    break;
                case $floorFailurePro >= 0.00001 && $floorFailurePro < 0.00010 :
                    $floorFailureProLevel=2;
                    break;
                case $floorFailurePro > 0.00010 && $floorFailurePro  < 0.00100 :
                    $floorFailureProLevel=3;
                    break;
                case $floorFailurePro >= 0.00100 && $floorFailurePro < 0.01000 :
                    $floorFailureProLevel=4;
                    break;
                case $floorFailurePro >= 0.01000 && $floorFailurePro < 1 :
                    $floorFailureProLevel=5;
                    break;
                default:
                    $floorFailureProLevel=1;
                    break;
            }

//------------------------------------------------底板风险等级---------------------------------------------------------

            $floorRisk      = $floorFailConsequence*$floorFailurePro;
            $floorRiskLevel = $riskMatrixTable[$floorFailureProLevel][$floorFailConsequenceLevel];



            //-------计算风险的结果------------------------------------------------
            $fu[$j]['risk']['wallMajorRisk']               =    $wallMajorRisk;                //壁板风险最大测点
            $fu[$j]['risk']['floorMajorRisk']              =    $floorMajorRisk;               //底板风险最大测点
            $fu[$j]['risk']['wallDamageFactor']            =    $wallDamageFactor;             //壁板损伤因子最大值
            $fu[$j]['risk']['floorDamageFactor']           =    $floorDamageFactor;            //底板损伤因子最大值
            $fu[$j]['risk']['floorEdgeDamageFactor']       =    $floorEdgeDamageFactor;        //底板边缘板损伤因子最大值
            $fu[$j]['risk']['floorEdgeCorrosionSpeed']     =    $floorEdgeCorrosionSpeed;      //底板边缘板损伤因子最大值对应的腐蚀速率
            $fu[$j]['risk']['floorMiddleDamageFactor']     =    $floorMiddleDamageFactor;      //底板中间板损伤因子最大值
            $fu[$j]['risk']['floorMiddleCorrosionSpeed']   =    $floorMiddleCorrosionSpeed;    //底板中间板损伤因子最大值对应的腐蚀速率
            $fu[$j]['risk']['wallRisk']                    =    $wallRisk;                     //壁板风险
            $fu[$j]['risk']['wallRiskLevel']               =    $wallRiskLevel;                //壁板风险等级
            $fu[$j]['risk']['floorRisk']                   =    $floorRisk;                    //底板风险
            $fu[$j]['risk']['floorRiskLevel']              =    $floorRiskLevel;               //底板风险等级
            $fu[$j]['risk']['wallFailPro']                 =    $wallFailurePro;               //壁板失效可能性
            $fu[$j]['risk']['wallFailProLevel']            =    $wallFailureProLevel;          //壁板失效可能性等级
            $fu[$j]['risk']['floorFailPro']                =    $floorFailurePro;              //底板失效可能性
            $fu[$j]['risk']['floorFailProLevel']           =    $floorFailureProLevel;         //底板失效可能性等级
            $fu[$j]['risk']['wallConsequence']             =    $maxWallFailConsequence;       //壁板失效后果
            $fu[$j]['risk']['wallConsequenceLevel']        =    $wallFailConsequenceLevel;     //壁板失效后果等级
            $fu[$j]['risk']['floorConsequence']            =    $floorFailConsequence;        //底板失效后果
            $fu[$j]['risk']['floorConsequenceLevel']       =    $floorFailConsequenceLevel;    //底板失效后果等级

        }

//        计算下次检验时间
        $thresholdRisk=$PlantInfo['thresholdRisk'];
        for($ii=0;$ii<5;$ii++){
            $wallDamageFactor=$fu[$ii]['risk']['wallDamageFactor'];
            if($wallDamageFactor > $thresholdRisk){
                $where['wallNextCheckDate'] = Date("Y-m-d",strtotime("+$ii years"));
                break;
            }else{
                $where['wallNextCheckDate'] = Date("Y-m-d",strtotime("+4 years"));
            }
        }
        for($ii=0;$ii<5;$ii++){
            $floorDamageFactor=$fu[$ii]['risk']['floorDamageFactor'];
            if($floorDamageFactor > $thresholdRisk){
                $where['floorNextCheckDate'] = Date("Y-m-d",strtotime("+$ii years"));
                break;
            }else{
                $where['floorNextCheckDate'] = Date("Y-m-d",strtotime("+4 years"));
            }
        }



//-------------------------------------风险结果保存--------------------------------------
        $riskRecordList                        =         D("Riskrecordlist");
        $riskRecordListWhere['pid']            =         I("post.id","");
        $riskRecordListCount                   =         $riskRecordList->where($riskRecordListWhere)->getField("id");
        $riskRecordListWhere['wallEvaDate']    =         date('Y-m-d');
        $riskRecordListWhere['floorEvaDate']   =         date('Y-m-d');
        if($riskRecordListCount!==null){
            $riskRecordListWhere['id']=$riskRecordListCount;
            $riskRecordList->save($riskRecordListWhere);
        }else{
            $riskRecordList->add($riskRecordListWhere);
        }
        $riskList=D('Risklist');
        //-------基本信息-----------------------------------------------------
        $where['pid']             =     $PlantInfo['id'];
        $where['factoryId']       =     $PlantInfo['factoryId'];
        $where['workshopId']      =     $PlantInfo['workshopId'];
        $where['areaId']          =     $PlantInfo['areaId'];
        $where['plantNO']         =     $PlantInfo['plantNO'];
        $where['plantName']       =     $PlantInfo['plantName'];

        //-------计算时间-----------------------------------------------------
        $where['countDate']       =     date('Y-m-d');

        //-------计算风险的结果------------------------------------------------
        $where['wallMajorRisk']               =    $risk['wallMajorRisk'];                      //壁板风险最大测点
        $where['floorMajorRisk']              =    $risk['floorMajorRisk'];                     //底板风险最大测点
        $where['wallDamageFactor']            =    $risk['wallDamageFactor'];                   //壁板损伤因子最大值
        $where['floorDamageFactor']           =    $risk['floorDamageFactor'];                  //底板损伤因子最大值
        $where['floorEdgeDamageFactor']       =    $risk['floorEdgeDamageFactor'];              //底板边缘板损伤因子最大值
        $where['floorEdgeCorrosionSpeed']     =    $risk['floorEdgeCorrosionSpeed'];            //底板边缘板损伤因子最大值对应的腐蚀速率
        $where['floorMiddleDamageFactor']     =    $risk['floorMiddleDamageFactor'];            //底板中间板损伤因子最大值
        $where['floorMiddleCorrosionSpeed']   =    $risk['floorMiddleCorrosionSpeed'];          //底板中间板损伤因子最大值对应的腐蚀速率
        $where['wallRisk']                    =    $risk['wallRisk'];                           //壁板风险
        $where['wallRiskLevel']               =    $risk['wallRiskLevel'];                      //壁板风险等级
        $where['floorRisk']                   =    $risk['floorRisk'];                          //底板风险
        $where['floorRiskLevel']              =    $risk['floorRiskLevel'];                     //底板风险等级
        $where['wallFailPro']                 =    $risk['wallFailPro'];                        //壁板失效可能性
        $where['wallFailProLevel']            =    $risk['wallFailProLevel'];                   //壁板失效可能性等级
        $where['floorFailPro']                =    $risk['floorFailPro'];                       //底板失效可能性
        $where['floorFailProLevel']           =    $risk['floorFailProLevel'];                  //底板失效可能性等级
        $where['wallConsequence']             =    $risk['wallConsequence'];                    //壁板失效后果
        $where['wallConsequenceLevel']        =    $risk['wallConsequenceLevel'];               //壁板失效后果等级
        $where['floorConsequence']            =    $risk['floorConsequence'];                   //底板失效后果
        $where['floorConsequenceLevel']       =    $risk['floorConsequenceLevel'];              //底板失效后果等级

        $where['wallFailPro_fu']              =    $fu[4]['risk']['wallFailPro'];               //壁板未来失效可能性
        $where['floorFailPro_fu']             =    $fu[4]['risk']['floorFailPro'];              //底板未来失效可能性
        $where['wallRisk_fu']                 =    $fu[4]['risk']['wallRisk'];                  //壁板未来风险
        $where['floorRisk_fu']                =    $fu[4]['risk']['floorRisk'];                 //底板未来风险
        $where['wallRiskLevel_fu']            =    $fu[4]['risk']['wallRiskLevel'];             //壁板未来风险等级
        $where['floorRiskLevel_fu']           =    $fu[4]['risk']['floorRiskLevel'];            //底板未来风险等级

        $where['wallDamageFactor_trendYear']  =

            Date("Y-m-d",time()).",".
            Date("Y-m-d",strtotime("+1 years")).",".
            Date("Y-m-d",strtotime("+2 years")).",".
            Date("Y-m-d",strtotime("+3 years")).",".
            Date("Y-m-d",strtotime("+4 years"));

        $where['wallDamageFactor_trend']      =

            $fu[0]['risk']['wallDamageFactor'].",".
            $fu[1]['risk']['wallDamageFactor'].",".
            $fu[2]['risk']['wallDamageFactor'].",".
            $fu[3]['risk']['wallDamageFactor'].",".
            $fu[4]['risk']['wallDamageFactor'];      //壁板损伤因子趋势


        $where['floorDamageFactor_trend']     =
            $fu[0]['risk']['floorDamageFactor'].",".
            $fu[1]['risk']['floorDamageFactor'].",".
            $fu[2]['risk']['floorDamageFactor'].",".
            $fu[3]['risk']['floorDamageFactor'].",".
            $fu[4]['risk']['floorDamageFactor'] ;   //底板损伤因子趋势





        $resList=$riskList->data($where)->add();


        if($resList){
            $resDetail=D("Riskdetail");
            for ($i = 0; $i < count($risk['wall']); $i++) {
                $whereDetail[$i]['gpid']                =       $id;
                $whereDetail[$i]['pid']                 =       $resList;
                $whereDetail[$i]['part']                =       1;
                $whereDetail[$i]['layerNO']             =       $risk['wall'][$i]['layerNO'];                                 //壁板序号
                $whereDetail[$i]['layerId']             =       $risk['wall'][$i]['layerId'];                                 //壁板测号
                $whereDetail[$i]['thicknessType']       =       $Corrosion['measurethicknessWallOrigin'][$i]['thicknessType'];//壁板测厚类型
                $whereDetail[$i]['corrosionSpeed']      =       $risk['wall'][$i]['corrosionSpeed'];
                $whereDetail[$i]['damageFactor']        =       $risk['wall'][$i]['wallDamageFactor'];

            }
            $resDetail=$resDetail->addAll($whereDetail);
            if($resDetail){

                if (   $where['wallRiskLevel']    ==  '高风险'
                    || $where['wallRiskLevel']    ==  '中高风险'
                    || $where['floorRiskLevel']   ==  '高风险'
                    || $where['floorRiskLevel']   ==  '中高风险'
                ) {
                    $riskList->where($resList)->setField("isAlarm",1);
                }

                $risk['msg']="计算结果已保存(壁板风险已计算)";
            }else{
                $risk['msg']="计算结果已保存(壁板风险结果记录出错)";
            }
        }else{
            $risk['msg']="计算结果已保存(该设备没有添加壁板)";
        }
        $risk['fu'] = $fu;
//---------------------------------------测试用部位starting-------------------------------------------

//-------------------------------------风险结果输出--------------------------------------
        $this->AjaxReturn($risk);
    }





//------------------------------------------------------------------------------------------------------
//        获取风险计算相关的信息
    function getPlantInfo($plantId){
        $plantInfo                          =   D("Plantinfo");                     //储罐基本信息
        $mechanism                          =   D("Riskcalpara");                   //损伤机理

        $plantInfo                          =   $plantInfo->where("id=$plantId")->Relation("Plantwallboardinfo")->select();
        $PlantInfo                          =   $plantInfo[0];

        $PlantInfo ['useDate']              =   $this->transformUseDate($PlantInfo ['useDate']);//将使用时间转化为使用年限

        $mechanism                          =   $mechanism->where("pid=$plantId")->select();
        $PlantInfo['mechanism']             =   $mechanism[0];



        //        计算底板和壁板检验次数和检验有效性
        $planttestRecord      =     D("Planttestrecord");
        $PlanttestRecord      =     $planttestRecord->where("pid = $plantId")->Relation("Planttestrecordwall")->select();//缺少是否通过审核的验证

        $wallCheckTime        =     0;
        $bottomCheckTime      =     0;
        for($i=0; $i<count($PlanttestRecord);$i++) {
            switch($PlanttestRecord[$i ]['testMethod_bottom']){
                case "高度有效" :
                    $sum=1;
                    break;
                case "中高度有效" :
                    $sum=0.5;
                    break;
                case "中度有效" :
                    $sum=0.25;
                    break;
                case "低度有效" :
                    $sum=0.125;
                    break;
                case "无效" :
                    $sum=0;
                    break;
            }
            $bottomCheckTime=$bottomCheckTime+$sum;
            switch($PlanttestRecord[$i]['testMethod_bottom'][0]['testMethod']){
                case "高度有效" :
                    $sum=1;
                    break;
                case "中高度有效" :
                    $sum=0.5;
                    break;
                case "中度有效" :
                    $sum=0.25;
                    break;
                case "低度有效" :
                    $sum=0.125;
                    break;
                case "无效" :
                    $sum=0;
                    break;
            }
            $wallCheckTime=$wallCheckTime+$sum;
        }
        $PlantInfo['wallCheckTime']        =    ceil($wallCheckTime);
        $PlantInfo['bottomCheckTime']      =    ceil($bottomCheckTime);
        if($wallCheckTime!==0){
            $PlantInfo['wallCheckValidity']          =    "D";
        }
        if($bottomCheckTime!==0){
            $PlantInfo['bottomCheckValidity']        =    "D";
        }

        return $PlantInfo;
    }

    function getPlantCorrosion($plantId){
//      壁板定点测厚数据和腐蚀速率
        $measurethicknessrecord                   =   D("Measurethicknessrecord");    //储罐定点测厚信息及壁板相关信息
        $measurethicknessrecordWall               =   D("MeasurethicknessrecordWall");    //储罐定点测厚信息及壁板相关信息
        $maxMea_dt                                =   $measurethicknessrecord->where("pid=$plantId")->order('Mea_dt desc')->limit(1)->select();
        $maxMea_dtId                              =   $maxMea_dt[0]['id'];
        $Corrosion['measurethicknessWall']        =   $measurethicknessrecordWall->where("pid=$maxMea_dtId and part=1")->Relation("Plantwallboardinfo")->select();
        $Corrosion['measurethicknessWallOrigin']  =   $measurethicknessrecordWall->where("pid=$maxMea_dtId and part=1")->Relation("MeasurethicknessrecordWallOrigin")->select();

//      边缘板定点测厚数据和腐蚀速率
        $Mea_dt                             =   $measurethicknessrecordWall->where(
            array(
                "gpid"    =>   $plantId,
                "part"    =>   2,
                "layerNO" =>   1
            )
        )->max("Mea_dt");
        $Corrosion['measurethicknessEdge']  =   $measurethicknessrecordWall->where(
            array(
                "gpid"    =>   $plantId,
                "part"    =>   2,
                "layerNO" =>   1,
                "Mea_dt"  =>   $Mea_dt
            ))->select();
//      中间板定点测厚数据和腐蚀速率
        $Mea_dt                              =   $measurethicknessrecordWall->where(
            array(
                "gpid"    =>   $plantId,
                "part"    =>   2,
                "layerNO" =>   2
            )
        )->max("Mea_dt");
        $Corrosion['measurethicknessMiddle']  =  $measurethicknessrecordWall->where(
            array(
                "gpid"    =>   $plantId,
                "part"    =>   2,
                "layerNO" =>   2,
                "Mea_dt"  =>   $Mea_dt
            ))->select();
        return  $Corrosion;
    }
//------------------------------------------------------------------------------------------------------
//    计算失效可能性 包括：$Fg 平均失效可能性  $Fm 管理评价系数 $Fe 损伤因子
//      三者的乘积等于失效可能性
    function failureProbability($Fg, $Fm, $Fe)
    {
        $failPro = $Fg * $Fm * $Fe;
        return $failPro;
    }



//---------------------------------------------------------------------------------------------------------
//   平均失效概率
//  part 代表是壁板还是底板 0代表底板 1代表壁板
//  breakSize是泄漏孔尺寸
    function getAverageFailurePro($part, $breakSize)
    {
        switch($breakSize){  //单位为mm
            case $breakSize>=0 && $breakSize<6:
                $breakSizeIndex=0;
                break;
            case $breakSize>=6 && $breakSize<25:
                $breakSizeIndex=1;
                break;
            case $breakSize>=25 && $breakSize<100:
                $breakSizeIndex=2;
                break;
            case $breakSize>=100 :
                $breakSizeIndex=3;
                break;
        }
//概率不可能为0，这里的标准应该有问题，将概率为0的改为0.00001
        $averageFailureProtable = array(
            array(0.00072, 0.00001, 0.00001, 0.00002),
            array(0.00007, 0.000025, 0.000005, 0.0000007)
        );
        $data = $averageFailureProtable[$part][$breakSizeIndex];
        return $data;
    }


//   计算管理评价系数
    function getManageFactor()
    {
        return 1;
    }
//计算腐蚀速率
    function corrosionSpeed($para){
        $s=$para;
        return $s;
    }

//---------------------------------------------------------------------------------------------------------

// ------------------------------------计算损伤因子-----------------------------------------------------
//    1、$corrosionType           腐蚀类型，局部腐蚀还是均匀腐蚀
//    2、$reductionDamageFactor   减薄因子
//    3、$outDamageFactor         外部损伤因子
//    4、$SCCFactor               SCC应力腐蚀开裂因子
//    5、$brittleFractureFactor   脆性断裂因子
//    function damageFactor(
//        $corrosionType,
//        $reductionDamageFactor,
//        $outDamageFactor,
//        $SCCFactor,
//        $brittleFractureFactor
//    )
//    {
////        0 表示均匀腐蚀
////        1 表示局部腐蚀
//        if($corrosionType==0){
//            $damageFactor = $reductionDamageFactor + $outDamageFactor + $SCCFactor + $brittleFractureFactor;
//        }elseif($corrosionType==1){
//            $damageFactor = max($reductionDamageFactor,$outDamageFactor) + $SCCFactor + $brittleFractureFactor;
//        }
//        return $damageFactor;
//    }


//----------------------------------减薄损伤因子----------------------------------------
//    function reductionDamageFactor(
//        $plantPart,                      //壁板还是底板，1 代表壁板  2代表底板
//        $corrosionSpeed,                 //腐蚀速率
//        $useDate,                        //使用年限
//        $thickness,                      //厚度
//        $checkTime,                      //检查次数
//        $checkValidity,                  //检验有效性
//        $linkType,                       //连接形式
//        $isMaintainAsRequired,           //是否按照要求进行维护
//        $tankFoundationSettlement        //基础沉降评价
//    )
//    {
//
////    计算严重程度指数
//        $severity = floatval($thickness) * floatval($corrosionSpeed) / floatval($useDate);
//        $severity = round($severity, 2);
////    计算检验次数和检验有效性
//        switch($checkTime){
//			case $checkTime==0 :
//			   $checkCondition = 0;
//			   break;
//			case $checkTime>0 && $checkTime <=6:
//			     $checkCondition = $checkTime . $checkValidity;
//				 break;
//			case $checkTime>6 :
//			   $checkCondition = '6' . $checkValidity;
//				 break;
//			default:
//			$checkCondition = '6' . $checkValidity;
//				 break;
//		}
//
////    计算严重程度指数索引值
//        $severityIndexTable = array(0.02, 0.04, 0.06, 0.08, 0.10, 0.12, 0.14, 0.16, 0.18, 0.20, 0.25, 0.30, 0.35, 0.40, 0.45, 0.50, 0.55, 0.60, 0.65);
//        for ($i = 0; $i < count($severityIndexTable); $i++) {
//            $severityDifferenceIndex[$i] = abs($severityIndexTable[$i] - $severity);
//        }
//        $severityIndexIndex = array_search(min($severityDifferenceIndex), $severityDifferenceIndex);
//        $severity = $severityIndexTable[$severityIndexIndex];
////    计算检验次数和检验有效性索引值
//        $checkConditionIndexTable = array(0, "1A", "1B", "1C", "1D", "2A", "2B", "2C", "2D", "3A", "3B", "3C", "3D", "4A", "4B", "4C", "4D", "5A", "5B", "5C", "5D", "6A", "6B", "6C", "6D");
//
//        $severityIndex = array_keys($severityIndexTable, $severity);
//        $checkConditionIndex = array_keys($checkConditionIndexTable, $checkCondition);
//
//        if($plantPart==1){
//            //    减薄次因子的标准，根据GB22610.4表C.7
//            $reductionDamageFactorTable = array(
//                array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(6, 5, 3, 2, 1, 4, 2, 1, 1, 3, 1, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1),
//                array(20, 17, 10, 6, 1, 13, 6, 1, 1, 10, 3, 1, 1, 7, 2, 1, 1, 5, 1, 1, 1, 4, 1, 1, 1),
//                array(90, 70, 50, 20, 3, 50, 20, 4, 1, 40, 10, 1, 1, 30, 5, 1, 1, 20, 2, 1, 1, 14, 1, 1, 1),
//                array(250, 200, 130, 70, 7, 170, 70, 10, 1, 130, 35, 3, 1, 100, 15, 1, 1, 70, 7, 1, 1, 50, 3, 1, 1),
//                array(400, 300, 210, 110, 15, 290, 120, 20, 1, 260, 60, 5, 1, 180, 20, 2, 1, 120, 10, 1, 1, 100, 6, 1, 1),
//                array(520, 450, 290, 150, 20, 350, 170, 30, 20, 240, 80, 6, 1, 200, 30, 2, 1, 150, 15, 2, 1, 120, 7, 1, 1),
//                array(650, 550, 400, 200, 30, 400, 200, 40, 4, 320, 110, 9, 2, 240, 50, 4, 2, 180, 25, 3, 2, 150, 10, 2, 2),
//                array(750, 650, 550, 300, 80, 600, 300, 80, 10, 540, 150, 20, 5, 440, 90, 10, 4, 350, 70, 6, 4, 280, 40, 5, 4),
//                array(900, 800, 700, 400, 130, 700, 400, 120, 30, 600, 200, 50, 10, 500, 140, 20, 8, 400, 110, 10, 8, 350, 90, 9, 8),
//                array(1050, 900, 810, 500, 200, 800, 500, 160, 40, 700, 270, 60, 20, 600, 200, 30, 15, 500, 160, 20, 15, 400, 130, 20, 15),
//                array(1200, 1100, 970, 600, 270, 1000, 600, 200, 60, 900, 360, 80, 40, 800, 270, 50, 40, 700, 210, 40, 40, 600, 180, 40, 40),
//                array(1350, 1200, 1130, 700, 350, 1100, 750, 300, 100, 1000, 500, 130, 90, 900, 350, 100, 90, 800, 260, 90, 90, 700, 240, 90, 90),
//                array(1500, 1400, 1250, 850, 500, 1300, 900, 400, 230, 1200, 650, 250, 210, 1000, 450, 220, 210, 900, 360, 210, 210, 800, 300, 210, 210),
//                array(1900, 1700, 1400, 1000, 700, 1600, 1105, 670, 530, 1300, 880, 550, 500, 1200, 700, 530, 500, 1100, 640, 500, 500, 1000, 600, 500, 500)
//            );
//        }elseif($plantPart==2){
//            //    减薄次因子的标准，根据GB22610.4表C.7
//            $reductionDamageFactorTable = array(
//                array(4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(14, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(32, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(56, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(87, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
//                array(125, 5, 3, 2, 1, 4, 2, 1, 1, 3, 1, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1),
//                array(170, 17, 10, 6, 1, 13, 6, 1, 1, 10, 3, 1, 1, 7, 2, 1, 1, 5, 1, 1, 1, 4, 1, 1, 1),
//                array(222, 70, 50, 20, 3, 50, 20, 4, 1, 40, 10, 1, 1, 30, 5, 1, 1, 20, 2, 1, 1, 14, 1, 1, 1),
//                array(281, 200, 130, 70, 7, 170, 70, 10, 1, 130, 35, 3, 1, 100, 15, 1, 1, 70, 7, 1, 1, 50, 3, 1, 1),
//                array(347, 300, 210, 110, 15, 290, 120, 20, 1, 260, 60, 5, 1, 180, 20, 2, 1, 120, 10, 1, 1, 100, 6, 1, 1),
//                array(420, 450, 290, 150, 20, 350, 170, 30, 20, 240, 80, 6, 1, 200, 30, 2, 1, 150, 15, 2, 1, 120, 7, 1, 1),
//                array(500, 550, 400, 200, 30, 400, 200, 40, 4, 320, 110, 9, 2, 240, 50, 4, 2, 180, 25, 3, 2, 150, 10, 2, 2),
//                array(587, 650, 550, 300, 80, 600, 300, 80, 10, 540, 150, 20, 5, 440, 90, 10, 4, 350, 70, 6, 4, 280, 40, 5, 4),
//                array(681, 800, 700, 400, 130, 700, 400, 120, 30, 600, 200, 50, 10, 500, 140, 20, 8, 400, 110, 10, 8, 350, 90, 9, 8),
//                array(782, 900, 810, 500, 200, 800, 500, 160, 40, 700, 270, 60, 20, 600, 200, 30, 15, 500, 160, 20, 15, 400, 130, 20, 15),
//                array(890, 1100, 970, 600, 270, 1000, 600, 200, 60, 900, 360, 80, 40, 800, 270, 50, 40, 700, 210, 40, 40, 600, 180, 40, 40),
//                array(1005, 1200, 1130, 700, 350, 1100, 750, 300, 100, 1000, 500, 130, 90, 900, 350, 100, 90, 800, 260, 90, 90, 700, 240, 90, 90),
//                array(1126, 1209, 1163, 1118, 1098, 1300, 900, 400, 230, 1200, 650, 250, 210, 1000, 450, 220, 210, 900, 360, 210, 210, 800, 300, 210, 210),
//                array(1390, 1390, 1390, 1390, 1390, 1600, 1105, 670, 530, 1300, 880, 550, 500, 1200, 700, 530, 500, 1100, 640, 500, 500, 1000, 600, 500, 500)
//            );
//        }
//
//
//// 计算减薄次因子
//        $reductionDamageFactor = $reductionDamageFactorTable[$severityIndex[0]][$checkConditionIndex[0]];
//        //焊接结构修正系数
//        if($linkType=="焊接"){
//            $fWD=1;
//        }else{
//            $fWD=10;
//        }
//        //储罐维护修正系数 1代表是，0代表否，是否按照要求维护
//        if($isMaintainAsRequired==1){
//            $fAM=1;
//        }else{
//            $fAM=5;
//        }
//        switch($tankFoundationSettlement){
//            case 1: $fSM=2;break;
//            case 2: $fSM=1;break;
//            case 3: $fSM=1.5;break;
//            case 4: $fSM=1;break;
//            default: $fSM=1; break;
//        }
//        $reductionDamageFactor=$reductionDamageFactor*$fWD*$fAM*$fSM;
//        return $reductionDamageFactor;
//
////        减薄次因子的计算还差安全系数的确定和在线监测系统系数的确定
//    }



//------------------------------SCC应力腐蚀开裂损伤因子--------------------------------------------------------------------

//    1、碱开裂  2、胺开裂  3、硫化物应力腐蚀开裂（SSCC） 4、碳酸盐腐蚀开裂  5、连多硫酸开裂（PTA）
//    6、氯化物应力腐蚀开裂（CISCC） 7、氢应力开裂（HSC-HF、HIC/SOHIC_HF）
//    function SCCDamageFactor(
//        $operatingTemp,              //操作温度
//        $designTemp,                 //运行温度
//        $riskCalPara,                //风险计算相关其他参数
//        $SCCMechanismId,             //SCC损伤机理
//        $checkTime,                  //检验次数
//        $checkValidity,              //检验有效性
//        $severityPara                //计算外部损伤因子的时候引用是不需要计算敏感性高低，直接输入
//    ){
//
//// ----------------------------确定最大严重程度指数---------------------------
////        根据标准22610.4 表D.3
//
//
//        $isMediumWater          =  $riskCalPara["isMediumWater"];         //是否介质含水
//        $SCCWaterH2S            =  $riskCalPara["SCCWaterH2S"];           //水中的H2S值
//        $SCCWaterpH             =  $riskCalPara["SCCWaterpH"];            //水中PH值
//        $isHeatTreatAfterWeld   =  $riskCalPara["isHeatTreatAfterWeld"];  //是否焊后热处理
//        $SCCBHardness           =  $riskCalPara["SCCBHardness"];          //最大布氏硬度
//        $ClConcentration        =  $riskCalPara["ClConcentration"];       //水中cl离子含量
//
//        $isHeatTracing          =  $riskCalPara["isHeatTracing"];          //是否伴热
//        $NaOHConcentration      =  $riskCalPara["SCCNaOHConcentration"];   //NAOH浓度
//        $isSteamBlowing         =  $riskCalPara["isSteamBlowing"];         //是否蒸汽吹扫
//        $isStressRelief         =  $riskCalPara["isStressRelief"];         //是否进行应力消除
//        $SCCHeatHistory         =  $riskCalPara["SCCHeatHistory"];         //热历史
//        $SCCisShutdownProtect   =  $riskCalPara["SCCisShutdownProtect"];   //是否有停机保护
//        $surrounding            =  $riskCalPara["SCCSurroundingsMedium"];  //环境含有物
//        $SCCSteelSulfur         =  $riskCalPara["SCCSteelSulfur"];         //钢板中硫含量
//        $SCCWaterCarbonateConcentration  =  $riskCalPara["SCCWaterCarbonateConcentration"];//碳酸盐浓度
//
//
//        $SeverityTable=array(
//            array(1,1,1,1,1,1,1),//敏感性为无
//            array(50,10,10,1,1,20,20),//敏感性为低
//            array(500,100,100,10,10,500,500),//敏感性为中
//            array(5000,1000,1000,1,1,5000,5000)//敏感性为高
//        );
//
//        switch($SCCMechanismId){
//            case 0:
//                //已知严重程度指数
//                $severity=$severityPara;
//                break;
//            case 1:
////----------------------------------------进行碱开裂敏感性高低的筛选--------------------------------------
//
//               //涉及的参数有：
//               //1、NaOH的浓度，
//               //2、是否进行应力消除，
//               //3、操作运行温度，
//               //4、是否蒸汽吹扫，
//               //5、是否伴热
//                if($isStressRelief==1){
////                    敏感性无为0.依次为低、中、高，对应1/2/3
//                    $sensitive=0;
//                }else{
//                    if(78-0.6*$NaOHConcentration<$operatingTemp){
////                       NaOH浓度是否小于5%
//                        if($NaOHConcentration<0.05){
////                           是否伴热
//                            if($isHeatTracing==1){
//                                $sensitive=2;
//                            }else{
////                               是否蒸汽吹扫
//                                if($isSteamBlowing==1){
//                                    $sensitive=1;
//                                }else{
//                                    $sensitive=0;
//                                }
//                            }
//                        }else{
////                           是否伴热
//                            if($isHeatTracing==1){
//                                $sensitive=3;
//                            }else{
////                               是否蒸汽吹扫
//                                if($isSteamBlowing==1){
//                                    $sensitive=2;
//                                }else{
//                                    $sensitive=0;
//                                }
//                            }
//                        }
//                    }else{
//                        if($NaOHConcentration<0.05){
//                            $sensitive=2;
//                        }else{
//                            $sensitive=3;
//                        }
//                    }
//                }
//                $severity=$SeverityTable[$sensitive][0];
//                break;
//            case 2:
////-----------------------------------胺开裂应力腐蚀开裂敏感性筛选-------------------------------------------------
////                涉及的参数
////                1、胺的类型
////                2、胺液的成分 1代表新鲜胺未吸收H2S或CO2  2代表贫胺含低浓度H2S或CO2  3代表富胺含有高浓度H2S或CO2
////                3、最高工艺温度
////                4、是否伴热
////                5、蒸汽吹扫
////                6、是否消除应力
////                是否应力消除
//                if($isStressRelief==1){
////                    敏感性无为0.依次为高、中、低，对应1/2/3
//                    $sensitive=0;
//                }else{
////                    环境参数，贫胺、MEA或DIPA，DEA
//                    if($surrounding=='贫胺'){
//                        if(($surrounding=='MEA')|| ($surrounding=='DIPA')){
//                            if($operatingTemp>82){
//                                $sensitive=3;
//                            }else{
//                                if($operatingTemp > 32 && $operatingTemp < 82){
//                                    $sensitive=2;
//                                }else{
////                                      是否伴热
//                                    if($isHeatTracing==1){
//                                        $sensitive=2;
//                                    }else{
//                                        if($isSteamBlowing=0){
//                                            $sensitive=2;
//                                        }else{
//                                            $sensitive=1;
//                                        }
//                                    }
//                                }
//                            }
//                        }else{
//                            if($surrounding=='DEA'){
//                                if($operatingTemp>82){
//                                    $sensitive=2;
//                                }else{
//                                    if($operatingTemp > 60 && $operatingTemp < 82){
//                                        $sensitive=1;
//                                    }else{
//                                        if($isHeatTracing==1){
//                                            $sensitive=1;
//                                        }else{
//                                            if($isSteamBlowing=1){
//                                                $sensitive=1;
//                                            }else{
//                                                $sensitive=0;
//                                            }
//                                        }
//                                    }
//                                }
//                            }else{
//                                if($operatingTemp>82){
//                                    $sensitive=1;
//                                }else{
//                                    if($isHeatTracing==1){
//                                        $sensitive=1;
//                                    }else{
//                                        if($isSteamBlowing=1){
//                                            $sensitive=1;
//                                        }else{
//                                            $sensitive=0;
//                                        }
//                                    }
//                                }
//                            }
//                        }
//                    }else{
//                        $sensitive=0;
//                    }
//
//                }
//                $severity=$SeverityTable[$sensitive][1];
//                break;
//            case 3:
////-------------------------------------------硫化物应力腐蚀开裂（SSCC）----------------------------------------------------
////                涉及的参数：
////                1、是否存在水
////                2、水中的H2S含量
////                3、水中的pH值
////                4、是否存在氰化物
////                5、最大布氏硬度
////                6、是否焊后处理
//                if($isMediumWater==1){
////                    水中的H2S含量横坐标索引
//                    switch($SCCWaterH2S){
//                        case $SCCWaterH2S<0.00005 :
//                            $waterH2SConcentrationIndex=0;
//                            break;
//                        case $SCCWaterH2S>=0.00005 && $SCCWaterH2S < 0.001 :
//                            $waterH2SConcentrationIndex=1;
//                            break;
//                        case $SCCWaterH2S >=0.001 && $SCCWaterH2S < 0.01 :
//                            $waterH2SConcentrationIndex=2;
//                            break;
//                        case $SCCWaterH2S >= 0.01 :
//                            $waterH2SConcentrationIndex=3;
//                            break;
//                    }
////                    水中的PH值纵坐标索引
//                    switch($SCCWaterpH){
//                        case $SCCWaterpH<5.5 :
//                            $SCCWaterpHIndex=0;
//                            break;
//                        case $SCCWaterpH>=5.5 && $SCCWaterpH < 7.5 :
//                            $SCCWaterpHIndex=1;
//                            break;
//                        case $SCCWaterpH >=7.5 && $SCCWaterpH < 8.3 :
//                            $SCCWaterpHIndex=2;
//                            break;
//                        case $SCCWaterpH >=8.3 && $SCCWaterpH < 9.0 :
//                            $SCCWaterpHIndex=3;
//                            break;
//                        case $SCCWaterpH >= 9.0 :
//                            $SCCWaterpHIndex=4;
//                            break;
//                    }
//                    //环境苛刻度的标准表格 表22610.4 表D.9
//                    $environmentalSeverityTable=array(
////                        1 代表低  2 代表中  3 代表高
//                        array(1,2,3,3),
//                        array(1,1,1,2),
//                        array(1,2,2,2),
//                        array(1,2,2,3),
//                        array(1,2,3,3)
//                    );
//                    $environmentalSeverity=$environmentalSeverityTable[$SCCWaterpHIndex][$waterH2SConcentrationIndex];
//                    $environmentalSeverity=$environmentalSeverity*1-1;
////                    sscc敏感性标准表格的 表22610.4 表D.10
//                    $sensitiveTable=array(
//                        array(2,1,1,1,0,0),
//                        array(3,2,2,1,1,1),
//                        array(3,3,3,2,2,1)
//                    );
//                    if($isHeatTreatAfterWeld==1){
//                        switch($SCCBHardness){
//                            case $SCCBHardness<200:
//                                $SCCBHardnessIndex=0;
//                                break;
//                            case $SCCBHardness >=200 && $SCCBHardness < 237 :
//                                $SCCBHardnessIndex=1;
//                                break;
//                            case $SCCBHardness >= 237 :
//                                $SCCBHardnessIndex=2;
//                                break;
//                        }
//                    }elseif($isHeatTreatAfterWeld==0){
//                        switch($SCCBHardness){
//                            case $SCCBHardness<200:
//                                $SCCBHardnessIndex=3;
//                                break;
//                            case $SCCBHardness >=200 && $SCCBHardness < 237 :
//                                $SCCBHardnessIndex=4;
//                                break;
//                            case $SCCBHardness >= 237 :
//                                $SCCBHardnessIndex=5;
//                                break;
//                        }
//
//                    }
////                    敏感度1表示低，2表示中，3表示高
//                    $sensitive=$sensitiveTable[$environmentalSeverity][$SCCBHardnessIndex];
//                }else{
//                    $sensitive=0;
//                }
//
//                $sensitiveSSCC=$sensitive;
////-----------------------------------------湿硫化氢环境下氢致开裂和应力导向氢致开裂(HIC/SOHIC-H2S)---------------------------------------------
////               涉及参数：
////                1、是否存在水
////                2、水中是否存在H2S
////                3、水中pH值
////                4、是否有氰化物
////                5、钢板中的硫化物
////                6、钢产品形式  1、轧制钢板焊接 /2、无缝钢管制造
//
//                if($isMediumWater==1){
////                   水中的H2S含量横坐标索引
//                    switch($SCCWaterH2S){
//                        case $SCCWaterH2S<0.00005 :
//                            $waterH2SConcentrationIndex=0;
//                            break;
//                        case $SCCWaterH2S>=0.00005 && $SCCWaterH2S < 0.001 :
//                            $waterH2SConcentrationIndex=1;
//                            break;
//                        case $SCCWaterH2S >=0.001 && $SCCWaterH2S < 0.01 :
//                            $waterH2SConcentrationIndex=2;
//                            break;
//                        case $SCCWaterH2S >= 0.01 :
//                            $waterH2SConcentrationIndex=3;
//                            break;
//                    }
////                    水中的PH值纵坐标索引
//                    switch($SCCWaterpH){
//                        case $SCCWaterpH<5.5 :
//                            $SCCWaterpHIndex=0;
//                            break;
//                        case $SCCWaterpH>=5.5 && $SCCWaterpH < 7.5 :
//                            $SCCWaterpHIndex=1;
//                            break;
//                        case $SCCWaterpH >=7.5 && $SCCWaterpH < 8.3 :
//                            $SCCWaterpHIndex=2;
//                            break;
//                        case $SCCWaterpH >=8.3 && $SCCWaterpH < 9.0 :
//                            $SCCWaterpHIndex=3;
//                            break;
//                        case $SCCWaterpH >= 9.0 :
//                            $SCCWaterpHIndex=4;
//                            break;
//                    }
////                   环境苛刻度的标准表格 根据22610.4 表D.12
//                    $environmentalSeverityTable=array(
////                        1 代表低  2 代表中  3 代表高
//                        array(1,2,3,3),
//                        array(1,1,1,2),
//                        array(1,2,2,2),
//                        array(1,2,2,3),
//                        array(1,2,3,3)
//                    );
////                   求出环境苛刻度
//                    $environmentalSeverity=$environmentalSeverityTable[$SCCWaterpHIndex][$waterH2SConcentrationIndex];
////                   纵坐标环境苛刻度索引
//                    $environmentalSeverity=$environmentalSeverity*1-1;
////                   横坐标硫含量和是否焊后热处理索引
//                    if($isHeatTreatAfterWeld==1){
////                       钢板中的硫含量 (已经焊后热处理的)
//                        switch($SCCSteelSulfur){
//                            case $SCCSteelSulfur>0.0001:
//                                $SCCSteelSulfurIndex=1;
//                                break;
//                            case $SCCSteelSulfur>=0.00002 && $SCCSteelSulfur<=0.0001:
//                                $SCCSteelSulfurIndex=3;
//                                break;
//                            case $SCCSteelSulfur<0.00002:
//                                $SCCSteelSulfurIndex=5;
//                                break;
//                        }
//                    }elseif($isHeatTreatAfterWeld==0){
//                        switch($SCCSteelSulfur){
//                            case $SCCSteelSulfur>0.0001:
//                                $SCCSteelSulfurIndex=0;
//                                break;
//                            case $SCCSteelSulfur>=0.00002 && $SCCSteelSulfur<=0.0001:
//                                $SCCSteelSulfurIndex=2;
//                                break;
//                            case $SCCSteelSulfur<0.00002:
//                                $SCCSteelSulfurIndex=4;
//                                break;
//                        }
//
//                    }
////                    sscc敏感性标准表格的 表22610.4 表D.13
//                    $sensitiveTable=array(
//                        array(2,1,1,1,0,0),
//                        array(3,2,2,1,1,1),
//                        array(3,3,3,2,2,1),
//                    );
//                    $sensitive=$sensitiveTable[$environmentalSeverity][$SCCSteelSulfurIndex];
//                }else{
//                    $sensitive=0;
//                }
//                $sensitiveHIC=$sensitive;
//                $sensitive=max($sensitiveSSCC,$sensitiveHIC);
//                //                    最终输出的结果是严重程度指数
//                $severity=$SeverityTable[$sensitive][3];
//                break;
//            case 4:
////------------------------------------碳酸盐腐蚀开裂---------------------------------------
//                if($isStressRelief==1){
//                    $sensitive=0;
//                }elseif($isStressRelief==0) {
//                    if ($isMediumWater == 1) {
//                        if ($SCCWaterH2S > 0.00005) {
//                            //碳酸盐浓度
//                            switch ($SCCWaterCarbonateConcentration) {
//                                case $SCCWaterCarbonateConcentration < 0.0001 :
//                                    $SCCWaterCarbonateConcentrationIndex = 0;
//                                    break;
//                                case $SCCWaterCarbonateConcentration >= 0.0001 && $SCCWaterCarbonateConcentration < 0.0005:
//                                    $SCCWaterCarbonateConcentrationIndex = 1;
//                                    break;
//                                case $SCCWaterCarbonateConcentration >= 0.0005 && $SCCWaterCarbonateConcentration < 0.001:
//                                    $SCCWaterCarbonateConcentrationIndex = 2;
//                                    break;
//                                case $SCCWaterCarbonateConcentration >= 0.001 :
//                                    $SCCWaterCarbonateConcentrationIndex = 3;
//                                    break;
//                            }
//                            //水中PH值
//                            switch ($SCCWaterpH) {
//                                case $SCCWaterpH >= 7.8 && $SCCWaterpH < 8.3:
//                                    $SCCWaterpHIndex = 0;
//                                    break;
//                                case $SCCWaterpH >= 8.3 && $SCCWaterpH < 8.9:
//                                    $SCCWaterpHIndex = 1;
//                                    break;
//                                case $SCCWaterpH < 8.9:
//                                    $SCCWaterpHIndex = 2;
//                                    break;
//                            }
//
////                            碳酸盐敏感性标准表格，22610.4 表D.15
//                            $sensitiveCarbonateTable = array(
//                                array(1, 1, 1, 2),
//                                array(1, 1, 2, 3),
//                                array(1, 2, 3, 3)
//                            );
//                            $sensitive = $sensitiveCarbonateTable[$SCCWaterpHIndex][$SCCWaterCarbonateConcentrationIndex];
//                        } else {
//                            $sensitive = 0;
//                        }
//                    } else {
//                        $sensitive = 0;
//                    }
//                }
//                $severity = $SeverityTable[$sensitive][2];
//                break;
//            case 5:
//// ------------------------------------------------连多硫酸开裂（PTA）-------------------------------------------------------------------
////                涉及参数：
////                1、材料类别
////                2、热历史  1代表固溶退火 2、焊前稳定处理  3、焊后热处理
////                3、最高运行温度
////                4、是否采用停工保护
////                最高运行温度采用设计温度
//                if($designTemp<427){
//                    switch($SCCHeatHistory){
//                        case 1:
//                            $sensitive=2;
//                            break;
//                        case 2:
//                            $sensitive=1;
//                            break;
//                        case 3:
//                            $sensitive=1;
//                            break;
//                        default:
//                            $sensitive=1;
//                            break;
//                    }
//                }else{
//                    switch($SCCHeatHistory){
//                        case 1:
//                            $sensitive=1;
//                            break;
//                        case 2:
//                            $sensitive=1;
//                            break;
//                        case 3:
//                            $sensitive=1;
//                            break;
//                        default:
//                            $sensitive=1;
//                            break;
//                    }
//                }
//                if($SCCisShutdownProtect==1){
//                    $sensitive=$sensitive*1-1;
//                }
//                $severity=$SeverityTable[$sensitive][6];
//                break;
//// ------------------------------------------------氯化物应力腐蚀开裂（CISCC）-------------------------------------------------------------------
//            case 6:
////                涉及参数：
////                1、工艺水的CL-浓度
////                2、运行温度
////                3、工艺水的Ph值
//                switch($ClConcentration){
//                    case $ClConcentration<=10 && $ClConcentration>1:
//                        $Xindex=0;
//                        break;
//                    case $ClConcentration<=100 && $ClConcentration>10:
//                        $Xindex=1;
//                        break;
//                    case $ClConcentration<=1000 && $ClConcentration>100:
//                        $Xindex=2;
//                        break;
//                    case $ClConcentration>1000:
//                        $Xindex=3;
//                        break;
//                    default:
//                        $Xindex=0;
//                        break;
//                }
//                if($SCCWaterpH<=10){
//                    switch($designTemp){
//                        case $designTemp<=66 && $designTemp>38:
//                            $Yindex=0;
//                            break;
//                        case $designTemp<=93 && $designTemp>66:
//                            $Yindex=1;
//                            break;
//                        case $designTemp<=149 && $designTemp>94:
//                            $Yindex=2;
//                            break;
//                        default:
//                            $Yindex=0;
//                            break;
//                    }
//                    $table=array(
//                        array(1,2,2,3),
//                        array(2,2,3,3),
//                        array(2,3,3,3),
//                    );
//                    $sensitive=$table[$Xindex][$Yindex];
//                }else{
//                    switch($designTemp){
//                        case $designTemp<=93:
//                            $Yindex=0;
//                            break;
//                        case $designTemp<=149 && $designTemp>93:
//                            $Yindex=1;
//                            break;
//                        default:
//                            $Yindex=0;
//                            break;
//                    }
//                    $table=array(
//                        array(1,1,1,1),
//                        array(2,1,1,2),
//
//                    );
//                    $sensitive=$table[$Xindex][$Yindex];
//                }
//                $severity=$SeverityTable[$sensitive][5];
//                break;
//// ------------------------------------------------氢应力腐蚀开裂（HSC-HF、HIC/SOHIC-HF）-------------------------------------------------------------------
//            case 7:
//
//                $sensitive=1;
//                $severity=$SeverityTable[$sensitive][4];
//                break;
//        }
////--------------------------------确定SCC应力腐蚀开裂因子-------------------------------------
////        应力腐蚀开裂因子根据标准22610.4 表D.5
//        $SCCTable=array(
//            array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
//            array(10,8,3,1,1,6,2,1,1,4,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1),
//            array(50,40,17,5,3,30,10,2,1,20,5,1,1,10,1,1,1,5,1,1,1,1,1,1,1),
//            array(100,80,33,10,5,60,20,4,1,40,10,2,1,20,2,1,1,10,2,1,1,5,1,1,1),
//            array(500,400,170,50,25,300,100,20,5,200,50,8,1,100,12,2,1,50,10,1,1,25,5,1,1),
//            array(1000,800,330,100,50,600,200,40,10,400,100,16,2,200,50,5,1,100,25,2,1,50,10,1,1),
//            array(5000,4000,1670,500,250,3000,1000,250,50,2000,500,80,10,1000,250,25,2,500,125,5,1,250,50,2,1)
//        );
//        $SCCTableYIndex=array(1,10,50,100,500,1000,5000);
//        $severityIndex = array_keys($SCCTableYIndex, $severity);
//        $checkConditionIndexTable = array(0, "1A", "1B", "1C", "1D", "2A", "2B", "2C", "2D", "3A", "3B", "3C", "3D", "4A", "4B", "4C", "4D", "5A", "5B", "5C", "5D", "6A", "6B", "6C", "6D");
//        switch($checkTime){
//			case $checkTime==0 :
//			   $checkCondition = 0;
//			   break;
//			case $checkTime>0 && $checkTime <=6:
//			     $checkCondition = $checkTime . $checkValidity;
//				 break;
//			case $checkTime>6 :
//			   $checkCondition = '6' . $checkValidity;
//				 break;
//			default:
//			$checkCondition = '6' . $checkValidity;
//				 break;
//		}
//        $checkConditionIndex = array_keys($checkConditionIndexTable, $checkCondition);
//        $SCCFactor=$SCCTable[$severityIndex[0]][$checkConditionIndex[0]];
//        return $SCCFactor;
//    }


//--------------------------------------外部损伤因子计算模块--------------------------------------------------------------------
//    function outDamageFactor(
//        $operatingTemp,               //操作温度
//        $designTemp,                  //设计温度
//        $plantPart,                   //储罐部位，壁板还是底板
//
//        $thickness,                   //底板或壁板原始厚度
//
//        $riskCalPara,                 //风险计算相关其他参数
//
//        $outDamageMechanismId,        //外部损伤机理
//        $useDate,                     //使用时间
//        $isKeepWarm,                  //是否有保温层
//        $KeepWarmStatus,              //保温层质量
//        $coatingStatus,               //涂层质量
//        $coatingUseDate,              //涂层使用使用时间
//        $LinkType,                    //链接形式
//        $SCCMechanismId,              //SCC损伤机理
//        $checkTime,                   //检验次数
//        $checkValidity,               //检验有效性
//
//        $geographyEnvironment,        //设备环境
//        $isMaintainAsRequired,        //是否按照要求进行维护
//        $tankFoundationSettlement     //基础沉降评价
//
//    ){
//
//        $pipeComplexity           =$riskCalPara['pipeComplexity'];                     //管道复杂度
//        $isKeepWarmHasCL          =$riskCalPara['isKeepWarmHasCL'];                    //是否保温层含氯
//        $isPipeSupport            =$riskCalPara['outDamageisPipeSupport'];             //是否管支架补偿
//        $isInterfaceCompensation  =$riskCalPara['outDamageisInterfaceCompensation'];   //是否界面补偿
//
//        switch($outDamageMechanismId){
////------------------------------------------------碳钢和低合金钢的外部腐蚀机理外部损伤因子-----------------------------------------------------
//            case 1: //1代表"碳钢和低合金钢的外部损伤"
////                纵坐标索引（运行温度）
//                switch($operatingTemp){
//                    case $operatingTemp<-12 :
//                        $outCarbonSteelCorrosionSpeedTableYIndex=0;
//                        break;
//                    case $operatingTemp>=-12 && $operatingTemp < 15 :
//                        $outCarbonSteelCorrosionSpeedTableYIndex=1;
//                        break;
//                    case $operatingTemp >= 15 && $operatingTemp < 49 :
//                        $outCarbonSteelCorrosionSpeedTableYIndex=2;
//                        break;
//                    case $operatingTemp >= 49 && $operatingTemp < 93 :
//                        $outCarbonSteelCorrosionSpeedTableYIndex=3;
//                        break;
//                    case $operatingTemp >= 94 && $operatingTemp < 121 :
//                        $outCarbonSteelCorrosionSpeedTableYIndex=4;
//                        break;
//                    case $operatingTemp >= 121 :
//                        $outCarbonSteelCorrosionSpeedTableYIndex=5;
//                        break;
//                }
////               横坐标的索引（环境因素）
//                switch ($geographyEnvironment){
//                    case 1: //1代表'热带/海上'
//                        $outCarbonSteelCorrosionSpeedTableXIndex=0;
//                        break;
//                    case 2://2代表'温带/温和'
//                        $outCarbonSteelCorrosionSpeedTableXIndex=1;
//                        break;
//                    case 3://3代表'干旱/沙漠'
//                        $outCarbonSteelCorrosionSpeedTableXIndex=2;
//                        break;
//                    default:
//                        $outCarbonSteelCorrosionSpeedTableXIndex=1;
//                        break;
//                }
//
////                碳钢和低合金钢的外部腐蚀速率表格，按照22610.4 表I.3
//                $outCarbonSteelCorrosionSpeedTable=array(
//                    array(0,0,0),
//                    array(0.13,0.076,0.025),
//                    array(0.05,0.025,0),
//                    array(0.13,0.05,0.025),
//                    array(0.025,0,0),
//                    array(0,0,0),
//                );
//                $outCarbonSteelCorrosionSpeed=$outCarbonSteelCorrosionSpeedTable[$outCarbonSteelCorrosionSpeedTableYIndex][$outCarbonSteelCorrosionSpeedTableXIndex];
////                根据涂层质量的调整
//                if($coatingStatus==0) {
//                    switch ($coatingStatus) {
//                        case 1:
//                            break;
//                        case 2:
//                            $useDate = $useDate + 5;
//                            break;
//                        case 3:
//                            $useDate = $useDate + 15;
//                            break;
//                        default:
//                            break;
//                    }
//                }
////                根据管支架补偿的调整
//
//                if($isPipeSupport==1){
//                    $outCarbonSteelCorrosionSpeed=$outCarbonSteelCorrosionSpeed*2;
//                }
////                根据界面补偿调整
//                if($isInterfaceCompensation==1){
//                    $outCarbonSteelCorrosionSpeed=$outCarbonSteelCorrosionSpeed*2;
//                }
////                外部损伤因子的实质是减薄损伤因子
//              $outDamageFactor=$this->reductionDamageFactor(
//                  $plantPart,
//                  $outCarbonSteelCorrosionSpeed,
//                  $useDate,
//                  $thickness,
//                  $checkTime,
//                  $checkValidity,
//                  $LinkType,
//                  $isMaintainAsRequired,
//                  $tankFoundationSettlement
//              );
//                break;
////  ----------------------------------------------------碳钢和低合金钢的CUI腐蚀-------------------------------------------------------
//            case 2: //2代表"碳钢和低合金钢的CUI腐蚀"
//                //                纵坐标索引（运行温度）
//                switch($operatingTemp){
//                    case $operatingTemp<-12 :
//                        $outCarbonSteelCUICorrosionSpeedTableYIndex=0;
//                        break;
//                    case $operatingTemp>=-12 && $operatingTemp < 15 :
//                        $outCarbonSteelCUICorrosionSpeedTableYIndex=1;
//                        break;
//                    case $operatingTemp >= 15 && $operatingTemp < 49 :
//                        $outCarbonSteelCUICorrosionSpeedTableYIndex=2;
//                        break;
//                    case $operatingTemp >= 49 && $operatingTemp < 93 :
//                        $outCarbonSteelCUICorrosionSpeedTableYIndex=3;
//                        break;
//                    case $operatingTemp >= 94 && $operatingTemp < 121 :
//                        $outCarbonSteelCUICorrosionSpeedTableYIndex=4;
//                        break;
//                    case $operatingTemp >= 121 :
//                        $outCarbonSteelCUICorrosionSpeedTableYIndex=5;
//                        break;
//                }
////               横坐标的索引（环境因素）
//                switch ($geographyEnvironment){
//                    case 1:  //1代表'热带/海上'
//                        $outCarbonSteelCUICorrosionSpeedTableXIndex=0;
//                        break;
//                    case 2: //2代表'温带/温和'
//                        $outCarbonSteelCUICorrosionSpeedTableXIndex=1;
//                        break;
//                    case 3: //3代表'干旱/沙漠'
//                        $outCarbonSteelCUICorrosionSpeedTableXIndex=2;
//                        break;
//                }
//
////                碳钢和低合金钢的外部腐蚀速率表格，按照22610.4 表I.3
//                $outCarbonSteelCUICorrosionSpeedTable=array(
//                    array(0,0,0),//小于-12
//                    array(0.05,0.03,0.01),
//                    array(0.02,0.01,0),
//                    array(0.10,0.05,0.02),
//                    array(0.02,0.01,0),
//                    array(0,0,0),
//                );
//                $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeedTable[$outCarbonSteelCUICorrosionSpeedTableYIndex][$outCarbonSteelCUICorrosionSpeedTableXIndex];
////                根据涂层质量的调整
//                if($coatingStatus==0) {
//                    switch ($coatingStatus) {
//                        case 1:
//                            $useDate = $useDate + 0;
//                            break;
//                        case 2:
//                            $useDate = $useDate + 5;
//                            break;
//                        case 3:
//                            $useDate = $useDate + 15;
//                            break;
//                    }
//                }
////                根据管道复杂度调整
//                switch($pipeComplexity){
//                    case 1://低于平均水平
//                        $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*0.75;
//                        break;
//                    case 2://平均水平
//                        $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*1.0;
//                        break;
//                    case 3://高于平均水平
//                        $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*1.25;
//                        break;
//                    default:
//                        $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*1.0;
//                        break;
//                }
////                根据保温层状况调整
//                switch($KeepWarmStatus){
//                    case 1://低于平均水平
//                        $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*0.75;
//                        break;
//                    case 2://平均水平
//                        $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*1.0;
//                        break;
//                    case 3://高于平均水平
//                        $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*1.25;
//                        break;
//                    default:
//                        $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*1.0;
//                        break;
//                }
////                根据管支架补偿的调整
//                $isPipeSupport=0;
//                if($isPipeSupport==1){
//                    $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*2;
//                }
////                根据界面补偿调整
//                if($isInterfaceCompensation==1){
//                    $outCarbonSteelCUICorrosionSpeed=$outCarbonSteelCUICorrosionSpeed*2;
//                }
////                外部损伤因子的实质是减薄损伤因子
//                $outDamageFactor=$this->reductionDamageFactor(
//                  $plantPart,
//                  $outCarbonSteelCUICorrosionSpeed,
//                  $useDate,
//                  $thickness,
//                  $checkTime,
//                  $checkValidity,
//                  $LinkType,
//                  $isMaintainAsRequired,
//                  $tankFoundationSettlement
//
//                );
//                break;
//
//// -------------------------------------------奥氏体不锈钢的外部SCC--------------------------------------------
//            case 3://3代表"奥氏体不锈钢的外部SCC"
////                纵坐标索引（运行温度）
//                switch($operatingTemp){
//                    case $operatingTemp<60 :
//                        $outAusteniticCorrosionSpeedTableYIndex=0;
//                        break;
//                    case $operatingTemp>=60 && $operatingTemp < 93 :
//                        $outAusteniticCorrosionSpeedTableYIndex=1;
//                        break;
//                    case $operatingTemp >= 93 && $operatingTemp < 149 :
//                        $outAusteniticCorrosionSpeedTableYIndex=2;
//                        break;
//                    case $operatingTemp >= 149 :
//                        $outAusteniticCorrosionSpeedTableYIndex=3;
//                        break;
//                    default:
//                        $outAusteniticCorrosionSpeedTableYIndex=2;
//                        break;
//                }
////               横坐标的索引（环境因素）
//                switch ($geographyEnvironment){
//                    case 1: //1代表'热带/海上'
//                        $outAusteniticCorrosionSpeedTableXIndex=0;
//                        break;
//                    case 2://2代表'温带/温和'
//                        $outAusteniticCorrosionSpeedTableXIndex=1;
//                        break;
//                    case 3://3代表'干旱/沙漠'
//                        $outAusteniticCorrosionSpeedTableXIndex=2;
//                        break;
//                }
//
////                奥氏体不锈钢的外部SCC表格，按照22610.4 表I.17  0代表无 1 代表低 2 代表中  3 代表高
//                $outAusteniticSensitiveTable=array(
//                    array(0,0,0),//小于60
//                    array(2,1,0),
//                    array(1,1,0),
//                    array(0,0,0)
//                );
//                $outAusteniticSensitive=$outAusteniticSensitiveTable[$outAusteniticCorrosionSpeedTableYIndex][ $outAusteniticCorrosionSpeedTableXIndex];
//                switch($outAusteniticSensitive){
//                    case 0:
//                        $outDamageFactor=0;
//                    case 1;
//                        $outAusteniticSeverity=1;
//                        break;
//                    case 2:
//                        $outAusteniticSeverity=10;
//                        break;
//                    case 3:
//                        $outAusteniticSeverity=50;
//                        break;
//                    default:
//                        $outAusteniticSeverity=1;
//                        break;
//                }
////                根据涂层质量调整涂层涂装日期
//                if($coatingStatus==1){
//                    switch($coatingStatus){
//                        case 1:
//                            $coatingUseDate=$coatingUseDate+0;
//                            break;
//                        case 2:
//                            $coatingUseDate=$coatingUseDate+5;
//                            break;
//                        case 3:
//                            $coatingUseDate=$coatingUseDate+15;
//                            break;
//                        default:
//                            $coatingUseDate=$coatingUseDate+0;
//                            break;
//                    }
//                }
//                if($outAusteniticSensitive!==0){
//                    $outDamageFactor=$this->SCCDamageFactor(
//                        $operatingTemp,
//                        $designTemp,
//                        $plantPart,
//                        $riskCalPara,
//                        $SCCMechanismId,
//                        $checkTime,
//                        $checkValidity,
//                        $outAusteniticSeverity
//                    );
//                }
//                break;
//            case 4:
////              4代表"奥氏体不锈钢CUI外部SCC"
////                纵坐标索引（运行温度）
//                switch($operatingTemp){
//                    case $operatingTemp<60 :
//                        $outAusteniticCUISensitiveTableYIndex=0;
//                        break;
//                    case $operatingTemp>=60 && $operatingTemp < 93 :
//                        $outAusteniticCUISensitiveTableYIndex=1;
//                        break;
//                    case $operatingTemp >= 93 && $operatingTemp < 149 :
//                        $outAusteniticCUISensitiveTableYIndex=2;
//                        break;
//                    case $operatingTemp >= 149 :
//                        $outAusteniticCUISensitiveTableYIndex=3;
//                        break;
//                    default:
//                        $outAusteniticCUISensitiveTableYIndex=2;
//                        break;
//                }
////               横坐标的索引（环境因素）
//                switch ($geographyEnvironment){
//                    case 1: //1代表'热带/海上'
//                        $outAusteniticCUISensitiveTableXIndex=0;
//                        break;
//                    case 2://2代表'温带/温和'
//                        $outAusteniticCUISensitiveTableXIndex=1;
//                        break;
//                    case 3://3代表'干旱/沙漠'
//                        $outAusteniticCUISensitiveTableXIndex=2;
//                        break;
//                    default:
//                        $outAusteniticCUISensitiveTableXIndex=1;
//                        break;
//                }
////                奥氏体不锈钢的CUI外部SCC表格，按照22610.4 表I.17  0代表无 1 代表低 2 代表中  3 代表高
//                $outAusteniticCUISensitiveTable=array(
//                    array(0,0,0),//小于60
//                    array(3,2,1),
//                    array(2,1,0),
//                    array(0,0,0)
//                );
//                $outAusteniticSensitive=$outAusteniticCUISensitiveTable[$outAusteniticCUISensitiveTableYIndex][ $outAusteniticCUISensitiveTableXIndex];
////               根据涂层质量调整涂装时间
//                if($coatingStatus==1){
//                    switch($coatingStatus){
//                        case 1:
//                            $coatingUseDate=$coatingUseDate+0;
//                            break;
//                        case 2:
//                            $coatingUseDate=$coatingUseDate+5;
//                            break;
//                        case 3:
//                            $coatingUseDate=$coatingUseDate+15;
//                            break;
//                    }
//                }
//
//                if($coatingStatus==0) {
//                    switch ($coatingStatus) {
//                        case 1:
//                            $coatingUseDate = $coatingUseDate + 0;
//                            break;
//                        case 2:
//                            $coatingUseDate = $coatingUseDate + 5;
//                            break;
//                        case 3:
//                            $coatingUseDate = $coatingUseDate + 15;
//                            break;
//                    }
//                }
////                根据管道复杂度调整
//                switch($pipeComplexity){
//                    case 1://低于平均水平
//                        $outAusteniticSensitive=$outAusteniticSensitive-1;
//                        break;
//                    case 2://平均水平
//                        $outAusteniticSensitive=$outAusteniticSensitive+0;
//                        break;
//                    case 3://高于平均水平
//                        $outAusteniticSensitive=$outAusteniticSensitive+1;
//                        break;
//                    default:
//                        $outAusteniticSensitive=$outAusteniticSensitive+0;
//                        break;
//                }
////                根据保温层状况调整
//                if($isKeepWarm==1){
//                    switch($KeepWarmStatus){
//                        case 1://低于平均水平
//                            $outAusteniticSensitive=$outAusteniticSensitive-1;
//                            break;
//                        case 2://平均水平
//                            $outAusteniticSensitive=$outAusteniticSensitive+0;
//                            break;
//                        case 3://高于平均水平
//                            $outAusteniticSensitive=$outAusteniticSensitive+1;
//                            break;
//                        default:
//                            $outAusteniticSensitive=$outAusteniticSensitive+0;
//                            break;
//                    }
//                }
//                //                根据保温层含氯情况调整
//
//                if($isKeepWarmHasCL==0){
//                    $outAusteniticSensitive=$outAusteniticSensitive-1;
//                }
//                switch($outAusteniticSensitive){
//                    case 0:
//                        $outDamageFactor=0;
//                    case 1:
//                        $outAusteniticCUISeverity=1;
//                        break;
//                    case 2:
//                        $outAusteniticCUISeverity=10;
//                        break;
//                    case 3:
//                        $outAusteniticCUISeverity=50;
//                        break;
//                    default :
//                        $outAusteniticCUISeverity=1;
//                        break;
//                }
//                if($outAusteniticSensitive!==0) {
//                    $outDamageFactor = $this->SCCDamageFactor(
//                        $operatingTemp,
//                        $designTemp,
//                        $plantPart,
//                        $riskCalPara,
//                        $SCCMechanismId,
//                        $checkTime,
//                        $checkValidity,
//                        $outAusteniticCUISeverity
//                    );
//                }
//        }
//        return $outDamageFactor;
//    }


//-----------------------------------------------脆性断裂损伤因子----------------------------------------------------
//此处暂时忽略计算


//-------------------------------------------------损伤机理筛选  ------------------------------------------------------

    function filterMechanism()
    {
//        设备基本信息的相关参数
        $mediumpH             =  I('post.mediumpH','');;                         //介质pH值
        $operatingTemp        =  I('post.operateTemp','');;                      //设备操作温度
        $isMediumWater        =  I('post.isMediumWater','');;                    //介质是否含水
        $isKeepWarm           =  I('post.isKeepWarm','');;                       //壁板有没有保温层
        $materialType         =  I('post.materialType','');                      //scc壁板筛选材料类型
        $surroundingsMedium   =  I('post.surroundingsMedium','');                //scc筛选周围环境含有物
        $mediumReduction      =  I('post.mediumContain', '');                    //减薄损伤机理介质含有物筛选
//-------------------------------------------分割线------------------------------------------------
//        如果点击input按钮则默认ajax提交机理筛选，如果点击保存按钮则保存筛选结果
         //------------------------减薄损伤及机理的筛选--------------------------
        if($surroundingsMedium==2){
            $reductionMechanism    = "胺腐蚀";
            $reductionMechanismId  = 7;
        }else {
            switch ($mediumReduction) {
                case 1:
                    if ($isMediumWater == 1) {
                        if ($mediumpH < 7) {
                            $reductionMechanism = "盐酸腐蚀";
                            $reductionMechanismId = 1;
                        }else{
                            $reductionMechanism = "盐酸腐蚀";
                            $reductionMechanismId = 1;
                        }
                    }
                    break;
                case 2:
                    if ($operatingTemp > 204) {
                        $reductionMechanism = "高温硫化物/环烷酸腐蚀";
                        $reductionMechanismId = 2;
                    }
                    break;
                case 3:
                    if ($operatingTemp > 204) {
                        $reductionMechanism = "高温H2S/H2腐蚀";
                        $reductionMechanismId = 3;
                    }
                    break;
                case 4:
                    $reductionMechanism = "硫酸腐蚀H2SO2";
                    $reductionMechanismId = 4;
                    break;
                case 5:
                    $reductionMechanism = "氢氟酸HF腐蚀";
                    $reductionMechanismId = 5;
                    break;
                case 6:
                    $reductionMechanism = "酸性水腐蚀";
                    $reductionMechanismId = 6;
                    break;
                case 7:
                    $reductionMechanism    = "胺腐蚀";
                    $reductionMechanismId  = 7;
                    break;
            }
        }
//--------------------------------------SCC机理筛选的---------------------------------------------------------

//            $Data['wallSCCMaterialType']=$wallSCCMaterialType;
         //----------1、判断是否存在碱开裂损伤----------------------------------
            if($materialType==1||$materialType==2){
                if($surroundingsMedium==1){
                    $SCC='碱开裂';
                    $SCCId=1;
                }
            };
         //----------2、判断是否存在胺开裂损伤----------------------------------
            if($materialType==1||$materialType==2){
                if($surroundingsMedium==3){
                    $SCC='胺开裂';
                    $SCCId=2;
                }
            };
         //----------3、判断是否存在硫化物（SSCC）开裂损伤----------------------------------
            if($materialType==1||$materialType==2){
               if($surroundingsMedium==4){
                    $SCC='SSCC/HIC/SOHIC';
                   $SCCId=3;
                }
            }
         //----------4、判断是否存在碳酸盐开裂损伤----------------------------------
            if($materialType==1){
                if($surroundingsMedium==6){
                    $SCC='碳酸盐腐蚀开裂';
                    $SCCId=4;
                }
            }
         //----------5、判断是否存在连多酸（PTA）开裂损伤----------------------------------
            if($materialType==3||$materialType==4){
                if($surroundingsMedium==5){
                    $SCC='连多硫酸开裂（PTA）';
                    $SCCId=5;
                }
            }
         //----------6、判断是否存在氯化物应力腐蚀开裂损伤----------------------------------
            if($materialType==3){
                if($surroundingsMedium==7)
                    if($operatingTemp >38 && $operatingTemp<148){
                        $SCC='氯化物应力腐蚀开裂（CISCC）';
                        $SCCId=6;
                    }
                }
         //----------7、判断是否存在氢应力腐蚀开裂损伤----------------------------------
            if($materialType==1||$materialType==2){
                if($surroundingsMedium==8){
                    $SCC='氢应力开裂（HSC_HF、HIC/SOHIC-HF）';
                    $SCCId=7;
                }
            }
        if($SCC==""){
            $SCC="未发现应力腐蚀损伤";
            $SCCId=0;
        }

//--------------------------------------------外部损伤机理筛选------------------------------------------------------------
//四种外部损伤情况：1、碳钢和低合金钢的外部损伤
//                2、碳钢和低合金钢的CUI腐蚀
//                3、奥氏体不锈钢的外部SCC
//                4、奥氏体不锈钢CUI外部SCC
//---------------------------------外部损伤机理----------------------------------------------
            if($materialType==1||$materialType==2){
                if($operatingTemp > -12 && $operatingTemp < 121){
                    if($isKeepWarm==0){
                        $outDamage="碳钢和低合金钢的外部损伤";
                        $outDamageId=1;
                    }else{
                        $outDamage="碳钢和低合金钢的CUI腐蚀";
                        $outDamageId=2;
                    }
                }else{
                    $outDamage="未发现外部损伤";
                    $outDamageId=0;
                }
            }else{
                if($materialType==3){
                    if($operatingTemp > 38 && $operatingTemp < 149){
                        if($isKeepWarm==0){
                            $outDamage="奥氏体不锈钢的外部SCC";
                            $outDamageId=3;
                        }else{
                            $outDamage="奥氏体不锈钢CUI外部SCC";
                            $outDamageId=4;
                        }
                    }else{
                        $outDamage="未发现外部损伤";
                        $outDamageId=0;
                    }
                }else{
                    $outDamage="未发现外部损伤";
                    $outDamageId=0;
                }
            }

//--------------------------------------------输出损伤机理结果---------------------------------------------------------------
            $Data['reductionMechanism']    =  $reductionMechanism;
            $Data['reductionMechanismId']  =  $reductionMechanismId;
            $Data['SCC']                   =  $SCC;
            $Data['SCCId']                 =  $SCCId;
            $Data['outDamage']             =  $outDamage;
            $Data['outDamageId']           =  $outDamageId;
        $this->ajaxReturn($Data,"JSON");
    }


//    保存损伤机理的筛选结果和其他的补充参数
    public function saveMechanism(){
        $part=I("post.part","");
        $where['pid']=I("post.pid","");
        $mechanism=D("Riskcalpara");
        $count=$mechanism->where($where)->getField("id");
        $advancedOptionId=I("post.advancedOptionId","");
        if($advancedOptionId==1){
            $where['SCCWaterCarbonateConcentration']  =   I("post.SCCWaterCarbonateConcentration","");    //碳酸盐浓度、
            $where['SCCWaterpH']                      =   I("post.SCCWaterpH","");                        //介质pH值、
            $where['ClConcentration']                 =   I("post.ClConcentration","");                    //cl离子浓度、
            $where['SCCWaterH2S']                     =   I("post.SCCWaterH2S","");                        //硫化氢浓度、
            $where['SCCNaOHConcentration']            =   I("post.SCCNaOHConcentration","");               //NaOH浓度、
            $where['isStressRelief']                  =   I("post.isStressRelief","");                     //是否应力消除、
            $where['SCCisHeatTracing']                =   I("post.SCCisHeatTracing","");                   //是否伴热、
            $where['SCCisSteamBlowing']               =   I("post.SCCisSteamBlowing","");                  //是否蒸汽吹扫、
            $where['SCCBHardness']                    =   I("post.SCCBHardness","");                       //最大布氏硬度、
            $where['SCCSteelSulfur']                  =   I("post.SCCSteelSulfur","");                     //钢产品中硫含量、
            $where['SCCHeatHistory']                  =   I("post.SCCHeatHistory","");                     //热历史、
            $where['SCCisShutdownProtect']            =   I("post.SCCisShutdownProtect","");               //是否停车保护、
            $where['isKeepWarmHasCL']                 =   I("post.isKeepWarmHasCL","");                    //保温层是否含氯、
            $where['pipeComplexity']                  =   I("post.pipeComplexity","");                     //管道复杂度、
            $where['isMediumWater']                   =   I("post.isMediumWater","");                      //介质是否含水、
            $where['SCCSurroundingsMedium']           =   I("post.SCCSurroundingsMedium","");              //环境中含有物、
        }
        //壁板损伤机理筛选
        if($part==1){
            $where['wallThiningMechanism']=I("post.wallReductionMechRes","");
            $where['wallThiningMechanismId']=I("post.wallReductionMechIdRes","");
            $where['wallSCCMechanism']=I("post.wallSCCMechRes","");
            $where['wallSCCMechanismId']=I("post.wallSCCMechIdRes","");
            $where['wallOutDamageMechanism']=I("post.wallOutDamageMechRes","");
            $where['wallOutDamageMechanismId']=I("post.wallOutDamageMechIdRes","");
            if($count){
                $where['id']=$count;
                $res=$mechanism->save($where);
                if($res!==false){
                    $re['msg']="壁板损伤机理修改成功";
                }
            }else{
                $res=$mechanism->add($where);
                if($res!==false){
                    $re['msg']="壁板损伤机理增添成功";
                }
            }

            //底板损伤机理筛选
        }elseif($part==2){
            $where['floorThiningMechanism']=I("post.floorReductionMechRes","");
            $where['floorThiningMechanismId']=I("post.floorReductionMechIdRes","");
            $where['floorSCCMechanism']=I("post.floorSCCMechRes","");
            $where['floorSCCMechanismId']=I("post.floorSCCMechIdRes","");
            $where['floorOutDamageMechanism']=I("post.floorOutDamageMechRes","");
            $where['floorOutDamageMechanismId']=I("post.floorOutDamageMechIdRes","");
            if($count){
                $where['id']=$count;
                $res=$mechanism->save($where);
                if($res!==false){
                    $re['msg']="底板损伤机理修改成功";
                }
            }else{
                $res=$mechanism->add($where);
                if($res!==false){
                    $re['msg']="底板损伤机理新增成功";
                }
            }

        }
//        $re['msg']=$count;
        $this->ajaxReturn($re,"JSON");
    }

//---------------------------------------------------------------------------------------------------------
/// <summary>
    ///  壁板的失效后果计算，每一层单独计算  参考C.13.2
    /// </summary> //
    /// <param name="fTankDiameter_">罐直径，单位：m</param>
    /// <param name="fCHT_">储罐单层壁板高度，单位：m</param>
    /// <param name="iFloor_">壁板第几层</param>
    /// <param name="fAcceptBaseQ_">为失效后果可接受水平的基准,单位：万元</param>
    /// <param name="iEnvSensitibility_">环境敏感度.  0-低、1-中、2-高</param>
//    / <param name="eLeakHoleSize_">泄露孔尺寸大小.枚举类型变量</param>
    /// <param name="fHliq_">泄露孔上方的液体高度（可能就是储罐内的实际液体高度），单位：m</param>
    /// <param name="fMatCost_">材料价格系数。材料为Q235A，则取1.0，其他材料的材料价格系数为与Q235A材料实际价格的比值</param>
    /// <param name="fProd_">停产造成的损失。单位：万元</param>
    /// <param name="fPlvdike_">溢出围堪的流体百分比</param>
    /// <param name="fPonsite_">溢出围堪但仍在罐区内，地表土壤中的流体百分比</param>
    /// <param name="fPoffsite_">溢出围堪且已流到罐区外，地表土壤中的流体百分比</param>
    /// <param name="fBblL_leak1_">泄放情况下，小泄露孔对应的流体泄放量，m3</param>
    /// <param name="fBblL_leak2_">泄放情况下，中泄露孔对应的流体泄放量，m3</param>
    /// <param name="fBblL_leak3_">泄放情况下，大泄露孔对应的流体泄放量，m3</param>
    /// <returns>0-A, 1-B, 2-C,3-D,4-E</returns>
//    function failureWallConsequence(
//        $fTankDiameter_,
//        $fCHT_,
//        $iFloor_,
//        $iEnvSensitibility_,
//        $fHliq_,
//        $fMatCost_,
//        $fProd_,
//        $fPlvdike_,
//        $fPonsite_,
//        $fPoffsite_
//    )
//    {
//        //壁板不同尺寸泄露孔和破裂的平均失效概率 1-小，2-中，3-大，4-破裂
//        $fG1 = 0.00007; $fG2 = 0.000025; $fG3 = 0.000006; $fG4 = 0.0000001;
//        //泄露总失效概率 参考步骤8.3
//        $fGTotal = $fG1 + $fG2 + $fG3 + $fG4;
//
//        //确定泄露孔直径(单位：mm) 参考表C.3
//
//        $fLeakHole1_small_Dia = 3.0;
//        $fLeakHole2_middle_Dia = 6.0;
//        $fLeakHole3_large_Dia = 50.0;
//        $fLeakHole4_Rupture_Dia = 1000*$fTankDiameter_/4.0;
//
//        //不同泄露孔对应的泄放速率计算 参考C.4.2
//        $fW1_small = 0.086 * 0.61 * M_PI * pow($fLeakHole1_small_Dia, 2) / 4 * sqrt(2 * 9.81 * $fHliq_);
//        $fW2_middle = 0.086 * 0.61 * M_PI * pow($fLeakHole2_middle_Dia, 2) / 4 * sqrt(2 * 9.81 * $fHliq_);
//        $fW3_large = 0.086 * 0.61 * M_PI * pow($fLeakHole3_large_Dia, 2) / 4 * sqrt(2 * 9.81 * $fHliq_);
//        $fW4_rupture = 0.086 * 0.61 * M_PI * pow($fLeakHole4_Rupture_Dia, 2) / 4 * sqrt(2 * 9.81 * $fHliq_);
//
//        //确定第i层壁板上的液体高度 参考步骤4.1
//        $fLHTabove = $fHliq_ - ($iFloor_ - 1) * $fCHT_;
//        //确定第i层壁板上的液体体积 参考步骤4.2
//        $fLvol_above = M_PI * pow($fTankDiameter_, 2) / 4 * $fLHTabove;
//
//        //确定不同泄露孔尺寸的流体有效泄放量 参考步骤4.3和4.4
//        $fBbl_avail1_small = $fLvol_above;
//        $fBbl_avail2_middle = $fLvol_above;
//        $fBbl_avail3_large = $fLvol_above;
//        $fBbl_avail4_rupture = $fLvol_above;
//
//        //泄放检测时间 参考步骤6.2
//        // double ftld = 7;
//        //确定不同泄露孔尺寸的泄放持续时间
//        if ($fLeakHole1_small_Dia > 3){
//            $fld1_small = min($fBbl_avail1_small / $fW1_small, 1.0);
//        } else{
//            $fld1_small = min($fBbl_avail1_small / $fW1_small, 7.0);
//        }
//        if ($fLeakHole2_middle_Dia > 3){
//            $fld2_middle = min($fBbl_avail2_middle / $fW2_middle, 1.0);
//        } else{
//            $fld2_middle = min($fBbl_avail2_middle / $fW2_middle, 7.0);
//        }
//        if ($fLeakHole3_large_Dia > 3){
//            $fld3_large = min($fBbl_avail3_large / $fW3_large, 1.0);
//        }else{
//            $fld3_large = min($fBbl_avail3_large / $fW3_large, 7.0);
//        }
//        if ($fLeakHole4_Rupture_Dia > 3){
//            $fld4_rupture = min($fBbl_avail4_rupture / $fW4_rupture, 1.0);
//        }else{
//            $fld4_rupture = min($fBbl_avail4_rupture / $fW4_rupture, 7.0);
//        }
//
//        //确定不同泄露孔尺寸的流体泄放量  参考步骤6.4
//        $fBblL_leak1 = min($fW1_small * $fld1_small, $fBbl_avail1_small);
//        $fBblL_leak2 = min($fW2_middle * $fld2_middle, $fBbl_avail2_middle);
//        $fBblL_leak3 = min($fW3_large * $fld3_large, $fBbl_avail3_large);
//
//        //确定破裂情况下的对应的流体泄放量
//        $fBbl_rupture = $fBbl_avail4_rupture;
//
//
//        $fBbl_Total = $fHliq_ * pow($fTankDiameter_, 2) * M_PI / 4;
//
//        ///环境损失经济后果
//
//        ///不同环境敏感度下的各子项环境经济后果（单位：万元）. 分别为低（0）、中（1）、高（2）。如果不是数组，表示相同
//        //介质泄放到围堰区时的环境经济后果
//        $fEnvCindike = 0.04;
//        //介质泄放到罐区内土壤表面时的环境经济后果
//        $fEnvCss_onsite = 0.2;
//        //介质泄放到罐区外土攘表面时的环境经济后果
//        $faEnvCss_offsite = array(0.4,1,2);
//        //介质泄放到地下土壤内时的环绕经济后果
//        $faEnvCsubsoil = array(2, 6, 12);
//        //介质泄放到地下水内时的环境经济后果
//        $faEnvCgroundwater = array(4, 20,40);
//        //介质泄放到地表水内时的环境经济后果
//        $faEnvCwater = array(2, 6, 20);
//
//        ///泄露相关
//        //壁板泄露的流体已泄放总体积 参考步骤8.4
//        $fBblL_release = ($fBblL_leak1 * $fG1 + $fBblL_leak2 * $fG2 + $fBblL_leak3 * $fG3) / $fGTotal;
//
//        //泄漏空泄放后仍在围堰内的流体总体积 参考步骤8.5
//        $fBblL_indike = $fBblL_release * (1 - $fPlvdike_);
//        //泄放到罐区内土壤表面的流体总体积 参考步骤8.5
//        $fBblL_ss_onsite = $fPonsite_ * ($fBblL_release - $fBblL_indike);
//        //泄放到罐区外土壤表面的流体总体积 参考步骤8.5
//        $fBblL_ss_offsite = $fPoffsite_ * ($fBblL_release - $fBblL_indike - $fBblL_ss_onsite);
//        //已到达水源的流体总体积  参考步骤8.5
//        $fBblL_water = $fBblL_release - ($fBblL_indike + $fBblL_ss_onsite + $fBblL_ss_offsite);
//        //泄露导致的环境损失 参考步骤8.6
//        $fFCenv_leak = $fBblL_indike * $fEnvCindike + $fBblL_ss_onsite * $fEnvCss_onsite + $fBblL_ss_offsite * $faEnvCss_offsite[$iEnvSensitibility_] + $fBblL_water * $faEnvCwater[$iEnvSensitibility_];
//
//        ///破裂相关的体积
//        //破裂情况下的流体泄放总体积
//        $fBblR_release = $fBbl_Total * $fG4/$fGTotal;
//        //破裂情况下仍在围堰内的流体总体积
//        $fBblR_indike = $fBblR_release*(1-$fPlvdike_);
//        //破裂情况下在罐区内土壤表面的流体总体积
//        $fBblR_ss_onsite = $fPonsite_ *($fBblR_release - $fBblR_indike);
//        //破裂情况下在罐区外土壤表面的流体总体积
//        $fBblR_ss_offsite = $fPoffsite_ * ($fBblR_release - $fBblR_indike - $fBblR_ss_onsite);
//        //破裂情况下已到达水源的流体总体积
//        $fBblR_water = $fBblR_release - ($fBblR_indike + $fBblR_ss_onsite + $fBblR_ss_offsite);
//
//        //破裂导致的环境损失经济后果
//        $fFCenv_rupture = $fBblR_indike * $fEnvCindike + $fBblR_ss_onsite * $fEnvCss_onsite + $fBblR_ss_offsite * $faEnvCss_offsite[$iEnvSensitibility_] + $fBblR_water * $faEnvCwater[$iEnvSensitibility_];
//
//        $fFC_Eviron = $fFCenv_leak + $fFCenv_rupture;
//
//        ///泄露导致的设备损坏经济后果
//        $fFC_Emd = $fMatCost_ * ($fG1 * 4 + $fG2 * 9.6 + $fG3 * 16 + $fG4 * 32) / $fGTotal;
//
//        ///泄露的停产损失经济后果
//        $fFC_Prod = $fProd_ * ($fG1 * 2 + $fG2 * 3 + $fG3 * 3 + $fG4 * 7) / $fGTotal;
//
//        $fFCTotal = $fFC_Prod + $fFC_Emd + $fFC_Eviron;
//
//        return $fFCTotal;
//    }
/// <summary>
    /// 底板失效后果计算。参考标准GBT-30578中附录C
    /// </summary>
    /// <param name="$fTankDiameter_">罐直径，单位：m</param>
    /// <param name="fHliq_">罐内的液体高度，单位：m</param>
    /// <param name="fAcceptBaseQ_">为失效后果可接受水平的基准,单位：万元</param>
    /// <param name="iEnvSensitibility_">环境敏感度.  0-低、1-中、2-高</param>
    /// <param name="eLeakHoleSize_">泄露孔尺寸大小.枚举类型变量</param>
    /// <param name="fMatCost_">材料价格系数。材料为Q235A，则取1.0，其他材料的材料价格系数为与Q235A材料实际价格的比值</param>
    /// <param name="fProd_">停产造成的损失。单位：万元</param>
    /// <param name="fPlvdike_">溢出围堪的流体百分比</param>
    /// <param name="fPonsite_">溢出围堪但仍在罐区内，地表土壤中的流体百分比</param>
    /// <param name="fPoffsite_">溢出围堪且已流到罐区外，地表土壤中的流体百分比</param>
    /// <param name="iLeakHoleSize_">泄放情况下，小泄露孔对应的流体泄放量，m3</param>
    /// <param name="fSgw_">罐底到地下水的距离，单位：m</param>
    /// <param name="fMedium_p_">介质密度,单位：kg/m3;</param> 。介质密度和动力粘度可以让用户筛选(表C.2)，或者直接填写
    /// <param name="fMedium_DynVisc_">介质动力粘度,单位：N*s/m2 或 pa*s;</param> 动力粘度：Dynamic viscosity
    /// <param name="iTankBaseType_">储罐基础形式。0---基础为水泥或沥青  1——基础设有RPB，2——基础没有RPB</param>
    /// <param name="eTankSubsoilType_">储罐基础下面土壤类型</param>
    /// <returns>0-A, 1-B, 2-C,3-D,4-E</returns>
//    function failurefloorConsequence(
//        $fTankDiameter_,
//        $fHliq_,
//        $iEnvSensitibility_,
//        $fMatCost_,
//        $fProd_,
//        $fPlvdike_,
//        $fPonsite_,
//        $fPoffsite_,
//        $fSgw_,
//        $fMedium_p_,
//        $fMedium_DynVisc_,
//        $iTankBaseType_,
//        $eTankSubsoilType_
//    ){
//
//        //底板不同尺寸泄露孔和破裂的平均失效概率 1-小，2-中，3-大，4-破裂
//        $fG1 = 0.00007; $fG2 = 0.000025; $fG3 = 0.000006; $fG4 = 0.0000001;
//        //泄露总失效概率
//        $fGTotal = $fG1 + $fG2 + $fG3 + $fG4;
//
//        /// 土壤孔隙率， 水压传导率的下限值，水压传导率的上限值
////        1代表粗砂 2代表细砂 3精细砂 4代表粉砂 5代表含砂黏土 6代表黏土 7代表混凝土-沥青
//        switch($eTankSubsoilType_)
//        {
//            case 1:
//                $fPs = 0.33;
//                $fKh_water_lb = 0.001;
//                $fKh_water_ub = 0.0001;
//                break;
//            case 2:
//                $fPs = 0.33;
//                $fKh_water_lb = 0.0001;
//                $fKh_water_ub = 0.00001;
//                break;
//            case 3:
//                $fPs = 0.33;
//                $fKh_water_lb = 0.00001;
//                $fKh_water_ub = 0.0000001;
//                break;
//            case 4:
//                $fPs = 0.41;
//                $fKh_water_lb = 0.0000001;
//                $fKh_water_ub = 0.00000001;
//                break;
//            case 5:
//                $fPs = 0.45;
//                $fKh_water_lb = 0.00000001;
//                $fKh_water_ub = 0.000000001;
//                break;
//            case 6:
//                $fPs = 0.5;
//                $fKh_water_lb = 0.000000001;
//                $fKh_water_ub = 0.0000000001;
//                break;
//            case 7:
//                $fPs = 0.99;
//                $fKh_water_lb = 0.000000000001;
//                $fKh_water_ub = 0.0000000000001;
//                break;
//            default:
//                $fPs = 0.33;
//                $fKh_water_lb = 0.001;
//                $fKh_water_ub = 0.0001;
//                break;
//        }
//        $fKh_water = 4.32 * 10000 * ($fKh_water_lb + $fKh_water_ub);
//        $fpw =1000;//水的密度:kg/m3
//        $fuw = 0.001;//水的动力粘度 N*s/m2 或 pa*s
//        $fKh = $fKh_water*($fMedium_p_/$fpw)*($fuw/$fMedium_DynVisc_);//土壤的水压传导率
//        $fVels_prod = $fKh/$fPs;///介质渗透速率
//
//        //小、中、大、破裂泄露孔尺寸对应的泄露孔直径.单位：mm
//        //确定泄露孔尺寸，参考表C.4
//        if ($iTankBaseType_ == 1)
//        {
//            $fLeakHoleDia_small = 3.0;
//        } else {
//            $fLeakHoleDia_small = 13.0;
//            $fLeakHoleDia_middle = 0;
//            $fLeakHoleDia_large = 0;
//            $fLeakHoleDia_Rupture = 1000 * $fTankDiameter_ / 4.0;
//        }
//        //不同泄露孔尺寸对应泄露孔数量 参考表C.5
//        $iLeakHole_middle_num = 0;
//        $iLeakHole_large_num = 0;
//        $iLeakHole_small_num =max((round((pow(($fTankDiameter_/30),2)))),1);
//
//        //泄放检测时间
//        //C.8.2 参考步骤7.2 0代表水泥和沥青 1代表设有RPB 2代表没有设RPB
//        if($iTankBaseType_ == 2){
//            $ftld = 30.0;
//        }elseif($iTankBaseType_ == 1){
//            $ftld = 360.0;
//        }elseif($iTankBaseType_ == 0){
//            $ftld = 7.0;
//        }
//
//        ///环境损失经济后果
//        ///不同环境敏感度下的各子项环境经济后果（单位：万元）. 分别为低（0）、中（1）、高（2）。如果不是数组，表示相同
//        //介质泄放到围堰区时的环境经济后果
//        $fEnvCindike = 0.04;
//        //介质泄放到罐区内土壤表面时的环境经济后果
//        $fEnvCss_onsite = 0.2;
//        //介质泄放到罐区外土攘表面时的环境经济后果
//        $faEnvCss_offsite = array(0.4, 1, 2);
//        //介质泄放到地下土壤内时的环绕经济后果
//        $faEnvCsubsoil = array(2, 6, 12);
//        //介质泄放到地下水内时的环境经济后果
//        $faEnvCgroundwater = array(4, 20, 40);
//        //介质泄放到地表水内时的环境经济后果
//        $faEnvCwater = array(2, 6, 20);
//
//        ///泄露相关
//        //流体泄放到地下水的时间
//        $fTgl = $fSgw_ / $fVels_prod;
//
////        //在泄放情况下，分别对应于与小、中、大泄露孔尺寸的地下水中流体的体积
////        $fBblL_gw1 = .0; $fBblL_gw2 = .0; $fBblL_gw3 = .0;
////
////        //不同泄露孔尺寸下，储罐底板的泄放速率
////        $fW1_small = .0; $fW2_middle = .0; $fW3_large = .0;
//
//
//        //表征土壤的接触程度调整系数
//        //参考C4.3.2
//        if($iTankBaseType_ == 1)
//        {
//            //如果设有防泄漏隔离屏后果分析的取值
//            $fCqo = 0.21;
//            $fhliq = 0.08;
//        }else{
//            $fCqo = 1.15;//表征土壤接触程度的调整系数
//            $fhliq = $fHliq_;//储罐内的液体高度
//        }
//
//        //储罐底板的泄放速率计算  参考步骤3.4
//        if($fKh > (86.4 * pow($fLeakHoleDia_small, 2.0))){
//            $fW1_small = 0.01296*M_PI*$fLeakHoleDia_small*$iLeakHole_small_num*sqrt(2*9.81*$fhliq);
//        } else{
//            $fW1_small = 0.3787 * $fCqo * pow($fLeakHoleDia_small, 0.2) * $iLeakHole_small_num * pow($fhliq, 0.9) * pow($fKh, 0.74);
//        }
//
//        if ($fKh > (86.4 *pow($fLeakHoleDia_middle, 2.0))){
//            $fW2_middle = 0.01296*M_PI*$fLeakHoleDia_middle*$iLeakHole_middle_num*sqrt(2*9.81*$fhliq);
//        } else{
//            $fW2_middle = 0.3787 * $fCqo * pow($fLeakHoleDia_middle, 0.2) * $iLeakHole_middle_num * pow($fhliq, 0.9) * pow($fKh, 0.74);
//        }
//
//        if ($fKh > (86.4 * pow($fLeakHoleDia_large, 2.0))){
//            $fW3_large = 0.01296*M_PI*$fLeakHoleDia_large * $iLeakHole_large_num*sqrt(2*9.81*$fhliq);
//        } else{
//            $fW3_large = 0.3787 * $fCqo * pow($fLeakHoleDia_large, 0.2) * $iLeakHole_large_num * pow($fhliq, 0.9) * pow($fKh, 0.74);
//        }
//
//        //储罐内流体的总泄放量 C5.3 步骤5.1和5.2
//        $fBbl_Total = $fhliq * (M_PI * pow($fTankDiameter_, 2.0)) / 4.0;
//
//        //确定泄放持续时间 参考步骤7.3
//        $fld1_small = min(($fBbl_Total/$fW1_small),$ftld);
//        $fld2_middle = min(($fBbl_Total/$fW2_middle),$ftld);
//        $fld3_large = min(($fBbl_Total/$fW3_large),$ftld);
//
//        //确定不同泄露孔尺寸下的对应的流体泄放量 参考步骤7.4
//        $fBblL_leak1 = min(($fW1_small*$fld1_small),$fBbl_Total);
//        $fBblL_leak2 = min(($fW2_middle*$fld2_middle),$fBbl_Total);
//        $fBblL_leak3 = min(($fW3_large*$fld3_large),$fBbl_Total);
//        $fBblL_leak4 = $fBbl_Total;
//
//        //每个泄露孔尺寸泄放到罐底的流体体积 参考附录C中的步骤9.5
//        if ($fTgl > $ftld)
//        {
//            $fBblL_gw1 = $fBblL_leak1 * ($ftld - $fTgl) / $ftld;
//            $fBblL_gw2 = $fBblL_leak2 * ($ftld - $fTgl) / $ftld;
//            $fBblL_gw3 = $fBblL_leak3 * ($ftld - $fTgl) / $ftld;
//        }
//        else
//        {
//            $fBblL_gw1 = 0;
//            $fBblL_gw2 = 0;
//            $fBblL_gw3 = 0;
//        }
//
//        $fBblL_subsoil1 = $fBblL_leak1 - $fBblL_gw1;
//        $fBblL_subsoil2 = $fBblL_leak2 - $fBblL_gw2;
//        $fBblL_subsoil3 = $fBblL_leak3 - $fBblL_gw3;
//
//        //泄露导致的环境损失。步骤9.6
//        $fFCenv_leak = (($fBblL_gw1 * $faEnvCgroundwater[$iEnvSensitibility_] + $fBblL_subsoil1 * $faEnvCsubsoil[$iEnvSensitibility_]) + ($fBblL_gw2 * $faEnvCgroundwater[$iEnvSensitibility_] + $fBblL_subsoil2 * $faEnvCsubsoil[$iEnvSensitibility_]) + ($fBblL_gw3 * $faEnvCgroundwater[$iEnvSensitibility_] + $fBblL_subsoil3 * $faEnvCsubsoil[$iEnvSensitibility_])) / $fGTotal;
//
//        ///破裂相关的体积
//        //破裂情况下的流体泄放总体积
//        $fBblR_release = $fBbl_Total * $fG4 / $fGTotal;
//        //破裂情况下仍在围堰内的流体总体积
//        $fBblR_indike = $fBblR_release * (1 - $fPlvdike_);
//        //破裂情况下在罐区内土壤表面的流体总体积
//        $fBblR_ss_onsite = $fPonsite_ * ($fBblR_release - $fBblR_indike);
//        //破裂情况下在罐区外土壤表面的流体总体积
//        $fBblR_ss_offsite = $fPoffsite_ * ($fBblR_release - $fBblR_indike - $fBblR_ss_onsite);
//        //破裂情况下已到达水源的流体总体积
//        $fBblR_water = $fBblR_release - ($fBblR_indike + $fBblR_ss_onsite + $fBblR_ss_offsite);
//        //破裂导致的环境损失
//        $fFCenv_rupture = $fBblR_indike * $fEnvCindike + $fBblR_ss_onsite * $fEnvCss_onsite + $fBblR_ss_offsite * $faEnvCss_offsite[$iEnvSensitibility_] + $fBblR_water * $faEnvCwater[$iEnvSensitibility_];
//
//        //参考步骤9.10
//        $fFC_Eviron = $fFCenv_leak + $fFCenv_rupture;
//
//
//        ///泄露导致的设备损坏经济后果     步骤9.11
//        $fFC_Emd = $fMatCost_ * ($fG1 * 4 +  $fG4 * 96*pow(($fTankDiameter_/30.0),2)) / $fGTotal;
//
//        ///泄露的停产损失后果  步骤9.12
//        $fFC_Prod = $fProd_ * ($fG1 * 5 +  $fG4 * 50) / $fGTotal;
//
//        //步骤9.13
//        $fFCTotal = $fFC_Prod + $fFC_Emd + $fFC_Eviron;
//        return $fFCTotal;
//    }

    //小函数  用于把时间点转换成时间长度
    function transformUseDate($useDate){
        $useDate                            =   (strtotime(date('Y-m-d')) - strtotime($useDate)) / 31536000 ;
        $useDate              =   number_format($useDate, 2, '.', '');//将使用时间转化为使用年限
        return $useDate;
    }


//--------------------------------------删除计算结果----------------------------------------------------------------------
    function deleteRiskCal(){
        $riskList   =   D("tb_risklist");
        $id         =   I("post.id",'');
        $riskList=$riskList->delete($id);
        if($riskList){
            $riskDetail=D("tb_riskdetail");
            $data['pid']=I("post.id",'');
            $riskDetail=$riskDetail->where($data)->delete();
            if($riskDetail){
                $this->ajaxReturn("删除成功（壁板有信息）","JSON");
            }else{
                $this->ajaxReturn("删除成功（壁板无信息）","JSON");
            }
        }
    }

    function multiCount()
    {
//       这里存放全部的上传数据
        $id             =   I("post.id",'');
        $index          =   I("post.index",'');


        header("Content-type: text/html; charset=utf-8");
        $webservice_url = "http://localhost:8080/axis2/services/Calculate?wsdl";//webservice地址
        $client = new \SoapClient($webservice_url);
        $re = $client->__soapCall('riskRate', array(
            array(
                "PlantId"                      =>    (int)$id
            )
        ))->return;
        if($re[1]==1){
            $re['msg'] = $re[0];
        }else{
            $re['msg'] = "计算出错";
        }


        $re['index']=  $index;
//---------------------------------------测试用部位starting-------------------------------------------

//-------------------------------------风险结果输出--------------------------------------
        $this->AjaxReturn($re);
    }
}



