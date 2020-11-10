 <?php

    $err_type = "";

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
                 <td><input type="text" name="" id=""><?php echo $err_type ?></td>
             </tr>
             <tr>
                 <td>Category:</td>
                 <td>
                     <select name="category" id="" style="width: 165px;">
                         <option value="Architecture">Architecture</option>
                         <option value="CSE">CSE</option>
                         <option value="BBA">BBA</option>
                     </select>
                 </td>
             </tr>
             <tr>
                 <td>Description:</td>
                 <td><textarea name="" id="" rows="10"></textarea><?php echo $err_type ?></td>
             </tr>

             <tr>
                 <td>Publisher:</td>
                 <td><input type="text" name="" id=""><?php echo $err_type ?></td>
             </tr>
             <tr>
                 <td>Edition:</td>
                 <td><input type="text" name="" id=""><?php echo $err_type ?></td>
             </tr>
             <tr>
                 <td>ISBN:</td>
                 <td><input type="text" name="" id=""><?php echo $err_type ?></td>
             </tr>
             <tr>
                 <td>Pages:</td>
                 <td><input type="text" name="" id=""><?php echo $err_type ?></td>
             </tr>
             <tr>
                 <td>Price:</td>
                 <td><input type="text" name="" id=""><?php echo $err_type ?></td>
             </tr>
             <tr>
                 <td><input type="reset" name="" id=""></td>
                 <td><input type="submit" name="save" id="" value="Save"></td>
             </tr>
         </table>
     </form>





 </body>

 </html>