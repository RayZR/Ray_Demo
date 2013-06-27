/**
 * Created with JetBrains PhpStorm.
 * User: ray
 * Date: 24/05/13
 * Time: 11:39 PM
 * To change this template use File | Settings | File Templates.
 */
$(function() {
    $( ".deleteNote" ).click(function(e){

        var c=confirm('Are you sure you want to delete');
        if(c==false)
        {
            return false;
        }
    });


        $('table.table-striped tbody tr').on('click', function () {
            $(this).find('td').toggleClass('bg');
        });


});