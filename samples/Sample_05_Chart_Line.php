<?php

include_once 'Sample_Header.php';

use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Shape\Chart\Type\Line;
use PhpOffice\PhpPresentation\Shape\Chart\Series;
use PhpOffice\PhpPresentation\Style\Border;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Fill;
use PhpOffice\PhpPresentation\Style\Shadow;

// Create new PHPPresentation object
echo date('H:i:s') . ' Create new PHPPresentation object' . EOL;
$objPHPPresentation = new PhpPresentation();

// Set properties
echo date('H:i:s') . ' Set properties' . EOL;
$objPHPPresentation->getDocumentProperties()->setCreator('PHPOffice')->setLastModifiedBy('PHPPresentation Team')->setTitle('Sample 07 Title')->setSubject('Sample 07 Subject')->setDescription('Sample 07 Description')->setKeywords('office 2007 openxml libreoffice odt php')->setCategory('Sample Category');

// Remove first slide
echo date('H:i:s') . ' Remove first slide' . EOL;
$objPHPPresentation->removeSlideByIndex(0);

// Set Style
$oFill = new Fill();
$oFill->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FFE06B20'));

$oShadow = new Shadow();
$oShadow->setVisible(true)->setDirection(45)->setDistance(10);

// Generate sample data for chart
echo date('H:i:s') . ' Generate sample data for chart' . EOL;
$seriesData = array(
    'Monday' => 12,
    'Tuesday' => 15,
    'Wednesday' => 13,
    'Thursday' => 17,
    'Friday' => 14,
    'Saturday' => 9,
    'Sunday' => 7
);

// Create templated slide
echo EOL . date('H:i:s') . ' Create templated slide' . EOL;
$currentSlide = createTemplatedSlide($objPHPPresentation);

// Create a line chart (that should be inserted in a shape)
echo date('H:i:s') . ' Create a line chart (that should be inserted in a chart shape)' . EOL;
$lineChart = new Line();
$series = new Series('Downloads', $seriesData);
$series->setShowSeriesName(true);
$series->setShowValue(true);
$lineChart->addSeries($series);

// Create a shape (chart)
echo date('H:i:s') . ' Create a shape (chart)' . EOL;
$shape = $currentSlide->createChartShape();
$shape->setName('PHPPresentation Daily Downloads')->setResizeProportional(false)->setHeight(550)->setWidth(700)->setOffsetX(120)->setOffsetY(80);
$shape->setShadow($oShadow);
$shape->setFill($oFill);
$shape->getBorder()->setLineStyle(Border::LINE_SINGLE);
$shape->getTitle()->setText('PHPPresentation Daily Downloads');
$shape->getTitle()->getFont()->setItalic(true);
$shape->getPlotArea()->setType($lineChart);
$shape->getView3D()->setRotationX(30);
$shape->getView3D()->setPerspective(30);
$shape->getLegend()->getBorder()->setLineStyle(Border::LINE_SINGLE);
$shape->getLegend()->getFont()->setItalic(true);

// Create templated slide
echo EOL . date('H:i:s') . ' Create templated slide' . EOL;
$currentSlide = createTemplatedSlide($objPHPPresentation);

// Create a line chart (that should be inserted in a shape)
$oOutline = new \PhpOffice\PhpPresentation\Style\Outline();
$oOutline->getFill()->setFillType(Fill::FILL_SOLID);
$oOutline->getFill()->setStartColor(new Color(Color::COLOR_YELLOW));
$oOutline->setWidth(2);

echo date('H:i:s') . ' Create a line chart (that should be inserted in a chart shape)' . EOL;
$lineChart1 = clone $lineChart;
$series1 = $lineChart1->getSeries();
$series1[0]->setOutline($oOutline);
$series1[0]->getMarker()->setSymbol(\PhpOffice\PhpPresentation\Shape\Chart\Marker::SYMBOL_DIAMOND);
$series1[0]->getMarker()->setSize(7);
$lineChart1->setSeries($series1);

// Create a shape (chart)
echo date('H:i:s') . ' Create a shape (chart)' . EOL;
echo date('H:i:s') . ' Differences with previous : Values on right axis and Legend hidden' . EOL;
$shape1 = clone $shape;
$shape1->getLegend()->setVisible(false);
$shape1->setName('PHPPresentation Weekly Downloads');
$shape1->getTitle()->setText('PHPPresentation Weekly Downloads');
$shape1->getPlotArea()->setType($lineChart1);
$shape1->getPlotArea()->getAxisY()->setFormatCode('#,##0');
$currentSlide->addShape($shape1);

// Create templated slide
echo EOL . date('H:i:s') . ' Create templated slide' . EOL;
$currentSlide = createTemplatedSlide($objPHPPresentation);

// Create a line chart (that should be inserted in a shape)
echo date('H:i:s') . ' Create a line chart (that should be inserted in a chart shape)' . EOL;
$lineChart2 = clone $lineChart;
$series2 = $lineChart2->getSeries();
$series2[0]->getFont()->setSize(25);
$series2[0]->getMarker()->setSymbol(\PhpOffice\PhpPresentation\Shape\Chart\Marker::SYMBOL_TRIANGLE);
$series2[0]->getMarker()->setSize(10);
$lineChart2->setSeries($series2);

// Create a shape (chart)
echo date('H:i:s') . ' Create a shape (chart)' . EOL;
echo date('H:i:s') . ' Differences with previous : Values on right axis and Legend hidden' . EOL;
$shape2 = clone $shape;
$shape2->getLegend()->setVisible(false);
$shape2->setName('PHPPresentation Weekly Downloads');
$shape2->getTitle()->setText('PHPPresentation Weekly Downloads');
$shape2->getPlotArea()->setType($lineChart2);
$shape2->getPlotArea()->getAxisY()->setFormatCode('#,##0');
$currentSlide->addShape($shape2);

// Create templated slide
echo EOL . date('H:i:s') . ' Create templated slide' . EOL;
$currentSlide = createTemplatedSlide($objPHPPresentation);

// Create a line chart (that should be inserted in a shape)
echo date('H:i:s') . ' Create a line chart (that should be inserted in a chart shape)' . EOL;
$lineChart3 = clone $lineChart;

$oGridLines1 = new \PhpOffice\PhpPresentation\Shape\Chart\Gridlines();
$oGridLines1->getOutline()->setWidth(10);
$oGridLines1->getOutline()->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color(Color::COLOR_BLUE));

$oGridLines2 = new \PhpOffice\PhpPresentation\Shape\Chart\Gridlines();
$oGridLines2->getOutline()->setWidth(1);
$oGridLines2->getOutline()->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color(Color::COLOR_DARKGREEN));

// Create a shape (chart)
echo date('H:i:s') . ' Create a shape (chart3)' . EOL;
echo date('H:i:s') . ' Feature : Gridlines' . EOL;
$shape3 = clone $shape;
$shape3->setName('Shape 3');
$shape3->getTitle()->setText('Chart with Gridlines');
$shape3->getPlotArea()->setType($lineChart3);
$shape3->getPlotArea()->getAxisX()->setMajorGridlines($oGridLines1);
$shape3->getPlotArea()->getAxisY()->setMinorGridlines($oGridLines2);
$currentSlide->addShape($shape3);

// Create templated slide
echo EOL . date('H:i:s') . ' Create templated slide' . EOL;
$currentSlide = createTemplatedSlide($objPHPPresentation);

// Create a shape (chart)
echo date('H:i:s') . ' Create a shape (chart3)' . EOL;
echo date('H:i:s') . ' Feature : Gridlines' . EOL;
$shape4 = clone $shape;
$shape4->getPlotArea()->getAxisY()->setMinBounds(5);
$shape4->getPlotArea()->getAxisY()->setMaxBounds(20);
$currentSlide->addShape($shape4);
// Save file
echo EOL . write($objPHPPresentation, basename(__FILE__, '.php'), $writers);

if (!CLI) {
    include_once 'Sample_Footer.php';
}
