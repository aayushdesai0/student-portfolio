<?php 
  @session_start();
  require_once "dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,  
                   initial-scale=1.0">
  <title>Student Portfolio Hub</title>


  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    :root {
      --background-color1: #fafaff;
      --background-color2: #ffffff;
      --background-color3: #ededed;
      --background-color4: #cad7fda4;
      --primary-color: #4b49ac;
      --secondary-color: #0c007d;
      --Border-color: #3f0097;
      --one-use-color: #3f0097;
      --two-use-color: #5500cb;
    }

    body {
      background-color: var(--background-color4);
      max-width: 100%;
      overflow-x: hidden;
    }

    header {
      height: 70px;
      width: 100vw;
      padding: 0 30px;
      background-color: var(--background-color1);
      position: fixed;
      z-index: 100;
      box-shadow: 1px 1px 15px rgba(161, 182, 253, 0.825);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 22px;
      font-weight: 600;
      color: rgb(47, 141, 70);
    }

    .icn {
      height: 30px;
    }

    .menuicn {
      cursor: pointer;
    }

    .searchbar,
    .message,
    .logosec {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .searchbar2 {
      display: none;
    }

    .logosec {
      gap: 30px;
    }

    .searchbar input {
      width: 250px;
      height: 42px;
      border-radius: 50px 0 0 50px;
      background-color: var(--background-color3);
      padding: 0 20px;
      font-size: 15px;
      outline: none;
      border: none;
    }

    .searchbtn {
      width: 50px;
      height: 42px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 0px 50px 50px 0px;
      background-color: var(--secondary-color);
      cursor: pointer;
    }

    .message {
      gap: 40px;
      position: relative;
      cursor: pointer;
    }

    .circle {
      height: 7px;
      width: 7px;
      position: absolute;
      background-color: #fa7bb4;
      border-radius: 50%;
      left: 19px;
      top: 8px;
    }

    .dp {
      height: 40px;
      width: 40px;
      background-color: #626262;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .main-container {
      display: flex;
      width: 100vw;
      position: relative;
      top: 70px;
      z-index: 1;
    }

    .dpicn {
      height: 42px;
    }

    .main {
      height: calc(100vh - 70px);
      width: 100%;
      overflow-y: scroll;
      overflow-x: hidden;
      padding: 40px 30px 30px 30px;
    }

    .main::-webkit-scrollbar-thumb {
      background-image:
        linear-gradient(to bottom, rgb(0, 0, 85), rgb(0, 0, 50));
    }

    .main::-webkit-scrollbar {
      width: 5px;
    }

    .main::-webkit-scrollbar-track {
      background-color: #9e9e9eb2;
    }

    .box-container {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      flex-wrap: wrap;
      gap: 50px;
    }

    .nav {
      min-height: 91vh;
      width: 250px;
      background-color: var(--background-color2);
      position: absolute;
      top: 0px;
      left: 00;
      box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      overflow: hidden;
      padding: 30px 0 20px 10px;
    }

    .navcontainer {
      height: calc(100vh - 70px);
      width: 250px;
      position: relative;
      overflow-y: scroll;
      overflow-x: hidden;
      transition: all 0.5s ease-in-out;
    }

    .navcontainer::-webkit-scrollbar {
      display: none;
    }

    .navclose {
      width: 80px;
    }

    .nav-option {
      width: 250px;
      height: 60px;
      display: flex;
      align-items: center;
      padding: 0 30px 0 20px;
      gap: 20px;
      transition: all 0.1s ease-in-out;
    }

    .nav-option:hover {
      border-left: 5px solid #a2a2a2;
      background-color: #dadada;
      cursor: pointer;
    }

    .nav-img {
      height: 30px;
    }

    .nav-upper-options {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 30px;
    }

    .option1 {
      border-left: 5px solid #010058af;
      background-color: var(--Border-color);
      color: white;
      cursor: pointer;
    }

    .option1:hover {
      border-left: 5px solid #010058af;
      background-color: var(--Border-color);
    }
    .nav-option.active {
      border-left: 5px solid #010058af;
      background-color: var(--Border-color);
      color: white;
      cursor: pointer;
    }

    .nav-option.active:hover {
      border-left: 5px solid #010058af;
      background-color: var(--Border-color);
    }

    .box {
      height: 130px;
      width: 230px;
      border-radius: 20px;
      box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-around;
      cursor: pointer;
      transition: transform 0.3s ease-in-out;
    }

    .box:hover {
      transform: scale(1.08);
    }

    .box:nth-child(1) {
      background-color: var(--one-use-color);
    }

    .box:nth-child(2) {
      background-color: var(--two-use-color);
    }

    .box:nth-child(3) {
      background-color: var(--one-use-color);
    }

    .box:nth-child(4) {
      background-color: var(--two-use-color);
    }

    .box img {
      height: 50px;
    }

    .box .text {
      color: white;
    }

    .topic {
      font-size: 13px;
      font-weight: 400;
      letter-spacing: 1px;
    }

    .topic-heading {
      font-size: 30px;
      letter-spacing: 3px;
    }

    .report-container {
      min-height: 300px;
      max-width: 800px;
      margin: 30px auto 0px auto;
      background-color: #ffffff;
      border-radius: 30px;
      box-shadow: 3px 3px 10px rgb(188, 188, 188);
      padding: 0px 20px 20px 20px;
    }

    .report-header {
      height: 80px;
      width: 100%;
/*      display: flex;*/
      align-items: center;
/*      justify-content: space-between;*/
      padding: 20px 20px 10px 20px;
      border-bottom: 2px solid rgba(0, 20, 151, 0.59);
    }

    .recent-Articles {
      font-size: 30px;
      font-weight: 600;
      color: #5500cb;
    }

    .view {
      height: 35px;
      width: 90px;
      border-radius: 8px;
      background-color: #5500cb;
      color: white;
      font-size: 15px;
      border: none;
      cursor: pointer;
    }

    .add-btn {
      height: 35px;
      width: 90px;
      border-radius: 8px;
      background-color: #5500cb;
      color: white;
      font-size: 15px;
      border: none;
      cursor: pointer;
    }

    .report-body {
      max-width: 1160px;
      overflow-x: auto;
      padding: 20px;
    }

    .report-topic-heading,
    .item1 {
      width: 1120px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .t-op {
      font-size: 18px;
      letter-spacing: 0px;
    }

    .items {
      width: 1120px;
      margin-top: 15px;
    }

    .item1 {
      margin-top: 20px;
    }

    .t-op-nextlvl {
      font-size: 14px;
      letter-spacing: 0px;
      font-weight: 600;
    }

    .label-tag {
      width: 100px;
      text-align: center;
      background-color: rgb(0, 177, 0);
      color: white;
      border-radius: 4px;
    }

    .report-list table th,.report-list table td {
      padding: 10px;
    }
    .report-list table {
      width: 100%;
    }
    #table-body button {
      height: 35px;
      width: 90px;
      border-radius: 8px;
      background-color: #5500cb;
      color: white;
      font-size: 15px;
      border: none;
      cursor: pointer;
    }
    .report-list table th {
      width: 33.33%;
    }
    /*table tr.data td:first-child, table tr.data td:last-child {
      display: flex;
      justify-content: center;
    }*/
    button#delete-btn {
      margin-left: 5px;
    }
    .d-none{display: none;}
    .delete-btn {
      height: 35px;
      width: 90px;
      border-radius: 8px;
      background-color: #5500cb;
      color: white;
      font-size: 15px;
      border: none;
      cursor: pointer;
      padding: 10px 20px;
    }

    .report-head {
        display: flex;
        justify-content: space-between;
    }
    .search-block {
    display: flex;
}

.search-block button {
    padding: 5px 10px;
}

.search-block button img {
    width: 100%;
    height: 100% !important;
    max-width: 20px;
    max-height: 20px;
    /* padding: 1px; */
}
table.table {
    text-align: center;
}

img.user-icon {
    width: 100%;
    height: 100%;
    max-width: 60px;
    max-height: 60px;
    float: right;
}
.alert.alert-warning {
    margin-top: 10px;
    color: red;
    font-weight: 600;
}
p.desc {
    text-align: justify;
}
  </style>
</head>

<body>

  <!-- for header part -->
  <header>


    <div class="logosec">
      <div class="logo">Student Portfolio Hub</div>
      <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
        class="icn menuicn" id="menuicn" alt="menu-icon">
    </div>
    <div class="logosec">
      <h2>Hii, <?php echo $_SESSION['name']; ?></h2>
      <img class="user-icon" src="./assets/Administrator.png">
    </div>

    <!-- <div class="searchbar"> 
            <input type="text" 
                   placeholder="Search"> 
            <div class="searchbtn"> 
              <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn" 
                    alt="search-icon"> 
              </div> 
        </div> -->



  </header>

  <div class="main-container">
    <div class="navcontainer">
      <nav class="nav">
        <div class="nav-upper-options">
          <a href="dashboard.php">
          <div class="nav-option option1 active">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
              class="nav-img" alt="dashboard">
            <h3> Dashboard</h3>
          </div>
        </a>

          <?php 
            if($_SESSION['Role'] == 'User'){ ?>
              <a href="profile.php">
              <div class="nav-option option5">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png" class="nav-img"
                  alt="blog">
                <h3> Profile</h3>
              </div>
          <?php  } ?>
          <a href="logout.php">
          <div class="nav-option logout">
            
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img"
              alt="logout">
            <h3>Logout</h3>
          
          </div>
</a>

        </div>
      </nav>
    </div>
    <?php 
      if($_SESSION['Role'] == 'User'){ ?>
    <div class="main">
      <?php
        if(isset($_SESSION['message'])){
            echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
            unset($_SESSION['message']);
        }
      ?>
      <div class="report-container">
        <div class="report-header">
          <div class="report-head">
            <h1 class="recent-Articles">Recent Upload</h1>
          </div>
        </div>
        <?php 
          $UserID = $_SESSION['UserID'];
          $userQuery = "SELECT * FROM tbl_certificate WHERE UserID='$UserID'";
          $result = mysqli_query($conn, $userQuery);
        ?>
        <form action="save_certificate.php" method="POST" enctype="multipart/form-data">
        <div class="report-list">
          <table class="table">
            <thead>
              <tr>
                <th>Document</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr class="data">
                          <td>
                            <?php
                              $ext = pathinfo('uploads/certificate/'.$row['UploadURL'], PATHINFO_EXTENSION);
                              if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){ ?>
                            <a href="uploads/certificate/<?php echo $row['UploadURL']; ?>" target="_blank"><img src="uploads/certificate/<?php echo $row['UploadURL']; ?>" width="100" height="50"/></a>
                            <?php  }else{ ?>
                            <a href="uploads/certificate/<?php echo $row['UploadURL']; ?>" target="_blank"><img src="assets/no-image.png" width="100" height="50"/></a>
                            <?php  } ?>
                            </td>
                          <td><p class="desc"><?php echo $row['Description']; ?><p></td>
                          <td><a href="delete_certificate.php?id=<?php echo $row['CertificateID']; ?>" class="delete-btn">Delete</a></td>
                        </tr>
              <?php  } } ?>
              
            </tbody>
            <tbody id="table-body">
            </tbody>
          </table>
        </div>
        <div class="report-add">
          <button class="add-btn" onclick="addRow()" type="button">Add New +</button>
          <button class="add-btn d-none" id="submit-btn" type="submit">Submit</button>
          <?php
            if(isset($_SESSION['errors']) && count($_SESSION['errors']) > 0){
                foreach($_SESSION['errors'] as $error){
                    ?>
                    <div class="alert alert-warning"><?= $error; ?></div>
                    <?php
                }
                unset($_SESSION['errors']);
            }

            if(isset($_SESSION['message'])){
                echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
                unset($_SESSION['message']);
            }
            ?>
        </div>
      </form>
      </div>
    </div>
<?php }else{?>
    <div class="main">
      <?php
        if(isset($_SESSION['message'])){
            echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
            unset($_SESSION['message']);
        }
      ?>
      <div class="report-container">
        <div class="report-header">
          <div class="report-head">
            <h1 class="recent-Articles">Recent Upload</h1>
            <div class="search-block">
              <input type="text" placeholder="Search" id="search-input" value="<?php echo (isset($_GET['search']) && $_GET['search'] != '')?$_GET['search']:''; ?>">
              <button type="button" onclick="searchData()"><img src="./assets/search.png" class="icn srchicn" alt="search-icon" ></button>
            </div>
          </div>
        </div>
        <?php 
          $UserID = $_SESSION['UserID'];
          $search = (isset($_GET['search']) && $_GET['search'] != '')?' WHERE usr.name="'.$_GET['search'].'"':'';
          $userQuery = "SELECT * FROM tbl_certificate crt LEFT JOIN users usr on usr.id=crt.UserID".$search;
          $result = mysqli_query($conn, $userQuery);
        ?>
        <form action="save_certificate.php" method="POST" enctype="multipart/form-data">
        <div class="report-list">
          <table class="table">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Student Mobile</th>
                <th>Document</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr class="data">
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['phone']; ?></td>

                          <td>
                            <?php
                              $ext = pathinfo('uploads/certificate/'.$row['UploadURL'], PATHINFO_EXTENSION);
                              if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){ ?>
                            <a href="uploads/certificate/<?php echo $row['UploadURL']; ?>" target="_blank"><img src="uploads/certificate/<?php echo $row['UploadURL']; ?>" width="100" height="50"/></a>
                            <?php  }else{ ?>
                            <a href="uploads/certificate/<?php echo $row['UploadURL']; ?>" target="_blank"><img src="assets/no-image.png" width="100" height="50"/></a>
                            <?php  } ?>
                          </td>
                          <td><p class="desc"><?php echo $row['Description']; ?></p></td>
                        </tr>
              <?php  } }else{ ?>
                <tr>
                  <td colspan="3" style="text-align: center;">No Data Found</td>
                </tr>
              <?php } ?>
              
            </tbody>
            <tbody id="table-body">
            </tbody>
          </table>
        </div>
      </form>
      </div>
    </div>
  <?php } ?>
  </div>
  </div>

  <script>
    let menuicn = document.querySelector(".menuicn");
    let nav = document.querySelector(".navcontainer");

    menuicn.addEventListener("click", () => {
      nav.classList.toggle("navclose");
    })
  </script>
  <script>
    function addRow() {
      var tableBody = document.getElementById('table-body');
      var row = document.createElement('tr');
      var imageCell = document.createElement('td');
      var descriptionCell = document.createElement('td');
      var actionCell = document.createElement('td');

      var imageInput = document.createElement('input');
      imageInput.type = 'file';
      imageInput.name = 'certificate[]';
      imageInput.accept = 'image/jpeg,image/jpg,image/png,application/pdf';
      imageCell.appendChild(imageInput);

      var descriptionInput = document.createElement('textarea');
      descriptionInput.name = 'description[]';
      descriptionCell.appendChild(descriptionInput);

      // var submitButton = document.createElement('button');
      // submitButton.textContent = 'Submit';
      // submitButton.type = 'submit';

      var deleteButton = document.createElement('button');
      deleteButton.textContent = 'Delete';
      deleteButton.id = 'delete-btn';
      deleteButton.onclick = function () {
        tableBody.removeChild(row);
        if(tableBody.getElementsByTagName('tr').length == 0){
          document.getElementById('submit-btn').class = 'd-none';
        }
      }
      // actionCell.appendChild(submitButton);
      actionCell.appendChild(deleteButton);

      row.appendChild(imageCell);
      row.appendChild(descriptionCell);
      row.appendChild(actionCell);

      tableBody.appendChild(row);
      document.getElementById('submit-btn').class = 'd-none';
      if(tableBody.getElementsByTagName('tr').length >0){
        document.getElementById('submit-btn').classList.remove('d-none');
      }
    }

    function searchData() {
      if(document.getElementById('search-input').value != ''){
        window.location.href = 'dashboard.php?search='+document.getElementById('search-input').value;
      }
      else{
        window.location.href = 'dashboard.php';
      }
    }
  </script>
</body>

</html>