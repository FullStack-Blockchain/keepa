<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>
        <div class="content">
        <?php include "includes/navbar.php"; ?>
          <div class="card">
            <div class="card-body overflow-hidden p-lg-6">
              <div class="row align-items-center">
                <div class="col-lg-6"><img class="img-fluid" src="../assets/img/icons/spot-illustrations/21.png" alt="" /></div>
                <div class="col-lg-6 ps-lg-4 my-5 text-center text-lg-start">
                  <h3 class="text-primary">Amazon.co.jpリサーチ・分析ツールの決定版</h3>
                  <p class="lead">ASIN、JAN、キーワードを検索してください</p>

                  <div class="search-box" data-list='{"valueNames":["title"]}' style="width: 100%;">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static" method="post" action="../../php_api-master/index.php">
                      <input class="form-control search-input fuzzy-search" name="search" id="search" type="search" placeholder="ASIN、JAN、キーワード" aria-label="Search" />
                      <span class="fas fa-search search-box-icon"></span>
                    </form>
                    <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
                      <div class="btn-close-falcon" aria-label="Close"></div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
<?php include "includes/footer.php"; ?>