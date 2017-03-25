var no=0;
var op=0;
function addQuestion() {
    op=0;
    no++;
    var option=$(document.createElement('div')).addClass('well');
    option.appendTo('#Question');
    var btn=$(document.createElement('div')).addClass('btn btn-default').html('Add Options').attr('id','addOption');
    btn.appendTo(option);
    var div=$(document.createElement('div')).addClass('form-group');
    div.appendTo(option);
    var select=$(document.createElement('select')).addClass('form-control Section').appendTo(div);
    for (var i = 1; i < 4; i++) {
        $(document.createElement('option')).attr('value',i).html('Section '+i).appendTo(select);
    }
    //Question Text
    var div=$(document.createElement('div')).addClass('form-group').html('Question');
    div.appendTo(option);
    $(document.createElement('input')).attr('type','text').addClass('form-control Question').appendTo(div);
    //Question Marks
    var div=$(document.createElement('div')).addClass('form-group').html('Marks');
    div.appendTo(option);
    $(document.createElement('input')).attr('type','number').addClass('form-control Marks').appendTo(div);
    //Question Image
    var div=$(document.createElement('div')).addClass('checkbox');
    div.appendTo(option);
    var label=$(document.createElement('label')).appendTo(div);
    var checkbox=$(document.createElement('input')).attr('type','checkbox').addClass('nullimage');
    checkbox.appendTo(label);
    $(document.createTextNode('Have Image')).appendTo(label);
    var image=$(document.createElement('div')).addClass('image');
    image.appendTo(div);
    $(checkbox).change(function(e){
        if($(this).is(":checked")){
            var div=$(document.createElement('div')).addClass('form-group').html('ImageURL');
            div.appendTo(image);
            $(document.createElement('input')).attr('type','text').addClass('form-control ImageURL').appendTo(div);
        }else{
            image.empty();
        }
    });
    btn.click(function(){
        addOptions(option);
    });
    $(document.createElement('div')).addClass('option').appendTo(option);
}
function addOptions(parentdiv) {
    op++;
    var option=$(document.createElement('div')).addClass('well');
    option.appendTo(parentdiv);
    //Option Text
    var div=$(document.createElement('div')).addClass('form-group').html('Option Value');
    div.appendTo(option);
    $(document.createElement('input')).attr('type','text').addClass('form-control option'+no).appendTo(div);
    //Question Image
    var div=$(document.createElement('div')).addClass('checkbox');
    div.appendTo(option);
    var label=$(document.createElement('label')).appendTo(div);
    var checkbox=$(document.createElement('input')).attr('type','checkbox').attr('value',op).addClass('isanswer'+no);
    checkbox.appendTo(label);
    $(document.createTextNode('isanswer')).appendTo(label);
}
function init() {
    $('.addQuestion').click(function(){
        addQuestion();
    });
    $('.submitbtn').click(function(){
        var qname=$('#name').val();
        var duration=$('#duration').val();
        var Question=$('.Question');
        var Marks=$('.Marks');
        var Questions={};
        for (var i = 0; i < Question.length; i++) {
            var Options={};
            var option=$('.option'+(i+1));
            for (var j = 0; j < option.length; j++) {
                var bol=$('.isanswer'+(i+1)).val()==''+(j+1);
                Options[j]={'option':$(option[j]).val(),'ans':bol};
            }
            Questions[i]={'Question':$(Question[i]).val(),'Marks':$(Marks[i]).val(),'option':Options};
        }
        var data={
                'Name':qname,
                'duration':duration,
                'Questions':Questions
            };
        $.ajax({
            type: "POST",
            url: 'submit',
            data: data,
            success: function(res){
                console.log(res);
            }
        });
    });
}
$('document').ready(function(){
    init();
});
