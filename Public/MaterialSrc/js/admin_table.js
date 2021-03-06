$(document).ready(function(){
    //为审批状态文字设置颜色
    $(".Applylist-ApproveState[data-approvestate='未通过']").addClass("ApproveState-Rejected");
    $(".Applylist-ApproveState[data-approvestate='已通过']").addClass("ApproveState-Pass");
    $(".Applylist-ApproveState[data-approvestate='未审批']").addClass("ApproveState-Wait");

    // 设置未审批数量
    var TobeApproved=0;
    TobeApproved=$(".list-container[data-approvestate='未审批']").size();
    $("#TobeApproveNum").text(TobeApproved);

    // 只显示未审批
    $(".list-container[data-approvestate!='未审批']").css("display","none");

    // 更改已审批项的审批按钮
    $(".list-container[data-approvestate!='未审批'] .Applylist-Approve button").text("更改审批");
    $(".list-container[data-approvestate!='未审批'] .Applylist-Approve button").removeClass("btn-info");
    $(".list-container[data-approvestate!='未审批'] .Applylist-Approve button").addClass("btn-default");

    //将空下载策划链接禁用
    $(".Applylist-downloadplan").each(function(){
        if($(this).attr("href")==$("#modal-storeurl-link").attr("href")){
            $(this).attr("href","javascript:void(0)");
        }
    });
    $(".btn-approve").each(function(){
        if($(this).attr("data-storeurl")==$("#modal-storeurl-link").attr("href")){
            $(this).attr("data-storeurl","javascript:void(0)");
        }
    });
});
// 审批是项目列表 点击下载表格
$(document).on("click",".download-table",function(){
    var dom=$(this);
    dom.next().submit();
});

// 关闭审批模态框后清理内容
$('#modalPreview').on("hidden.bs.modal",function(e){
    $("#modalPreview-UserName").text("---");
    $("#modalPreview-TableContainer").html("&nbsp;");
    $("#modalPreview-ApproveState").val("未审批");
    $("#modalPreview-ApproveNote").val("");
});

// 点击打开审批模态框
$(document).on("click",".btn-approve", function() {
    var dom=$(this);
    $("#modalPreview-UserName").text(dom.attr("data-username"));
    $(".modal-input-UserName").val(dom.attr("data-username"));
    $(".modal-input-ID").val(dom.attr("data-id"));
    $(".modal-input-action-type").val(dom.attr("data-action-type"));

    $(".modal-input-storeurl").attr("href",dom.attr("data-storeurl"));
    $.post(dom.attr("data-action-target"),
        {
            ID:dom.attr("data-id"),
            action_type:dom.attr("data-action-type")
        },
        function(data,status){
            if(!status){
                $("#modalPreview-TableContainer").html(status);
            }else{
                $("#modalPreview-TableContainer").html(data);
            }
        });
});

$(document).on("click","#approveform-save",function(){
    $("#approveform").submit();
});
