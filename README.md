<p align="center">
    <a href="https://www.koolreport.com" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
        <img src="https://cdn.koolreport.com/assets/images/bar.png" height="100px">
    </a>
    <h1 align="center">How to use KoolReport in Yii2?</h1>
    <br>
</p>

# KOOLREPORT

KoolReport is an intuitive and flexible Open Source PHP Reporting Framework for faster and easier data report delivery.

KoolReport can work with any MVC Frameworks such as Laravel, CodeIgniter or Yii2 to provide reporting capability

# GUIDE

### Step 1: Install KoolReport

```
composer require koolreport/core
```

### Step 2: Create reports folder

Create `reports` folder in the root folder to hold reports. You may find our `MyReport` sample report within `reports` folder. The MyReport contains class file `MyReport.php` and view file `MyReport.view.php`

### Step 3: Create action inside controller:

```
    ...
    public function actionReport()
    {
        $report = new \app\reports\MyReport;
        $report->run();
        return $this->render('report',array(
            "report"=>$report
        ));
        
    }
```

In the action of Yii2, we create report object, run it and then pass the report object to the view.

You may find the `report.php` view with following content:

```
<?php $report->render();?>
```

### Step 3: Call the action from browser:

```
http://localhost/yii2-example/web/index.php?r=site%2report
```