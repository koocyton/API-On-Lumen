<?php
namespace App\Utils;

/**
 * Created by IntelliJ IDEA.
 * User: henry < koocyton@me.com >
 * Date: 2017/7/4
 * Time: 下午6:34
 *
 * -----  get base64 image stream
 * KTCurveChart::init(300, 100)
 *  ->setChartData(0,1,2,3,4,5,6,7,8,9,0,2,3,4,5)
 *  ->getEncodeGraph()
 *
 * -----  display image
 * KTCurveChart::init(300, 100)
 *  ->setChartData(0,1,2,3,4,5,6,7,8,9,0,2,3,4,5)
 *  ->sendGraph()
 */

class KTCurveChart
{
    // 画布的宽度
    private $canvasWidth = 300;

    // 画布的高度
    private $canvasHeight = 100;

    // 坐标值的数组，默认 0 ~ 0
    private $chartData = [0, 0];

    // 画布
    private $chartCanvas = null;

    // 初始化设置图的高宽
    public static function init($width, $height) {
        $instance = new static;
        $instance->canvasWidth = $width;
        $instance->canvasHeight = $height;
        return $instance;
    }

    // 设置曲线的落点值
    public function setChartData($chartData) {
        // setChartData([2,3,4,12,2,4]) OR setChartData(5,2,3,4,2,2)
        $this->chartData = is_array($chartData) ? $chartData : func_get_args();
        return $this;
    }

    // 输出图像
    public function sendGraph()
    {
        // 创建画布
        $this->createChartCanvas();

        // 让曲线在画布的中间
        $this->scatterPoint();

        // 输出图像的头信息
        header('Content-type: image/png');

        // 输出 png
        imagepng($this->chartCanvas);

        // 释放内存
        imagedestroy($this->chartCanvas);
    }

    // 取得此图的二进制流
    public function getEncodeGraph()
    {
        // 不输出
        ob_start();

        // 被 ob_start 获取的图片流
        $this->sendGraph();

        // 返回图片流
        return base64_encode(ob_get_clean());
    }

    // 创建画布
    private function createChartCanvas()
    {
        // 初始化画布
        $this->chartCanvas = imagecreatetruecolor($this->canvasWidth, $this->canvasHeight);

        // 白色透明
        $white = imagecolorallocatealpha($this->chartCanvas, 255, 255, 255, 127);

        // 给把白色透明画在画布上
        imagefill($this->chartCanvas, 0, 0, $white);

        // 抗锯齿
        // imageantialias($this->chartCanvas, true);

        // 关闭混合模式
        imagealphablending($this->chartCanvas, false);

        // 设置保存PNG时保留透明通道信息
        imagesavealpha($this->chartCanvas, true);
    }

    // 根据画布大小和曲线的落点位置，计算出一个适合的落点
    private function scatterPoint()
    {
        // 最小画点
        // $minDrawPoint = 0;

        // 最大画点
        $maxDrawPoint = $this->canvasHeight * 0.8;

        // 曲线图最大值
        $maxChartPoint = max($this->chartData);

        // 实际描点的折算率
        $drawRate = $maxDrawPoint / $maxChartPoint;

        // 每个坐标的间距 < X 的间距 >
        $columnWidth = ($this->canvasWidth - 1) / (count($this->chartData) - 1);

        // 组织数据，初始点 左下角
        $ii = 1;
        $drawPoint = [1, $this->canvasHeight];

        // 计算每个点的坐标
        foreach($this->chartData as $nn => $chartValue) {
            $drawPoint[++$ii] = $nn * $columnWidth + 1;
            $drawPoint[++$ii] = $this->canvasHeight - ( $chartValue * $drawRate );
        }

        // 结尾点，右下角
        $drawPoint[++$ii] = $this->canvasWidth;
        $drawPoint[++$ii] = $this->canvasHeight;

        // 计数
        $drawPointCount = count($drawPoint) / 2;

        // 灰色
        $gray = imagecolorallocatealpha($this->chartCanvas, 96, 96, 96, 100);

        // 画一个灰色多边形
        imagefilledpolygon($this->chartCanvas, $drawPoint, $drawPointCount, $gray);

        // 蓝色
        $blue = imagecolorallocatealpha($this->chartCanvas, 96, 96, 96, 70);

        // 打点
        for($ii=2; $ii<count($drawPoint)-2; $ii++) {
            $x = $drawPoint[$ii];
            $y = $drawPoint[++$ii];
            imagefilledellipse($this->chartCanvas, $x, $y, 5, 5, $blue);
        }
    }
}

