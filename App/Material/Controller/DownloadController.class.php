<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/17
 * Time: 23:01
 */
namespace Material\Controller;

use Think\Upload;

use Think\Controller;

class DownloadController extends CommonController
{
    private static $ON_CHECKED = 0;
    private static $IS_PASSED = 1;
    private static $PASSED_FAILED = 2;


    private static $type = array('power' => 0,
        'monitor' => 1,
        'bus' => 2,
        'decoration' => 3,
        'activity_center' => 4,
        'ground' => 5,
        'class' => 6,
        'special_place' => 7,
        'sport' => 8,
        'east_side' => 9,
        'others' => 10);

    public function BuildingClassroom($id = 0)
    {
        $file_data = D('buildingclassroom')->where("id = $id")->limit(1)->select()[0];
        if ($file_data == NULL)
        {
            $this->error("没有这条信息");
        }

        foreach($file_data as $key => $val)
        {
            $file_data[$key] = mb_convert_encoding($val, "HTML-ENTITIES", "UTF-8");
        }
        $this->value = $file_data;
        $this->id = $id;

        header("Content-Disposition:attachment;filename='教学楼教室申请表(教工)-$id.doc'");
        $this->display();
    }

    public function BuildingClassroom2($id = 0)
    {
        $file_data = D('buildingclassroom2')->where("id = $id")->limit(1)->select()[0];
        if ($file_data == NULL)
        {
            $this->error("没有这条信息");
        }

        foreach($file_data as $key => $val)
        {
            $file_data[$key] = mb_convert_encoding($val, "HTML-ENTITIES", "UTF-8");
        }
        $this->value = $file_data;
        $this->id = $id;

        header("Content-Disposition:attachment;filename='教学楼教室申请表(学生)-$id.doc'");
        $this->display();
    }

    public function ColorPrinting($id = 0)
    {
        $file_data = D('colorprinting')->where("id = $id")->limit(1)->select()[0];
        if ($file_data == NULL)
        {
            $this->error("没有这条信息");
        }

        foreach($file_data as $key => $val)
        {
            $file_data[$key] = mb_convert_encoding($val, "HTML-ENTITIES", "UTF-8");
        }
        $this->value = $file_data;
        $this->id = $id;

        header("Content-Disposition:attachment;filename='彩喷悬挂申请表-$id.doc'");
        $this->display();
    }

    public function EastThird($id = 0)
    {
        $file_data = D('eastthird')->where("id = $id")->limit(1)->select()[0];
        if ($file_data == NULL)
        {
            $this->error("没有这条信息");
        }

        foreach($file_data as $key => $val)
        {
            $file_data[$key] = mb_convert_encoding($val, "HTML-ENTITIES", "UTF-8");
        }
        $this->value = $file_data;
        $this->id = $id;

        header("Content-Disposition:attachment;filename='东四三楼申请表-$id.doc'");
        $this->display();
    }

    public function RoadShow($id = 0)
    {
        $file_data = D('roadshow')->where("id = $id")->limit(1)->select()[0];
        if ($file_data == NULL)
        {
            $this->error("没有这条信息");
        }

        foreach($file_data as $key => $val)
        {
            $file_data[$key] = mb_convert_encoding($val, "HTML-ENTITIES", "UTF-8");
        }
        $this->value = $file_data;
        $this->id = $id;

        header("Content-Disposition:attachment;filename='户外路演场地申请表-$id.doc'");
        $this->display();
    }

    public function SpecialPlace($id = 0)
    {
        $file_data = D('specialplace')->where("id = $id")->limit(1)->select()[0];
        if ($file_data == NULL)
        {
            $this->error("没有这条信息");
        }

        foreach($file_data as $key => $val)
        {
            $file_data[$key] = mb_convert_encoding($val, "HTML-ENTITIES", "UTF-8");
        }
        $this->value = $file_data;
        $this->id = $id;

        header("Content-Disposition:attachment;filename='特殊场地申请表-$id.doc'");
        $this->display();
    }

    public function SportCourt($id = 0)
    {
        $file_data = D('sportcourt')->where("id = $id")->limit(1)->select()[0];
        if ($file_data == NULL)
        {
            $this->error("没有这条信息");
        }

        foreach($file_data as $key => $val)
        {
            $file_data[$key] = mb_convert_encoding($val, "HTML-ENTITIES", "UTF-8");
        }
        $this->value = $file_data;
        $this->id = $id;

        header("Content-Disposition:attachment;filename='韵苑体育馆申请表-$id.doc'");
        $this->display();
    }

    public function StudentCenter($id = 0)
    {
        $file_data = D('studentcenter')->where("id = $id")->limit(1)->select()[0];
        if ($file_data == NULL)
        {
            $this->error("没有这条信息");
        }

        foreach($file_data as $key => $val)
        {
            $file_data[$key] = mb_convert_encoding($val, "HTML-ENTITIES", "UTF-8");
        }
        $this->value = $file_data;
        $this->id = $id;

        header("Content-Disposition:attachment;filename='大活教室申请表-$id.doc'");
        $this->display();
    }

    public function Stuff($id = 0)
    {
        $file_data = D('stuff')->where("id = $id")->limit(1)->select()[0];
        if ($file_data == NULL)
        {
            $this->error("没有这条信息");
        }

        foreach($file_data as $key => $val)
        {
            $file_data[$key] = mb_convert_encoding($val, "HTML-ENTITIES", "UTF-8");
        }

        $this->value = $file_data;
        $this->id = $id;

        header("Content-type: text/html; charset=utf-8");
        header("Content-Disposition:attachment;filename='物资申请表-$id.doc'");
        $this->display();
    }

    public function OtherStuff($id = 0)
    {
        $file_data=D('otherstuff')->where("id = $id")->limit(1)->select()[0];;
        $filename=$file_data['path'];
        $showname=$file_data['name'];
        if(file_exists($filename))         //file_exists不生效  in Sae
        {
            $length = filesize($filename);
            header('Content-Description: File Transfer');
            header('Content-Type: application/msword');
            header('Content-Disposition: attachment; filename='.$showname);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . $length);
            readfile($filename);
            exit();
        }else{
            E($filename.L('下载文件不存在！'));
            return;
        }
    }

    public function OtherPlace($id = 0)
    {
        $file_data=D('otherplace')->where("id = $id")->limit(1)->select()[0];;
        $filename=$file_data['path'];
        $showname=$file_data['name'];
        if(file_exists($filename))         //file_exists不生效  in Sae
        {
            $length = filesize($filename);
            header('Content-Description: File Transfer');
            header('Content-Type: application/msword');
            header('Content-Disposition: attachment; filename='.$showname);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . $length);
            readfile($filename);
            exit();
        }else{
            E($filename.L('下载文件不存在！'));
            return;
        }
    }

}