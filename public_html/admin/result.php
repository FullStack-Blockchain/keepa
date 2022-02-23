<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>リーファ - Home Page</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" /><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /></head>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../assets/js/config.js"></script>
    <script src="../vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="../vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="../assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <!-- <link href="../assets/css/theme.min.css" rel="stylesheet" id="style&#45;default"> -->
    <link href="../assets/css/theme.css" rel="stylesheet" id="style-default">
    <link href="../assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link href="../assets/css/admin.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/flick/jquery-ui.min.css">
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
	  <script type="text/javascript">
        $(function () {
            // 固定する場所が存在することの確認
            if ($('.fixing-base .fixing-box').length > 0) {
                var baseSelector = '.fixing-base'
                var fixingSelector = baseSelector + ' .fixing-box'

                $(window).on('load scroll resize', function () {
                    var baseTop = $(baseSelector).offset().top

                    //固定開始位置より後にスクロールされた場合
                    if ($(window).scrollTop() > baseTop) {
                        $(fixingSelector).addClass('fixed')
                        $(baseSelector).height($(fixingSelector).outerHeight())
                        $(fixingSelector).width($(baseSelector).width())

                        //固定開始位置以前にスクロールされた場合
                    } else {
                        $(fixingSelector).removeClass('fixed')
                        $(baseSelector).height('')
                        $(fixingSelector).width('')
                    }
                })
            }

            Chart.plugins.register({
                afterDatasetsDraw: function (chart) {
                    if (chart.tooltip._active && chart.tooltip._active.length) {
                        var activePoint = chart.tooltip._active[0],
                            ctx = chart.ctx,
                            y_axis = chart.scales['y-axis-0'],
                            x = activePoint.tooltipPosition().x,
                            topY = y_axis.top,
                            bottomY = y_axis.bottom;
                        // draw line
                        ctx.save();
                        ctx.beginPath();
                        ctx.moveTo(x, topY);
                        ctx.lineTo(x, bottomY);
                        ctx.lineWidth = 1;
                        ctx.strokeStyle = '#C1C1C1';
                        ctx.stroke();
                        ctx.restore();
                    }
                }
            });

        });

        /* ------------------------------
		 Loading イメージ表示関数
		 引数： msg 画面に表示する文言
		 ------------------------------ */
        function dispLoading(msg) {
            // 引数なし（メッセージなし）を許容
            if (msg == undefined) {
                msg = "";
            }
            // 画面表示メッセージ
            var dispMsg = "<div class='loadingMsg'>" + msg + "</div>";
            // ローディング画像が表示されていない場合のみ出力
            if ($("#loading").length == 0) {
                $("body").append("<div id='loading'>" + dispMsg + "</div>");
            }
        }

		/* ------------------------------
		 Loading イメージ削除関数
		 ------------------------------ */
        function removeLoading() {
            $("#loading").remove();
        }

        function ClearButton_Click() {
            $("#MainContent_txt_Keyword").val("");
        }
    </script>
    <style type="text/css">
        h4 {
            font-weight: bolder;
        }

        .fixing-base .fixing-box.fixed {
            position: fixed;
            top: 51px;
            z-index: 9999;
            background-color:#FFF;
        }
    </style>

    
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <?php include "includes/sidebar.php"; ?>
        <div class="content">
        <?php include "includes/navbar.php"; ?>
          <div class="row g-3 mb-3">
            <div class="col-md-6 col-xxl-6">
              <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0" style="text-align:center;">
                  <h3 id="MainContent_lbl_Title">
                    <a href="#" id="MainContent_link_Title" class="text-primary mb-1" target="_blank">
                    </a>
                  </h3>
                  <div style="margin-top: 35px;">
                    <a href="#" id="MainContent_link_Image" target="_blank">
                      <img id="MainContent_img_Image" src="../assets/img/search.png" style="width: 300px; height: 300px;" />
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-xxl-6">
              <div class="card h-md-100">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2">大型・特大型</h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                  <div class="table-responsive scrollbar">
                    <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                      <tbody>
                        <tr class="border-bottom border-200">
                          <th>カテゴリ</th>
                          <td>
                            <span id="MainContent_lbl_Category"><p id="catid"></p></span>
                          </td>
                        </tr>
                        <tr class="border-bottom border-200">
                          <th>ランキング</th>
                          <td>
                            <span id="MainContent_lbl_Ranks"><p id="sales"></p></span>
                          </td>
                        </tr>
                        <tr class="border-bottom border-200">
                          <th>ASIN</th>
                          <td>
                            <span id="MainContent_lbl_Asin"><p id="asin"></p></span>
                          </td>
                        </tr>
                        <tr class="border-bottom border-200">
                          <th>JAN</th>
                          <td>
                            <span id="MainContent_lbl_JAN"><p id="ean"></p></span>
                          </td>
                        </tr>
                        <tr class="border-bottom border-200">
                          <th>参考価格</th>
                          <td>
                            <span id="MainContent_lbl_newPrice"><p id="lblnewPrice"></p></span>
                          </td>
                        </tr>
                        <tr class="border-bottom border-200">
                          <th>規格番号</th>
                          <td>
                            <span id="MainContent_lbl_partNumber"><p id="partNumber"></p></span>
                          </td>
                        </tr>
                        <tr class="border-bottom border-200">
                          <th>メーカー</th>
                          <td>
                            <span id="MainContent_lbl_Manufacturer"><p id="manufacturer"></p></span>
                          </td>
                        </tr>
                        <tr class="border-bottom border-200">
                          <th>発売日</th>
                          <td>
                            <span id="MainContent_lbl_ReleaseDate"><p id="releaseDate"></p></span>
                          </td>
                        </tr>
                        <tr class="border-bottom border-200">
                          <th>バリエーション</th>
                          <td>
                            <span id="MainContent_lbl_Variations"><p id="variations"></p></span>
                          </td>
                        </tr>
                        <tr class="border-bottom border-200">
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-12 col-xxl-12">
              <div class="card h-lg-100 overflow-hidden">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2">損益分岐点</h6>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive scrollbar">
                    <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                      <thead class="bg-light">
                        <th>コンディション</th>
                        <th class="text-center">最安値</th>
                        <th class="text-center">出品者数</th>
                        <th class="text-center">3か月の販売数(販売数/出品者数)</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="color: #569EFD; font-weight: bold;">カート</td>
                          <td class="profit_loss_cart" id="MainContent_lbl_CartPrice"><p id="CartPrice"></p></td>
                          <td class="profit_loss_cart" id="MainContent_lbl_CartSeller">-</td>
                          <td class="profit_loss_cart" id="MainContent_lbl_CartSoldQuantity">-</td>
                        </tr>
                        <tr>
                          <td style="color: #6DCD3F; font-weight: bold;">新品</td>
                          <td class="profit_loss_new" id="MainContent_lbl_NewPrice"><p id="NewPrice"></p></td>
                          <td class="profit_loss_new" id="MainContent_lbl_NewSeller"><p id="current_new_count"></p></td>
                          <td class="profit_loss_new" id="MainContent_lbl_NewSoldQuantity"><p id="sold_count_new"></p></td>
                        </tr>
                        <tr>
                          <td style="color: #EF6433; font-weight: bold;">中古</td>
                          <td class="profit_loss_used" id="MainContent_lbl_UsedPrice"><p id="UsedPrice"></p></td>
                          <td class="profit_loss_used" id="MainContent_lbl_UsedSeller"><p id="current_used_count"></p></td>
                          <td class="profit_loss_used" id="MainContent_lbl_UsedSoldQuantity"><p id="sold_count_used"></p></td>
                        </tr>
                        <tr>
                          <td style="color: #528C4C; font-weight: bold;">Amazon</td>
                          <td class="profit_loss_amazon" id="MainContent_lbl_AmazonPrice"><p id="AmazonPrice"></p></td>
                          <td class="profit_loss_amazon" id="MainContent_lbl_AmazonSeller">-</td>
                          <td class="profit_loss_amazon" id="MainContent_lbl_AmazonSoldQuantity">-</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-12 col-xxl-12">
              <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0" style="text-align:center;">

                <div class="col-md-12 col-xxl-12">
                  <ul class="nav nav-tabs nav-pills nav-justified">
                    <li class="nav-item">
                        <!-- <input value="Term1" name="ctl00$MainContent$tab_item" type="radio" id="MainContent_Term1" /> -->
                      <!-- <a id="MainContent_btn_ChangeTerm1" class="nav&#45;link tab_item" for="Term1" href="javascript:__doPostBack(&#38;#39;ctl00$MainContent$btn_ChangeTerm1&#38;#39;,&#38;#39;&#38;#39;)" data&#45;toggle="tab">1か月</a> -->
                      <a id="MainContent_btn_ChangeTerm1" class="nav-link tab_item" for="Term1" href="javascript:__doPostBack(&#39;ctl00$MainContent$btn_ChangeTerm1&#39;,&#39;&#39;)" data-toggle="tab">1か月</a>
                    </li>
                    <li class="nav-item">
                      <!-- <input value="Term3" name="ctl00$MainContent$tab_item" type="radio" id="MainContent_Term3" checked="checked" /> -->
                      <a id="MainContent_btn_ChangeTerm3" class="nav-link tab_item active" for="Term3" href="javascript:__doPostBack(&#39;ctl00$MainContent$btn_ChangeTerm3&#39;,&#39;&#39;)" data-toggle="tab">3か月</a>
                    </li>
                    <li class="nav-item">
                      <!-- <input value="Term6" name="ctl00$MainContent$tab_item" type="radio" id="MainContent_Term6" /> -->
                      <a id="MainContent_btn_ChangeTerm6" class="nav-link tab_item" for="Term6" href="javascript:__doPostBack(&#39;ctl00$MainContent$btn_ChangeTerm6&#39;,&#39;&#39;)" data-toggle="tab">6か月</a>
                    </li>
                    <li class="nav-item">
                      <!-- <input value="Term12" name="ctl00$MainContent$tab_item" type="radio" id="MainContent_Term12" /> -->
                      <a id="MainContent_btn_ChangeTerm12" class="nav-link tab_item" for="Term12" href="javascript:__doPostBack(&#39;ctl00$MainContent$btn_ChangeTerm12&#39;,&#39;&#39;)" data-toggle="tab">12か月</a>
                    </li>
                    <li class="nav-item">
                      <!-- <input value="TermAll" name="ctl00$MainContent$tab_item" type="radio" id="MainContent_TermAll" /> -->
                      <a id="MainContent_btn_ChangeTermAll" class="nav-link tab_item" for="TermAll" href="javascript:__doPostBack(&#39;ctl00$MainContent$btn_ChangeTermAll&#39;,&#39;&#39;)" data-toggle="tab">全期間</a>
                    </li>
                  </ul>
                  <input type="hidden" id="hidSelectMonth" name="hidSelectMonth" value="1" />
                </div>
              </div>



              <div class="col-lg-12" style="text-align:center; margin-bottom: -10px;">
                <div class="graph_title">最安値</div>
                <p>
                <input class="form-check-input form-check-input-primary" id="cartPrice" name="cartPrice" type="checkbox" checked="checked" />
                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="cartPrice">カート価格<span class="text-dark d-none d-md-inline"></span></label>
                <input class="form-check-input ms-2 form-check-input-success opacity-75" id="newLowestPrice" name="newLowestPrice" type="checkbox" checked="checked" />
                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="newLowestPrice">新品最安値<span class="text-dark d-none d-md-inline"></span></label>
                <input class="form-check-input ms-2 form-check-input-danger opacity-75" id="usedLowestPrice" name="usedLowestPrice" type="checkbox" checked="checked" />
                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="usedLowestPrice">中古最安値<span class="text-dark d-none d-md-inline"></span></label>
                <input class="form-check-input ms-2 form-check-input-warning opacity-75" id="amazonPrice" name="amazonPrice" type="checkbox" checked="checked" />
                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="amazonPrice">Amazon本体価格<span class="text-dark d-none d-md-inline"></span></label>

                <div id="lowest_price_dsp">
                  <div id="lowest_price_chart" class="echart-line-lowest-price h-100" style="margin-left: 20px;" data-echart-responsive="true"
                  data-options='{"selectMonth":"hidSelectMonth", "optionOne":"cartPrice","optionTwo":"newLowestPrice", "optionTree":"usedLowestPrice", "optionFour":"amazonPrice"}'></div>
                </div>

                </p>
            </div>
        <div id="MainContent_div_UsedCondition" class="row">
            <div class="col-lg-12" style="text-align:center; margin-bottom: -10px;">
                <div class="graph_title">中古コンディション別価格(送料込み)</div>
                <p>
                <input class="form-check-input ms-2 form-check-input-primary opacity-75" id="brandNew" name="brandNew" type="checkbox" checked="checked" />
                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="brandNew">ほぼ新品<span class="text-dark d-none d-md-inline"></span></label>
                <input class="form-check-input ms-2 form-check-input-success opacity-75" id="veryGood" name="veryGood" type="checkbox" checked="checked" />
                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="veryGood">非常に良い<span class="text-dark d-none d-md-inline"></span></label>
                <input class="form-check-input ms-2 form-check-input-danger opacity-75" id="goodCondition" name="goodCondition" type="checkbox" checked="checked" />
                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="goodCondition">良い<span class="text-dark d-none d-md-inline"></span></label>
                <input class="form-check-input ms-2 form-check-input-warning opacity-75" id="possibleCondition" name="possibleCondition" type="checkbox" checked="checked" />
                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="possibleCondition">可<span class="text-dark d-none d-md-inline"></span></label>

                <div id="used_condition_dsp">
                  <div id="used_condition_chart" class="echart-line-used-price h-100" style="margin-left: 20px;" data-echart-responsive="true"
                    data-options='{"selectMonth":"hidSelectMonth", "optionOne":"brandNew","optionTwo":"veryGood", "optionTree":"goodCondition", "optionFour":"possibleCondition"}'></div>
                </div>

                </p>
                  </div>
            </div>
        <div class="row">
          <div class="col-lg-12" style="text-align:center; margin-bottom: -10px;">
            <div class="graph_title">出品者数</div>
            <p>
            <input class="form-check-input form-check-input-primary opacity-75" id="newNumberOfSellers" name="newNumberOfSellers" type="checkbox" checked="checked" />
            <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="newNumberOfSellers">新品出品者数<span class="text-dark d-none d-md-inline"></span></label>
            <input class="form-check-input ms-2 form-check-input-warning opacity-75" id="usedNumberOfSellers" name="usedNumberOfSellers" type="checkbox" checked="checked" />
            <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="usedNumberOfSellers">中古出品者数<span class="text-dark d-none d-md-inline"></span></label>

            <div id="number_of_sellers_dsp">
              <div id="number_of_sellers_chart" class="echart-line-number-of-sellers h-100" style="margin-left: 20px;" data-echart-responsive="true" data-options='{"selectMonth":"hidSelectMonth", "optionOne":"newNumberOfSellers","optionTwo":"usedNumberOfSellers"}'></div>
            </div>


                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="text-align:center; margin-bottom: -10px;">
                <div class="graph_title">ランキング</div>
                <p>
                <div id="ranking_dsp">
                  <div id="ranking_chart" class="echart-line-ranking h-100" style="margin-left: 20px;" data-echart-responsive="true" data-options='{"selectMonth":"hidSelectMonth"}'></div>
                </div>
                </p>
            </div>
        </div>

        <div id="MainContent_UpdatePanel1">
          <div class="row g-3 mb-3">
            <div class="col-md-12 col-xxl-12">
              <div class="card h-md-100 ecommerce-card-min-width">
                <div class="accbox2">
                  <div class="col-md-12 lbl_click">
                    <label for="lbl_CartAcquisitionRate" id="lbl_cart_list" style="cursor: pointer;">▼カート取得率▼</label>
                    <!-- <input type="checkbox" id="lbl_CartAcquisitionRate" class="cssacc2" /> -->
                  </div>
                </div>

                <div class="card-body p-0">
                  <div class="accshow2" style="display: block;" id="cart_list">
                    <!--ここに隠す中身-->

                    <div class="header-area">
                      <div class="table-responsive scrollbar">
                        <table class="table table-dashboard mb-0 table-borderless table-striped fs--1 border-200">
                          <thead class=bg-light>
                            <tr>
                              <th style="width:5%; text-align:center; vertical-align:middle;">
                                カート取得率
                              </th>
                              <th style="width:5%; text-align:center; vertical-align:middle;">
                                セラーID
                              </th>
                            </tr>
                          </thead>
                          <div id = "seller_data" class = "data-area"></div>
                        </table>
                      </div>
                    </div>

                    <table id="MainContent_Table2" class="type01 type02" style="width:100%;">

                    </table>
                  </div><!--//.accshow2-->
                </div><!--//.accbox-->
              </div>
                <div style="height: 20px;"></div>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-12 col-xxl-12">
              <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0" style="text-align:center;">
                  <div class="accbox" align="center">
                    <label for="link_SellerList">
                      <a href="https://www.amazon.co.jp/gp/offer-listing/" + data.asin id="MainContent_link_SellerList" target="_blank">
                        <i class="material-icons">launch</i>Amazon出品者一覧へ
                        <!-- <span class="amazon_click">Amazon出品者一覧へ</span> -->
                      </a>
                    </label>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>

        <!-- <div class="row g-3 mb-3">
          <div class="col-md-12 col-xxl-12">
            <div class="card h-md-100 ecommerce-card-min-width">
              <div class="card-header pb-0" style="text-align:center;">
                <div style="text-align: left;">
                  <h5>月ごとの販売数</h5>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                  <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                    <thead class="bg-light">
                      <tr>
                        <th>
                        </th>
                        <th>
                          過去1か月目販売数
                        </th>
                        <th>
                          過去2か月目販売数
                        </th>
                        <th>
                          過去3か月目販売数
                        </th>
                        <th>
                          平均月間販売数
                        </th>
                        <th>
                          3か月合計販売数
                        </th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center;">
                      <tr>
                        <td>
                          合計
                        </td>
                        <td>
                          <span id="MainContent_lbl_TotalOneMonthQuantity">83</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_TotalTwoMonthQuantity">100</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_TotalThreeMonthQuantity">93</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_TotalAverage">92</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_TotalSum">276</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          新品
                        </td>
                        <td>
                          <span id="MainContent_lbl_NewOneMonthQuantity">81</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_NewTwoMonthQuantity">98</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_NewThreeMonthQuantity">91</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_NewAverage">90</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_NewSum">270</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          中古
                        </td>
                        <td>
                          <span id="MainContent_lbl_UsedOneMonthQuantity">2</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_UsedTwoMonthQuantity">2</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_UsedThreeMonthQuantity">2</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_UsedAverage">2</span>
                        </td>
                        <td>
                          <span id="MainContent_lbl_UsedSum">6</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> -->

          <div class="row g-3 mb-3">
            <div class="col-md-12 col-xxl-12">
              <div class="card h-md-100 ecommerce-card-min-width">
                <div class="accbox">
                  <div class="col-md-12 lbl_click">
                    <label for="label1" id="lbl_low_price" style="cursor: pointer;">▼最安値一覧▼</label>
                    <!-- <input type="checkbox" id="label1" class="cssacc" /> -->
                  </div>
                </div>

                <div class="card-body p-0">
                  <div class="accshow" style="display: none;" id="low_price_list">
                  <!-- <div class="accshow" id="low_price_list"> -->
                    <!--ここに隠す中身-->
                    <!-- <div class="fixing&#45;base"> -->
                      <div class="fixing-box">
                        <!-- <table id="MainContent_Table1" class="type02 type03" style="width:100%;"> -->
                        <div class="table-responsive scrollbar">
                          <table class="table table-dashboard mb-0 table-borderless table-striped fs--1 border-200">
                            <thead class="bg-light" style="text-align: center;">
                              <tr>
                                <!-- <td class="tbl_width date_color" style="background&#45;color:#E9ECEF;"> -->
                                <th>
                                  調査日
                                </th>
                                <th>
                                  ランキング
                                </th>
                                <th>
                                  新品出品者数
                                </th>
                                <th>
                                  新品最安値
                                </th>
                                <th>
                                  中古出品者数
                                </th>
                                <th>
                                  中古最安値
                                </th>
                              </tr>
                            </thead>
                            <!-- <table id="MainContent_tbl_Detail" class="type01 type02" style="width:100%;"> -->
                              <tbody style="text-align: center;" id="MainContent_tbl_Detail">
                                <tr>
                                  <td class="tbl_width date_color">12/31 00:48</td><td class="tbl_width rank_color" style="font-weight:bolder;color:#FF0000;">1674↑</td><td class="tbl_width new_color">9</td><td class="tbl_width new_color">7955</td><td class="tbl_width used_color">5</td><td class="tbl_width used_color">8442</td>
                                </tr>
                              </tbody>
                            <!-- </table> -->
                          </table>
                        </div><!--//.accshow-->
                      </div>
                    <!-- </div> -->
                  </div>
                </div>
                <div style="height: 20px;"></div>
              </div>
            </div>

            <footer class="footer">
              <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                <div class="col-12 col-sm-auto text-center">
                  <p class="mb-0 text-600">2021 &copy; リーファ</p>
                </div>
              </div>
            </footer>
            <!--     <hr /> -->
            <!-- </div> -->
            <!-- <div style="border&#45;top&#45;style: solid; border&#45;color: #456380; border&#45;top&#45;width: 1px;"> -->
            <!--     <footer id="footer_wrapper" align="center" style="background&#45;color:#00C0C3; color:white; width:100%; margin&#45;bottom: &#45;20px; padding&#45;bottom: 10px;"> -->
            <!--   <section id="footer" align="center"> -->
            <!--     <br /> -->
            <!--     <div style="color: #FFF"> -->
            <!--  -->
            <!--     </div> -->
            <!--   </section> -->
            <!--         <br /> -->
            <!-- <p>&#38;copy; 2021 &#45; リーファ</p> -->
            <!--     </footer> -->
            <!-- </div> -->


<!--             <script type="text/javascript"> -->
<!--               //<![CDATA[ -->
<!--  -->
<!--               theForm.oldSubmit = theForm.submit; -->
<!-- theForm.submit = WebForm_SaveScrollPositionSubmit; -->
<!--  -->
<!-- theForm.oldOnSubmit = theForm.onsubmit; -->
<!-- theForm.onsubmit = WebForm_SaveScrollPositionOnSubmit; -->
<!-- //]]> -->
<!--             </script> -->
            </form>



    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- <div class="offcanvas offcanvas&#45;end settings&#45;panel border&#45;0" id="settings&#45;offcanvas" tabindex="&#45;1" aria&#45;labelledby="settings&#45;offcanvas"> -->
    <!--   <div class="offcanvas&#45;header settings&#45;panel&#45;header bg&#45;shape"> -->
    <!--     <div class="z&#45;index&#45;1 py&#45;1 light"> -->
    <!--       <h5 class="text&#45;white"> <span class="fas fa&#45;palette me&#45;2 fs&#45;0"></span>Settings</h5> -->
    <!--       <p class="mb&#45;0 fs&#45;&#45;1 text&#45;white opacity&#45;75"> Set your own customized style</p> -->
    <!--     </div> -->
    <!--     <button class="btn&#45;close btn&#45;close&#45;white z&#45;index&#45;1 mt&#45;0" type="button" data&#45;bs&#45;dismiss="offcanvas" aria&#45;label="Close"></button> -->
    <!--   </div> -->
    <!--   <div class="offcanvas&#45;body scrollbar&#45;overlay px&#45;card" id="themeController"> -->
    <!--     <h5 class="fs&#45;0">Color Scheme</h5> -->
    <!--     <p class="fs&#45;&#45;1">Choose the perfect color mode for your app.</p> -->
    <!--     <div class="btn&#45;group d&#45;block w&#45;100 btn&#45;group&#45;navbar&#45;style"> -->
    <!--       <div class="row gx&#45;2"> -->
    <!--         <div class="col&#45;6"> -->
    <!--           <input class="btn&#45;check" id="themeSwitcherLight" name="theme&#45;color" type="radio" value="light" data&#45;theme&#45;control="theme" /> -->
    <!--           <label class="btn d&#45;inline&#45;block btn&#45;navbar&#45;style fs&#45;&#45;1" for="themeSwitcherLight"> <span class="hover&#45;overlay mb&#45;2 rounded d&#45;block"><img class="img&#45;fluid img&#45;prototype mb&#45;0" src="../assets/img/generic/falcon&#45;mode&#45;default.jpg" alt=""/></span><span class="label&#45;text">Light</span></label> -->
    <!--         </div> -->
    <!--         <div class="col&#45;6"> -->
    <!--           <input class="btn&#45;check" id="themeSwitcherDark" name="theme&#45;color" type="radio" value="dark" data&#45;theme&#45;control="theme" /> -->
    <!--           <label class="btn d&#45;inline&#45;block btn&#45;navbar&#45;style fs&#45;&#45;1" for="themeSwitcherDark"> <span class="hover&#45;overlay mb&#45;2 rounded d&#45;block"><img class="img&#45;fluid img&#45;prototype mb&#45;0" src="../assets/img/generic/falcon&#45;mode&#45;dark.jpg" alt=""/></span><span class="label&#45;text"> Dark</span></label> -->
    <!--         </div> -->
    <!--       </div> -->
    <!--     </div> -->
    <!--     <hr /> -->
    <!--     <div class="d&#45;flex justify&#45;content&#45;between"> -->
    <!--       <div class="d&#45;flex align&#45;items&#45;start"><img class="me&#45;2" src="../assets/img/icons/left&#45;arrow&#45;from&#45;left.svg" width="20" alt="" /> -->
    <!--         <div class="flex&#45;1"> -->
    <!--           <h5 class="fs&#45;0">RTL Mode</h5> -->
    <!--           <p class="fs&#45;&#45;1 mb&#45;0">Switch your language direction </p><a class="fs&#45;&#45;1" href="../../documentation/customization/configuration.html">RTL Documentation</a> -->
    <!--         </div> -->
    <!--       </div> -->
    <!--       <div class="form&#45;check form&#45;switch"> -->
    <!--         <input class="form&#45;check&#45;input ms&#45;0" id="mode&#45;rtl" type="checkbox" data&#45;theme&#45;control="isRTL" /> -->
    <!--       </div> -->
    <!--     </div> -->
    <!--     <hr /> -->
    <!--     <div class="d&#45;flex justify&#45;content&#45;between"> -->
    <!--       <div class="d&#45;flex align&#45;items&#45;start"><img class="me&#45;2" src="../assets/img/icons/arrows&#45;h.svg" width="20" alt="" /> -->
    <!--         <div class="flex&#45;1"> -->
    <!--           <h5 class="fs&#45;0">Fluid Layout</h5> -->
    <!--           <p class="fs&#45;&#45;1 mb&#45;0">Toggle container layout system </p><a class="fs&#45;&#45;1" href="../../documentation/customization/configuration.html">Fluid Documentation</a> -->
    <!--         </div> -->
    <!--       </div> -->
    <!--       <div class="form&#45;check form&#45;switch"> -->
    <!--         <input class="form&#45;check&#45;input ms&#45;0" id="mode&#45;fluid" type="checkbox" data&#45;theme&#45;control="isFluid" /> -->
    <!--       </div> -->
    <!--     </div> -->
    <!--     <hr /> -->
    <!--     <div class="d&#45;flex align&#45;items&#45;start"><img class="me&#45;2" src="../assets/img/icons/paragraph.svg" width="20" alt="" /> -->
    <!--       <div class="flex&#45;1"> -->
    <!--         <h5 class="fs&#45;0 d&#45;flex align&#45;items&#45;center">Navigation Position </h5> -->
    <!--         <p class="fs&#45;&#45;1 mb&#45;2">Select a suitable navigation system for your web application </p> -->
    <!--         <div> -->
    <!--           <div class="form&#45;check form&#45;check&#45;inline"> -->
    <!--             <input class="form&#45;check&#45;input" id="option&#45;navbar&#45;vertical" type="radio" name="navbar" value="vertical" data&#45;page&#45;url="../../modules/components/navs&#45;and&#45;tabs/vertical&#45;navbar.html" data&#45;theme&#45;control="navbarPosition" /> -->
    <!--             <label class="form&#45;check&#45;label" for="option&#45;navbar&#45;vertical">Vertical</label> -->
    <!--           </div> -->
    <!--           <div class="form&#45;check form&#45;check&#45;inline"> -->
    <!--             <input class="form&#45;check&#45;input" id="option&#45;navbar&#45;top" type="radio" name="navbar" value="top" data&#45;page&#45;url="../../modules/components/navs&#45;and&#45;tabs/top&#45;navbar.html" data&#45;theme&#45;control="navbarPosition" /> -->
    <!--             <label class="form&#45;check&#45;label" for="option&#45;navbar&#45;top">Top</label> -->
    <!--           </div> -->
    <!--           <div class="form&#45;check form&#45;check&#45;inline me&#45;0"> -->
    <!--             <input class="form&#45;check&#45;input" id="option&#45;navbar&#45;combo" type="radio" name="navbar" value="combo" data&#45;page&#45;url="../../modules/components/navs&#45;and&#45;tabs/combo&#45;navbar.html" data&#45;theme&#45;control="navbarPosition" /> -->
    <!--             <label class="form&#45;check&#45;label" for="option&#45;navbar&#45;combo">Combo</label> -->
    <!--           </div> -->
    <!--         </div> -->
    <!--       </div> -->
    <!--     </div> -->
    <!--     <hr /> -->
    <!--     <h5 class="fs&#45;0 d&#45;flex align&#45;items&#45;center">Vertical Navbar Style</h5> -->
    <!--     <p class="fs&#45;&#45;1 mb&#45;0">Switch between styles for your vertical navbar </p> -->
    <!--     <p> <a class="fs&#45;&#45;1" href="../../modules/components/navs&#45;and&#45;tabs/vertical&#45;navbar.html#navbar&#45;styles">See Documentation</a></p> -->
    <!--     <div class="btn&#45;group d&#45;block w&#45;100 btn&#45;group&#45;navbar&#45;style"> -->
    <!--         <div class="col&#45;6"> -->
    <!--           <input class="btn&#45;check" id="navbar&#45;style&#45;transparent" type="radio" name="navbarStyle" value="transparent" data&#45;theme&#45;control="navbarStyle" /> -->
    <!--           <label class="btn d&#45;block w&#45;100 btn&#45;navbar&#45;style fs&#45;&#45;1" for="navbar&#45;style&#45;transparent"> <img class="img&#45;fluid img&#45;prototype" src="../assets/img/generic/default.png" alt="" /><span class="label&#45;text"> Transparent</span></label> -->
    <!--         </div> -->
    <!--         <div class="col&#45;6"> -->
    <!--           <input class="btn&#45;check" id="navbar&#45;style&#45;inverted" type="radio" name="navbarStyle" value="inverted" data&#45;theme&#45;control="navbarStyle" /> -->
    <!--           <label class="btn d&#45;block w&#45;100 btn&#45;navbar&#45;style fs&#45;&#45;1" for="navbar&#45;style&#45;inverted"> <img class="img&#45;fluid img&#45;prototype" src="../assets/img/generic/inverted.png" alt="" /><span class="label&#45;text"> Inverted</span></label> -->
    <!--         </div> -->
    <!--         <div class="col&#45;6"> -->
    <!--           <input class="btn&#45;check" id="navbar&#45;style&#45;card" type="radio" name="navbarStyle" value="card" data&#45;theme&#45;control="navbarStyle" /> -->
    <!--           <label class="btn d&#45;block w&#45;100 btn&#45;navbar&#45;style fs&#45;&#45;1" for="navbar&#45;style&#45;card"> <img class="img&#45;fluid img&#45;prototype" src="../assets/img/generic/card.png" alt="" /><span class="label&#45;text"> Card</span></label> -->
    <!--         </div> -->
    <!--         <div class="col&#45;6"> -->
    <!--           <input class="btn&#45;check" id="navbar&#45;style&#45;vibrant" type="radio" name="navbarStyle" value="vibrant" data&#45;theme&#45;control="navbarStyle" /> -->
    <!--           <label class="btn d&#45;block w&#45;100 btn&#45;navbar&#45;style fs&#45;&#45;1" for="navbar&#45;style&#45;vibrant"> <img class="img&#45;fluid img&#45;prototype" src="../assets/img/generic/vibrant.png" alt="" /><span class="label&#45;text"> Vibrant</span></label> -->
    <!--         </div> -->
    <!--       </div> -->
    <!--     </div> -->
    <!--     <div class="text&#45;center mt&#45;5"><img class="mb&#45;4" src="../assets/img/icons/spot&#45;illustrations/47.png" alt="" width="120" /> -->
    <!--       <h5>Like What You See?</h5> -->
    <!--       <p class="fs&#45;&#45;1">Get Falcon now and create beautiful dashboards with hundreds of widgets.</p><a class="mb&#45;3 btn btn&#45;primary" href="https://themes.getbootstrap.com/product/falcon&#45;admin&#45;dashboard&#45;webapp&#45;template/" target="_blank">Purchase</a> -->
    <!--     </div> -->
    <!--   </div> -->
    <!-- </div><a class="card setting&#45;toggle" href="#settings&#45;offcanvas" data&#45;bs&#45;toggle="offcanvas"> -->
    <!--   <div class="card&#45;body d&#45;flex align&#45;items&#45;center py&#45;md&#45;2 px&#45;2 py&#45;1"> -->
    <!--     <div class="bg&#45;soft&#45;primary position&#45;relative rounded&#45;start" style="height:34px;width:28px"> -->
    <!--       <div class="settings&#45;popover"><span class="ripple"><span class="fa&#45;spin position&#45;absolute all&#45;0 d&#45;flex flex&#45;center"><span class="icon&#45;spin position&#45;absolute all&#45;0 d&#45;flex flex&#45;center"> -->
    <!--               <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> -->
    <!--                 <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 &#45;0.105622 9.16879 &#45;0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C&#45;0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 &#45;0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path> -->
    <!--               </svg></span></span></span></div> -->
    <!--     </div><small class="text&#45;uppercase text&#45;primary fw&#45;bold bg&#45;soft&#45;primary py&#45;2 pe&#45;2 ps&#45;1 rounded&#45;end">customize</small> -->
    <!--   </div> -->
    <!-- </a> -->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <!-- <script src="../vendors/chart/chart.min.js"></script> -->
    <script src="../vendors/countup/countUp.umd.js"></script>
    <script src="../vendors/echarts/echarts.min.js"></script>
    <script src="../vendors/dayjs/dayjs.min.js"></script>
    <script src="../vendors/fontawesome/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../assets/data/result_chart_data.js"></script>
    <script src="../assets/js/theme.js"></script>

    <script>
      $(function() {
        var cart_list_flag = true;
        var low_price_flag = false;

        $('#low_price_list').css('display', 'none');

        $('#lbl_cart_list').click(function() {
          if (cart_list_flag){
            $('#cart_list').css('display', 'none');
            cart_list_flag = false;
          }else{
            $('#cart_list').css('display', 'block');
            cart_list_flag = true;
          }
        });

        $('#lbl_low_price').click(function() {
          if (low_price_flag){
            $('#low_price_list').css('display', 'none');
            low_price_flag = false;
          }else{
            $('#low_price_list').css('display', 'block');
            low_price_flag = true;
          }

        });

        $('.nav-tabs a').on('shown.bs.tab', function(event){
          var tabSelect = '';
          var x = $(event.target).text();         // active tab

          $('#lowest_price_chart').remove();
          $('#used_condition_chart').remove();
          $('#number_of_sellers_chart').remove();
          $('#ranking_chart').remove();
          $('#leafer_user_chart').remove();

          if (x == '1か月'){
            tabSelect = '0';
          }else if (x == '3か月'){
            tabSelect = '1';
          }else if (x == '6か月'){
            tabSelect = '2';
          }else if (x == '12か月'){
            tabSelect = '3';
          }else if (x == '全期間'){
            tabSelect = '4';
          }

          $('input[name="cartPrice"]').prop('checked', true);
          $('input[name="newLowestPrice"]').prop('checked', true);
          $('input[name="usedLowestPrice"]').prop('checked', true);
          $('input[name="amazonPrice"]').prop('checked', true);

          $('input[name="brandNew"]').prop('checked', true);
          $('input[name="veryGood"]').prop('checked', true);
          $('input[name="goodCondition"]').prop('checked', true);
          $('input[name="possibleCondition"]').prop('checked', true);

          $('input[name="newNumberOfSellers"]').prop('checked', true);
          $('input[name="usedNumberOfSellers"]').prop('checked', true);

          $('#hidSelectMonth').val(tabSelect);

          $("#lowest_price_dsp").append('<div id="lowest_price_chart" class="echart-line-lowest-price h-100" style="margin-left: 20px;" data-echart-responsive="true" data-options=\'{"selectMonth": "hidSelectMonth", "optionOne":"cartPrice","optionTwo":"newLowestPrice", "optionTree":"usedLowestPrice", "optionFour":"amazonPrice"}\'></div>');

          docReady(lowestPrice);

          $("#used_condition_dsp").append('<div id="used_condition_chart" class="echart-line-used-price h-100" style="margin-left: 20px;" data-echart-responsive="true" data-options=\'{"selectMonth":"hidSelectMonth", "optionOne":"brandNew","optionTwo":"veryGood", "optionTree":"goodCondition", "optionFour":"possibleCondition"}\'></div>');

          docReady(usedPrice);

          $("#number_of_sellers_dsp").append('<div id="number_of_sellers_chart" class="echart-line-number-of-sellers h-100" style="margin-left: 20px;" data-echart-responsive="true" data-options=\'{"selectMonth":"hidSelectMonth", "optionOne":"newNumberOfSellers","optionTwo":"usedNumberOfSellers"}\'></div>');

          docReady(numberOfSellers);

          $("#ranking_dsp").append('<div id="ranking_chart" class="echart-line-ranking h-100" style="margin-left: 20px;" data-echart-responsive="true" data-options=\'{"selectMonth":"hidSelectMonth"}\'></div>');

          docReady(chartRanking);

          $("#leafer_user_dsp").append('<div id="leafer_user_chart" class="echart-line-leafer-user h-100" style="margin-left: 20px;" data-echart-responsive="true" data-options=\'{"selectMonth":"hidSelectMonth"}\'></div>');

          docReady(leaferUser);
        });


      });
    </script>

<script>
      function dateToYMD(date) {
          var d = date.getDate();
          var m = date.getMonth() + 1; //Month from 0 to 11
          var y = date.getFullYear();
          return '' + y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
      }

      function addDays(inputDate, days) {
          var date = new Date(inputDate);
          date.setDate(date.getDate() + days);
          return date;
      }

      function getDates(startDate, stopDate) {
          var dateArray = new Array();
          var currentDate = startDate;
          while (currentDate <= stopDate) {
              dateArray.push(dateToYMD(new Date (currentDate)));
              currentDate = addDays(currentDate, 1);
          }
          return dateArray;
      }

      function getStartDate(monthSelect) {
          var startDate = new Date();
          
          switch (monthSelect) {
            case '0':
              startDate.setMonth(startDate.getMonth() - 1);
              break;
            case '1':
              startDate.setMonth(startDate.getMonth() - 3);
              break;
            case '2':
              startDate.setMonth(startDate.getMonth() - 6);
              break;
            case '3':
              startDate.setMonth(startDate.getMonth() - 12);
              break;
            default:
              startDate = new Date('2016-01-01');
              break;
          }
          return startDate;
      }

      function getDateRange(monthSelect){
          return getDates(getStartDate(monthSelect), new Date());
      }

      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
      var lowest_price_cart_price = '';
      var lowest_price_new_price = '';
      var lowest_price_used_price = '';
      var lowest_price_amazon_price = '';
      var used_price_brand_new = '';
      var used_price_very_good = '';
      var used_price_good_condition = '';
      var used_price_possible_condition = '';
      var number_of_sellers_new = '';
      var number_of_sellers_used = '';
      var ranking_chart = '';

      $('#search_term').on('keydown',function(e) {  
          if(e.which == 13){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url:'../../php_api-master/index.php',
                data:{
                  search_term: $('#search_term').val(),
                  start_date: '2016-01-01'
                },
                success:function(response) 
                {
                    var data = JSON.parse(response)
                    // console.warn(data)
                    $("#catid").html(data.CategoryTreeEntry);
                    if(data.BUY_BOX_SHIPPING == -1){
                      data.BUY_BOX_SHIPPING = '-'
                      $("#resultBox1_div").html(data.BUY_BOX_SHIPPING);
                    }
                    $("#MainContent_img_Image").attr("src", "https://images-na.ssl-images-amazon.com/images/I/" + data.image_name);
                    $("#MainContent_link_Title").attr("href", "https://www.amazon.co.jp/gp/product/" + data.asin);
                    $("#MainContent_link_Image").attr("href", "https://www.amazon.co.jp/gp/product/" + data.asin);
                    $("#MainContent_link_Title").html(data.title);
                    $("#catid").html(data.categoryName);
                    $("#sales").html(data.SALES);
                    $("#asin").html(data.asin);
                    $("#ean").html(data.ean);
                    $("#lblnewPrice").html(data.current_new_price);
                    $("#partNumber").html(data.partNumber);
                    $("#manufacturer").html(data.manufacturer);
                    $("#releaseDate").html(data.releaseDate);
                    if(data.variations != null && data.variations.length > 0)
                      $("#variations").html("あり");

                    $("#CartPrice").html("￥ " + data.LISTPRICE);
                    $("#NewPrice").html("￥ " + data.current_new_price);
                    $("#UsedPrice").html("￥ " + data.current_used_price);
                    $("#AmazonPrice").html("￥ " + data.currentAmazonPrice);
                    $("#current_new_count").html(data.current_new_count);
                    $("#current_used_count").html(data.current_used_count);
                    $("#sold_count_new").html(data.sold_new + " / " + data.sold_count_new);
                    $("#sold_count_used").html(data.sold_used + " / " + data.sold_count_used);
                    
                    lowest_price_cart_price = get_data_price(data.AMAZON_LIST);
                    lowest_price_new_price = get_data_price(data.MARKET_NEW_LIST);
                    lowest_price_used_price = get_data_price(data.USED_LIST);
                    lowest_price_amazon_price = get_data_price(data.LISTPRICE_LIST);

                    used_price_brand_new = get_data_price(data.USED_NEW_SHIPPING);
                    used_price_very_good = get_data_price(data.USED_VERY_GOOD_SHIPPING);
                    used_price_good_condition = get_data_price(data.USED_GOOD_SHIPPING);
                    used_price_possible_condition = get_data_price(data.USED_ACCEPTABLE_SHIPPING);

                    number_of_sellers_new = get_data_price(data.COUNT_NEW);
                    number_of_sellers_used = get_data_price(data.COUNT_USED);

                    let ranks = data.salesRanks[Object.keys(data.salesRanks)[0]];

                    ranking_chart = get_data_price(ranks);
                    // console.log(data.buyBoxSellerIdHistory);

                    let seller_chat = new Array();
                    for(let i = 1; i < data.buyBoxSellerIdHistory; i = i + 2){
                      if(seller_chat.find(element => element == data.buyBoxSellerIdHistory[i]) === undefined)
                        seller_chat[data.buyBoxSellerIdHistory[i]] = 0;
                      else
                        seller_chat[data.buyBoxSellerIdHistory[i]]++;
                    }
                    seller_chat.forEach(function(element, index, array){
                      $("#seller_data").append('<tr><tbody><tr><td style="text-align:center; background-color: #FFFFFF;"><span id="MainContent_ListView1_ctrl0_lbl_CartAcquisitionRate_0">'
                      + element / array.length * 100 + 
                      '</span></td><td style="text-align:center; background-color: #FFFFFF;"><a id="MainContent_ListView1_ctrl0_lnk_Seller_0" target="_blank" href="https://www.amazon.co.jp/gp/product/' + data.asin + '" href="javascript:__doPostBack(&#39;ctl00$MainContent$ListView1$ctrl0$ctl00$lnk_Seller&#39;,&#39;&#39;)">'
                       + index + '</a></td></tr></tbody></tr>');
                    });

                    let tbl_raw = '';

                    for(let i = 0; i < ranks.length; i = i + 2){
                      tbl_raw += '<tr><td class="tbl_width date_color">' + get_date_from_keepatime(ranks[i]).toString() +
                      '</td><td class="tbl_width rank_color" style="font-weight:bolder;color:#FF0000;">' + ((ranks[i + 1]) ? ranks[i + 1] : '').toString() +
                      '</td><td class="tbl_width new_color">' + ((data.COUNT_NEW[i + 1]) ? data.COUNT_NEW[i + 1] : '').toString() +
                      '</td><td class="tbl_width new_color">' + ((data.MARKET_NEW_LIST[i + 1]) ? data.MARKET_NEW_LIST[i + 1] : '').toString() +
                      '</td><td class="tbl_width used_color">' + ((data.COUNT_USED[i + 1]) ? data.COUNT_USED[i + 1] : '').toString() + 
                      '</td><td class="tbl_width used_color">' + ((data.USED_LIST[i + 1]) ? data.USED_LIST[i + 1] : '').toString() +
                      '</td></tr>';
                    }
                    $("#MainContent_tbl_Detail").html(tbl_raw);
                    lowestPrice();
                    usedPrice();
                    numberOfSellers();
                    chartRanking();
                }
            });
          }
         });
      
     
        var is_date = false;
        var start_date;

        function get_start_date(selected_month) {
          return (Math.round(new Date(getStartDate(selected_month)).getTime() / (60 * 1000))) - 21564000;
        }

        function get_date_from_keepatime(keepatime) {
          let $unix = new Date((keepatime + 21564000) * (60 * 1000));
          return ("0" + ($unix.getMonth() + 1)).slice(-2) + '/' + ("0" + $unix.getDate()).slice(-2) + ' ' + ("0" + $unix.getHours()).slice(-2) + ':' + ("0" + $unix.getMinutes()).slice(-2);
        }

        function filterFunc(val, index, arr) {
          if(val > start_date && index % 2 == 0){
            is_date = true;
            return;
          }
          else if(is_date){
            return val < 0 ? '' : val;
          }
          else
            return;
        }

        function get_data_price(arr){
          var ret_data = new Array();
          if(arr){
            is_date = false;
            start_date = get_start_date(0);
            ret_data[0] = arr.filter(filterFunc);
            start_date = get_start_date(1);
            ret_data[1] = arr.filter(filterFunc);
            start_date = get_start_date(2);
            ret_data[2] = arr.filter(filterFunc);
            start_date = get_start_date(3);
            ret_data[3] = arr.filter(filterFunc);
            start_date = get_start_date(4);
            ret_data[4] = arr.filter(filterFunc);
          }
          return ret_data;
        }
    </script>

  </body>

</html>
