<?php

namespace app\reports;

use \koolreport\KoolReport;
use \koolreport\processes\Filter;
use \koolreport\processes\TimeBucket;
use \koolreport\processes\Group;
use \koolreport\processes\Limit;

class MyReport extends \koolreport\KoolReport
{
    public function settings()
    {
        return array(
            "dataSources"=>array(
                "sakila_rental"=>array(
                    "connectionString"=>"mysql:host=sampledb.koolreport.com;dbname=sakila",
                    "username"=>"expusr",
                    "password"=>"koolreport sampledb",
                    "charset"=>"utf8"
                )
            )
        );
    }   
    protected function setup()
    {
        $this->src('sakila_rental')
        ->query("SELECT payment_date,amount FROM payment")
        ->pipe(new TimeBucket(array(
            "payment_date"=>"month"
        )))
        ->pipe(new Group(array(
            "by"=>"payment_date",
            "sum"=>"amount"
        )))
        ->pipe($this->dataStore('sale_by_month'));
    } 

}