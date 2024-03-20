<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<div class="container">

  <?php if (!isset($_SESSION['username'])) { ?>

    <div class="modal fade" id="login">
      <div class="modal-dialog">
        <div class="modal-content text-white" style="background: none;">
          <div class="modal-header" style="background-color: rgba(33, 33, 33, 0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <h4 class="modal-title">เข้าสู่ระบบ</h4>
            <a type="button"  data-dismiss="modal" >&times;</a>
          </div>
          <div class="modal-body kn-body" align="center" style="background-color: rgba(0,0,0,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <img src="https://www.img.in.th/images/68d48b1e65e0e45b09f21986db30e3be.png" alt="" style="animation:heartBeat 2.25s infinite; width: 50%;"><br><br>
            <form action="<?php echo $domain; ?>/actions.php" method="post" id="form-login">
              <input type="hidden" name="action" id="action" value="login">
              <div class="form-group">
                <input type="text" name="username" id="username" class="form-control" required="" placeholder="ชื่อผู้ใช้">
              </div>
              <br>
              <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" required="" placeholder="รหัสผ่าน">
              </div>
              <br>
              <button class="btn btn-success btn-block btn-w1ms" type="submit"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ </button>
              <button class="btn btn-primary btn-block btn-w1ms" data-dismiss="modal" data-toggle="modal" data-target="#register" type="button"><i class="fas fa-address-card"></i> สมัครสมาชิก </button>
            </form>
          </div>
		  <hr>
        </div>
      </div>
    </div>
    <div class="modal fade" id="register">
      <div class="modal-dialog">
        <div class="modal-content text-white" style="background: none;">
          <div class="modal-header" style="background-color: rgba(33, 33, 33, 0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <h4 class="modal-title">สมัครสมาชิก</h4>
            <a type="button"  data-dismiss="modal">&times;</a>
          </div>
          <div class="modal-body" align="center" style="background-color: rgba(0,0,0,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <img src="https://www.img.in.th/images/68d48b1e65e0e45b09f21986db30e3be.png" alt="" style="animation:heartBeat 2.25s infinite; width: 50%;"><br><br>
            <form action="<?php echo $domain; ?>/actions.php" method="post" id="form-register">
              <input type="hidden" name="action" id="action" value="register">
              <div class="form-group">
                <input type="text" name="username" id="username" class="form-control" minlength="6" required="" placeholder="ชื่อผู้ใช้">
              </div>
              <br>
              <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" minlength="6" required="" placeholder="รหัสผ่าน">
              </div>
              <br>
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" required="" placeholder="อีเมล์">
              </div>
              <br>
              <div class="form-group">
                <input type="phone" name="phone" id="phone" class="form-control" minlength="10" required="" placeholder="เบอร์โทร">
              </div>
              <br>
              <button class="btn btn-success btn-block btn-w1ms" type="submit"><i class="fas fa-address-card"></i> สมัครสมาชิก </button>
              <button class="btn btn-primary btn-block btn-w1ms" data-dismiss="modal" data-toggle="modal" data-target="#login" type="button"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ </button>
            </form>
          </div>
		  <hr>
        </div>
      </div>
    </div>
  </div>

<?php }else{ ?>

  <div class="modal fade" id="usecodemodal">
      <div class="modal-dialog">
        <div class="modal-content text-white" style="background: none;">
          <div class="modal-header" style="background-color: rgba(33, 33, 33, 0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <h4 class="modal-title">เติม Point ด้วย Code Point</h4>
            <a type="button"  data-dismiss="modal" >&times;</a>
          </div>
          <div class="modal-body" style="background-color: rgba(0,0,0,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <p><span style="color: #fff;">ติดต่อรับ Code Point >><a href="<?php echo $fanpage ?>" target="_new" style="color: red;"> Click </a><<</span></p>
            <form action="<?php echo $domain; ?>/actions.php" method="post" id="usecode">
              <input type="hidden" name="action" id="action" value="usecode">
              <div class="form-group">
                <label for="code">กรุณากรอก Code Point ของคุณ</label>
				<input type="text" name="code" id="code" class="form-control" minlength="25" required="" placeholder="กรุณากรอก Code Point ของคุณ" size='10' onKeyUp="if(this.value*1!=this.value) this.value='' ;" >
              </div>
              <br>
              <button class="btn btn-primary btn-block btn-w1ms" type="submit"> ดำเนินการเติม </button>
            </form>
          </div>
		  <br>
        </div>
      </div>
    </div>

    <div class="modal fade" id="usecodescriptmodal">
      <div class="modal-dialog">
        <div class="modal-content text-white" style="background: none;">
          <div class="modal-header" style="background-color: rgba(33, 33, 33, 0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <h4 class="modal-title">ใช้งาน Code Script</h4>
            <a type="button"  data-dismiss="modal" >&times;</a>
          </div>
          <div class="modal-body" style="background-color: rgba(0,0,0,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <form action="<?php echo $domain; ?>/actions.php" method="post" id="usecodescript">
              <input type="hidden" name="action" id="action" value="usecodescript">
              <div class="form-group">
                <label for="code">กรุณากรอก Code Script ของคุณ</label>
                <input type="text" name="code" id="code" class="form-control" minlength="10" required="" placeholder="กรุณากรอก Code Script ของคุณ" size='10' onKeyUp="if(this.value*1!=this.value) this.value='' ;" >
              </div>
              <br>
              <div class="form-group">
                <label for="ip">กรุณากรอก IP ของคุณ</label>
                <input type="text" name="ip" id="ip" class="form-control" required="" placeholder="กรุณากรอก IP ของคุณ" >
              </div>
              <br>
              <button class="btn btn-primary btn-block btn-w1ms" type="submit"> ดำเนินการเติม </button>
            </form>
          </div>
		  <br>
        </div>
      </div>
    </div>

  <?php if ($page == "script") { ?>

    <div class="modal fade" id="buy">
      <div class="modal-dialog">
        <div class="modal-content text-white" style="background: none;">
          <div class="modal-header" style="background-color: rgba(33, 33, 33, 0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <h4 class="modal-title">ยอมรับข้อตกลง</h4>
            <a type="button" class="close" data-dismiss="modal" >&times;</a>
          </div>
          <div class="modal-body" style="background-color: rgba(33, 33, 33,0.5);border: solid rgba(33,33,33,0.0) 1px;">
            <center>

              <!-- <img src="<?php echo $domain; ?>/images/scripts/<?php echo $result['image']; ?>" alt="" style="width: 100%;"> --><br><br>
            </center>
            <form action="<?php echo $domain; ?>/actions.php" method="post" id="form-buy">
              <input type="hidden" name="action" id="action" value="buy">
              <input type="hidden" name="id" id="id" value="<?php echo $result['id']; ?>">
              <div class="form-group">
                <label for="ip">หาก ท่านทำการซื้อแล้ว จะไม่สามารถขอเงินคืนได้ทุกกรณี </label>
                <input type="hidden" name="ip" id="ip" class="form-control" required="" value="<?php echo get_client_ip(); ?>" placeholder="IP That use script">
              </div>
              <button class="btn btn-primary btn-block btn-w1ms" type="submit"> Accept </button>
            </form>
          </div>
		  <br>
        </div>
      </div>
    </div>
  <?php } ?>




<?php } ?>


<?php if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) { ?>

  <?php if ($page == "shop") { ?>
    <div class="modal fade" id="addscript">
      <div class="modal-dialog text-white">
        <div class="modal-content text-white" style="background: none;">
          <div class="modal-header" style="background-color: rgba(33, 33, 33,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <h4 class="modal-title">เพิ่มสคริป</h4>
            <a  class="close" data-dismiss="modal" >&times;</a>
          </div>
          <div class="modal-body" style="background-color: rgba(0,0,0,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <p><span style="color: #fff;">ใส่ให้ถูกต้องทั้งหมด >><a href="<?php echo $fanpage ?>" target="_new" style="color: #fff;"> รูปใส่  .png </a><<</span></p>
            <form action="<?php echo $domain; ?>/actions.php" enctype="multipart/form-data" method="post">
              <input type="hidden" name="action" value="addscript">
              <div class="form-group">
                <input type="text" name="name" placeholder="ชื่อสคริป" required="" class="form-control">
              </div>
              <br>
              <div class="form-group">
                <input type="text" name="foldername" placeholder="ชื่อสคริปที่โชว์" required="" class="form-control">
              </div>
              <br>
              <div class="form-group">
                <input type="number" name="price" placeholder="ราคา" required="" class="form-control">
              </div>
              <br>
              <div class="form-group">
                <input type="text" name="filename" placeholder="ไฟล์สคริป" required="" class="form-control">
              </div>
              <br>
              <div class="form-group">
                <input type="file" name="file[]" id="file" class="form-control" placeholder="รูป Poster สำหรับแสดง" required="" accept="image/jpeg,image/png"/>
              </div>
              <br>
              <button type="submit" class="btn btn-primary btn-block"> เพิ่ม </button>
            </form>
          </div>
		  <hr>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if ($page == "code") { ?>
    <div class="modal fade" id="addcodemodal">
      <div class="modal-dialog text-white">
        <div class="modal-content text-white" style="background: none;">
          <div class="modal-header" style="background-color: rgba(33, 33, 33,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <h4 class="modal-title">Addโค้ด</h4>
            <a class="close" data-dismiss="modal">&times;</a>
          </div>
		  <div class="modal-body" style="background-color: rgba(0,0,0,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <p><span style="color: #fff;">ใส่จำนวนพ้อย >><a href="<?php echo $fanpage ?>" target="_new" style="color: #fff;"> เช่น 50 </a><<</span></p>
            <form action="<?php echo $domain; ?>/actions.php" method="post" id="addcode">
              <input type="hidden" name="action" value="addcode">
              <div class="form-group">
                <input type="number" name="point" placeholder="Point" required="" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary btn-block"> เพิ่ม </button>
            </form>
          </div>
		  <br>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if ($page == "code-script") { ?>
    <div class="modal fade" id="addcodescriptmodal">
      <div class="modal-dialog text-white">
        <div class="modal-content text-white" style="background: none;">
          <div class="modal-header" style="background-color: rgba(33, 33, 33,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <h4 class="modal-title">Addโค้ด Script</h4>
            <a class="close" data-dismiss="modal">&times;</a>
          </div>
		  <div class="modal-body" style="background-color: rgba(0,0,0,0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <p><span style="color: #fff;">เลือกสคริปของคุณ <a href="<?php echo $fanpage ?>" target="_new" style="color: red;">  </a></span></p>

            <form action="<?php echo $domain; ?>/actions.php" method="post" id="addcodescript">
              <input type="hidden" name="action" value="addcodescript">
              <div class="form-group">
                <select name="script" id="script" class="form-control">
                  <?php 
                  $query = mysqli_query(connDB(),"SELECT * FROM script ORDER BY id DESC");
                  while($row_sc = mysqli_fetch_array($query)){
                  ?>
                  <option value="<?php echo $row_sc['id']; ?>"><?php echo $row_sc['name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <br>
              <button type="submit" class="btn btn-primary btn-block"> เพิ่ม </button>
            </form>
          </div>
		  <br>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($page == "script") { ?>
    <div class="modal fade" id="editscript"> 
      <div class="modal-dialog modal-xl">
        <div class="modal-content text-white" style="background: none;">
          <div class="modal-header" style="background-color: rgba(33, 33, 33, 0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <h4 class="modal-title">Fix Script</h4>
            <a class="close" data-dismiss="modal">&times;</a>
          </div>
          <div class="modal-body text-white" style="background-color: rgba(33, 33, 33, 0.0);border: solid rgba(33,33,33,0.0) 1px;">
            <div class="row">
              <div class="col-lg-4" align="center">
			  <h4>ใส่ข้อมูลของคุณ</h4>
                <img src="<?php echo $domain; ?>/images/scripts/<?php echo $result['image']; ?>" alt="" style="width: 95%;border-radius: 10px;"><br>
                <div class="form-group">
                  <form action="<?php echo $domain; ?>/actions.php" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="action" value="editimage">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <div class="form-group">
                      <input type="file" name="file[]" id="file" class="form-control" placeholder="รูป Poster สำหรับแสดง" required="" accept="image/jpeg,image/png"/>
                    </div><br>
                    <button type="submit" class="btn btn-primary btn-block"> อัพโหลด </button>
                  </form>
                </div>
              </div>
              <div class="col-lg-8">
                <form action="<?php echo $domain; ?>/actions.php" id="form-edit" method="post">
                  <input type="hidden" name="action" id="action" value="editscript">
                  <input type="hidden" name="id" id="id" value="<?php echo $result['id']; ?>">
                  <div class="form-group">
                    <input type="text" name="name" placeholder="Script Name" id="name" required="" class="form-control" value="<?php echo $result['name']; ?>">
                  </div><br>
                  <div class="form-group">
                    <input type="text" name="foldername" placeholder="Folder Script Name" id="foldername" required="" class="form-control" value="<?php echo $result['foldername']; ?>">
                  </div><br>
                  <div class="form-group">
                    <input type="number" name="price" placeholder="Price" id="price" required="" class="form-control" value="<?php echo $result['price']; ?>">
                  </div><br>
                  <div class="form-group">
                    <input type="number" name="discount" placeholder="Discount" id="discount" required="" class="form-control" value="<?php echo $result['discount']; ?>">
                  </div><br>
                  <div class="form-group">
                    <input type="text" name="file" placeholder="Filename" id="file" required="" class="form-control" value="<?php echo $result['file']; ?>">
                  </div><br>
				  <div class="form-group">
                    <input type="text" name="version" placeholder="version" id="version" required="" class="form-control" value="<?php echo $result['version']; ?>">
                  </div><br>
                  <div class="form-group">
                    <input type="text" name="video_youtube" placeholder="ID วีดีโอบน Youtube" id="video_youtube" class="form-control" value="<?php echo $result['video_youtube']; ?>">
                  </div><br>
                  <div class="form-group">
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="อธิบายรายละเอียด"><?php echo $result['description']; ?></textarea>
                  </div><br>

                  <button type="submit" class="btn btn-primary btn-block"> บันทึก </button>
                </form>
              </div>
            </div>

          </div>
		  <br>
        </div>
      </div>
    </div>
  <?php } ?>
<?php } ?>

</div>
