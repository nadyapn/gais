<html>
    <form action = {{url('/dologin')}} method="POST">
      Email:<br>
      <input type="text" name="email"><br>
      Password:<br>
      <input type="password" name="password"></input>
      <input type="submit"></input>
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </form>
</html>
