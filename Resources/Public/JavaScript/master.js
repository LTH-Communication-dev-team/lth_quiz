// Put all your page JS here
var quizJSON;

$(function () {
    
    var pageId = $('body').attr('id').replace('p','');
    var storagePid = $('#storagePid').val();
    $.ajax({
            type : "POST",
            url : 'index.php',
            data: {
                eID: 'lth_quiz',
                action: 'listQuiz',
                settings: {
                    pageId: pageId,
                    storagePid: storagePid,
                    syslang: $('html').attr('lang')
                },
                sid: Math.random(),
            },
            //contentType: "application/json; charset=utf-8",
            dataType: "json",
            beforeSend: function () {
                
            },
            success: function(d) {
                //console.log(d);
                if(d) {
                    quizJSON = d;
                    $('#slickQuiz').slickQuiz();
                } 
            },
            failure: function(errMsg) {
                console.log(errMsg);
            }
        });
});
