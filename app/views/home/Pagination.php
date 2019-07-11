<div class="pagination-holder">
  <ul class="pagination">

    <li>
      <a class="prev disabled" href="javascript:;">
        <i class="icon-demo icon-angle-left"></i>
      </a>
    </li>

    <?php
      $pageNo=$params[1];
      $noOfPages = ceil(($params[2]/6));      

      if ($pageNo-1>0){
        $previousPage=$pageNo-1;
        echo
        '<li>
          <a href="'.$previousPage.'" title="Next" class="next">
            <i class="icon-demo icon-angle-left"></i>
          </a>
        </li>';
      }

      $start=$pageNo-2;
      $end=$pageNo+2;

      if ($noOfPages<=5){
        $start=1;
        $end=$noOfPages;
      }
      
      else{

        if ($pageNo==1 || $pageNo==2){        
          $start=1;
            $end=$noOfPages;
        }

        else if($pageNo+1==$noOfPages) {
          $start=$pageNo-3;
          $end=$noOfPages;
        }

        else if ($pageNo==$noOfPages){
          $start=$noOfPages-4;
          $end=$noOfPages;
        }

      }

      for($i=$start; $i<=$end; $i++) {
        echo '<li><a href="'.$i.'">'.$i.'</a></li>';
      }
        
      if ($pageNo+1<=$noOfPages){
        $nextPage=$pageNo+1;
        echo
        '<li>
          <a href="'.$nextPage.'" title="Next" class="next">
            <i class="icon-demo icon-angle-right"></i>
          </a>
        </li>';
      }

    ?>

  </ul>
</div>