/**
 * Created with JetBrains PhpStorm.
 * User: acer
 * Date: 27/06/13
 * Time: 1:38 PM
 * To change this template use File | Settings | File Templates.
 */
$(function(){
        $("#searchString").click(function(event){
            event.preventDefault();
            var searchStringInput=$("#searchStringInput").val();
            $.ajax({
                type:"post",
                url:"http://localhost/MVC/displayCustomer/searchString",
                data:{searchString:searchStringInput},
                dataType:"json",
                success:function(data){
                    $("#displayCumstomerTable tbody").remove();
                    $("#paginationLinks ul li").remove();

                    $.each(data,function(key,val){
                        var tr=$('<tr></tr>');
                        $.each(val, function(k, v){
                            $('<td>'+v+'</td>').appendTo(tr);
                        });
                        tr.appendTo('#displayCumstomerTable');
                    });

                    $('#displayCumstomerTable').each(function(){
                        var currentPage=0;
                        var rowPerPage=10;
                        var table=$(this);

                        table.bind('repaginate',function(){
                            table.find('tbody tr').hide().slice(currentPage*rowPerPage,(currentPage+1)*rowPerPage).show();
                        });

                        table.trigger('repaginate');
                        var numRows=table.find('tbody tr').length;
                        var pages=Math.ceil(numRows/rowPerPage);
                        var pager=$('#paginationLinks').children();
                        for(var page=0;page<pages;page++){
                           var pageNumber= $('<a href="#"></a>');
                               pageNumber.text(page+1).bind('click',{newPage:page}
                                ,function(event){
                                    currentPage=event.data['newPage'];
                                    table.trigger('repaginate');
                                    $(this).parent().addClass('active').siblings().removeClass('active');
                                });
                            var pageList=$('<li></li>').append(pageNumber);
                            pageList.appendTo(pager);
                        }
                        pager.find(":first-child").addClass('active')
                    });
                }

            });

        });




})