    <div>
      <!-- <button id="deleteBtn" style="display:inline-block; background-color: white; outline: none; cursor: pointer; border-color: black; border-radius: 4px; border:1px solid black; color:black;">Delete</button> -->

      <!-- The Modal -->
      <div id="deleteModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content" style="width: 50px !important: height: 50px !important;">
          <div class="modal-header">
            <h4 style="float: left;">DELETE THE REVIEW</h4>
            <span class="close_x" data-dismiss="modal" style="float: right;cursor: pointer;font-size:20px;">&times;</span>
          </div>


          <form method="post" action="<?=PROOT?>CustomRequestController/DeleteCustomRequest">
            <div class="modal-body">    
              <div class="yes-no-selector">
                <label class="spr-form-label" style="font-weight: 600">
                  Do you want to delete this review ?
                </label>
                <div class="spr-form-input">
                  <input type="submit" class="button button-primary btn-primary delete_modal" value="YES" style="display:inline-block; background-color: white; outline: none; cursor: pointer; border-color: black; border-radius: 4px; border:1px solid black; color:black; margin-left:50px; padding:5px 10px;">
                  <input type="" class="close_d button button-primary btn-primary delete_modal" data-dismiss="modal" value="NO" style="display:inline-block; background-color: white; outline: none; cursor: pointer; border-color: black; border-radius: 4px; border:1px solid black; color:black; margin-left:30px; padding:5px 10px; width:42px;">     
                  
                </div>
              </div>

            </div>
            <div class="modal-footer">
                 <?php echo'<input type="hidden" name="product_id" value='.$params["id"].'>';?> 
            </div>
          </form>

        </div>

      </div>
    
      <script>
        // Get the modal
        var modal_d = document.getElementById('deleteModal');

        // Get the button that opens the modal
        var btn_d = document.getElementById("deleteBtn");

        // Get the <span> element that closes the modal
        var span_x = document.getElementsByClassName("close_x")[0];
        var span_d = document.getElementsByClassName("close_d")[0];

        // When the user clicks the button, open the modal 
        btn_d.onclick = function() {
          modal_d.style.display = "block";
        }

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

        $(document).ready(function(){

        });
      </script>

    </div>