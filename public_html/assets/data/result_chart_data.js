function sendRequest(date_val){
    if($('#search_term').val()){
        $.ajax({
            type: "POST",
            url:'../../php_api-master/index.php',
            data:{
                search_term: $('#search_term').val(),
                start_date: date_val
            },
            success:function(response) 
            {
                var data = JSON.parse(response)
                console.log(data.stats_current);
                return data.stats_current;
            }
        });
    }
}
  const $number_of_sellers_date = [
    //1か月
    [],
    //3
    [],
    //6
    [],
    //12
    [],
    //ALL
    [],
  ];

  const $number_of_sellers_new = [
    //1か月
    [],
    //3
    [],
    //6
    [],
    //12
    [],
    //ALL
    [],
  ];

  const $number_of_sellers_used = [
    //1か月
    [],
    //3
    [],
    //6
    [],
    //12
    [],
    //ALL
    [],
  ];

  const $ranking_date = [
    //1か月
    [],
    //3
    [],
    //6
    [],
    //12
    [],
    //ALL
    [],
  ];

  const $ranking_chart = [
    //1か月
    [],
    //3
    [],
    //6
    [],
    //12
    [],
    //ALL
    [],
  ];

  const $leafer_user_date = [
    //1か月
    [],
    //3
    [],
    //6
    [],
    //12
    [],
    //ALL
    [],
  ];
  const $leafer_user_chart = [
    //1か月
    [],
    //3
    [],
    //6
    [],
    //12
    [],
    //ALL
    [],
  ];

