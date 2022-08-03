<?php

include "dataBase.php";
include "header_main.php";

$notes=$db->query("SELECT * FROM note");
$statuses=$db->query("SELECT * FROM mystatus");





?>


<div class="d-flex align-items-center justify-content-center myinput mt-4" >

<input class="myInputInner" type="text" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="create your note">

  <!-- Modal  add-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add your note item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form method="post" action="new_note.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Note</label>
                <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputStatus">status</label>
                <select class="form-select darkcolor" aria-label="Default select example" name="status" id="exampleInputStatus"  >

                  <?php foreach ($statuses as $status):?>
                  <?php if($status["id"]==2):?>
                      <option class="darkcolor" value="<?php echo $status["id"];?>" selected><?php echo $status["text"];?></option>
                  <?php else:?>
                  <option class="darkcolor" value="<?php echo $status["id"];?>" class="text-light"><?php echo $status["text"];?></option>
                  <?php endif?>

                  <?php endforeach;?>
                </select>
              </div>

              <button type="submit " class="btn btn-primary mt-3">Add</button>
            </form>
          </div>

        </div>
      </div>
    </div>


</div>



        <div class="row">


<?php foreach ($notes as $note): ?>
        <div class="col-lg-4 col-md-6 col-sm-6 d-flex justify-content-center">
        <div class="card mt-5 mycard" 
        <?php if($note["status_id"] ==1):  ?>
          style="background-color: #198352;"
          <?php elseif($note["status_id"] ==2):  ?>
            style="background-color: #980000;"
            <?php elseif($note["status_id"] ==3):  ?>
            style="background-color: #E88802;"
            <?php endif?>
          >
  <div class="card-body ">
    <h4 class="card-title d-flex justify-content-center"><b><?php echo $note['title']; ?> </b></h4><hr>
    <div class="d-flex flex-row">
  <div class="p-2"> <i class="material-icons ">book</i></div>
  <div class="p-2"> <p class="card-text"> <?php echo $note['note']; ?></p></div>

</div>
<hr>


<div class="d-flex flex-row">
<div class="p-2"> <i class="material-icons "><mat-icon>date_range</mat-icon></i></div>
  <div class="p-2"> <p class="card-text"><?php echo  date('Y-M-D',strtotime($note["time"])); ?></p></div>
</div>
<hr>

<div class="d-flex flex-row">
  <div class="p-2"><i class="material-icons "><mat-icon>query_builder</mat-icon></i></div>
  <div class="p-2"><p class="card-text"><?php echo  date('H:i:s',strtotime($note["time"])); ?></p></div>
</div>
<hr>


<div class="d-flex flex-row">
  <div class="p-2"><i class="material-icons "><mat-icon>stars</mat-icon></i></div>
  <div class="p-2"><p class="card-text">
  <?php 


  foreach($statuses as $status):
  if($note['status_id']==$status['id']):
    echo $status['text'];
  endif;
 endforeach; ?>
  

  </p></div>

</div>
<hr>
  <div class="card-body">
  <a class="btn btn-warning edBtn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $note['id'];?>" role="button">
     <i class="material-icons">edit</i>
    </a>

      <!-- Modal  edit-->
  <div class="modal fade text-dark" id="exampleModal<?php echo $note['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Edit your note<?php echo $note["id"];?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form method="post" action="edit_item.php?note_id=<?php echo $note['id']; ?>">
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $note['title']; ?>">

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Note</label>
                <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"  ><?php echo $note['note']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputStatus">status</label>
                <select class="form-select darkcolor" aria-label="Default select example" name="status" id="exampleInputStatus"  >


                  <?php
                 
                  foreach ($statuses as $status):?>
                  
                  <?php if($status["id"]==$note["status_id"]):?>
                      <option class="darkcolor" value="<?php echo $status["id"];?>" selected><?php echo $status["text"];?></option>
                  <?php else:?>
                  <option class="darkcolor" value="<?php echo $status["id"];?>" class="text-light"><?php echo $status["text"];?></option>
                  <?php endif?>

                  <?php endforeach;?>
                </select>
              </div>

              
              <button type="submit " class="btn btn-primary mt-3">Edit</button>
            </form>
          </div>

        </div>
      </div>
    </div>








     <a class="btn btn-danger edBtn" href="delete_item.php?note_id=<?php echo $note['id']; ?>" role="button">
      <i class="material-icons">delete</i>
   </a>
   
  </div> 
</div>
</div>
  </div>

<?php endforeach;?>



   </div>


        </div>

<?php include 'footer_main.php';  ?>