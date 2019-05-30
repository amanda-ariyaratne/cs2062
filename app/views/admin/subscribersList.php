<?= $this->setSiteTitle('All Subscribers') ?>

<?= $this->start('head'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<style type="text/css">
  .alert-success {
    border-radius: 0;
    border-color: #c1939e;
    color: #c1939e;
    background-color: #f3ebed;
  }
  .btn-confirm {
    display:inline-block; 
    background-color: white; 
    outline: none; 
    cursor: pointer; 
    border-color: black; 
    border-radius: 4px; 
    border:1px solid black; 
    color:black; 
    margin-left:50px; padding:5px 10px;
  }
  .btn-reject {
    display:inline-block; 
    background-color: white; 
    outline: none; 
    cursor: pointer; 
    border-color: black; 
    border-radius: 4px; 
    border:1px solid black; 
    color:black; 
    margin-left:30px; 
    padding:5px 10px; width:42px;
  }
</style>

<?= $this->end(); ?>

<?= $this->start('body'); ?>
<?php 
  $subscribers = $params['subscribers'];
?>    
<div id="body-content" class="layout-boxed">
  <div id="main-content"> 
    <div class="main-content">
      <div class="wrap-breadcrumb bw-color">
        <div id="breadcrumb" class="breadcrumb-holder container">
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block">
              <div class="page-title">Subscribers</div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
              <ul class="breadcrumb">
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                  <a itemprop="url" href="/">
                    <span itemprop="title" class="d-none">Handy Store</span>
                    Home
                  </a>
                </li>
                <li class="active">
                  Newsletter
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="page-account">
          <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-12">
              <!-- empty div -->
            </div>
            <div id="col-main" class="col-lg-8 col-md-8 col-sm-12">
              <div id="customer_orders">
                <table id="subscriberTable" class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Email Address</th>
                      <th>Subscribed At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <!-- empty div -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div>
  <!-- The Modal -->
  <div id="deleteModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="width: 20%">
      <div class="modal-header">
        <h4 style="float: left;">DELETE SUBSCRIBER</h4>
        <span class="close_x" data-dismiss="modal" style="float: right;cursor: pointer;font-size:20px;">&times;</span>
      </div>


      
        <div class="modal-body">    
          <div class="yes-no-selector">
            <label class="spr-form-label" style="font-weight: 600">Do you really want to delete this subscriber ?</label>
            <div class="spr-form-input">
              <button class="btn btn-primary btn-primary btn-confirm delete_modal" id="confirm-delete">YES</button>
              <button type="" class="close_d button button-primary btn-primary btn-reject delete_modal" data-dismiss="modal">NO</button>
  
              
            </div>
          </div>

        </div>
        <div class="modal-footer">
        </div>
      


    </div>

  </div>

  <script>
    // Get the modal
    var modal_d = document.getElementById('deleteModal');

    

    
  </script>

</div>

<script type="text/javascript">
  $(document).ready( function () {


    // Get the <span> element that closes the modal
    var span_x = document.getElementsByClassName("close_x")[0];
    var span_d = document.getElementsByClassName("close_d")[0];

    // Get the modal
    var modal_d = document.getElementById('deleteModal');

    // When the user clicks on <span> (x), close the modal
    span_x.onclick = function() {
      modal_d.style.display = "none";
    }
    span_d.onclick = function() {
      modal_d.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal_d) {
        modal_d.style.display = "none";
      }
    }

    table = $('#subscriberTable').DataTable({
      ajax: {
        url: '<?=PROOT?>admin/jsonSubscribersList',
      }
    });

    table.on( 'draw.dt', function () {
      $('.btn-1').click(function(){ // use for activae inactive user
          id = $(this).data('id');               
          
          // Get the button that opens the modal
          var btn_d = $(this);

          modal_d.style.display = "block";

          $("#confirm-delete").val(id);
          
        });
    });
      

    

    $('#confirm-delete').click(function(){

      $.ajax({
        method: "POST",
        url: '<?=PROOT?>admin/deleteSubscriber',
        data:{ 'id' : $('#confirm-delete').val()  }
      })
       .done(function( msg ) {
        table.ajax.reload();
      });
       modal_d.style.display = "none";
    });
    
  });
</script>
<?= $this->end(); ?>