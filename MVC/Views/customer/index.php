Customer
<form class="form-search">
    <input id="searchStringInput" type="text" class="input-medium search-query">
    <button id="searchString" type="submit" class="btn">Search</button>
</form>
<table id="displayCumstomerTable" class="table table-striped table-bordered table-condensed">
    <thead>
    <tr><th>id</th><th>CustomerName</th><th>CustomerNumber</th><th>CustomerEmail</th><th>CustomerCompany</th><th>CustomerAddress</th><th>PhoneCallTimes</th><th>Option</th></tr>
    </thead>
    <tbody>
    <?php
    //display Table
    foreach($this->customers as $key=>$value){
        echo '<tr>';
        echo '<td>'.$value['id'].'</td>';
        echo '<td>'.$value['CustomerName'].'</td>';
        echo '<td>'.$value['CustomerNumber'].'</td>';
        echo '<td>'.$value['CustomerEmail'].'</td>';
        echo '<td>'.$value['CustomerCompany'].'</td>';
        echo '<td>'.$value['CustomerAddress'].'</td>';
        echo '<td>'.$value['PhoneCallTimes'].'</td>';
        echo '<td><div class="btn-group"><a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
   <i class="icon-user"></i> User
    <span class="caret"></span></a><ul class="dropdown-menu"><li><a href="'.URL.'displayCustomer/edit/'.$value['id'].'">Edit</a></li>
    <li><a class="deleteNote" href="'.URL.'displayCustomer/delete/'.$value['id'].'">Delete</a></li></ul> </div></td>';

        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<div id="paginationLinks" class="pagination pagination-centered">
    <ul>
<?php
//generate links
echo '<li><a href="'.URL.'displayCustomer">|<</a></li>';
$pre=$this->page-1;
if($pre<0){
    echo '<li><a href="'.URL.'displayCustomer"><</a></li>';
}else{
echo '<li><a href="'.URL.'displayCustomer/index/'.$pre.'"><</a></li>';
}
for($i=0;$i<$this->totalPages;$i++){
   $number=$i+1;
    if($i==$this->page){
        echo '<li class="active"><a href="'.URL.'displayCustomer/index/'.$i.'">'.$number.'</a></li>';
    }else{
        echo '<li><a href="'.URL.'displayCustomer/index/'.$i.'">'.$number.'</a></li> ';

    }
}
$page=$this->totalPages-1;
$nxt=$this->page+1;
if($nxt>=$this->totalPages){
    $nxt=$this->totalPages-1;
}
echo '<li><a href="'.URL.'displayCustomer/index/'.$nxt.'">></a></li>';
echo '<li><a href="'.URL.'displayCustomer/index/'.$page.'">>|</a></li>';
?>
    </ul>
</div>
