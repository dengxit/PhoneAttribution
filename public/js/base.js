var CODE = CODE || {};
CODE.GLOBAL = {};
CODE.APPS = {};

CODE.APPS.QUERYPHONE = {};
CODE.APPS.QUERYPHONE.showInfo = function(){
    $('#phoneInfo').show();
};
CODE.APPS.QUERYPHONE.hideInfo = function(){
    $('#phoneInfo').hide();
};
CODE.APPS.QUERYPHONE.AJAXCALLBACK = function(data) {
    if (data.code == 200) {
        CODE.APPS.QUERYPHONE.showInfo();
        $('#phoneNumber').text(data.telString);
        $('#phoneProvince').text(data.province);
        $('#phoneCatName').text(data.catName);
        $('#phoneCarrier').text(data.carrier);
        $('#phoneFrom').text(data.msg);
    } else {
        CODE.APPS.QUERYPHONE.hideInfo();
        alert(data.msg);
    }
};

CODE.GLOBAL.AJAX = function(url, method, params, dataType, callback){
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