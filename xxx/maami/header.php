<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8" />
   <title><?php echo $pageTitle; ?></title>
   <link type="text/css" rel="stylesheet" media="screen" href="layout.css" />
   </head>
   <body>
   
   <table id="nav">
   <tr>
   <td><a href="addform.php"><button type="button" class="btn btn-default">Add Contacts</button></a></td>
   <td><a href="updateform.php"><button type="button" class="btn btn-primary">update Contacts</button></a></td>
   <td><a href="deleteform.php"><button type="button" class="btn btn-primary">delete Contacts</button></a></td>
   <td><a href= "auth.php?logout">Logout</a></td>
  <td>
  <form method="" action="">
  <input type="text" name="search" />
  <input type="submit" name="submit" value=" Search ">
  
   </form>
      </td> 
   </tr>
   </table>
   <!--end of header-->