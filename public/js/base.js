var IMOOC = IMOOC || {};
IMOOC.GLOBAL = {};
IMOOC.APPS = {};

IMOOC.APPS.QUERYPHONE = {};
IMOOC.APPS.QUERYPHONE.showInfo = function(){
    $('#phoneInfo').show();
};
IMOOC.APPS.QUERYPHONE.hideInfo = function(){
    $('#phoneInfo').hide();
};
IMOOC.APPS.QUERYPHONE.AJAXCALLBACK = function(data) {
    if (data.code == 200) {
        alert(data.catName);
        IMOOC.APPS.QUERYPHONE.showInfo();
        $('#phoneNumber').text(data.telString);
        $('#phoneProvince').text(data.province);
        $('#phoneCatName').text(data.catName);
        $('#phoneCarrier').text(data.carrier);
        $('#phoneFrom').text(data.msg);
    } else {
        IMOOC.APPS.QUERYPHONE.hideInfo();
        alert(data.msg);
    }
};

IMOOC.GLOBAL.AJAX = function(url, method, params, dataType, callback){
    $.ajax({
        url: url,
        type: method,
        data: params,
        dataType: dataType,
        success: callback,
		error: function(){
			alert('请求异常');
		}
    });
};