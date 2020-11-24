 <?php

    session_start();

    if ($_SESSION['username'] == null) {
        header("Location: login.php");
    }
    require_once("validation/add-book-validation.php");

    ?>

 <html>

 <head>
     <title>Dashborard</title>

     <style>
         td:nth-child(odd) {
             display: block;
             font-weight: bold;
             width: 100%;
         }
     </style>
 </head>

 <body>

     <form action="" method="post">
         <table>
             <tr>
                 <td></td>
                 <td></td>
             </tr>
             <tr>
                 <td>Book Name:</td>
                 <td><input type="text" name="name" id=""><?php echo $err_name ?></td>
             </tr>
             <tr>
                 <td>Category:</td>
                 <td>
                     <select name="category" id="" style="width: 165px;">
                         <option value="Architecture">Architecture</option>
                         <option value="CSE">CSE</option>
                         <option value="BBA">BBA</option>
                     </select>
                     <?php echo $err_category ?>
                 </td>
             </tr>
             <tr>
                 <td>Description:</td>
                 <td><textarea name="desc" id="" rows="10"></textarea><?php echo $err_desc ?></td>
             </tr>

             <tr>
                 <td>Publisher:</td>
                 <td><input type="text" name="publisher" id=""><?php echo $err_publisher ?></td>
             </tr>
             <tr>
                 <td>Edition:</td>
                 <td><input type="text" name="ed" id=""><?php echo $err_ed ?></td>
             </tr>
             <tr>
                 <td>ISBN:</td>
                 <td><input type="text" name="isbn" id=""><?php echo $err_isbn ?></td>
             </tr>
             <tr>
                 <td>Pages:</td>
                 <td><input type="text" name="pages" id=""><?php echo $err_pages ?></td>
             </tr>
             <tr>
                 <td>Price:</td>
                 <td><input type="text" name="price" id=""><?php echo $err_price ?></td>
             </tr>
             <tr>
                 <td><input type="reset" name="" id=""></td>
                 <td><input type="submit" name="save" id="" value="Save"></td>
             </tr>
         </table>
     </form>

     <a href="dashboard.php">See Book List</a>





 </body>

 </html>