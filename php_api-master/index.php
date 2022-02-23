<?php

/* maybe required - depends if youre using a framework which automaticly loading this file
require_once "vendor/autoload.php";
*/ 
require_once "vendor/autoload.php";

use Keepa\API\Request;
use Keepa\API\ResponseStatus;
use Keepa\helper\CSVType;
use Keepa\helper\CSVTypeWrapper;
use Keepa\helper\KeepaTime;
use Keepa\helper\ProductAnalyzer;
use Keepa\helper\ProductType;
use keepa\helper\CategoryTreeEntry;
use Keepa\KeepaAPI;
use Keepa\objects\AmazonLocale;
use Keepa\objects\ProductFinderRequest;
use Keepa\tests\CsvTypeTest;


    if(isset($_POST['search_term'])){
        $search = $_POST['search_term'];
        $startDate = $_POST['start_date'];
        $api = new KeepaAPI("8eu7ht60h1tvohbo39ss1blidsd1vihco9dopgki6ov1lqldfrd03n3dgggkig9j");
        $r = Request::getProductRequest(AmazonLocale::JP, 0, $startDate, date("Y-m-d"), 0, true, [$search]);
        $response = $api->sendRequestWithRetry($r);
        $res = array();
        // print_r($response);exit(0);

			switch ($response->status) {
                case ResponseStatus::OK:
                    // iterate over received product information
                    foreach ($response->products as $product){
                        if ($product->productType == ProductType::STANDARD || $product->productType == ProductType::DOWNLOADABLE) {

                            //get basic data of product and print to stdout
                            $res['currentAmazonPrice'] = ProductAnalyzer::getLowestAndHighest($product->csv[CSVType::AMAZON], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::AMAZON))[0];
                            
                            $res['LISTPRICE'] = ProductAnalyzer::getLowestAndHighest($product->csv[CSVType::LISTPRICE], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::LISTPRICE))[0];
                            
                            $res['current_new_price'] = ProductAnalyzer::getLowestAndHighest($product->csv[CSVType::MARKET_NEW], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::MARKET_NEW))[0];

                            $res['current_new_count'] = ProductAnalyzer::getLowestAndHighest($product->csv[CSVType::COUNT_NEW], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::COUNT_NEW))[0];
                            
                            $res['current_used_price'] = ProductAnalyzer::getLowestAndHighest($product->csv[CSVType::USED], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::USED))[0];
                           
                            $res['current_used_count'] = ProductAnalyzer::getLowestAndHighest($product->csv[CSVType::COUNT_USED], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::COUNT_USED))[0];
                            
                            $res['BUY_BOX_SHIPPING'] = ProductAnalyzer::getLowestAndHighest($product->csv[CSVType::BUY_BOX_SHIPPING], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::BUY_BOX_SHIPPING))[0];

                            $res['USED_NEW_SHIPPING'] = ProductAnalyzer::getLowestAndHighest($product->csv[CSVType::USED_NEW_SHIPPING], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::USED_NEW_SHIPPING))[0];
                            
                            $res['SALES'] = ProductAnalyzer::getLowestAndHighest($product->csv[CSVType::SALES], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::SALES))[0];
                            
                            $res['MARKET_NEW_LIST'] = $product->csv[CSVType::MARKET_NEW];

                            $res['USED_LIST'] = $product->csv[CSVType::USED];

                            $res['LISTPRICE_LIST'] = $product->csv[CSVType::LISTPRICE];

                            $res['AMAZON_LIST'] = $product->csv[CSVType::AMAZON];

                            $res['USED_NEW_SHIPPING'] = $product->csv[CSVType::USED_NEW_SHIPPING];

                            $res['USED_VERY_GOOD_SHIPPING'] = $product->csv[CSVType::USED_VERY_GOOD_SHIPPING];

                            $res['USED_GOOD_SHIPPING'] = $product->csv[CSVType::USED_GOOD_SHIPPING];

                            $res['USED_ACCEPTABLE_SHIPPING'] = $product->csv[CSVType::USED_ACCEPTABLE_SHIPPING];

                            $res['partNumber'] = $product->partNumber;

                            // $res['stats_current'] = $product->stats->current;

                            // $res['stats_avg'] = $product->stats->avg;

                            // $res['stats_avg30'] = $product->stats->avg30;

                            // $res['stats_avg90'] = $product->stats->avg90;

                            // $res['stats_avg180'] = $product->stats->avg180;

                            $res['manufacturer'] = $product->manufacturer;

                            $res['COUNT_NEW'] = $product->csv[CSVType::COUNT_NEW];

                            $res['COUNT_USED'] = $product->csv[CSVType::COUNT_USED];

                            $start_cart_date = strtotime(date('c', strtotime('-90 days'))) * 1000;

                            $res['sold_count_new'] = ProductAnalyzer::getExtremePointsInIntervalWithTime($product->csv[CSVType::COUNT_NEW], KeepaTime::unixInMillisToKeepaMinutes($start_cart_date), KeepaTime::nowMinutes(), CSVTypeWrapper::getCSVTypeFromIndex(CSVType::COUNT_NEW))[1];
                            
                            $res['sold_new'] = ProductAnalyzer::getExtremePointsInIntervalWithTime($product->csv[CSVType::COUNT_NEW], KeepaTime::unixInMillisToKeepaMinutes($start_cart_date), KeepaTime::nowMinutes(), CSVTypeWrapper::getCSVTypeFromIndex(CSVType::COUNT_NEW))[1];

                            $res['sold_count_used'] = ProductAnalyzer::getExtremePointsInIntervalWithTime($product->csv[CSVType::COUNT_USED], KeepaTime::unixInMillisToKeepaMinutes($start_cart_date), KeepaTime::nowMinutes(), CSVTypeWrapper::getCSVTypeFromIndex(CSVType::COUNT_USED))[1];

                            // $res['USED_LOWEST'] = ProductAnalyzer::getLowestAndHighestWithTime($product->csv[CSVType::USED], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::USED));

                            $res['EBAY_NEW_SHIPPING'] = $product->csv[CSVType::RESERVED_1];

                            $res['EBAY_USED_SHIPPING'] = $product->csv[CSVType::RESERVED_2];
                            
                            $res['releaseDate'] = date("Y-m-d", strtotime($product->releaseDate));
                            
                            $imgName = explode(',',$product->imagesCSV);    $res['image_name'] = $imgName[0];

                            $res['title'] = $product->title;
                            
                            $res['salesRanks'] = $product->salesRanks;

                            $res['buyBoxSellerIdHistory'] = $product->buyBoxSellerIdHistory;

                            $res['variations'] = $product->variations;

                            $categoryName = '';

                            if($product->categoryTree) {
                                foreach($product->categoryTree as $idx => $cat){
                                    $categoryName .= $cat->name . " > ";
                                }
                            }
                            $res['categoryName'] = $categoryName;

                            $res['asin'] = $product->asin;
                            $res['ean'] = $product->eanList;

                            $soldEndDate = new DateTime();
                            $soldStartDate = date_sub(new DateTime(), date_interval_create_from_date_string("90 days"));

                            $req_sold = Request::getProductRequest(AmazonLocale::JP, 0, date_format($soldStartDate,"Y-m-d"), date_format($soldEndDate,"Y-m-d"), 0, true, [$search]);
                            $res_sold = $api->sendRequestWithRetry($req_sold);

                            switch ($res_sold->status) {
                                case ResponseStatus::OK:
                                    foreach ($res_sold->products as $sol_product){
                                        if ($sol_product->productType == ProductType::STANDARD || $sol_product->productType == ProductType::DOWNLOADABLE) {
                                            $res['sold_new'] = ProductAnalyzer::getLowestAndHighest($sol_product->csv[CSVType::MARKET_NEW], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::MARKET_NEW))[0];
                                            $res['sold_used'] = ProductAnalyzer::getLowestAndHighest($sol_product->csv[CSVType::USED], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::USED))[0];
                                            // $res['sold_count_new'] = ProductAnalyzer::getLowestAndHighest($sol_product->csv[CSVType::COUNT_NEW], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::COUNT_NEW))[0];
                                            // $res['sold_count_used'] = ProductAnalyzer::getLowestAndHighest($sol_product->csv[CSVType::COUNT_USED], CSVTypeWrapper::getCSVTypeFromIndex(CSVType::COUNT_USED))[0];
                                        }
                                    }
                                    break;
                                default:
                                    print_r($res_sold);
                                }

                            // check if the product is in stock -1 -> out of stock
							// if ($res['currentAmazonPrice'] == -1) {
                            //     echo sprintf("%s %s is currently not sold by Amazon (out of stock) %s",$product->asin,$product->title,PHP_EOL);
                            // } else {
                            //     echo sprintf("%s %s Current Amazon Price: %s %s",$product->asin,$product->title,$res['currentAmazonPrice'],PHP_EOL);
                            // }

                            // if ($current_new_price == -1) {
                            //     echo sprintf("%s %s is currently not sold by Amazon (out of stock) %s",$product->asin,$product->title,PHP_EOL);
                            // } else {
                            //     echo sprintf("%s %s Current Amazon Price: %s %s",$product->eanList[0],$product->title,$current_new_price[0],PHP_EOL);
                            // }
                            // if ($current_used_price == -1) {
                            //     echo sprintf("%s %s is currently not sold by Amazon (out of stock) %s",$product->asin,$product->title,PHP_EOL);
                            // } else {
                            //     echo sprintf("%s %s Current Amazon Price: %s %s",$product->eanList[0],$product->title,$current_used_price[0],PHP_EOL);
                            // }
                            
							// get weighted mean of the last 90 days for Amazon
							$weightedMean90days = ProductAnalyzer::calcWeightedMean($product->csv[CSVType::AMAZON], KeepaTime::nowMinutes(),90, CSVTypeWrapper::getCSVTypeFromIndex(CSVType::AMAZON));
						} else {

                        }
                    }
					break;
				default:
					print_r($response);
			}
            echo json_encode($res);
            exit();
        }